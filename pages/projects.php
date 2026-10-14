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
        <title>Sahera Hasan Memorial Hospital - Projects</title>
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/loader.css" />
        <link rel="stylesheet" href="./css/icons.css" />
        <script src="./js/utilities.js"></script>
    </head>

    <body>
        <?php pageAdd('components/header'); ?>
        <?php pageAdd('components/hero', [
            'headerEyebrow' => 'Creating a Healthier Tomorrow',
            'headerTitle' => 'Our Projects',
            'headerDescription' => 'Every initiative brings hope closer to home.',
        ]); ?>
        <section class="mb-5">
            <div class="row g-0 d-flex align-items-center justify-content-center">
                <?php if(!empty($ongoingProjects)){?>
                <div class="col-md-10 col-12">
                    <div class="shadow-lg py-2 mt-3">
                        <div class="row d-flex g-4 align-items-stretch justify-content-center p-md-3 p-2">
                            <?php foreach ($ongoingProjects as $ongoing) { ?>
                            <div class="col-sm-6 col-12 d-flex flex-column">
                                <div class="bg-white shadow flex-grow-1 p-md-3 p-1 rounded-4 shadow-lg-hover border">
                                    <div class="pb-2">
                                        <img data-src="./<?php echo $ongoing['image'] ?>"
                                            alt="<?php echo $ongoing['title'] ?>" class="w-100">
                                    </div>

                                    <h5 class="fw-bold text-secondary"><?php echo $ongoing['title'] ?></h5>

                                    <p><?php echo $ongoing['text'] ?></p>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php } if(!empty($completedProjects)){?>
                <div class="col-md-10 col-12 pt-lg-5 pt-3 other-projects-section">
                    <div class="other-projects-heading">
                        <span class="other-projects-kicker">Completed initiatives</span>
                        <h2>Other Projects</h2>
                    </div>
                    <div class="other-projects-list shadow-lg py-2 mt-3">
                        <div class="row d-flex g-4 align-items-stretch justify-content-center p-md-3 p-2">
                            <?php foreach ($completedProjects as $completed) { ?>
                            <div class="col-sm-6 col-12 d-flex flex-column">
                                <div class="other-project-card flex-grow-1 p-md-3 p-2 rounded-4">
                                    <div class="other-project-image pb-2">
                                        <img data-src="./<?php echo $completed['image'] ?>"
                                            alt="<?php echo $completed['title'] ?>" class="w-100">
                                    </div>

                                    <h3 class="other-project-title"><?php echo $completed['title'] ?></h3>

                                    <p><?php echo $completed['text'] ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } if(!empty($proposedProjects)){?>
                <div class="col-md-10 col-12 pt-lg-5 pt-3">
                    <div class="background-tube">
                        <h3 class="text-center fw-bold ls-2">Proposed Projects</h3>
                    </div>
                    <div class="shadow-lg py-2 mt-3">
                        <div class="row d-flex g-4 align-items-stretch justify-content-center p-md-3 p-2">

                            <?php foreach ($proposedProjects as $proposed) { ?>
                            <div class="col-sm-6 col-12 d-flex flex-column">
                                <div class="bg-white shadow flex-grow-1 p-md-3 p-1 rounded-4 shadow-lg-hover border">
                                    <div class="pb-2">
                                        <img data-src="./<?php echo $proposed['image'] ?>"
                                            alt="<?php echo $proposed['title'] ?>" class="w-100">
                                    </div>

                                    <h5 class="fw-bold text-secondary"><?php echo $proposed['title'] ?></h5>

                                    <p><?php echo $proposed['text'] ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </section>
        <?php pageAdd('components/footer'); ?>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/animations.js"></script>
        <script src="./js/index.js"></script>
    </body>

</html>
