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
        
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Inter', sans-serif;
      background: #F7F9FC;
      color: #1a2332;
    }

    /* ── Hero Header ── */
        .header2 {
          background: linear-gradient(135deg, #0b3d6b 0%, #1565a8 100%);
          color: #fff;
          padding: 90px 40px 50px;
          text-align: center;
        }
        .header2 .eyebrow {
          font-size: 14px;
          font-weight: 700;
          letter-spacing: 3px;
          text-transform: uppercase;
          color: #7ec8f5;
          margin-bottom: 12px;
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
          align-items: left;
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
          padding: 4px 8px 5px 5px;
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



    /* ── Doctor List ── */
    main {
      max-width: 900px;
      margin: 0 auto;
      padding: 52px 24px 80px;
      display: flex;
      flex-direction: column;
      gap: 0;
    }
  .read-more-btn{
      display:none;
  }
    /* ── Doctor Card ── */
    .doctor-card {
      display: flex;
      align-items: flex-start;
      gap: 28px;
      padding: 36px 0;
      border-bottom: 1px solid #dce6f0;
      position: relative;
    }
    .doctor-card:last-child { border-bottom: none; }

    /* Accent line on hover */
    .doctor-card::before {
      content: '';
      position: absolute;
      left: -24px;
      top: 36px;
      bottom: 36px;
      width: 3px;
      background: #1565a8;
      border-radius: 2px;
      opacity: 0;
      transition: opacity 0.25s;
    }
    .doctor-card:hover::before { opacity: 1; }

    /* ── Photo ── */
    .doctor-photo {
      flex-shrink: 0;
      width: 110px;
      height: 110px;
      border-radius: 12px;
      object-fit: cover;
      background: #dce6f0;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      border: 3px solid #fff;
      box-shadow: 0 4px 16px rgba(21,101,168,0.13);
    }
    .doctor-photo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    /* Placeholder avatar when no image */
    .doctor-photo svg {
      width: 54px;
      height: 54px;
      opacity: 0.45;
    }

    /* ── Bio ── */
    .doctor-info { flex: 1; }

    .doctor-meta {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
      margin-bottom: 6px;
    }
    .doctor-name {
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      color: #0b3d6b;
    }
    .doctor-badge {
      font-size: 10px;
      font-weight: 500;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      background: #e6f1fb;
      color: #1565a8;
      padding: 3px 9px;
      border-radius: 20px;
    }

    .doctor-specialty {
      font-size: 0.82rem;
      font-weight: 500;
      color: #1565a8;
      margin-bottom: 10px;
      letter-spacing: 0.3px;
    }

    .doctor-bio {
      font-size: 0.93rem;
      font-weight: 300;
      line-height: 1.75;
      color: #3d4f63;
      max-width: 600px;
    }

    .doctor-tags {
      margin-top: 12px;
      display: flex;
      flex-wrap: wrap;
      gap: 7px;
    }
    .tag {
      font-size: 11px;
      padding: 4px 10px;
      border-radius: 20px;
      background: #f0f5fa;
      color: #455a6e;
      border: 1px solid #dce6f0;
    }

    /* ── Responsive ── */
    @media (max-width: 560px) {
      .doctor-card {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
      .doctor-meta { justify-content: center; }
      .doctor-bio { max-width: 100%; }
      .doctor-tags { justify-content: center; }
      .doctor-bio{
          display:-webkit-box;
          -webkit-line-clamp:4;
          -webkit-box-orient:vertical;
          overflow:hidden;
      }

      .doctor-bio.expanded{
          -webkit-line-clamp:unset;
          overflow:visible;
      }

      .read-more-btn{
          display:inline-block;
          margin-top:10px;
          background:none;
          border:none;
          color:#007bff;
          font-weight:600;
          cursor:pointer;
          padding:0;
      }
    }
  </style>
        <link rel="canonical" href="https://www.shmtrust.org" />
        <link rel="apple-touch-icon" href="https://www.shmtrust.org/images/favicon.ico">
        <link rel="icon" type="image/gif" href="./images/favicon.ico">
        <title>Sahera Hasan Memorial Hospital - About us</title>
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/loader.css" />
        <link rel="stylesheet" href="./css/icons.css" />
        <script src="./js/utilities.js"></script>
</head>

<body>
    <div id="preloader">
        <div>
            <img data-src="./images/logo.jpg" src="./images/logo.jpg" alt="logo" style="width:30px">
        </div>
        <div class="loader">
        </div>
    </div>
    <?php pageAdd('components/header'); ?>

  <div class="header2">
      <!-- RIGHT: Title & subtitle (80%) -->
      <div class="text-center">
        <p class="eyebrow">Sahera Hasan Memorial Hospital</p>
        <h3>Meet Our Doctors</h3>
        <p>Our team of dedicated specialists brings decades of combined experience in patient-centred care.</p>
      </div>
  </div>
<main>
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

?>
<?php foreach ($doctors as $index => $doctor): ?>

<div class="doctor-card">

    <div class="doctor-photo">
        <img
            data-src="<?= $doctor['image'] ?>"
            src="<?= $doctor['image'] ?>"
            alt="<?= htmlspecialchars($doctor['name']) ?>"
        >
    </div>

    <div class="doctor-info">

        <div class="doctor-meta">
            <span class="doctor-name"><?= htmlspecialchars($doctor['name']) ?></span>
            <span class="doctor-badge"><?= htmlspecialchars($doctor['degree']) ?></span>
        </div>

        <div class="doctor-specialty">
            <?= nl2br(htmlspecialchars($doctor['specialty'])) ?>
        </div>

        <p class="doctor-bio" id="bio<?= $index ?>">
            <?= htmlspecialchars($doctor['bio']) ?>
        </p>

        <button
            class="read-more-btn"
            data-target="bio<?= $index ?>">
            Read More
        </button>

        <div class="doctor-tags">
            <?php foreach ($doctor['tags'] as $tag): ?>
                <span class="tag"><?= htmlspecialchars($tag) ?></span>
            <?php endforeach; ?>
        </div>

    </div>

</div>

<?php endforeach; ?>

</main>
<?php pageAdd('components/footer'); ?>
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/animations.js"></script>
  <script src="./js/index.js"></script>
<?php pageAdd('components/toaster'); ?>
</body>
</html>
