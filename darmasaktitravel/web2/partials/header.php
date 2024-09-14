<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon">
    <title>DARMA SAKTI TRAVEL - CREATED BY LUMINO</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">DARMA SAKTI TRAVEL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <?php
            function isActive($page)
            {
                $current_page = basename($_SERVER['PHP_SELF']);
                return $current_page === $page ? 'active' : '';
            }
            ?>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= isActive('index.php') ?>"><a href="index.php" class="nav-link">Beranda</a></li>
                    <li class="nav-item <?= isActive('about.php') ?>"><a href="about.php" class="nav-link">Tentang</a></li>
                    <li class="nav-item <?= isActive('pricing.php') ?>"><a href="pricing.php" class="nav-link">Harga</a></li>
                    <li class="nav-item <?= isActive('car.php') ?>"><a href="car.php" class="nav-link">List Mobil</a></li>
                    <li class="nav-item <?= isActive('contact.php') ?>"><a href="contact.php" class="nav-link">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->