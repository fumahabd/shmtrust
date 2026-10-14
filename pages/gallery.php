<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SHM Trust - Our Gallery</title>
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/loader.css" />
  <link rel="stylesheet" href="./css/icons.css" />
  <script src="./js/utilities.js"></script>
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
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--cream);
      color: var(--charcoal);
    }

    /* ── GALLERY FLEX GRID ── */
    .gallery-section {
      padding: 48px 40px 80px;
      margin: 0 auto;
    }

    .flex-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
    }

    /* Each item takes ~1/4 width minus gaps, 5 per row on wide screens */
    .photo-item {
      flex: 1 1 calc(20% - 14px);   /* 5 per row */
      min-width: 180px;
      max-width: calc(25% - 14px);
      border-radius: 12px;
      overflow: hidden;
      position: relative;
      cursor: pointer;
      background: #d8e5e6;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      transition: transform 0.22s ease, box-shadow 0.22s ease;
      aspect-ratio: 4 / 3;          /* consistent card height */
    }
    .photo-item:hover {
      transform: translateY(-4px);
      box-shadow: 0 14px 36px rgba(23,86,162,0.18);
      z-index: 2;
    }
    .photo-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.4s ease;
    }
    .photo-item:hover img { transform: scale(1.06); }

    /* Number badge */
    .photo-num {
      position: absolute;
      top: 10px; left: 10px;
      background: rgba(16,63,122,0.82);
      color: white;
      font-size: 11px;
      font-weight: 600;
      padding: 3px 9px;
      border-radius: 100px;
      letter-spacing: 0.5px;
      backdrop-filter: blur(4px);
    }

    /* Caption overlay on hover */
    .caption-overlay {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      background: linear-gradient(to top, rgba(10,35,38,0.88) 0%, transparent 100%);
      padding: 28px 14px 12px;
      opacity: 0;
      transition: opacity 0.25s ease;
    }
    .photo-item:hover .caption-overlay { opacity: 1; }
    .caption-overlay p {
      color: var(--white);
      font-size: 12.5px;
      line-height: 1.4;
    }

    /* Placeholder styling (before you add real images) */
    .photo-item.placeholder {
      background: linear-gradient(135deg, #EAF2FC 0%, #D3E3F7 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 8px;
      cursor: default;
    }
    .placeholder svg { stroke: var(--teal-deep); opacity: 0.4; }
    .placeholder span {
      font-size: 12px;
      color: var(--teal-deep);
      opacity: 0.5;
      font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 1100px) {
      .photo-item { flex: 1 1 calc(25% - 14px); max-width: calc(25% - 14px); } /* 4 per row */
    }
    @media (max-width: 800px) {
      .photo-item { flex: 1 1 calc(33.33% - 14px); max-width: calc(33.33% - 14px); } /* 3 per row */
      .gallery-section { padding: 32px 20px 60px; }
    }
    @media (max-width: 520px) {
      .photo-item { flex: 1 1 calc(50% - 14px); max-width: calc(50% - 14px); } /* 2 per row */
    }

    /* ── LIGHTBOX ── */
    .lightbox {
      position: fixed; inset: 0;
      background: rgba(8, 24, 26, 0.96);
      z-index: 1000;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .lightbox.open { display: flex; }

    .lb-inner {
      position: relative;
      max-width: 960px;
      width: 100%;
      animation: lbIn 0.24s ease;
    }
    @keyframes lbIn {
      from { opacity: 0; transform: scale(0.95); }
      to   { opacity: 1; transform: scale(1); }
    }

    .lb-inner img {
      width: 100%;
      max-height: 82vh;
      object-fit: contain;
      border-radius: 10px;
      display: block;
    }

    .lb-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 14px;
      padding: 0 4px;
    }
    .lb-caption {
      color: rgba(255,255,255,0.72);
      font-family: 'Cormorant Garamond', serif;
      font-size: 18px;
      font-style: italic;
      flex: 1;
    }
    .lb-counter {
      color: rgba(255,255,255,0.35);
      font-size: 13px;
      white-space: nowrap;
      margin-left: 16px;
    }

    .lb-close {
      position: absolute;
      top: -14px; right: -14px;
      width: 38px; height: 38px;
      border-radius: 50%;
      background: var(--teal-deep);
      border: none; cursor: pointer;
      color: white; font-size: 18px;
      display: flex; align-items: center; justify-content: center;
      transition: background 0.15s;
      z-index: 5;
    }
    .lb-close:hover { background: var(--teal-mid); }

    .lb-nav {
      position: absolute;
      top: 50%; transform: translateY(-50%);
      background: rgba(255,255,255,0.10);
      border: 1px solid rgba(255,255,255,0.15);
      color: white; width: 44px; height: 44px;
      border-radius: 50%; font-size: 20px;
      cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      transition: background 0.15s;
    }
    .lb-nav:hover { background: rgba(255,255,255,0.22); }
    .lb-prev { left: -58px; }
    .lb-next { right: -58px; }

    @media (max-width: 700px) {
      .lb-prev { left: 6px; top: auto; bottom: 70px; transform: none; }
      .lb-next { right: 6px; top: auto; bottom: 70px; transform: none; }
    }

    /* Keyboard hint */
    .kb-hint {
      position: fixed;
      bottom: 16px; right: 20px;
      color: rgba(255,255,255,0.22);
      font-size: 11px;
      letter-spacing: 0.5px;
      pointer-events: none;
    }
  </style>
</head>
<body>

<?php pageAdd('components/header'); ?>
<?php pageAdd('components/hero', [
  'headerEyebrow' => 'Moments of Care & Compassion',
  'headerTitle' => 'Our Gallery',
  'headerDescription' => 'Stories of kindness, captured in every moment.',
]); ?>
<!-- GALLERY -->
 <main>
   <section class="gallery-section">
     <div class="flex-grid" id="flexGrid">
       <!-- PHOTO 01 -->
       <div class="photo-item" onclick="openLightbox(0)">
         <img data-src="images/gallery/photo01.jpg" src="images/gallery/photo01.jpg" alt="Photo 01" loading="lazy"/>
         <span class="photo-num">01</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 02 -->
       <div class="photo-item" onclick="openLightbox(1)">
         <img data-src="images/gallery/photo02.png" src="images/gallery/photo02.png" alt="Photo 02" loading="lazy"/>
         <span class="photo-num">02</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 03 -->
       <div class="photo-item" onclick="openLightbox(2)">
         <img data-src="images/gallery/photo03.jpg" src="images/gallery/photo03.jpg" alt="Photo 03" loading="lazy"/>
         <span class="photo-num">03</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 04 -->
       <div class="photo-item" onclick="openLightbox(3)">
         <img data-src="images/gallery/photo04.jpg" src="images/gallery/photo04.jpg" alt="Photo 04" loading="lazy"/>
         <span class="photo-num">04</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 05 -->
       <div class="photo-item" onclick="openLightbox(4)">
         <img data-src="images/gallery/photo05.jpg" src="images/gallery/photo05.jpg" alt="Photo 05" loading="lazy"/>
         <span class="photo-num">05</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 06 -->
       <div class="photo-item" onclick="openLightbox(5)">
         <img data-src="images/gallery/photo06.jpg" src="images/gallery/photo06.jpg" alt="Photo 06" loading="lazy"/>
         <span class="photo-num">06</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 07 -->
       <div class="photo-item" onclick="openLightbox(6)">
         <img data-src="images/gallery/photo07.jpg" src="images/gallery/photo07.jpg" alt="Photo 07" loading="lazy"/>
         <span class="photo-num">07</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 08 -->
       <div class="photo-item" onclick="openLightbox(7)">
         <img data-src="images/gallery/photo08.jpg" src="images/gallery/photo08.jpg" alt="Photo 08" loading="lazy"/>
         <span class="photo-num">08</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 09 -->
       <div class="photo-item" onclick="openLightbox(8)">
         <img data-src="images/gallery/photo09.jpg" src="images/gallery/photo09.jpg" alt="Photo 09" loading="lazy"/>
         <span class="photo-num">09</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 10 -->
       <div class="photo-item" onclick="openLightbox(9)">
         <img data-src="images/gallery/photo10.jpg" src="images/gallery/photo10.jpg" alt="Photo 10" loading="lazy"/>
         <span class="photo-num">10</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 11 -->
       <div class="photo-item" onclick="openLightbox(10)">
         <img data-src="images/gallery/photo11.jpg" src="images/gallery/photo11.jpg" alt="Photo 11" loading="lazy"/>
         <span class="photo-num">11</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 12 -->
       <div class="photo-item" onclick="openLightbox(11)">
         <img data-src="images/gallery/photo12.jpg" src="images/gallery/photo12.jpg" alt="Photo 12" loading="lazy"/>
         <span class="photo-num">12</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 13 -->
       <div class="photo-item" onclick="openLightbox(12)">
         <img data-src="images/gallery/photo13.jpg" src="images/gallery/photo13.jpg" alt="Photo 13" loading="lazy"/>
         <span class="photo-num">13</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 14 -->
       <div class="photo-item" onclick="openLightbox(13)">
         <img data-src="images/gallery/photo14.jpg" src="images/gallery/photo14.jpg" alt="Photo 14" loading="lazy"/>
         <span class="photo-num">14</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 15 -->
       <div class="photo-item" onclick="openLightbox(14)">
         <img data-src="images/gallery/photo15.jpg" src="images/gallery/photo15.jpg" alt="Photo 15" loading="lazy"/>
         <span class="photo-num">15</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 16 -->
       <div class="photo-item" onclick="openLightbox(15)">
         <img data-src="images/gallery/photo16.jpg" src="images/gallery/photo16.jpg" alt="Photo 16" loading="lazy"/>
         <span class="photo-num">16</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 17 -->
       <div class="photo-item" onclick="openLightbox(16)">
         <img data-src="images/gallery/photo17.jpg" src="images/gallery/photo17.jpg" alt="Photo 17" loading="lazy"/>
         <span class="photo-num">17</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 18 -->
       <div class="photo-item" onclick="openLightbox(17)">
         <img data-src="images/gallery/photo18.jpg" src="images/gallery/photo18.jpg" alt="Photo 18" loading="lazy"/>
         <span class="photo-num">18</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 19 -->
       <div class="photo-item" onclick="openLightbox(18)">
         <img data-src="images/gallery/photo19.jpg" src="images/gallery/photo19.jpg" alt="Photo 19" loading="lazy"/>
         <span class="photo-num">19</span>
         <div class="caption-overlay"><p>Your caption here</p></div>
       </div>
   
       <!-- PHOTO 20 -->
       <div class="photo-item" onclick="openLightbox(19)">
         <img data-src="images/gallery/photo20.jpg" src="images/gallery/photo20.jpg" alt="Photo 20" loading="lazy"/>
         <span class="photo-num">20</span>
         <div class="caption-overlay"><p>-</p></div>
       </div>
   
     </div>
   </section>
   
   <!-- LIGHTBOX -->
   <div class="lightbox" id="lightbox">
     <div class="lb-inner">
       <button class="lb-close" onclick="closeLightbox()">&#x2715;</button>
       <button class="lb-nav lb-prev" onclick="navigate(-1)">&#8592;</button>
       <button class="lb-nav lb-next" onclick="navigate(1)">&#8594;</button>
       <img id="lbImg" src="" alt=""/>
       <div class="lb-footer">
         <div class="lb-caption" id="lbCaption"></div>
         <div class="lb-counter" id="lbCounter"></div>
       </div>
     </div>
     <div class="kb-hint">← → keys to navigate &nbsp;·&nbsp; ESC to close</div>
   </div>
 </main>

<script>
  // Build photo data from the DOM automatically
  const items = document.querySelectorAll('.photo-item:not(.placeholder)');
  const photos = Array.from(items).map(el => ({
    src:     el.querySelector('img').src,
    caption: el.querySelector('.caption-overlay p')?.textContent || ''
  }));

  let current = 0;

  function openLightbox(index) {
    current = index;
    show(current);
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function show(index) {
    const p = photos[index];
    document.getElementById('lbImg').src = p.src;
    document.getElementById('lbCaption').textContent = p.caption;
    document.getElementById('lbCounter').textContent = (index + 1) + ' / ' + photos.length;
  }

  function navigate(dir) {
    current = (current + dir + photos.length) % photos.length;
    show(current);
  }

  function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
  }

  // Click outside image to close
  document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
  });

  // Keyboard navigation
  document.addEventListener('keydown', function(e) {
    if (!document.getElementById('lightbox').classList.contains('open')) return;
    if (e.key === 'ArrowRight') navigate(1);
    if (e.key === 'ArrowLeft')  navigate(-1);
    if (e.key === 'Escape')     closeLightbox();
  });
</script>

  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/animations.js"></script>
  <script src="./js/index.js"></script>
</body>
</html>
