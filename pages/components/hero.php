<?php
$headerEyebrow = $headerEyebrow ?? 'Sahera Hasan Memorial Trust';
$headerTitle = $headerTitle ?? '';
$headerDescription = $headerDescription ?? '';
?>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
<style>
  .page-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    width: 100%;
    margin: 70px 0 0;
    padding-top: 40px;
    padding-bottom:20px;
    background: linear-gradient(125deg, #103F7A 0%, #1557A5 58%, #2672C2 100%);
    color: #fff;
    text-align: center;
  }
  .divider {
  display: flex;
  border-top-width: 1px;
  border-color: rgba(255, 0, 0, 0.7);
  border-style: solid;
  width: 200px;
  margin: auto;
}
  .page-hero::before,
  .page-hero::after {
    position: absolute;
    z-index: -1;
    content: '';
    border-radius: 50%;
    pointer-events: none;
  }
  .page-hero::before {
    width: 340px;
    height: 340px;
    top: -190px;
    left: max(-110px, calc((100vw - 1280px) / 2));
    background: rgba(214, 231, 250, .14);
  }
  .page-hero::after {
    width: 260px;
    height: 260px;
    right: max(-70px, calc((100vw - 1320px) / 2));
    bottom: -190px;
    background: rgba(255, 255, 255, .08);
  }
  .page-hero__content { position: relative; max-width: 760px; margin: 0 auto; }
  .page-hero__eyebrow {
    margin: 0 0 12px;
    color: #D6E7FA;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .22em;
    text-transform: uppercase;
  }
  .page-hero__title {
    margin: 0;
    color: #fff;
    font-family: 'Cormorant Garamond', Georgia, serif !important; 
    font-size: clamp(2.4rem, 6vw, 4rem);
    font-weight: 600;
    line-height: 1.05;
  }
  .page-hero__description {
    max-width: 620px;
    margin: 16px auto 0;
    color: rgba(255,255,255,.78);
    font-size: clamp(14px, 2vw, 16px);
    font-weight: 300;
    line-height: 1.7;
  }
  .page-hero__divider {
    width: 48px;
    height: 2px;
    margin: 22px auto 0;
    border-radius: 2px;
    background: #ED3345;
    opacity: .75;
  }
  @media (max-width: 800px) {
    .page-hero { margin-top: 72px; }
  }
  @media (max-width: 520px) {
    .page-hero { margin-top: 64px; }
  }
</style>

<header class="page-hero">
  <div class="page-hero__content">
    <?php if ($headerEyebrow !== ''): ?>
      <p class="page-hero__eyebrow"><?= htmlspecialchars($headerEyebrow, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
    <h1 class="page-hero__title"><?= htmlspecialchars($headerTitle, ENT_QUOTES, 'UTF-8') ?></h1>
    <span class="divider"></span>
    <?php if ($headerDescription !== ''): ?>
      <p class="page-hero__description"><?= htmlspecialchars($headerDescription, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
  </div>
</header>
