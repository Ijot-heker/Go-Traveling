<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Details - Arsha Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/'); ?>img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/'); ?>img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="<?= base_url(); ?>">Go Traveling</a></h1>
            <a href="<?= base_url('auth'); ?>" class="get-started-btn scrollto">Mulai Booking</a>
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li>Detail Wisata</li>
                </ol>
                <h2>Detail Wisata</h2>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="portfolio-details-container">
                    <?php foreach ($detail as $dt) : ?>
                        <div class="owl-carousel portfolio-details-carousel">
                            <img src="<?= base_url('assets/'); ?><?= $dt['foto']; ?>" class="img-fluid" alt="">
                        </div>

                        <div class="portfolio-info">
                            <h3>Infromasi Wisata</h3>
                            <ul>
                                <li><strong>Nama Destinasi</strong><br> <?= $dt['nama']; ?></li>
                                <li><strong>Kecamatan</strong><br> <?= $dt['kecamatan']; ?></li>
                                <li><strong>Status Kepemilikan</strong><br> <?= $dt['status']; ?></li>
                                <li><strong>Tiket Masuk</strong><br> Rp.<?= $dt['biaya']; ?></li>
                            </ul>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="portfolio-description">
                    <h2>Detail Wisata</h2>
                    <p align="justify">
                        <?= $dt['detail']; ?>
                    </p>
                </div>

                <div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqp5UtHcfmoDCnM6PGhf47Sjn5pwMK1dQ&callback=initMap"></script>
                    <?php foreach ($detail as $dt) : ?>
                        <script>
                            function initialize() {
                                var propertiPeta = {
                                    center: new google.maps.LatLng(<?= $dt['latitude']; ?>, <?= $dt['longitude']; ?>),
                                    zoom: 19,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };

                                var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

                                // membuat Marker
                                var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(<?= $dt['latitude']; ?>, <?= $dt['longitude']; ?>),
                                    map: peta,
                                    animation: google.maps.Animation.BOUNCE
                                });

                            }

                            // event jendela di-load  
                            google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                    <?php endforeach; ?>

                    <div id="googleMap" style="width:100%;height:380px;"></div>
                </div>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->