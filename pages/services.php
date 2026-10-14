<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Explore outpatient, emergency, maternity, neonatal, dialysis, laboratory, diagnostic imaging and hospital facilities at Sahera Hasan Memorial Hospital.">
        <meta name="author" content="SHMT">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="https://shmtrust.org/services">
        <link rel="icon" type="image/gif" href="./images/favicon.ico">
        <title>Hospital Services | Sahera Hasan Memorial Trust</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/loader.css">
        <link rel="stylesheet" href="./css/icons.css">
        <script src="./js/utilities.js"></script>
        <style>
            :root {
                --services-blue: #103f7a;
                --services-blue-mid: #1756a2;
                --services-pale: #eef5fd;
                --services-red: #ed3345;
                --services-ink: #263648;
                --services-muted: #5e6c7b;
            }

            .services-page-main {
                width: 100%;
                overflow: hidden;
                color: var(--services-ink);
            }

            .services-intro {
                max-width: 880px;
                margin: 0 auto;
                padding: 3.25rem 1.25rem 1.75rem;
                text-align: center;
            }

            .services-intro .eyebrow {
                margin-bottom: .7rem;
                color: var(--services-blue-mid);
                font-size: .78rem;
                font-weight: 700;
                letter-spacing: .14em;
                text-transform: uppercase;
            }

            .services-intro h2 {
                margin: 0 0 .8rem;
                color: var(--services-blue);
                font-size: clamp(1.8rem, 3.2vw, 2.45rem);
                font-weight: 700;
                line-height: 1.2;
            }

            .services-intro p {
                max-width: 720px;
                margin: 0 auto;
                color: var(--services-muted);
                font-size: 1.05rem;
                line-height: 1.75;
            }

            .service-section {
                width: 100%;
                padding: 1.5rem max(1rem, calc((100% - 1440px) / 2));
            }

            .service-section:nth-of-type(even) {
                background: #f5f8fc;
            }

            .service-row {
                display: grid;
                grid-template-columns: minmax(0, 1.05fr) minmax(320px, .95fr);
                align-items: stretch;
                max-width: 1440px;
                min-height: 330px;
                margin: 0 auto;
                overflow: hidden;
                border: 1px solid rgba(16, 63, 122, .09);
                border-radius: 18px;
                background: #fff;
                box-shadow: 0 10px 30px rgba(18, 55, 94, .07);
                transition: box-shadow .22s ease, transform .22s ease;
            }

            .service-row:hover {
                transform: translateY(-2px);
                box-shadow: 0 16px 36px rgba(18, 55, 94, .11);
            }

            .service-copy {
                align-self: center;
                padding: clamp(1.5rem, 4vw, 3.5rem);
            }

            .service-number {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 2.25rem;
                height: 2.25rem;
                margin-bottom: .85rem;
                border-radius: 50%;
                background: var(--services-pale);
                color: var(--services-blue);
                font-size: .9rem;
                font-weight: 700;
            }

            .service-copy h2 {
                margin: 0 0 .8rem;
                color: var(--services-blue);
                font-size: clamp(1.4rem, 2.2vw, 1.9rem);
                font-weight: 700;
                line-height: 1.3;
            }

            .service-copy h2::after {
                display: block;
                width: 3.25rem;
                height: 3px;
                margin-top: .75rem;
                border-radius: 2px;
                background: var(--services-red);
                content: '';
            }

            .service-copy p {
                margin: 0 0 1rem;
                color: var(--services-muted);
                font-size: 1rem;
                line-height: 1.75;
            }

            .service-copy ul {
                display: grid;
                gap: .65rem;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .service-copy li {
                position: relative;
                padding-left: 1.55rem;
                color: var(--services-ink);
                font-size: .98rem;
                line-height: 1.55;
            }

            .service-copy li::before {
                position: absolute;
                top: .42em;
                left: .12rem;
                width: .55rem;
                height: .55rem;
                border: 2px solid var(--services-blue-mid);
                border-radius: 50%;
                content: '';
            }

            .service-image {
                min-width: 0;
                min-height: 100%;
                background: var(--services-pale);
                border-radius:20px;
            }

            .service-image img {
                display: block;
                width: 100%;
                height: 100%;
                min-height: 330px;
                aspect-ratio: 4 / 3;
                border-radius:20px;
                object-fit: cover;
                object-position: center;
            }

            .service-section:last-child {
                padding-bottom: 3rem;
            }

            .educational-institutions {
                padding: 3.5rem max(1rem, calc((100% - 1440px) / 2));
                background: #f5f8fc;
            }

            .education-inner {
                max-width: 1440px;
                margin: 0 auto;
            }

            .education-heading {
                max-width: 780px;
                margin: 0 auto 2rem;
                text-align: center;
            }

            .education-heading p {
                margin: 0 0 .65rem;
                color: var(--services-blue-mid);
                font-size: .78rem;
                font-weight: 700;
                letter-spacing: .14em;
                text-transform: uppercase;
            }

            .education-heading h2 {
                margin: 0;
                color: var(--services-blue);
                font-size: clamp(1.8rem, 3.2vw, 2.45rem);
                font-weight: 700;
            }

            .education-programs {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 1.25rem;
            }

            .education-program {
                padding: clamp(1.4rem, 3vw, 2.25rem);
                border: 1px solid rgba(16, 63, 122, .1);
                border-radius: 16px;
                background: #fff;
                box-shadow: 0 10px 30px rgba(18, 55, 94, .07);
            }

            .education-program h3 {
                margin: 0 0 1.1rem;
                color: var(--services-blue);
                font-size: 1.35rem;
                font-weight: 700;
                line-height: 1.35;
            }

            .education-program ul {
                display: grid;
                gap: .75rem;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .education-program li {
                position: relative;
                padding-left: 1.55rem;
                color: var(--services-ink);
                line-height: 1.65;
            }

            .education-program li::before {
                position: absolute;
                top: .52em;
                left: .12rem;
                width: .55rem;
                height: .55rem;
                border: 2px solid var(--services-blue-mid);
                border-radius: 50%;
                content: '';
            }

            .education-gallery {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 1rem;
                margin-top: 1.5rem;
            }

            .education-gallery img {
                display: block;
                width: 100%;
                height: 220px;
                border: 1px solid rgba(16, 63, 122, .1);
                border-radius: 14px;
                object-fit: cover;
                box-shadow: 0 8px 24px rgba(18, 55, 94, .1);
            }

            @media (max-width: 767.98px) {
                .services-intro {
                    padding: 2.5rem 1rem 1.25rem;
                }

                .services-intro p {
                    font-size: .98rem;
                }

                .service-section {
                    padding: 1rem;
                }

                .service-row {
                    grid-template-columns: minmax(0, 1fr);
                    min-height: 0;
                    border-radius: 14px;
                }

                .service-copy {
                    padding: 1.5rem 1.25rem;
                }

                .service-copy h2 {
                    font-size: 1.42rem;
                }

                .service-image img {
                    height: auto;
                    min-height: 0;
                    max-height: 300px;
                    aspect-ratio: 4 / 3;
                }

                .service-section:last-child {
                    padding-bottom: 2rem;
                }

                .educational-institutions {
                    padding: 2.5rem 1rem;
                }

                .education-programs {
                    grid-template-columns: minmax(0, 1fr);
                    gap: 1rem;
                }

                .education-program h3 {
                    font-size: 1.2rem;
                }

                .education-gallery {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                    gap: .75rem;
                    margin-top: 1rem;
                }

                .education-gallery img {
                    height: 165px;
                    border-radius: 10px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .service-row {
                    transition: none;
                }

                .service-row:hover {
                    transform: none;
                }
            }
        </style>
    </head>
    <body>
        <?php pageAdd('components/header'); ?>
        <?php pageAdd('components/hero', [
            'headerEyebrow' => 'Care for Every Stage of Life',
            'headerTitle' => 'Hospital Services',
            'headerDescription' => 'Explore the care, diagnostics and hospital facilities available at Sahera Hasan Memorial Hospital.',
        ]); ?>

        <main class="services-page-main">
            <header class="services-intro">
                <p class="eyebrow">Sahera Hasan Memorial Hospital</p>
                <h2>Healthcare services for our community</h2>
                <p>From outpatient and emergency care to diagnostics and hospital facilities, find the services available at SHMT.</p>
            </header>

            <section class="service-section" aria-labelledby="service-outpatient">
                <div class="service-row">
                    <div class="service-copy">
                        <span class="service-number" aria-hidden="true">01</span>
                        <h2 id="service-outpatient">Outpatient &amp; Emergency Services</h2>
                        <p>Outpatient consultations and emergency care are available at Sahera Hasan Memorial Hospital.</p>
                        <ul>
                            <li>24/7 emergency care</li>
                            <li>Male and female doctors</li>
                            <li>Resident doctors</li>
                        </ul>
                    </div>
                    <div class="service-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/services/main-service1.jpg" alt="Exterior of Sahera Hasan Memorial Hospital" class="img-fluid" loading="lazy" width="876" height="647">
                    </div>
                </div>
            </section>

            <section class="service-section" aria-labelledby="service-surgical">
                <div class="service-row">
                    <div class="service-copy">
                        <span class="service-number" aria-hidden="true">02</span>
                        <h2 id="service-surgical">Surgical &amp; Gynecological Services</h2>
                        <p>Surgical and maternity care includes general surgery and childbirth services.</p>
                        <ul>
                            <li>General surgery</li>
                            <li>Caesarean sections</li>
                            <li>Normal deliveries</li>
                        </ul>
                    </div>
                    <div class="service-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/clients/Cesarean%20Section%20Services.jpeg" alt="Medical team providing Caesarean section care" class="img-fluid" loading="lazy" width="768" height="576">
                    </div>
                </div>
            </section>

            <section class="service-section" aria-labelledby="service-neonatal">
                <div class="service-row">
                    <div class="service-copy">
                        <span class="service-number" aria-hidden="true">03</span>
                        <h2 id="service-neonatal">Neonatal &amp; Newborn Care</h2>
                        <p>Care for newborns includes incubator support and thermal care.</p>
                        <ul>
                            <li>Neonatal incubators</li>
                            <li>Thermal care</li>
                        </ul>
                    </div>
                    <div class="service-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/services/nvd.jpg" alt="Newborn receiving care immediately after delivery" class="img-fluid" loading="lazy" width="300" height="200">
                    </div>
                </div>
            </section>

            <section class="service-section" aria-labelledby="service-dialysis">
                <div class="service-row">
                    <div class="service-copy">
                        <span class="service-number" aria-hidden="true">04</span>
                        <h2 id="service-dialysis">Dialysis Services</h2>
                        <p>Dialysis services are available around the clock.</p>
                        <ul>
                            <li>24/7 dialysis</li>
                        </ul>
                    </div>
                    <div class="service-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/services/dialysis.jpg" alt="Patient receiving dialysis treatment" class="img-fluid" loading="lazy" width="1067" height="621">
                    </div>
                </div>
            </section>

            <section class="service-section" aria-labelledby="service-laboratory">
                <div class="service-row">
                    <div class="service-copy">
                        <span class="service-number" aria-hidden="true">05</span>
                        <h2 id="service-laboratory">Laboratory &amp; Blood Testing</h2>
                        <p>Laboratory and blood testing includes hormone assays.</p>
                        <ul>
                            <li>Laboratory testing</li>
                            <li>Blood testing</li>
                            <li>Hormone assays</li>
                        </ul>
                    </div>
                    <div class="service-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/services/lab.jpg" alt="Blood samples being handled for laboratory testing" class="img-fluid" loading="lazy" width="297" height="200">
                    </div>
                </div>
            </section>

            <section class="service-section" aria-labelledby="service-xray-ecg">
                <div class="service-row">
                    <div class="service-copy">
                        <span class="service-number" aria-hidden="true">06</span>
                        <h2 id="service-xray-ecg">Digital X-ray &amp; ECG</h2>
                        <p>Diagnostic services include digital X-ray and ECG.</p>
                        <ul>
                            <li>Digital X-ray</li>
                            <li>ECG</li>
                        </ul>
                    </div>
                    <div class="service-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/services/Diagnostic%20And%20Laboratory%20Facilities.png" alt="Diagnostic and laboratory facilities at Sahera Hasan Memorial Trust" class="img-fluid" loading="lazy" width="300" height="168">
                    </div>
                </div>
            </section>

            <section class="service-section" aria-labelledby="service-ultrasonography">
                <div class="service-row">
                    <div class="service-copy">
                        <span class="service-number" aria-hidden="true">07</span>
                        <h2 id="service-ultrasonography">Ultrasonography Services</h2>
                        <p>Ultrasonography services include breast sonography and TVS.</p>
                        <ul>
                            <li>Breast sonography</li>
                            <li>Transvaginal sonography (TVS)</li>
                        </ul>
                    </div>
                    <div class="service-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/our_projects/Diagnostic%20Imaging%20And%20Testing%20Services1.jpg" alt="Ultrasound equipment displaying a scan during an examination" class="img-fluid" loading="lazy" width="963" height="537">
                    </div>
                </div>
            </section>

            <section class="service-section" aria-labelledby="service-safety">
                <div class="service-row">
                    <div class="service-copy">
                        <span class="service-number" aria-hidden="true">08</span>
                        <h2 id="service-safety">Patient Safety &amp; Hospital Facilities</h2>
                        <p>Hospital facilities include the following patient safety provisions:</p>
                        <ul>
                            <li>Arsenic-free purified drinking water</li>
                            <li>24-hour CCTV security</li>
                        </ul>
                    </div>
                    <div class="service-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/services/cabin.png" alt="Patient room at a hospital facility" class="img-fluid" loading="lazy" width="366" height="200">
                    </div>
                </div>
            </section>

            <section class="educational-institutions" aria-labelledby="educational-institutions-title">
                <div class="education-inner">
                    <div class="education-heading">
                        <p>Learning &amp; Clinical Training</p>
                        <h2 id="educational-institutions-title">Educational Institutions</h2>
                    </div>

                    <div class="education-programs">
                        <article class="education-program" aria-labelledby="midwifery-program-title">
                            <h3 id="midwifery-program-title">Diploma in Midwifery</h3>
                            <ul>
                                <li>The Diploma in Midwifery Institute was established in 2016.</li>
                                <li>The three-year Diploma in Midwifery program is running.</li>
                                <li>Seven batches have graduated and are working in different parts of the country.</li>
                            </ul>
                        </article>

                        <article class="education-program" aria-labelledby="nursing-program-title">
                            <h3 id="nursing-program-title">Diploma in Nursing Science &amp; Midwifery</h3>
                            <ul>
                                <li>The three-year Diploma in Nursing Science &amp; Midwifery was established in 2022.</li>
                                <li>Four batches are currently running.</li>
                                <li>The fully residential program provides education from an experienced Principal and a team of trained faculty members.</li>
                                <li>Students have excellent opportunities for continuous clinical practice at the institute’s own hospital, guided by renowned specialist physicians from Dhaka.</li>
                            </ul>
                        </article>
                    </div>

                    <div class="education-gallery" role="group" aria-label="Midwifery and nursing students at the institute">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/education/midwifery-classroom-01.jpg" alt="Midwifery students attending a classroom lecture" loading="lazy" width="493" height="328">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/education/midwifery-classroom-02.jpg" alt="Midwifery students studying in their classroom" loading="lazy" width="664" height="442">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/education/midwifery-students-01.png" alt="Students gathered in the institute classroom" loading="lazy" width="1448" height="1080">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" data-src="./images/education/midwifery-students-02.png" alt="Midwifery students reading during class" loading="lazy" width="1448" height="1080">
                    </div>
                </div>
            </section>
        </main>

        <?php pageAdd('components/footer'); ?>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/animations.js"></script>
        <script src="./js/index.js"></script>
    </body>
</html>
