<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="SHMTrust">
        <meta name="description" content="">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="SHMTrust" />
        <meta property="og:title" content="SHMTrust" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="https://www.shmtrust.org/images/og.jpg" />
        <meta property="og:url" content="https://www.shmtrust.org" />
        <meta property="og:image:width" content="1280">
        <meta property="og:image:height" content="720">
        <meta name="twitter:card" content="summary_large_image">
        <meta itemprop="name" content="SHMTrust" />
        <meta itemprop="description" content="" />
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
        <meta name="rating" content="adult">
        <meta name="author" content="SHMTrust">
        <link rel="canonical" href="https://www.shmtrust.org" />
        <link rel="apple-touch-icon" href="https://www.shmtrust.org/images/favicon.ico">
        <link rel="icon" type="image/gif" href="./images/favicon.ico">
        <title>Sahera Hasan Memorial Hospital - Services</title>
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/loader.css" />
        <link rel="stylesheet" href="./css/icons.css" />
        <script src="./js/utilities.js"></script>
        
        <style>
            :root {
              --teal-deep:   #0D5C63;
              --teal-mid:    #1A8A7B;
              --teal-light:  #C8EDE8;
              --cream:       #F7F4EF;
              --charcoal:    #1C1C1C;
              --muted:       #6B7A7D;
              --white:       #FFFFFF;
            }
            
            .services-section {
              padding: 64px 48px 80px;
              max-width: 1200px;
              margin: 0 auto;
              font-family: 'DM Sans', sans-serif;
              background: var(--cream);
              color: var(--charcoal);
            }
            
            .section-label {
              font-size: 11px;
              letter-spacing: 3px;
              text-transform: uppercase;
              color: var(--muted);
              margin-bottom: 36px;
              font-weight: 500;
              display: flex;
              align-items: center;
              gap: 12px;
            }
            .section-label::after {
              content: '';
              flex: 1;
              height: 1px;
              background: #D5CFC5;
            }
        
            .grid {
              display: grid;
              grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
              gap: 20px;
            }
        
            /* Prefix .card with .services-section or .grid to limit its scope */
            .services-section .card {
              background: var(--white);
              border-radius: 16px;
              padding: 32px 28px;
              display: flex;
              flex-direction: column;
              gap: 14px;
              border: 1px solid rgba(0,0,0,0.06);
              transition: transform 0.22s ease, box-shadow 0.22s ease;
              cursor: default;
            }
            .services-section .card:hover {
              transform: translateY(-4px);
              box-shadow: 0 16px 40px rgba(13, 92, 99, 0.12);
            }
            .services-section .card:hover .icon-wrap {
              background: var(--teal-deep);
            }
            .services-section .card:hover .icon-wrap svg {
              stroke: var(--white);
            }
        
            .icon-wrap {
              width: 48px; height: 48px;
              border-radius: 12px;
              background: var(--teal-light);
              display: flex; align-items: center; justify-content: center;
              transition: background 0.22s ease;
              flex-shrink: 0;
            }
            .icon-wrap svg {
              width: 22px; height: 22px;
              stroke: var(--teal-deep);
              fill: none;
              stroke-width: 1.8;
              stroke-linecap: round;
              stroke-linejoin: round;
              transition: stroke 0.22s ease;
            }
        
            .card-title {
              font-size: 15.5px;
              font-weight: 500;
              line-height: 1.35;
              color: var(--charcoal);
            }
            
            /* ── Hero Header ── */
            .header2 {
              background: linear-gradient(135deg, #0b3d6b 0%, #1565a8 100%);
              color: #fff;
              padding: 30px 40px 50px;
              text-align: center;
            }
            .header2 .eyebrow {
              font-size: 14px;
              font-weight: 700;
              letter-spacing: 3px;
              text-transform: uppercase;
              color: #7ec8f5;
              margin-bottom: 7px;
            }
            .header2 h1 {
              font-family: 'Playfair Display', serif;
              font-size: clamp(2rem, 4vw, 3rem);
              line-height: 1.2;
              margin-bottom: 14px;
            }
            .header2 p {
              font-size: 1rem;
              font-weight: 300;
              color: #b8d9f0;
              max-width: 520px;
              margin: 0 auto;
              line-height: 1.7;
            }  
            
            /* ── Header2 two-column layout ── */
            .header2-inner {
              display: flex;
              flex-direction: row;
              align-items: center;
            }
            .header2-left {
              width: 10%;
              display: flex;
              align-items: center;
              justify-content: center;
              flex-shrink: 0;
            }
            .header2-right {
              width: 90%;
              text-align: center;
            }
        
            /* ── Home Button ── */
            .home-btn {
              display: inline-flex;
              align-items: center;
              gap: 5px;
              background: rgba(255,255,255,0.10);
              border: 1.5px solid rgba(255,255,255,0.28);
              color: #fff;
              font-size: 11px;
              font-weight: 500;
              padding: 4px 8px 8px 5px;
              border-radius: 100px;
              text-decoration: none;
              transition: background 0.18s, border-color 0.18s;
            }
            .home-btn:hover {
              background: rgba(255,255,255,0.22);
              border-color: rgba(255,255,255,0.55);
              color: #fff;
            }
            .home-btn svg {
              stroke: #fff;
              flex-shrink: 0;
            }
            
                    
        </style>
        
    </head>
    <body>
        <?php pageAdd('components/header'); ?>
        <section class="my-5">
            <div class="row pt-5 g-0 d-flex align-items-center justify-content-center">
                <div class="header2">
                  <div class="header2-inner">
                
                    <!-- LEFT: Home button (20%) -->
                    <div class="header2-left">
                      <a href="/" class="home-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                          <path d="M3 9.5L12 3l9 6.5V20a1 1 0 01-1 1H5a1 1 0 01-1-1V9.5z"/>
                          <path d="M9 21V12h6v9"/>
                        </svg>
                        Home
                      </a>
                    </div>
                
                    <!-- RIGHT: Title & subtitle (80%) -->
                    <div class="header2-right">
                      <p class="eyebrow">Our Services</p>
                      <h3>What We Offer</h3>
                      <p>with love & compassion</p>
                    </div>
                
                  </div>
                </div>                

                <div class="main-services col-md-10 col-12 mb-4">
                    <!-- Row 1 -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6 col-12">
                            <div class="bg-white p-md-4 p-3 h-100 text-dark text-center">
                                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                                    data-src="./images/services/main-service1.jpg" 
                                    alt="Service 1" 
                                    class="img-fluid w-100" 
                                    style="object-fit: cover; height: 250px;">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="h3 bg-white p-md-4 p-3 h-100 text-dark text-center">
                                <span class="fw-bold text-primary-emphasis">Sahera Hasan Memorial Hospital, a modern hospital for your care: </span>"From wellness check-ups to life-saving treatment, we offer complete, modern healthcare – for your family and for rural communities who need it most. Quality care at highly affordable rates, and free for those who cannot pay."</h3>
                                <p>--</p>
                            </div>
                        </div>
                    </div>
                    <!-- Row 2 -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6 col-12">
                            <div class="h3 bg-white p-md-4 p-3 h-100 text-dark text-center">
                                <span class="fw-bold">Dialysis Service: </span>"Empowering you to live life to the fullest with advanced, comfortable, and personalized dialysis care."</h3>
                                <p>--</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="bg-white p-md-4 p-3 h-100 text-dark text-center">
                                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                                    data-src="./images/services/dialysis.jpg" 
                                    alt="Service 2" 
                                    class="img-fluid w-100" 
                                    style="object-fit: cover; height: 250px;">
                            </div>
                        </div>
                    </div>
                    <!-- Row 3 -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6 col-12">
                            <div class="bg-white p-md-4 p-3 h-100 text-dark text-center">
                                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                                    data-src="./images/services/physiotherapy.jpg" 
                                    alt="Service 3" 
                                    class="img-fluid w-100" 
                                    style="object-fit: cover; height: 250px;">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="h3 bg-white p-md-4 p-3 h-100 text-dark text-center">
                                <span class="fw-bold">Physiotherapy Service: </span>"Rebuilding your strength and restoring your mobility to get you back to doing what you love most."</h3>
                                <p>--</p>
                            </div>
                        </div>
                    </div>
                    <!-- Row 4 -->
                    <div class="row g-3">
                        <div class="col-md-6 col-12">
                            <div class="h3 bg-white p-md-4 p-3 h-100 text-dark text-center">
                                <span class="fw-bold text-danger-emphasis">Sahera Hasan Midwifery Institute: </span>"Empowering the next generation of midwives to provide compassionate, safe, and natural maternity care for every mother."</h3>
                                <p>--</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="bg-white p-md-4 p-3 h-100 text-dark text-center">
                                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                                    data-src="./images/services/institute.jpg" 
                                    alt="Service 4" 
                                    class="img-fluid w-100" 
                                    style="object-fit: cover; height: 250px;">
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Row of images for our services -->
                <div class="d-flex flex-wrap justify-content-center gap-3 py-4" style="width: 100%; max-width: 1200px; margin: 0 auto;">
                
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                         data-src="./images/services/cs.png" 
                         alt="Caesarean Section" 
                         class="img-fluid" 
                         style="height: 200px; width: auto; object-fit: cover; flex: 1 1 auto;">
                         
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                         data-src="./images/services/nvd.png" 
                         alt="Caesarean Section" 
                         class="img-fluid" 
                         style="height: 200px; width: auto; object-fit: cover; flex: 1 1 auto;">
                
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                         data-src="./images/services/dly.png" 
                         alt="Caesarean Section" 
                         class="img-fluid" 
                         style="height: 200px; width: auto; object-fit: cover; flex: 1 1 auto;">
                         
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                         data-src="./images/services/cabin.png" 
                         alt="Caesarean Section" 
                         class="img-fluid" 
                         style="height: 200px; width: auto; object-fit: cover; flex: 1 1 auto;">
                                                  
                
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                         data-src="./images/services/cardiology.png" 
                         alt="Caesarean Section" 
                         class="img-fluid" 
                         style="height: 200px; width: auto; object-fit: cover; flex: 1 1 auto;">
                         
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                         data-src="./images/services/lab.jpg" 
                         alt="Caesarean Section" 
                         class="img-fluid" 
                         style="height: 200px; width: auto; object-fit: cover; flex: 1 1 auto;">
                                                                                                    
                </div>
                
                
                <!-- SERVICES GRID STARTS HERE -->

                  <div class="grid services-section">
                
                    <!-- Women's Health & Infertility -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M12 12v8M9 18h6"/></svg>
                      </div>
                      <div class="card-title">Women's Health &amp; Infertility</div>
                    </div>
                
                    <!-- VIA & Cervical Cancer -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.25C17.25 22.15 21 17.25 21 12V7L12 2z"/><path d="M9 12l2 2 4-4"/></svg>
                      </div>
                      <div class="card-title">VIA &amp; Cervical Cancer Screening</div>
                    </div>
                
                    <!-- Neonatal Care -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 2.6 1.4 4.89 3.5 6.2V17h7v-1.8C17.6 13.89 19 11.6 19 9c0-3.87-3.13-7-7-7z"/><path d="M9 21h6M10 17v4M14 17v4"/></svg>
                      </div>
                      <div class="card-title">Neonatal Care</div>
                    </div>
                
                    <!-- General Surgery -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M14.5 4.5c1.5 1.5 1.5 3.5 0 5L7 17l-3 1 1-3 7.5-7.5c1.5-1.5 3.5-1.5 5 0z"/><path d="M7 7l3 3"/></svg>
                      </div>
                      <div class="card-title">General Surgery</div>
                    </div>
                
                    <!-- Emergency Services -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><path d="M12 9v4M12 17h.01"/></svg>
                      </div>
                      <div class="card-title">Emergency Services</div>
                    </div>
                
                    <!-- Pediatrics -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                      </div>
                      <div class="card-title">Pediatrics &amp; Childcare</div>
                    </div>
                
                    <!-- Eye Care -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M1 12S5 4 12 4s11 8 11 8-4 8-11 8S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                      </div>
                      <div class="card-title">Eye Care</div>
                    </div>
                
                    <!-- Cardiology -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                      </div>
                      <div class="card-title">Cardiology</div>
                    </div>
                
                    <!-- Skin & VD -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
                      </div>
                      <div class="card-title">Skin &amp; Venereal Disease Care</div>
                    </div>
                
                    <!-- Dialysis -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20A10 10 0 0012 2z"/><path d="M12 6v6l4 2"/></svg>
                      </div>
                      <div class="card-title">Dialysis Center</div>
                    </div>
                
                    <!-- Physiotherapy -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M18 3a3 3 0 00-3 3v12a3 3 0 003 3 3 3 0 003-3 3 3 0 00-3-3H6a3 3 0 00-3 3 3 3 0 003 3 3 3 0 003-3V6a3 3 0 00-3-3 3 3 0 00-3 3 3 3 0 003 3h12a3 3 0 003-3 3 3 0 00-3-3z"/></svg>
                      </div>
                      <div class="card-title">Physiotherapy Center</div>
                    </div>
                
                    <!-- Midwifery -->
                    <div class="card">
                      <div class="icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M12 2a5 5 0 015 5c0 2.76-2.24 5-5 5S7 9.76 7 7a5 5 0 015-5z"/><path d="M3 21c0-4.42 4.03-8 9-8s9 3.58 9 8"/><path d="M12 14v7"/></svg>
                      </div>
                      <div class="card-title">Midwifery Institute</div>
                    </div>
                
                  </div>
                
                
                <div class="col-md-10 col-12">
                    <div class="row d-flex align-items-stretch justify-content-center text-center text-white">
                        <?php foreach($services as $index => $service): ?>
                        <?php $animClass = ($index % 3 === 0) ? 'anim1' : (($index % 3 === 1) ? 'anim' : 'anim2'); ?>
                        <div class="col-lg-4 col-md-6 col-12 p-2 d-flex flex-column <?php echo $animClass ?>">
                            <div class="bg-secondary p-md-4 p-2 flex-grow-1">
                                <p>
                                    <i class="bg-white"
                                        style="display: inline-block; width: 16px; height: 16px; mask: url(../<?php echo $service['icon'] ?>) no-repeat center; -webkit-mask: url(../<?php echo $service['icon'] ?>) no-repeat center; zoom: 2.5">
                                    </i>
                                </p>
                                <h4><?php echo $service['title'] ?></h4>
                                <p><?php echo $service['text'] ?></p>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>
        <?php pageAdd('components/footer'); ?>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/animations.js"></script>
        <script src="./js/index.js"></script>
    </body>
</html>