<?php
    namespace Darmasaktitravel\Carrent\Controller;

    use Darmasaktitravel\Carrent\App\View;
    use Darmasaktitravel\Carrent\Models\DashboardModel;
    
    class FooterController {
        function termsAndCondition() {
            // Logika perhitungan pengunjung
            $file = __DIR__ . "/../../counter.txt";  // Pastikan path ini sesuai dengan lokasi file Anda
            if (file_exists($file)) {
                $handle = fopen($file, "r+");
                $counter = (int) fread($handle, filesize($file));
                $counter++;
                rewind($handle);
                fwrite($handle, $counter);
                fclose($handle);
            } else {
                // Jika file tidak ada, buat file dengan hitungan awal 1
                $handle = fopen($file, "w");
                fwrite($handle, "1");
                fclose($handle);
                $counter = 1;
            }
            $dashboardModel = new DashboardModel();
            $getAllMobil = $dashboardModel->getAllMobil();
            
            $model = [
                'title' => 'Terms And Condition | Darma Sakti Tavel Bandung',
                'allMobil' => $getAllMobil['mobil']
            ];
            
            View::render('interface/terms-and-condition', $model);
        }

        function faq() {
            $model = [
                'title' => 'FAQ | Darma Sakti Tavel Bandung'
            ];
            
            View::render('interface/faq', $model);
        }

        function opsiPembayaran() {
            $model = [
                'title' => 'Opsi Pembayaran | Darma Sakti Tavel Bandung'
            ];
            
            View::render('interface/opsi-pembayaran', $model);
        }

        function tipsBooking() {
            $model = [
                'title' => 'Tips Booking | Darma Sakti Tavel Bandung'
            ];
            
            View::render('interface/tips-booking', $model);
        }
    }