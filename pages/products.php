<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="hisp">
        <meta name="description" content="">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="HISP" />
        <meta property="og:title" content="HISP" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="https://www.hisp.com/images/og.jpg" />
        <meta property="og:url" content="https://www.hisp.com" />
        <meta property="og:image:width" content="1280">
        <meta property="og:image:height" content="720">
        <meta name="twitter:card" content="summary_large_image">
        <meta itemprop="name" content="HISP" />
        <meta itemprop="description" content="" />
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
        <meta name="rating" content="adult">
        <meta name="author" content="HISP">
        <link rel="canonical" href="https://hisp.com" />
        <link rel="apple-touch-icon" href="https://www.hisp.com/images/favicon.ico">
        <link rel="icon" type="image/gif" href="./images/favicon.ico">
        <title>Products - HiSP Bangladesh</title>
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/loader.css" />
        <link rel="stylesheet" href="./css/icons.css" />
        <script src="./js/utilities.js"></script>
    </head>

    <body>
        <?php pageAdd('components/header'); ?>
        <section class="my-5">
            <div class="row pt-5 g-0 d-flex align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h1 class="fw-bolder text-secondary">
                        Our Products
                    </h1>
                    <span class="divider-3x"> </span>
                    <h4 class="py-3 text-capitalize">What we create</h4>
                </div>
                <hr>
                <?php foreach($products as $product):?>
                <div class="col-lg-8 col-md-10 col-12 py-4">
                    <h3 class="text-green text-center"><?php echo $product['title']?></h3>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <img data-src="../<?php echo $product['image']?>" alt="<?php echo $product['title']?>"
                            class="w-60">
                    </div>
                    <div>
                        <p class="mb-0"><?php echo $product['sub_title']?></p>
                        <p class="mb-0"><?php echo $product['text']?></p>
                    </div>
                </div>
                <?php endforeach?>
            </div>
        </section>
        <?php pageAdd('components/footer'); ?>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/animations.js"></script>
        <script src="./js/index.js"></script>
    </body>

</html>