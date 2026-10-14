<?php
// Load existing photos from index.json
$galleryDir = './images/gallery/';
$indexFile  = $galleryDir . 'index.json';
$photos     = [];

if (file_exists($indexFile)) {
    $photos = json_decode(file_get_contents($indexFile), true) ?: [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Our Memories — Hospital Gallery</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --teal-deep:  #103F7A;
      --teal-mid:   #1756A2;
      --teal-light: #EAF2FC;
      --cream:      #F7F4EF;
      --charcoal:   #1C1C1C;
      --muted:      #6B7A7D;
      --white:      #FFFFFF;
      --border:     rgba(0,0,0,0.08);
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--cream);
      color: var(--charcoal);
      min-height: 100vh;
    }

    /* ── HEADER ── */
    header {
      background: var(--teal-deep);
      padding: 52px 48px 44px;
      position: relative;
      overflow: hidden;
    }
    header::before {
      content: '';
      position: absolute;
      left: -80px; top: -80px;
      width: 320px; height: 320px;
      border-radius: 50%;
      background: var(--teal-mid);
      opacity: 0.25;
    }
    header::after {
      content: '';
      position: absolute;
      right: 60px; bottom: -100px;
      width: 220px; height: 220px;
      border-radius: 50%;
      background: var(--teal-light);
      opacity: 0.12;
    }
    .header-inner {
      position: relative; z-index: 1;
      display: flex; align-items: flex-end;
      justify-content: space-between;
      flex-wrap: wrap; gap: 20px;
    }
    .header-eyebrow {
      font-size: 11px; letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--teal-light); font-weight: 500; margin-bottom: 12px;
    }
    header h1 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(2.4rem, 5vw, 3.6rem);
      font-weight: 600; color: var(--white); line-height: 1.1;
    }
    header p.subtitle {
      margin-top: 14px; color: rgba(255,255,255,0.65);
      font-size: 15px; font-weight: 300;
      max-width: 480px; line-height: 1.6;
    }
    .count-badge {
      display: inline-block;
      background: var(--teal-light); color: var(--teal-deep);
      font-size: 11px; font-weight: 600;
      padding: 3px 10px; border-radius: 100px;
      margin-left: 10px; vertical-align: middle;
      font-family: 'DM Sans', sans-serif;
    }
    .admin-upload-btn {
      background: rgba(255,255,255,0.12);
      border: 1.5px solid rgba(255,255,255,0.3);
      color: var(--white); font-family: 'DM Sans', sans-serif;
      font-size: 13px; font-weight: 500;
      padding: 10px 22px; border-radius: 100px;
      cursor: pointer; display: flex; align-items: center; gap: 8px;
      transition: background 0.18s, border-color 0.18s;
      white-space: nowrap; align-self: flex-start; margin-top: 8px;
    }
    .admin-upload-btn:hover { background: rgba(255,255,255,0.22); border-color: rgba(255,255,255,0.55); }
    .admin-upload-btn svg { stroke: var(--white); flex-shrink: 0; }

    /* ── GALLERY ── */
    .gallery-section { padding: 40px 48px 80px; }
    .masonry { columns: 4; column-gap: 16px; }
    @media (max-width: 1100px) { .masonry { columns: 3; } }
    @media (max-width: 720px)  { .masonry { columns: 2; } .gallery-section { padding: 28px 20px 60px; } header { padding: 40px 24px 36px; } }
    @media (max-width: 420px)  { .masonry { columns: 1; } }

    .photo-item {
      break-inside: avoid; margin-bottom: 16px;
      border-radius: 14px; overflow: hidden;
      position: relative; cursor: pointer; background: #ddd;
      box-shadow: 0 2px 8px rgba(0,0,0,0.07);
      transition: transform 0.22s ease, box-shadow 0.22s ease;
    }
    .photo-item:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(23,86,162,0.18); }
    .photo-item img { width: 100%; display: block; object-fit: cover; transition: transform 0.4s ease; }
    .photo-item:hover img { transform: scale(1.03); }

    .caption-overlay {
      position: absolute; bottom: 0; left: 0; right: 0;
      background: linear-gradient(to top, rgba(13,36,40,0.85) 0%, transparent 100%);
      padding: 32px 16px 14px; opacity: 0; transition: opacity 0.25s ease;
    }
    .photo-item:hover .caption-overlay { opacity: 1; }
    .caption-overlay p { color: var(--white); font-size: 13px; line-height: 1.4; }

    /* Empty state */
    .empty-state { text-align: center; padding: 80px 24px; }
    .empty-state svg { stroke: #B8C9CC; margin-bottom: 16px; }
    .empty-state h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: var(--muted); }
    .empty-state p { font-size: 14px; color: #aaa; margin-top: 8px; }

    /* ── OVERLAYS ── */
    .overlay {
      position: fixed; inset: 0; z-index: 1000;
      display: none; align-items: center; justify-content: center; padding: 24px;
    }
    .overlay.open { display: flex; }
    .overlay-bg { position: absolute; inset: 0; background: rgba(10,28,30,0.92); }
    .modal-box {
      position: relative; z-index: 1;
      background: var(--white); border-radius: 18px;
      padding: 36px 32px; width: min(420px, 90vw);
      font-family: 'DM Sans', sans-serif;
      animation: fadeUp 0.22s ease;
    }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
    .modal-box h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; margin-bottom: 6px; }
    .modal-sub { font-size: 13px; color: var(--muted); margin-bottom: 22px; }
    .modal-label { font-size: 12px; font-weight: 500; color: var(--muted); display: block; margin-bottom: 6px; }
    .modal-input {
      width: 100%; padding: 11px 14px;
      border: 1.5px solid #ddd; border-radius: 9px;
      font-family: 'DM Sans', sans-serif; font-size: 14px;
      outline: none; margin-bottom: 16px;
      transition: border-color 0.15s; color: var(--charcoal);
    }
    .modal-input:focus { border-color: var(--teal-mid); }
    .modal-error { font-size: 12px; color: #c0392b; margin-top: -10px; margin-bottom: 14px; display: none; }
    .modal-btns { display: flex; gap: 10px; margin-top: 4px; }
    .btn-secondary {
      flex: 1; padding: 11px; border: 1.5px solid #ddd;
      border-radius: 9px; background: var(--white);
      font-family: 'DM Sans', sans-serif; font-size: 14px;
      cursor: pointer; color: var(--muted); transition: border-color 0.15s;
    }
    .btn-secondary:hover { border-color: var(--teal-mid); color: var(--teal-deep); }
    .btn-primary {
      flex: 2; padding: 11px; border: none; border-radius: 9px;
      background: var(--teal-deep); color: var(--white);
      font-family: 'DM Sans', sans-serif; font-size: 14px;
      font-weight: 500; cursor: pointer; transition: background 0.15s;
      display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-primary:hover { background: var(--teal-mid); }
    .btn-primary:disabled { opacity: 0.6; cursor: not-allowed; }

    .thumb-preview { width: 100%; height: 150px; border-radius: 10px; overflow: hidden; margin-bottom: 18px; background: #eee; }
    .thumb-preview img { width: 100%; height: 100%; object-fit: cover; }

    /* Progress bar */
    .upload-progress { display: none; margin-bottom: 16px; }
    .progress-bar-wrap { background: #eee; border-radius: 100px; height: 6px; overflow: hidden; }
    .progress-bar-fill { height: 100%; background: var(--teal-mid); border-radius: 100px; width: 0; transition: width 0.3s ease; }
    .progress-label { font-size: 12px; color: var(--muted); margin-top: 6px; text-align: center; }

    /* Toast */
    .toast {
      position: fixed; bottom: 28px; left: 50%; transform: translateX(-50%);
      background: var(--teal-deep); color: white;
      padding: 12px 24px; border-radius: 100px;
      font-size: 14px; font-weight: 500;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
      z-index: 9999; opacity: 0;
      transition: opacity 0.3s ease;
      pointer-events: none; white-space: nowrap;
    }
    .toast.show { opacity: 1; }

    /* ── LIGHTBOX ── */
    .lightbox {
      position: fixed; inset: 0;
      background: rgba(10,28,30,0.95);
      z-index: 900; display: none;
      align-items: center; justify-content: center; padding: 24px;
    }
    .lightbox.open { display: flex; }
    .lightbox-inner { position: relative; max-width: 900px; width: 100%; animation: fadeUp 0.25s ease; }
    .lightbox-inner img { width: 100%; max-height: 80vh; object-fit: contain; border-radius: 12px; display: block; }
    .lightbox-caption { margin-top: 14px; text-align: center; color: rgba(255,255,255,0.75); font-family: 'Cormorant Garamond', serif; font-size: 18px; font-style: italic; min-height: 24px; }
    .lb-close {
      position: absolute; top: -16px; right: -16px;
      width: 40px; height: 40px; border-radius: 50%;
      background: var(--teal-deep); border: none; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      color: white; font-size: 20px; transition: background 0.15s; z-index: 10;
    }
    .lb-close:hover { background: var(--teal-mid); }
    .lb-nav {
      position: absolute; top: 50%; transform: translateY(-50%);
      background: rgba(255,255,255,0.12); border: none; color: white;
      width: 44px; height: 44px; border-radius: 50%; font-size: 22px;
      cursor: pointer; display: flex; align-items: center; justify-content: center;
      transition: background 0.15s;
    }
    .lb-nav:hover { background: rgba(255,255,255,0.25); }
    .lb-prev { left: -56px; } .lb-next { right: -56px; }
    @media (max-width: 700px) { .lb-prev { left: 4px; } .lb-next { right: 4px; } }

    #fileInput { display: none; }
  </style>
</head>
<body>

<!-- HEADER -->
<header>
  <div class="header-inner">
    <div class="header-text">
      <p class="header-eyebrow">Hospital Life</p>
      <h1>Our Gallery
        <span id="totalCount" class="count-badge">
          <?= count($photos) ?> <?= count($photos) === 1 ? 'photo' : 'photos' ?>
        </span>
      </h1>
      <p class="subtitle">Moments of care, compassion, and community — captured and remembered.</p>
    </div>
    <button class="admin-upload-btn" onclick="openPasswordModal()">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
        <polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
      </svg>
      Add Photos
    </button>
  </div>
</header>

<!-- GALLERY -->
<section class="gallery-section">
  <div class="masonry" id="masonryGrid">
    <?php foreach (array_reverse($photos) as $i => $photo): ?>
      <?php $url = $galleryDir . htmlspecialchars($photo['file']); ?>
      <div class="photo-item" data-index="<?= count($photos) - 1 - $i ?>" onclick="openLightbox(this.dataset.index)">
        <img src="<?= $url ?>" alt="<?= htmlspecialchars($photo['caption']) ?>" loading="lazy"/>
        <?php if (!empty($photo['caption'])): ?>
        <div class="caption-overlay"><p><?= htmlspecialchars($photo['caption']) ?></p></div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>

  <?php if (empty($photos)): ?>
  <div class="empty-state" id="emptyState">
    <svg width="52" height="52" viewBox="0 0 24 24" fill="none" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
      <rect x="3" y="3" width="18" height="18" rx="3"/>
      <circle cx="8.5" cy="8.5" r="1.5"/>
      <polyline points="21 15 16 10 5 21"/>
    </svg>
    <h3>No photos yet</h3>
    <p>Admin can upload photos using the button above.</p>
  </div>
  <?php endif; ?>
</section>

<input type="file" id="fileInput" accept="image/*" multiple />

<!-- PASSWORD MODAL -->
<div class="overlay" id="passwordOverlay">
  <div class="overlay-bg" onclick="closePasswordModal()"></div>
  <div class="modal-box">
    <h3>Admin Access</h3>
    <p class="modal-sub">Enter the admin password to upload photos.</p>
    <label class="modal-label">Password</label>
    <input class="modal-input" type="password" id="passwordInput" placeholder="Enter password"
      onkeydown="if(event.key==='Enter') checkPassword()"/>
    <p class="modal-error" id="passwordError">Incorrect password. Please try again.</p>
    <div class="modal-btns">
      <button class="btn-secondary" onclick="closePasswordModal()">Cancel</button>
      <button class="btn-primary" onclick="checkPassword()">Unlock</button>
    </div>
  </div>
</div>

<!-- CAPTION MODAL -->
<div class="overlay" id="captionOverlay">
  <div class="overlay-bg"></div>
  <div class="modal-box">
    <h3>Add a caption</h3>
    <p class="modal-sub">Optional — click Skip to upload without a caption.</p>
    <div class="thumb-preview"><img id="thumbImg" src="" alt=""/></div>
    <label class="modal-label">Caption <span style="font-weight:300;">(optional)</span></label>
    <input class="modal-input" type="text" id="captionInput" placeholder="e.g. World Health Day celebration, 2024"
      onkeydown="if(event.key==='Enter') uploadCurrentPhoto()"/>
    <div class="upload-progress" id="uploadProgress">
      <div class="progress-bar-wrap"><div class="progress-bar-fill" id="progressFill"></div></div>
      <p class="progress-label" id="progressLabel">Uploading…</p>
    </div>
    <div class="modal-btns" id="captionBtns">
      <button class="btn-secondary" onclick="skipCaption()">Skip</button>
      <button class="btn-primary" id="uploadBtn" onclick="uploadCurrentPhoto()">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
          <polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
        </svg>
        Save &amp; Add to Gallery
      </button>
    </div>
  </div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
  <div class="lightbox-inner">
    <button class="lb-close" onclick="closeLightbox()">&#x2715;</button>
    <button class="lb-nav lb-prev" onclick="navigate(-1)">&#8592;</button>
    <button class="lb-nav lb-next" onclick="navigate(1)">&#8594;</button>
    <img id="lbImg" src="" alt=""/>
    <div class="lightbox-caption" id="lbCaption"></div>
  </div>
</div>

<!-- Toast -->
<div class="toast" id="toast"></div>

<script>
  // All photos from PHP (newest first for lightbox indexing)
  const photos = <?= json_encode(array_values($photos)) ?>;
  let currentIndex = 0;
  let adminUnlocked = false;
  let pendingFiles  = [];
  let pendingIndex  = 0;
  let currentObjectURL = null;

  // ── PASSWORD ──
  function openPasswordModal() {
    if (adminUnlocked) { document.getElementById('fileInput').click(); return; }
    document.getElementById('passwordInput').value = '';
    document.getElementById('passwordError').style.display = 'none';
    document.getElementById('passwordOverlay').classList.add('open');
    setTimeout(() => document.getElementById('passwordInput').focus(), 80);
  }
  function closePasswordModal() {
    document.getElementById('passwordOverlay').classList.remove('open');
  }
  function checkPassword() {
    const val = document.getElementById('passwordInput').value;
    fetch('upload.php', {
      method: 'POST',
      body: (() => { const f = new FormData(); f.append('password', val); f.append('check_only', '1'); return f; })()
    })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        adminUnlocked = true;
        closePasswordModal();
        document.getElementById('fileInput').click();
      } else {
        document.getElementById('passwordError').style.display = 'block';
        document.getElementById('passwordInput').value = '';
        document.getElementById('passwordInput').focus();
      }
    });
  }

  // ── FILE INPUT ──
  document.getElementById('fileInput').addEventListener('change', function(e) {
    pendingFiles = Array.from(e.target.files);
    pendingIndex = 0;
    this.value = '';
    processNextFile();
  });

  function processNextFile() {
    if (pendingIndex >= pendingFiles.length) return;
    const file = pendingFiles[pendingIndex];
    if (currentObjectURL) URL.revokeObjectURL(currentObjectURL);
    currentObjectURL = URL.createObjectURL(file);
    document.getElementById('thumbImg').src = currentObjectURL;
    document.getElementById('captionInput').value = '';
    document.getElementById('uploadProgress').style.display = 'none';
    document.getElementById('progressFill').style.width = '0';
    document.getElementById('captionBtns').style.display = 'flex';
    document.getElementById('uploadBtn').disabled = false;
    document.getElementById('captionOverlay').classList.add('open');
    setTimeout(() => document.getElementById('captionInput').focus(), 80);
  }

  function skipCaption() {
    document.getElementById('captionInput').value = '';
    uploadCurrentPhoto();
  }

  function uploadCurrentPhoto() {
    const file    = pendingFiles[pendingIndex];
    const caption = document.getElementById('captionInput').value.trim();
    const pwd     = document.getElementById('passwordInput').value || sessionStorage.getItem('adminPwd') || '';

    document.getElementById('captionBtns').style.display = 'none';
    document.getElementById('uploadProgress').style.display = 'block';
    document.getElementById('uploadBtn').disabled = true;

    const formData = new FormData();
    formData.append('photo', file);
    formData.append('caption', caption);
    formData.append('password', sessionStorage.getItem('adminPwd') || '');

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php');

    xhr.upload.addEventListener('progress', function(e) {
      if (e.lengthComputable) {
        const pct = Math.round((e.loaded / e.total) * 100);
        document.getElementById('progressFill').style.width = pct + '%';
        document.getElementById('progressLabel').textContent = 'Uploading… ' + pct + '%';
      }
    });

    xhr.addEventListener('load', function() {
      try {
        const data = JSON.parse(xhr.responseText);
        if (data.success) {
          document.getElementById('progressLabel').textContent = 'Saved!';
          document.getElementById('progressFill').style.width = '100%';
          document.getElementById('captionOverlay').classList.remove('open');
          addPhotoToGrid(data.url, data.caption, data.file);
          showToast('✓ ' + data.message);
          pendingIndex++;
          setTimeout(processNextFile, 300);
        } else {
          alert('Upload failed: ' + data.error);
          document.getElementById('captionBtns').style.display = 'flex';
          document.getElementById('uploadProgress').style.display = 'none';
          document.getElementById('uploadBtn').disabled = false;
        }
      } catch(e) {
        alert('Server error. Please check upload.php is in the same folder.');
        document.getElementById('captionBtns').style.display = 'flex';
        document.getElementById('uploadProgress').style.display = 'none';
        document.getElementById('uploadBtn').disabled = false;
      }
    });

    xhr.send(formData);
  }

  // Store password in session after unlock for uploads
  const _origCheck = checkPassword;

  // ── ADD PHOTO TO PAGE ──
  function addPhotoToGrid(url, caption, filename) {
    const grid = document.getElementById('masonryGrid');

    // Remove empty state if present
    const es = document.getElementById('emptyState');
    if (es) es.remove();

    const idx = photos.length;
    photos.push({ file: filename, caption: caption });

    const item = document.createElement('div');
    item.className = 'photo-item';
    item.dataset.index = idx;
    item.onclick = function() { openLightbox(this.dataset.index); };

    const img = document.createElement('img');
    img.src = url;
    img.alt = caption || 'Hospital photo';
    item.appendChild(img);

    if (caption) {
      const overlay = document.createElement('div');
      overlay.className = 'caption-overlay';
      const p = document.createElement('p');
      p.textContent = caption;
      overlay.appendChild(p);
      item.appendChild(overlay);
    }

    // Prepend so newest appears first
    grid.insertBefore(item, grid.firstChild);

    // Update count badge
    const n = photos.length;
    document.getElementById('totalCount').textContent = n + (n === 1 ? ' photo' : ' photos');
  }

  // ── LIGHTBOX ──
  function openLightbox(index) {
    currentIndex = parseInt(index);
    showPhoto(currentIndex);
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function showPhoto(index) {
    const p = photos[index];
    document.getElementById('lbImg').src = './images/gallery/' + p.file;
    document.getElementById('lbCaption').textContent = p.caption || '';
  }
  function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
  }
  function navigate(dir) {
    currentIndex = (currentIndex + dir + photos.length) % photos.length;
    showPhoto(currentIndex);
  }
  document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
  });
  document.addEventListener('keydown', function(e) {
    if (document.getElementById('lightbox').classList.contains('open')) {
      if (e.key === 'ArrowRight') navigate(1);
      if (e.key === 'ArrowLeft')  navigate(-1);
      if (e.key === 'Escape') closeLightbox();
    }
    if (document.getElementById('passwordOverlay').classList.contains('open') && e.key === 'Escape') closePasswordModal();
  });

  // ── TOAST ──
  function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
  }

  // ── PASSWORD SESSION STORE ──
  // Patch checkPassword to also store in sessionStorage
  function checkPassword() {
    const val = document.getElementById('passwordInput').value;
    const formData = new FormData();
    formData.append('password', val);
    formData.append('check_only', '1');
    fetch('upload.php', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        adminUnlocked = true;
        sessionStorage.setItem('adminPwd', val);
        closePasswordModal();
        document.getElementById('fileInput').click();
      } else {
        document.getElementById('passwordError').style.display = 'block';
        document.getElementById('passwordInput').value = '';
        document.getElementById('passwordInput').focus();
      }
    });
  }

  // Auto-unlock if password already verified this session
  if (sessionStorage.getItem('adminPwd')) adminUnlocked = true;
</script>
</body>
</html>
