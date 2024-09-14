<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/internal/favicon.jpg" type="image/x-icon">
    <title><?= $model['title'] ?></title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/animate.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/aos.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?= BASE_URL ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/icomoon.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Darma Sakti Tour and Travel - Jasa Travel Terbaik di Bandung" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= DOMAIN ?>" />
    <meta property="og:image" content="<?= BASE_URL ?>/assets/internal/favicon.jpg" type="image/x-icon" />
    <meta property="og:image:alt" content="Darma Sakti Tour and Travel Logo" />
    <meta property="og:description" content="Nikmati perjalanan nyaman dan aman bersama Darma Sakti Tour and Travel. Kami menyediakan jasa travel terbaik di Bandung dengan berbagai pilihan kendaraan." />
    <meta property="og:site_name" content="Darma Sakti Tour and Travel" />
    <meta property="og:locale" content="id_ID" />

    <!-- Meta Tags untuk SEO -->
    <meta name="description" content="Darma Sakti Tour and Travel menawarkan jasa travel terbaik di Bandung. Dapatkan pengalaman perjalanan yang nyaman dan aman dengan berbagai pilihan kendaraan yang kami sediakan.">
    <meta name="keywords" content="Darma Sakti Tour and Travel, jasa travel Bandung, travel Bandung, sewa mobil Bandung, travel aman dan nyaman">
    <link rel="canonical" href="<?= DOMAIN ?>" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL ?>/">DARMA SAKTI TRAVEL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <?php
            function isActive($page)
            {
                $current_page = $_SERVER['REQUEST_URI'];
                return strpos($current_page, $page) !== false ? 'active' : '';
            }
            ?>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= isActive('/') ?>"><a href="<?= BASE_URL ?>/" class="nav-link">Beranda</a></li>
                    <li class="nav-item <?= isActive('/tentang') ?>"><a href="<?= BASE_URL ?>/tentang" class="nav-link">Tentang</a></li>
                    <li class="nav-item <?= isActive('/list-mobil') ?>"><a href="<?= BASE_URL ?>/list-mobil" class="nav-link">List Mobil</a></li>
                    <li class="nav-item <?= isActive('/galeri') ?>"><a href="<?= BASE_URL ?>/galeri" class="nav-link">Galeri</a></li>
                    <li class="nav-item <?= isActive('/kontak') ?>"><a href="<?= BASE_URL ?>/kontak" class="nav-link">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>