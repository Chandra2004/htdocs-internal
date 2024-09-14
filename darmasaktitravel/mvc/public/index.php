<?php
// ini file public/index.php

require_once __DIR__ . '/../vendor/autoload.php';

use Darmasaktitravel\Carrent\App\Router;

use Darmasaktitravel\Carrent\Middleware\AuthMiddleware;

use Darmasaktitravel\Carrent\Controller\HomeController;
use Darmasaktitravel\Carrent\Controller\TentangController;
use Darmasaktitravel\Carrent\Controller\ListController;
use Darmasaktitravel\Carrent\Controller\KontakController;
use Darmasaktitravel\Carrent\Controller\GaleriController;
use Darmasaktitravel\Carrent\Controller\FooterController;

use Darmasaktitravel\Carrent\Controller\LoginController;

use Darmasaktitravel\Carrent\Controller\DashboardController;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/404', HomeController::class, 'error');
Router::add('GET', '/tentang', TentangController::class, 'index');
Router::add('GET', '/list-mobil', ListController::class, 'index');

Router::add('GET', '/login', LoginController::class, 'index');
Router::add('GET', '/logout', LoginController::class, 'logout');
Router::add('POST', '/login/process', LoginController::class, 'login');

Router::add('POST', '/testimonial/submit', ListController::class, 'testimonial');


Router::add('GET', '/details/nama-mobil/([0-9a-zA-Z-]*)', ListController::class, 'details');

Router::add('GET', '/kontak', KontakController::class, 'index');
Router::add('POST', '/kontak/send-email', KontakController::class, 'emailSender');
Router::add('GET', '/galeri', GaleriController::class, 'index');

Router::add('GET', '/terms-and-condition', FooterController::class, 'termsAndCondition');
Router::add('GET', '/faq', FooterController::class, 'faq');
Router::add('GET', '/opsi-pembayaran', FooterController::class, 'opsiPembayaran');
Router::add('GET', '/tips-booking', FooterController::class, 'tipsBooking');

Router::add('POST', '/booking/now', HomeController::class, 'handlePesan');

Router::add('GET', '/dashboard', DashboardController::class, 'index', [AuthMiddleware::class]);

Router::add('POST', '/dashboard/galeri/create', DashboardController::class, 'galeriCreate');
Router::add('POST', '/dashboard/galeri/update', DashboardController::class, 'galeriUpdate');
Router::add('POST', '/dashboard/galeri/delete', DashboardController::class, 'galeriDelete');

Router::add('POST', '/dashboard/mobil/create', DashboardController::class, 'mobilCreate');
Router::add('POST', '/dashboard/mobil/update', DashboardController::class, 'mobilUpdate');
Router::add('POST', '/dashboard/mobil/delete', DashboardController::class, 'mobilDelete');

Router::add('POST', '/dashboard/testimonial/delete', DashboardController::class, 'testimonialDelete');

Router::run();
?>
