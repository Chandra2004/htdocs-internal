<?php
    namespace Darmasaktitravel\Carrent\Controller;

    use Darmasaktitravel\Carrent\App\View;
    use Darmasaktitravel\Carrent\Models\DashboardModel;
    use Darmasaktitravel\Carrent\Models\DetailCarModel;

    class ListController {
        function index() {
            $dashboardModel = new DashboardModel();
            $getAllMobil = $dashboardModel->getAllMobil();

            $model = [
                'title' => 'List Mobil Tour and Travel | Darma Sakti Tavel Bandung',
                'allMobil' => $getAllMobil['mobil']
            ];
            
            View::render('interface/list-mobil', $model);
        }

        function details(string $slug) {
            $detailCarModel = new DetailCarModel();

            $mobilDetail = $detailCarModel->getCarBySlug($slug); 
            $allMobil = $detailCarModel->getAllMobil(); 
            $allTestimonial = $detailCarModel->getAllTestimonial(); 

            $model = [
                'slug' => $slug,
                'detail' => $mobilDetail,
                'allMobil' => $allMobil['mobil'],
                'allTestimonial' => $allTestimonial['testimonial'],
                'totalTestimonial' => $allTestimonial['total_testi'],
                'averageTestimonial' => $allTestimonial['average_rating'],
                'title' => 'Ini adalah detail | Darma Sakti Tavel Bandung'
            ];
            
            View::render('interface/details', $model);
        }

        public function testimonial() {
            $detailCarModel = new DetailCarModel();
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['testimonial'])) {
                // Mengambil data dari form
                $nama = $_POST['nama'] ?? '';
                $posisi = $_POST['posisi'] ?? '';
                $rating = $_POST['rating'] ?? '';
                $deskripsi = $_POST['deskripsi'] ?? '';

                // Validasi sederhana
                if (empty($nama) || empty($posisi) || empty($rating) || empty($deskripsi)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?required=failed');
                    return;
                }

                // Simpan testimonial menggunakan model
                $success = $detailCarModel->saveTestimonial($nama, $posisi, $rating, $deskripsi);


                if ($success) {
                    // Redirect atau response sukses
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?testimonial=success');
                    exit();
                } else {
                    // Handle jika gagal menyimpan ke database
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?testimonial=failed');
                    exit();
                }
            }
        }



























        // public function detail(string $slug) {
        //     $dashboardModel = new DashboardModel();
            
        //     // Mendapatkan detail mobil berdasarkan merk dan slug
        //     $mobilDetail = $dashboardModel->getCarBySlug($slug);
        //     $getAllMobil = $dashboardModel->getAllMobil();
    
        //     $model = [
        //         'slug' => $slug,
        //         'detail' => $mobilDetail,
        //         'title' => 'Detail Mobil Anda | Darma Sakti Tavel Bandung'
        //     ];
    
        //     View::render('interface/car-single', $model);
        // }
    }