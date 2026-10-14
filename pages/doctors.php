<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="SHMTrust">
        <meta name="description" content="Browse SHMT doctors by specialty, qualifications, and clinical expertise.">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="SHMTrust" />
        <meta property="og:title" content="Our Doctors | Sahera Hasan Memorial Hospital" />
        <meta property="og:description" content="Browse SHMT doctors by specialty, qualifications, and clinical expertise." />
        <meta property="og:image" content="https://www.shmtrust.org/images/og.jpg" />
        <meta property="og:url" content="https://www.shmtrust.org/doctors" />
        <meta property="og:image:width" content="1280">
        <meta property="og:image:height" content="720">
        <meta name="twitter:card" content="summary_large_image">
        <meta itemprop="name" content="SHMTrust" />
        <meta itemprop="description" content="" />
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
        <meta name="rating" content="adult">
        <meta name="author" content="SHMTrust">
        
  <style>
    .doctor-directory-page main,
    .doctor-directory-page main *,
    .doctor-directory-page main *::before,
    .doctor-directory-page main *::after { box-sizing: border-box; }

    :root {
      --doctors-blue: #1756A2;
      --doctors-blue-deep: #103F7A;
      --doctors-red: #ED3345;
      --doctors-ink: #1D2B40;
      --doctors-muted: #63758B;
      --doctors-line: #E0E8F2;
      --doctors-surface: #F5F8FC;
    }
    body.doctor-directory-page {
      font-family: 'DM Sans', 'Inter', Arial, sans-serif;
      background: var(--doctors-surface);
      color: var(--doctors-ink);
    }
    .doctor-directory-page main {
      width: min(100% - 40px, 1240px);
      margin: 0 auto;
      padding: 42px 0 88px;
    }
    .directory-toolbar { display: grid; justify-items: center; gap: 20px; }
    .search-field {
      display: flex;
      align-items: center;
      gap: 12px;
      width: min(100%, 620px);
      min-height: 54px;
      padding: 0 18px;
      border: 1px solid #D7E1EE;
      border-radius: 14px;
      background: #fff;
      box-shadow: 0 8px 24px rgba(16, 63, 122, .06);
      transition: border-color .2s ease, box-shadow .2s ease;
    }
    .search-field:focus-within {
      border-color: var(--doctors-blue);
      box-shadow: 0 0 0 4px rgba(23, 86, 162, .12);
    }
    .search-field svg {
      width: 20px;
      height: 20px;
      flex: 0 0 auto;
      stroke: var(--doctors-blue);
      stroke-width: 1.8;
    }
    .search-field input {
      width: 100%;
      border: 0;
      outline: 0;
      background: transparent;
      color: var(--doctors-ink);
      font: inherit;
    }
    .search-field input::placeholder { color: #8290A2; }
    .specialty-filters {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 9px;
    }
    .filter-tab {
      min-height: 40px;
      padding: 8px 16px;
      border: 1px solid #D7E1EE;
      border-radius: 999px;
      background: #fff;
      color: #43566D;
      font: 500 13px/1.2 'DM Sans', Arial, sans-serif;
      cursor: pointer;
      transition: color .18s ease, background .18s ease, border-color .18s ease, transform .18s ease;
    }
    .filter-tab:hover { border-color: var(--doctors-blue); color: var(--doctors-blue); transform: translateY(-1px); }
    .filter-tab.is-active { border-color: var(--doctors-blue); background: var(--doctors-blue); color: #fff; }
    .filter-tab:focus-visible, .doctor-profile summary:focus-visible { outline: 3px solid rgba(237, 51, 69, .45); outline-offset: 3px; }
    .directory-result-count { min-height: 20px; margin: -7px 0 0; color: var(--doctors-muted); font-size: 13px; }
    .specialty-group { margin-top: 52px; }
    .specialty-heading {
      display: flex;
      align-items: end;
      justify-content: space-between;
      gap: 18px;
      margin-bottom: 20px;
      padding-bottom: 14px;
      border-bottom: 1px solid var(--doctors-line);
    }
    .section-kicker { margin: 0 0 5px; color: var(--doctors-blue); font-size: 11px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
    .specialty-heading h2 { margin: 0; color: var(--doctors-ink); font-family: 'Cormorant Garamond', Georgia, serif; font-size: clamp(1.7rem, 3vw, 2.25rem); font-weight: 600; line-height: 1.1; }
    .specialty-count { flex: 0 0 auto; padding: 7px 11px; border-radius: 999px; background: #EAF2FC; color: var(--doctors-blue-deep); font-size: 12px; font-weight: 600; }
    .doctor-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; }
    .doctor-card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      overflow: hidden;
      border: 1px solid var(--doctors-line);
      border-radius: 18px;
      background: #fff;
      box-shadow: 0 8px 24px rgba(16, 63, 122, .055);
      transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
    }
    .doctor-card::after { position: absolute; inset: 0 auto auto 0; width: 100%; height: 3px; background: var(--doctors-red); content: ''; transform: scaleX(0); transform-origin: left; transition: transform .22s ease; }
    .doctor-card:hover { transform: translateY(-4px); border-color: #C7D8EC; box-shadow: 0 16px 34px rgba(16, 63, 122, .12); }
    .doctor-card:hover::after { transform: scaleX(1); }
    .doctor-card[hidden], .specialty-group[hidden] { display: none !important; }
    .doctor-photo-wrap { position: relative; height: 218px; overflow: hidden; background: #EAF2FC; }
    .doctor-photo { display: block; width: 100%; height: 100%; object-fit: cover; object-position: center 28%; transition: transform .35s ease; }
    .doctor-card:hover .doctor-photo { transform: scale(1.035); }
    .doctor-photo-accent { position: absolute; right: 0; bottom: 0; left: 0; height: 38px; background: linear-gradient(transparent, rgba(16, 63, 122, .12)); pointer-events: none; }
    .doctor-info { display: flex; flex: 1; flex-direction: column; padding: 19px 20px 18px; }
    .doctor-name { margin: 0; color: var(--doctors-ink); font-size: 18px; font-weight: 700; line-height: 1.3; }
    .doctor-degree { margin: 7px 0 0; color: var(--doctors-blue); font-size: 12px; font-weight: 600; line-height: 1.55; }
    .doctor-specialty { margin: 10px 0 0; color: #53677E; font-size: 13px; line-height: 1.55; }
    .doctor-tags { display: flex; flex-wrap: wrap; gap: 7px; margin-top: 14px; }
    .doctor-tag { padding: 5px 9px; border: 1px solid #E2EAF4; border-radius: 999px; background: #F6F9FD; color: #52657B; font-size: 10px; line-height: 1.2; }
    .doctor-profile { margin-top: auto; padding-top: 15px; }
    .doctor-profile summary { display: inline-flex; align-items: center; gap: 7px; color: var(--doctors-blue); font-size: 13px; font-weight: 600; cursor: pointer; list-style: none; }
    .doctor-profile summary::-webkit-details-marker { display: none; }
    .doctor-profile summary::after { color: var(--doctors-red); content: '+'; font-size: 18px; line-height: 1; }
    .doctor-profile[open] summary::after { content: '−'; }
    .doctor-profile p { margin: 12px 0 0; color: var(--doctors-muted); font-size: 13px; line-height: 1.7; }
    .no-doctors { margin: 42px auto; color: var(--doctors-muted); text-align: center; }
    @media (max-width: 960px) { .doctor-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 600px) {
      .doctor-directory-page main { width: min(100% - 28px, 480px); padding: 26px 0 60px; }
      .directory-toolbar { gap: 15px; }
      .specialty-filters { width: 100%; justify-content: flex-start; flex-wrap: nowrap; overflow-x: auto; padding: 2px 1px 6px; scrollbar-width: thin; }
      .filter-tab { flex: 0 0 auto; padding-inline: 13px; }
      .specialty-group { margin-top: 36px; }
      .specialty-heading { align-items: center; margin-bottom: 15px; }
      .specialty-heading h2 { max-width: 250px; font-size: 1.65rem; }
      .doctor-grid { grid-template-columns: 1fr; gap: 14px; }
      .doctor-card { display: grid; grid-template-columns: 104px minmax(0, 1fr); border-radius: 15px; }
      .doctor-photo-wrap { height: auto; min-height: 168px; }
      .doctor-photo { position: absolute; inset: 0; }
      .doctor-info { padding: 16px 14px; }
      .doctor-name { font-size: 16px; }
      .doctor-specialty { font-size: 12px; }
      .doctor-tag { font-size: 9px; }
    }
    @media (max-width: 380px) {
      .doctor-card { grid-template-columns: 1fr; }
      .doctor-photo-wrap { height: 190px; min-height: 0; }
      .doctor-photo { position: static; }
      .doctor-info { padding: 16px; }
      .specialty-count { padding-inline: 8px; font-size: 11px; }
    }
  </style>
        <link rel="canonical" href="https://www.shmtrust.org/doctors" />
        <link rel="apple-touch-icon" href="https://www.shmtrust.org/images/favicon.ico">
        <link rel="icon" type="image/gif" href="./images/favicon.ico">
        <title>Our Doctors | Sahera Hasan Memorial Hospital</title>
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/loader.css" />
        <link rel="stylesheet" href="./css/icons.css" />
        <script src="./js/utilities.js"></script>
</head>

<body class="doctor-directory-page">
    <div id="preloader">
        <div>
            <img data-src="./images/logo.jpg" src="./images/logo.jpg" alt="logo" style="width:30px">
        </div>
        <div class="loader">
        </div>
    </div>
    <?php pageAdd('components/header'); ?>
    <?php pageAdd('components/hero', [
        'headerEyebrow' => 'Expert Hands, Caring Hearts',
        'headerTitle' => 'Meet Our Doctors',
        'headerDescription' => 'Dedicated professionals, committed to your health.',
    ]); ?>
<main>
    <div class="directory-toolbar" aria-label="Find a doctor">
        <label class="search-field">
            <span class="visually-hidden">Search doctors by name, qualification, or specialty</span>
            <svg aria-hidden="true" viewBox="0 0 24 24" fill="none">
                <circle cx="10.8" cy="10.8" r="6.8"></circle>
                <path d="m16 16 4.5 4.5"></path>
            </svg>
            <input id="doctorSearch" type="search" placeholder="Search doctors or specialties" autocomplete="off">
        </label>
        <nav class="specialty-filters" aria-label="Filter doctors by specialty">
            <button class="filter-tab is-active" type="button" data-filter="all" aria-pressed="true">All doctors</button>
            <button class="filter-tab" type="button" data-filter="women" aria-pressed="false">Gynecologist</button>
            <button class="filter-tab" type="button" data-filter="diagnostics" aria-pressed="false">Diagnostics</button>
            <button class="filter-tab" type="button" data-filter="surgery" aria-pressed="false">Surgery &amp; urology</button>
            <button class="filter-tab" type="button" data-filter="anesthesia" aria-pressed="false">Anesthesiology</button>
        </nav>
        <p class="directory-result-count" id="doctorResultCount" aria-live="polite"></p>
    </div>
    <div class="directory-groups" id="doctorDirectory">
<?php
$doctors = [
    [
        "image" => "./images/doctor1.jpg",
        "name" => "Prof. Dr. Rowshan Ara Begum",
        "degree" => "MBBS, FCPS",
        "specialty" => "Obstetrician, Gynecologist, and Philanthropist",
        "bio" => "Prof. Dr. Rowshan Ara Begum is a distinguished Bangladeshi obstetrician, gynecologist, and former President of the Obstetrical and Gynecological Society of Bangladesh (OGSB). She completed her MBBS from Dhaka University (1974) and earned her FCPS (1983) and FICS (1992). Former departmental head, and examiner at Dhaka Medical College and Holy Family Red Crescent Medical College. Driven by a passion for serving underprivileged populations, Dr. Rowshan founded the Sahera Hasan Memorial Hospital in 2001 in Manikganj, which she and her family fund entirely on their own. She later expanded the facility to include a premier Midwifery Institute. Throughout her career, she has held numerous leadership positions in national and international medical bodies. Her outstanding contributions to community healthcare and women's health have earned her prestigious accolades, including the Amartya Sen Gold Medal (2007) and the international FIGO Award (2009).",
        "tags" => [
            "Obstetrician",
            "Gynecologist",
            "Healthcare Leadership"
        ]
    ],
    [
        "image" => "./images/doctor2.jpg",
        "name" => "Dr. Nazneen Ahmed",
        "degree" => "MBBS, FCPS",
        "specialty" => "Associate Professor, Department of Gynecology & Obstetrics
Holy Family Red Crescent Medical College & Hospital, Dhaka, Bangladesh",
        "bio" => "Dr. Nazneen Ahmed is a highly experienced Obstetrician and Gynecologist with a strong commitment to women's healthcare, maternal wellbeing, and reproductive medicine. As an Associate Professor at Holy Family Red Crescent Medical College & Hospital, she combines academic excellence with extensive clinical expertise. She has contributed significantly to medical education, patient care, and safe motherhood initiatives throughout her career. Her dedication to providing compassionate healthcare services and mentoring future healthcare professionals has made her a trusted specialist in the field of obstetrics and gynecology, helping improve healthcare outcomes for women across Bangladesh.",
        "tags" => [
            "Gynecology Specialist",
            "Maternal Health",
            "Medical Education"
        ]
    ],
    [
        "image" => "./images/doctor3.jpg",
        "name" => "Dr. Umme Habiba Ranu",
        "degree" => "MBBS, CMU, DMU",
        "specialty" => "Senior Medical Officer, Snehaloy, Dhaka, Bangladesh",
        "bio" => "Dr. Umme Habiba Ranu is a dedicated healthcare professional with extensive experience in diagnostic medicine, ultrasonography, and patient care. As a Senior Medical Officer at Snehaloy, Dhaka, she provides quality healthcare services with a focus on accurate diagnosis and effective treatment planning. Her expertise in ultrasound imaging and clinical medicine enables her to support patients through comprehensive healthcare assessments and medical consultations. Through her compassionate approach and commitment to professional excellence, Dr. Ranu continues to contribute to improving healthcare accessibility, women's health services, and overall patient wellbeing in Bangladesh.",
        "tags" => [
            "Diagnostic Medicine",
            "Ultrasound Specialist",
            "Women's Health"
        ]
    ],
    [
        "image" => "./images/doctor4.jpg",
        "name" => "Dr. Poly Ahmed",
        "degree" => "MBBS, FCPS",
        "specialty" => "Consultant, United Hospital, Dhaka, Bangladesh",
        "bio" => "Dr. Poly Ahmed is a highly experienced Obstetrician and Gynecologist dedicated to providing comprehensive healthcare services for women. As a Consultant at United Hospital, Dhaka, she specializes in maternal health, pregnancy care, gynecological treatment, and reproductive healthcare. With strong clinical expertise and a patient-centered approach, she is committed to ensuring safe motherhood and improving women's health outcomes. Through her professional excellence, compassionate care, and dedication to medical practice, Dr. Ahmed continues to make valuable contributions to women's healthcare and overall community wellbeing in Bangladesh.",
        "tags" => [
            "Obstetrics Specialist",
            "Pregnancy Care",
            "Women's Healthcare"
        ]
    ],
    [
        "image" => "./images/doctor5.jpg",
        "name" => "Dr. Bilkis Begum",
        "degree" => "MBBS, FCPS",
        "specialty" => "Senior Consultant, Snehaloy, Dhaka, Bangladesh",
        "bio" => "Dr. Bilkis Begum is a respected Obstetrician and Gynecologist with extensive experience in maternal medicine, gynecological treatment, and reproductive healthcare services. As a Senior Consultant at Snehaloy, Dhaka, she is dedicated to providing high-quality healthcare solutions for women. Her expertise covers pregnancy care, women's wellness, preventive healthcare, and management of gynecological conditions. Known for her compassionate approach and strong clinical skills, Dr. Begum remains committed to improving women's health outcomes and supporting safe motherhood initiatives. Her dedication to patient care continues to positively impact individuals and families throughout Bangladesh.",
        "tags" => [
            "Maternal Care",
            "Gynecology Expert",
            "Women's Wellness"
        ]
    ],
    [
        "image" => "./images/doctor6.jpg",
        "name" => "Dr. Bilkis Chowdhury",
        "degree" => "MBBS, FCPS",
        "specialty" => "Associate Professor, Kumudini Women’s Medical College & Hospital, Mirzapur",
        "bio" => "Dr. Bilkis Chowdhury is an experienced Obstetrician and Gynecologist dedicated to advancing women's healthcare, maternal wellbeing, and reproductive health services. As an Associate Professor at Kumudini Women’s Medical College & Hospital, Mirzapur, she combines clinical expertise with academic leadership to provide quality patient care and professional medical education. Her areas of specialization include pregnancy management, gynecological care, preventive health services, and maternal healthcare support. Through her commitment to clinical excellence and mentorship, she contributes significantly to improving healthcare standards while helping develop future generations of healthcare professionals in Bangladesh.",
        "tags" => [
            "Women's Health",
            "Maternal Care",
            "Gynecology Specialist"
        ]
    ],
    [
        "image" => "./images/doctor7.jpg",
        "name" => "Dr. Shifat Akter Jahan",
        "degree" => "MBBS, PGT (Gynae), MPH",
        "specialty" => "Medical Officer, Snehaloy",
        "bio" => "Dr. Shifat Akter Jahan is a dedicated healthcare professional with expertise in gynecology, maternal health, and public health services. As a Medical Officer at Snehaloy, she is committed to providing compassionate and quality healthcare for women, mothers, and families. Her academic background in Gynecology and Public Health enables her to support preventive healthcare, reproductive health management, pregnancy care, and community health initiatives. Through her patient-centered approach, professional integrity, and commitment to healthcare excellence, Dr. Jahan continues to contribute to improving maternal wellbeing, healthcare awareness, and access to quality medical services across Bangladesh.",
        "tags" => [
            "Women's Health",
            "Maternal Care",
            "Public Health"
        ]
    ],
    [
        "image" => "./images/doctor8.jpg",
        "name" => "Dr. Seema Sinha",
        "degree" => "MBBS, CMU, DMU",
        "specialty" => "Medical Officer, Kurmitola General Hospital, Dhaka",
        "bio" => "Dr. Seema Sinha is an experienced medical professional specializing in diagnostic medicine, ultrasonography, and comprehensive patient care. As a Medical Officer at Kurmitola General Hospital, Dhaka, she provides quality healthcare services with a strong focus on accurate diagnosis and effective treatment planning. Her qualifications in diagnostic imaging and clinical medicine enable her to support patients through detailed medical evaluations and healthcare consultations. Through her dedication to professional excellence, compassionate patient care, and continuous learning, Dr. Sinha contributes significantly to improving healthcare outcomes, enhancing diagnostic accuracy, and promoting better patient wellbeing throughout Bangladesh.",
        "tags" => [
            "Diagnostic Medicine",
            "Patient Care",
            "Clinical Services"
        ]
    ],
    [
        "image" => "./images/doctor9.jpg",
        "name" => "Dr. Nur E Nazma Lima",
        "degree" => "MBBS, MCPS",
        "specialty" => "Consultant (Gynae), Popular Diagnostic Center, Narayanganj",
        "bio" => "Dr. Nur E Nazma Lima is a highly skilled Obstetrician and Gynecologist with extensive experience in women’s healthcare, reproductive medicine, and maternal wellbeing. As a Consultant in Gynecology, she provides specialized medical services including pregnancy management, gynecological treatment, preventive healthcare, and reproductive health counseling. Her dedication to compassionate patient care and clinical excellence has earned the trust of many patients. Through her expertise and commitment to women’s health, Dr. Lima continues to support safe motherhood initiatives, improve healthcare accessibility, and contribute to better health outcomes for women and families throughout Bangladesh.",
        "tags" => [
            "Gynecology Specialist",
            "Women's Health",
            "Pregnancy Care"
        ]
    ],
    [
        "image" => "./images/doctor10.jpg",
        "name" => "Dr. Tamanna",
        "degree" => "MBBS, MCPS, DGO, FCPS Part-II",
        "specialty" => "Gynecologist. Consultant",
        "bio" => "Dr. Tamanna is a dedicated Obstetrician and Gynecologist committed to providing comprehensive healthcare services for women. Her expertise includes maternal healthcare, pregnancy care, gynecological treatment, reproductive health management, and preventive healthcare services. Through her professional experience and patient-focused approach, she helps ensure safe motherhood and improved health outcomes for women at different stages of life. She is recognized for her commitment to quality healthcare, compassionate treatment, and clinical excellence. By combining medical knowledge with personalized patient care, Dr. Tamanna continues to make valuable contributions to women’s healthcare and community wellbeing in Bangladesh.",
        "tags" => [
            "Obstetrics Specialist",
            "Maternal Health",
            "Women's Wellness"
        ]
    ],
    [
        "image" => "./images/doctor11.jpg",
        "name" => "Dr. Fahmida Zarrin",
        "degree" => "MBBS, DMU",
        "specialty" => "Lecturer, Holy Family Red Crescent Medical College",
        "bio" => "Dr. Fahmida Zarrin is a healthcare professional with expertise in diagnostic medicine, ultrasonography, and medical education. As a Lecturer at Holy Family Red Crescent Medical College, she combines academic excellence with practical clinical experience to support healthcare delivery and professional training. Her work focuses on accurate diagnostic evaluation, ultrasound services, patient care, and healthcare education. Through her dedication to teaching and clinical practice, she plays an important role in developing future healthcare professionals while contributing to improved healthcare standards. Dr. Zarrin’s commitment to quality healthcare and education continues to positively impact medical services in Bangladesh.",
        "tags" => [
            "Diagnostic Medicine",
            "Medical Education",
            "Ultrasound Specialist"
        ]
    ],
    [
        "image" => "./images/doctor12.jpg",
        "name" => "Prof. Dr. ABM Jamal",
        "degree" => "MBBS (Dhaka), FCPS (Surgery), FRCS (Edinburgh, UK)",
        "specialty" => "General & Laparoscopic Surgeon | 25 Years of Experience",
        "bio" => "Prof. Dr. ABM Jamal is a highly experienced General and Laparoscopic Surgeon with over 25 years of expertise in advanced surgical care. Holding an MBBS from Dhaka, FCPS in Surgery, and FRCS from Edinburgh, UK, he is recognized for his excellence in general surgery, minimally invasive laparoscopic procedures, and patient-centered treatment. Throughout his distinguished career, he has provided comprehensive surgical care while contributing to medical education and clinical excellence. His dedication to precision, innovation, and compassionate healthcare has earned him a reputation as a trusted surgeon committed to improving patient outcomes across Bangladesh.",
        "tags" => [
            "General Surgery",
            "Laparoscopic Surgery",
            "Surgical Care"
        ]
    ],
    [
        "image" => "./images/doctor13.jpg",
        "name" => "Dr. Md. Abdus Salam",
        "degree" => "MBBS, BCS (Health), FCPS (Surgery), MRCS (Edinburgh, UK), MS (Urology)",
        "specialty" => "Urologist, General & Laparoscopic Surgeon Assistant Professor, Department of Urology National Institute of Kidney Diseases & Urology",
        "bio" => "Dr. Md. Abdus Salam is a highly skilled Urologist and General & Laparoscopic Surgeon with extensive experience in advanced urological and surgical care. As an Assistant Professor at the National Institute of Kidney Diseases & Urology, he combines clinical expertise with academic excellence to deliver high-quality patient care and medical education. His specialties include urological disorders, minimally invasive laparoscopic surgery, kidney and urinary tract treatment, and general surgical procedures. Through his dedication to surgical precision, compassionate patient care, and continuous professional development, Dr. Salam has earned recognition as a trusted specialist committed to improving healthcare outcomes across Bangladesh.",
        "tags" => [
            "Urology Specialist",
            "Laparoscopic Surgery",
            "General Surgery"
        ]
    ],
    [
        "image" => "./images/doctor14.jpg",
        "name" => "Prof. Dr. Mostafizur Rahman Khan",
        "degree" => "MBBS, General & Advanced Surgeon",
        "specialty" => "Former Associate Professor, Holy Family Red Crescent Medical College & Hospital (HFRCMH), Dhaka Consultant & Surgeon, Al Ain Hospital, Abu Dhabi, UAE",
        "bio" => "Prof. Dr. Mostafizur Rahman Khan is an accomplished surgeon with extensive experience in general and advanced surgical care. Formerly an Associate Professor at Holy Family Red Crescent Medical College & Hospital (HFRCMH), Dhaka, he has contributed significantly to medical education, clinical training, and patient management. He currently serves as a Consultant & Surgeon at Al Ain Hospital, Abu Dhabi, UAE, providing high-quality surgical care with professionalism and compassion. His commitment to surgical excellence, patient safety, and continuous medical advancement has earned him recognition as a trusted healthcare professional dedicated to improving patient outcomes and advancing modern surgical practices.",
        "tags" => [
            "General Surgery",
            "Surgical Excellence",
            "Medical Education"
        ]
    ],
    [
        "image" => "./images/doctor15.jpg",
        "name" => "Dr. Md. Abdul Mannan",
        "degree" => "MBBS, Professor of Anesthesiology",
        "specialty" => "Holy Family Red Crescent Medical College Hospital, Dhaka, Bangladesh",
        "bio" => "Dr. Md. Abdul Mannan is an experienced anesthesiologist and Professor of Anesthesiology at Holy Family Red Crescent Medical College Hospital. With extensive expertise in anesthesia, perioperative care, pain management, and critical care, he has dedicated his career to ensuring patient safety and comfort during surgical procedures. Alongside his clinical responsibilities, he actively contributes to medical education by training and mentoring future healthcare professionals. His commitment to excellence, compassionate patient care, and high standards of anesthesiology has earned him recognition as a trusted specialist, helping improve surgical outcomes and the quality of healthcare services across Bangladesh.",
        "tags" => [
            "Anesthesiology",
            "Critical Care",
            "Medical Education"
        ]
    ],
    [
        "image" => "./images/doctor16.jpg",
        "name" => "Dr. Ahsan Kabir",
        "degree" => "MBBS, Surgeon & Urologist",
        "specialty" => "Holy Family Red Crescent Medical College & Hospital, Dhaka, Bangladesh",
        "bio" => "Dr. Ahsan Kabir is a skilled Surgeon and Urologist with extensive experience in diagnosing and treating urological conditions and performing advanced surgical procedures. At Holy Family Red Crescent Medical College & Hospital, he is dedicated to delivering high-quality patient care through modern surgical techniques and evidence-based treatment. His expertise includes kidney, bladder, prostate, and urinary tract disorders, along with general and minimally invasive surgical procedures. Committed to clinical excellence, compassionate care, and continuous professional development, Dr. Kabir strives to improve patient outcomes while contributing to quality healthcare services across Bangladesh.",
        "tags" => [
            "Urology",
            "General Surgery",
            "Patient Care"
        ]
    ],
    [
        "image" => "./images/doctor17.jpg",
        "name" => "Prof. Dr. Khandker Ezaz Ahmed",
        "degree" => "MBBS, Anesthetist",
        "specialty" => "Former Director, Holy Family Red Crescent Medical College & Hospital, Dhaka, Bangladesh",
        "bio" => "Prof. Dr. Khandker Ezaz Ahmed is a distinguished anesthetist with extensive experience in anesthesiology, perioperative care, and critical patient management. As the former Director of Holy Family Red Crescent Medical College & Hospital, Dhaka, he has provided visionary leadership while contributing significantly to clinical excellence and medical education. Throughout his career, he has been dedicated to ensuring patient safety during surgical procedures, advancing anesthesiology practices, and mentoring future healthcare professionals. His commitment to high-quality healthcare, compassionate patient care, and professional excellence has earned him recognition as a respected medical leader and trusted specialist in Bangladesh.",
        "tags" => [
            "Anesthesiology",
            "Hospital Leadership",
            "Patient Safety"
        ]
    ],
];

$excludedDoctors = ['Prof. Dr. Rowshan Ara Begum'];
$doctors = array_values(array_filter($doctors, static function ($doctor) use ($excludedDoctors) {
    return !in_array($doctor['name'], $excludedDoctors, true);
}));

$categoryDefinitions = [
    'women' => ['title' => 'Gynecologist', 'doctors' => []],
    'diagnostics' => ['title' => 'Diagnostic Medicine & Ultrasound', 'doctors' => []],
    'surgery' => ['title' => 'General Surgery & Urology', 'doctors' => []],
    'anesthesia' => ['title' => 'Anesthesiology & Critical Care', 'doctors' => []],
];

foreach ($doctors as $doctor) {
    if (in_array('Diagnostic Medicine', $doctor['tags'], true)) {
        $category = 'diagnostics';
    } elseif (in_array('Anesthesiology', $doctor['tags'], true)) {
        $category = 'anesthesia';
    } elseif (in_array('General Surgery', $doctor['tags'], true) || in_array('Urology', $doctor['tags'], true) || in_array('Urology Specialist', $doctor['tags'], true)) {
        $category = 'surgery';
    } else {
        $category = 'women';
    }
    $categoryDefinitions[$category]['doctors'][] = $doctor;
}

$categoryLabels = [
    'women' => 'Gynecologist',
    'diagnostics' => 'Diagnostics',
    'surgery' => 'Surgery & urology',
    'anesthesia' => 'Anesthesiology',
];
?>
<?php foreach ($categoryDefinitions as $categoryId => $category): ?>
    <?php if (!empty($category['doctors'])): ?>
    <section class="specialty-group" data-specialty-group="<?= htmlspecialchars($categoryId, ENT_QUOTES, 'UTF-8') ?>" aria-labelledby="heading-<?= htmlspecialchars($categoryId, ENT_QUOTES, 'UTF-8') ?>">
        <div class="specialty-heading">
            <div>
                <p class="section-kicker">Specialty</p>
                <h2 id="heading-<?= htmlspecialchars($categoryId, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
            </div>
            <span class="specialty-count"><?= count($category['doctors']) ?> <?= count($category['doctors']) === 1 ? 'doctor' : 'doctors' ?></span>
        </div>
        <div class="doctor-grid">
            <?php foreach ($category['doctors'] as $doctor): ?>
                <?php
                    $searchText = implode(' ', array_merge([
                        $doctor['name'], $doctor['degree'], $doctor['specialty'], $categoryLabels[$categoryId]
                    ], $doctor['tags']));
                ?>
                <article class="doctor-card" data-category="<?= htmlspecialchars($categoryId, ENT_QUOTES, 'UTF-8') ?>" data-search="<?= htmlspecialchars(strtolower($searchText), ENT_QUOTES, 'UTF-8') ?>">
                    <div class="doctor-photo-wrap">
                        <img class="doctor-photo" data-src="<?= htmlspecialchars($doctor['image'], ENT_QUOTES, 'UTF-8') ?>" src="<?= htmlspecialchars($doctor['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Portrait of <?= htmlspecialchars($doctor['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy" decoding="async">
                        <span class="doctor-photo-accent" aria-hidden="true"></span>
                    </div>
                    <div class="doctor-info">
                        <h3 class="doctor-name"><?= htmlspecialchars($doctor['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                        <p class="doctor-degree"><?= htmlspecialchars($doctor['degree'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="doctor-specialty"><?= nl2br(htmlspecialchars($doctor['specialty'], ENT_QUOTES, 'UTF-8')) ?></p>
                        <div class="doctor-tags" aria-label="Areas of expertise">
                            <?php foreach ($doctor['tags'] as $tag): ?>
                                <span class="doctor-tag"><?= htmlspecialchars($tag, ENT_QUOTES, 'UTF-8') ?></span>
                            <?php endforeach; ?>
                        </div>
                        <details class="doctor-profile">
                            <summary>View profile</summary>
                            <p><?= htmlspecialchars($doctor['bio'], ENT_QUOTES, 'UTF-8') ?></p>
                        </details>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>
<?php endforeach; ?>
    <p class="no-doctors" id="noDoctors" hidden>No doctors match your search. Try another name or specialty.</p>
</main>
<script>
(() => {
    const searchInput = document.getElementById('doctorSearch');
    const filterTabs = Array.from(document.querySelectorAll('.filter-tab'));
    const cards = Array.from(document.querySelectorAll('.doctor-card'));
    const groups = Array.from(document.querySelectorAll('.specialty-group'));
    const resultCount = document.getElementById('doctorResultCount');
    const emptyState = document.getElementById('noDoctors');
    let activeCategory = 'all';

    function updateDirectory() {
        const query = searchInput.value.trim().toLocaleLowerCase();
        let visibleCount = 0;

        cards.forEach((card) => {
            const matchesCategory = activeCategory === 'all' || card.dataset.category === activeCategory;
            const matchesSearch = !query || card.dataset.search.includes(query);
            const visible = matchesCategory && matchesSearch;
            card.hidden = !visible;
            if (visible) visibleCount += 1;
        });

        groups.forEach((group) => {
            group.hidden = !group.querySelector('.doctor-card:not([hidden])');
        });

        emptyState.hidden = visibleCount !== 0;
        resultCount.textContent = `${visibleCount} ${visibleCount === 1 ? 'doctor' : 'doctors'} found`;
    }

    filterTabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            activeCategory = tab.dataset.filter;
            filterTabs.forEach((item) => {
                const selected = item === tab;
                item.classList.toggle('is-active', selected);
                item.setAttribute('aria-pressed', String(selected));
            });
            updateDirectory();
        });
    });

    searchInput.addEventListener('input', updateDirectory);
    updateDirectory();
})();
</script>
<?php pageAdd('components/footer'); ?>
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/animations.js"></script>
  <script src="./js/index.js"></script>
<?php pageAdd('components/toaster'); ?>
</body>
</html>
