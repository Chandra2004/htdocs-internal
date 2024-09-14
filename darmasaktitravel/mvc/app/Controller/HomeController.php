<?php
    namespace Darmasaktitravel\Carrent\Controller;

    use Darmasaktitravel\Carrent\App\View;
    use Darmasaktitravel\Carrent\Models\DashboardModel;

    class HomeController {
        function index() {
            $dashboardModel = new DashboardModel();
            $getAllMobil = $dashboardModel->getAllMobil();
            $getAllTestimonial = $dashboardModel->getAllTestimonial();

            $model = [
                'title' => 'Tour and Travel | Darma Sakti Tavel Bandung',
                'allMobil' => $getAllMobil['mobil'],
                'allTestimonial' => $getAllTestimonial['testimonial'],
            ];
            
            View::render('interface/home', $model);
        }

        function error() {
            $dashboardModel = new DashboardModel();
            $getAllMobil = $dashboardModel->getAllMobil();

            $model = [
                'title' => 'Apa Yang Kamu Cari | Darma Sakti Tavel Bandung',
                'allMobil' => $getAllMobil['mobil']
            ];
            
            View::render('interface/error/404', $model);
        }

        // WhatsApp
        public function handlePesan() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = $_POST['nama'];
                $lokasi = $_POST['lokasi'];
                $model = $_POST['model'];
                $tanggalAwal = $_POST['tanggalAwal'];
                $tanggalAkhir = $_POST['TanggalAkhir'];
                $jamBooking = $_POST['jamBooking'];

                // ... (Bagian yang sama seperti sebelumnya)
                $space = "%20";
                $enter = "%0A";

                $url = "https://api.whatsapp.com/send?phone=6285730676143&text=";
                // $url = "https://api.whatsapp.com/send?phone=6285730676143&text=";

                // Info-Salam
                $salam = "Hallo *DARMA SAKTI TOUR AND TRAVEL*," . $enter;

                $pendahuluan = "Saya ingin melakukan pemesanan dengan detail sebagai berikut :" . $enter . $enter;

                $isi = "Atas Nama: " . "*" . $nama . "*" . $enter . 
                "Lokasi Jemput: " . "*" . $lokasi . "*" .  $enter . 
                "Model Mobil: " . "*" . $model . "*" . $enter . 
                "Tanggal Awal Booking: " . "*" . $tanggalAwal . "*" . $enter . 
                "Tanggal Akhir Booking: " . "*" . $tanggalAkhir  . "*" . $enter . 
                "Jam Booking: " . "*" . $jamBooking . "*" . $enter . 
                $enter . "Terima Kasih" 
                ;


                $api_url = $url . $salam . $pendahuluan . $isi;

                // Redirect ke URL WhatsApp
                header("Location: $api_url");
                exit();
            }
        }
    }