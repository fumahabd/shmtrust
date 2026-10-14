<?php
// ════════════════════════════════════════════════
//  CHANGE YOUR PASSWORD HERE ↓
define('ADMIN_PASSWORD', 'hospital2024');

//  IMAGE RESIZE SETTINGS
define('MAX_WIDTH',   1280);   // max width in pixels  (web-optimized)
define('MAX_HEIGHT',  1280);   // max height in pixels
define('JPEG_QUALITY', 82);    // JPEG quality 1–100 (82 = great balance)
define('MAX_FILE_MB',  20);    // reject uploads larger than this (MB)
// ════════════════════════════════════════════════

header('Content-Type: application/json');

// ── Only POST ──
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
    exit;
}

// ── Password check ──
$password = isset($_POST['password']) ? $_POST['password'] : '';
if ($password !== ADMIN_PASSWORD) {
    echo json_encode(['success' => false, 'error' => 'Incorrect password.']);
    exit;
}

// ── Password-only check (no file) ──
if (isset($_POST['check_only'])) {
    echo json_encode(['success' => true]);
    exit;
}

// ── File received? ──
if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
    $uploadErrors = [
        UPLOAD_ERR_INI_SIZE   => 'File too large (server php.ini limit).',
        UPLOAD_ERR_FORM_SIZE  => 'File too large (form limit).',
        UPLOAD_ERR_PARTIAL    => 'File was only partially uploaded.',
        UPLOAD_ERR_NO_FILE    => 'No file was uploaded.',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder on server.',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
    ];
    $code = $_FILES['photo']['error'] ?? -1;
    $msg  = $uploadErrors[$code] ?? 'Unknown upload error.';
    echo json_encode(['success' => false, 'error' => $msg]);
    exit;
}

// ── File size guard (before GD) ──
$fileSizeBytes = $_FILES['photo']['size'];
if ($fileSizeBytes > MAX_FILE_MB * 1024 * 1024) {
    echo json_encode(['success' => false, 'error' => 'File is larger than ' . MAX_FILE_MB . ' MB. Please choose a smaller image.']);
    exit;
}

// ── Validate it is truly an image ──
$tmpPath  = $_FILES['photo']['tmp_name'];
$imgInfo  = @getimagesize($tmpPath);
if (!$imgInfo) {
    echo json_encode(['success' => false, 'error' => 'Uploaded file is not a valid image.']);
    exit;
}

$mimeType = $imgInfo['mime'];
$allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
if (!in_array($mimeType, $allowedMimes)) {
    echo json_encode(['success' => false, 'error' => 'Only JPG, PNG, GIF, and WEBP images are allowed.']);
    exit;
}

// ── Check GD is available ──
if (!extension_loaded('gd')) {
    echo json_encode(['success' => false, 'error' => 'GD library is not enabled on this server. Please contact your host.']);
    exit;
}

// ── Create gallery folder ──
$galleryDir = './images/gallery/';
if (!is_dir($galleryDir)) {
    if (!mkdir($galleryDir, 0755, true)) {
        echo json_encode(['success' => false, 'error' => 'Could not create images/gallery/ folder. Check server permissions.']);
        exit;
    }
}

// ════════════════════════════════
//  RESIZE & COMPRESS
// ════════════════════════════════

$origW = $imgInfo[0];
$origH = $imgInfo[1];

// Load source image into GD
$source = null;
switch ($mimeType) {
    case 'image/jpeg': $source = @imagecreatefromjpeg($tmpPath); break;
    case 'image/png':  $source = @imagecreatefrompng($tmpPath);  break;
    case 'image/gif':  $source = @imagecreatefromgif($tmpPath);  break;
    case 'image/webp': $source = @imagecreatefromwebp($tmpPath); break;
}

if (!$source) {
    echo json_encode(['success' => false, 'error' => 'Could not read image data. The file may be corrupt.']);
    exit;
}

// ── Auto-rotate JPEG based on EXIF orientation (fixes sideways phone photos) ──
if ($mimeType === 'image/jpeg' && function_exists('exif_read_data')) {
    $exif = @exif_read_data($tmpPath);
    if (!empty($exif['Orientation'])) {
        switch ($exif['Orientation']) {
            case 3: $source = imagerotate($source, 180, 0); break;
            case 6: $source = imagerotate($source, -90, 0); break;
            case 8: $source = imagerotate($source, 90, 0);  break;
        }
        // Update dimensions after rotation
        $origW = imagesx($source);
        $origH = imagesy($source);
    }
}

// ── Calculate new dimensions (maintain aspect ratio) ──
$newW = $origW;
$newH = $origH;

if ($origW > MAX_WIDTH || $origH > MAX_HEIGHT) {
    $ratioW = MAX_WIDTH  / $origW;
    $ratioH = MAX_HEIGHT / $origH;
    $ratio  = min($ratioW, $ratioH);   // scale down by the tighter constraint
    $newW   = (int) round($origW * $ratio);
    $newH   = (int) round($origH * $ratio);
}

// ── Create resized canvas ──
$canvas = imagecreatetruecolor($newW, $newH);

// Preserve transparency for PNG and GIF
if ($mimeType === 'image/png' || $mimeType === 'image/gif') {
    imagealphablending($canvas, false);
    imagesavealpha($canvas, true);
    $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
    imagefilledrectangle($canvas, 0, 0, $newW, $newH, $transparent);
}

// High-quality resample
imagecopyresampled($canvas, $source, 0, 0, 0, 0, $newW, $newH, $origW, $origH);
imagedestroy($source);

// ── Save as JPEG (best size/quality ratio for photos) ──
//    PNG and GIF uploads are also saved as JPEG to reduce file size.
//    If you want to keep PNG transparency, change the line below.
$filename = uniqid('img_', true) . '.jpg';
$destPath = $galleryDir . $filename;

$saved = imagejpeg($canvas, $destPath, JPEG_QUALITY);
imagedestroy($canvas);

if (!$saved) {
    echo json_encode(['success' => false, 'error' => 'Failed to save the resized image. Check folder write permissions.']);
    exit;
}

// ── Build human-readable size info for the response ──
$newSizeBytes = filesize($destPath);
function formatBytes($bytes) {
    if ($bytes >= 1048576) return round($bytes / 1048576, 1) . ' MB';
    return round($bytes / 1024) . ' KB';
}
$origSize = formatBytes($fileSizeBytes);
$newSize  = formatBytes($newSizeBytes);
$resized  = ($newW !== $origW || $newH !== $origH);

// ── Save metadata to index.json ──
$caption   = isset($_POST['caption']) ? trim(strip_tags($_POST['caption'])) : '';
$indexFile = $galleryDir . 'index.json';
$photos    = [];

if (file_exists($indexFile)) {
    $photos = json_decode(file_get_contents($indexFile), true) ?: [];
}

$photos[] = [
    'file'      => $filename,
    'caption'   => $caption,
    'date'      => date('Y-m-d H:i:s'),
    'orig_size' => $origSize,
    'new_size'  => $newSize,
    'width'     => $newW,
    'height'    => $newH,
];

file_put_contents($indexFile, json_encode($photos, JSON_PRETTY_PRINT));

// ── Done ──
echo json_encode([
    'success'  => true,
    'file'     => $filename,
    'url'      => $destPath,
    'caption'  => $caption,
    'orig_size'=> $origSize,
    'new_size' => $newSize,
    'width'    => $newW,
    'height'   => $newH,
    'resized'  => $resized,
    'message'  => $resized
        ? "Resized from {$origW}×{$origH} ({$origSize}) → {$newW}×{$newH} ({$newSize})"
        : "Saved as-is ({$newSize}) — already within size limits",
]);
?>
