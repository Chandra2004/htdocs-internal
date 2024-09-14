<?php

namespace Darmasaktitravel\Carrent\Controller;

use Darmasaktitravel\Carrent\App\View;
use Darmasaktitravel\Carrent\Models\DashboardModel;

class DashboardController
{

    function index()
    {
        $dashboardModel = new DashboardModel();
        $getAllGaleri = $dashboardModel->getAllGaleri();
        $getAllMobil = $dashboardModel->getAllMobil();
        $getAllTestimonial = $dashboardModel->getAllTestimonial();
        $getAllGaleriSpesifikasi = $dashboardModel->getAllGaleriSpesifikasi();
        $getCountGaleri = $dashboardModel->getCountGaleri();
        $getCountGaleriSpesifikasi = $dashboardModel->getCountGaleriSpesifikasi();

        $model = [
            'title' => 'Dashboard | Darma Sakti Tavel Bandung',
            'allGaleri' => $getAllGaleri['galeri'],
            'allMobil' => $getAllMobil['mobil'],
            'allTestimonial' => $getAllTestimonial['testimonial'],
            'allGaleriSpesifikasi' => $getAllGaleriSpesifikasi['galeri_mobil'],
            'countGaleri' => $getCountGaleri['total_galeri'],
            'countGaleriSpesifikasi' => $getCountGaleriSpesifikasi['total_galeri_spesifikasi']
        ];

        View::render('dashboard/home', $model);
    }

    // GALERI
    function galeriCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['uploadFoto'])) {
            $dashboardModel = new DashboardModel();

            // Cek jumlah gambar saat ini di galeri
            $countData = $dashboardModel->getCountGaleri();
            if ($countData['total_galeri'] >= 1000) {
                header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-limit=failed');
                exit();
            }

            $foto_galeri = $_FILES['foto_gallery'];
            $judul_galeri = $_POST['judul_foto'];
            $deskripsi_galeri = $_POST['deskripsi_photo'];

            // $targetDir = "../public/assets/gallery/";
            $targetDir = "../htdocs/assets/gallery/"; // <-- Ketika Di Deploy

            // Proses setiap file gambar yang diupload
            foreach ($foto_galeri['name'] as $key => $value) {
                $fileName = basename($value); // Mengambil nama file saat ini
                $targetFile = $targetDir . $fileName;
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Cek jenis file yang diizinkan
                if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
                    header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-photo-require=failed');
                    exit();
                }

                // Batasi ukuran file
                if ($foto_galeri["size"][$key] > 3000000) { // 3MB
                    header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-photo-size=failed');
                    exit();
                }

                $newFileName = uniqid() . '.' . $fileType;
                $targetFilePath = $targetDir . $newFileName;

                // Pindahkan file yang diupload ke direktori tujuan
                if (move_uploaded_file($foto_galeri["tmp_name"][$key], $targetFilePath)) {
                    $success = $dashboardModel->createPhotoGaleri(
                        $newFileName,
                        $judul_galeri[$key],
                        $deskripsi_galeri[$key]
                    );

                    if (!$success) {
                        header('Location: ' . BASE_URL . '/dashboard?status-create-galeri=failed');
                        exit();
                    }
                } else {
                    header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-photo-status=failed');
                    exit();
                }
            }

            header('Location: ' . BASE_URL . '/dashboard?status-create-galeri=success');
            exit();
        }
    }

    function galeriUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateFoto'])) {
            $dashboardModel = new DashboardModel();

            $id_foto = $_POST['id_foto'];
            $update_foto = $_FILES['update_foto'];
            $nama_foto = $_POST['nama_foto'];
            $deskripsi_foto = $_POST['deskripsi_foto'];

            // Mendapatkan data foto lama
            $oldFoto = $dashboardModel->getFotoById($id_foto);

            // Jika tidak ada file baru, gunakan file lama
            $newFileName = $oldFoto['photo'];

            // Mengecek apakah ada file gambar yang diupload
            if (isset($update_foto) && $update_foto['error'] != UPLOAD_ERR_NO_FILE) {
                // Tentukan direktori tujuan untuk menyimpan file
                // $targetDir = "../public/assets/gallery/";
                $targetDir = "../htdocs/assets/gallery/"; // <-- Ketika Di Deploy

                $fileType = strtolower(pathinfo($update_foto['name'], PATHINFO_EXTENSION));

                // Cek jenis file yang diizinkan
                $allowedFileTypes = ["jpg", "jpeg", "png"];
                if (!in_array($fileType, $allowedFileTypes)) {
                    header('Location: ' . BASE_URL . '/dashboard?status-update-photo-extension=failed');
                    exit();
                }

                // Batasi ukuran file
                if ($update_foto["size"] > 3000000) { // 3MB
                    header('Location: ' . BASE_URL . '/dashboard?status-update-photo-size=failed');
                    exit();
                }

                // Generate nama file baru dengan nama random
                $randomFileName = uniqid() . '.' . $fileType;
                $targetFile = $targetDir . $randomFileName;
                $photoPath = $randomFileName; // hanya menyimpan nama file

                // Memindahkan file yang diupload ke direktori tujuan di server
                if (move_uploaded_file($update_foto["tmp_name"], $targetFile)) {
                    // Menghapus file gambar lama
                    if (file_exists($targetDir . $oldFoto['photo'])) {
                        unlink($targetDir . $oldFoto['photo']);
                    }

                    // Update nama file gambar baru
                    $newFileName = $photoPath;
                } else {
                    echo "Gagal mengupload file";
                    exit();
                }
            }

            // Update informasi galeri dengan gambar baru atau lama
            $dashboardModel->updatePhotoGaleri($id_foto, $newFileName, $nama_foto, $deskripsi_foto);
            header('Location: ' . BASE_URL . '/dashboard?status-update-galeri=success');
            exit();
        } else {
            header('Location: ' . BASE_URL . '/dashboard?status-update-galeri=failed');
            exit();
        }
    }

    function galeriDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteFoto'])) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $dashboardModel = new DashboardModel();
                $success = $dashboardModel->deletePhotoById($id);

                if ($success) {
                    // Redirect atau response success
                    header('Location: ' . BASE_URL . '/dashboard?status-delete-galeri=success');
                    exit();
                } else {
                    // Handle jika gagal menghapus
                    header('Location: ' . BASE_URL . '/dashboard?status-delete-galeri=failed');
                    exit();
                }
            }
        }
    }

    // MOBIL
    private function generateSlug($nama)
    {
        // Ubah nama menjadi slug dengan menghapus karakter khusus, spasi, dan mengubah ke huruf kecil
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nama), '-'));
    }

    function mobilCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['uploadMobil'])) {
            $dashboardModel = new DashboardModel();

            $foto_mobil = $_FILES['foto_mobil'];
            $harga_mobil = $_POST['harga_mobil'];
            $nama_mobil = $_POST['nama_mobil'];
            $merk_mobil = $_POST['merk_mobil'];
            $kilometer = $_POST['kilometer'];
            $transmisi = $_POST['transmisi'];
            $kursi = $_POST['kursi'];
            $bagasi = $_POST['bagasi'];
            $jenis_bensin = $_POST['jenis_bensin'];
            $deskripsi_mobil = $_POST['deskripsi_mobil'];

            $slug_mobil = $this->generateSlug($nama_mobil);

            // Validasi jika title_produk sudah ada di database
            if ($dashboardModel->checkTitleExistence($nama_mobil)) {
                header('Location: ' . BASE_URL . '/dashboard?name-car-found=failed');
                exit();
            }

            // Tentukan direktori tujuan untuk menyimpan file
            $targetDir = "../public/assets/cars/";
            // $targetDir = "../htdocs/assets/cars/"; // <-- Ketika Di Deploy

            $targetFile = $targetDir . basename($_FILES["foto_mobil"]["name"]);

            // Cek jenis file yang diizinkan
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
                header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-photo-require=failed');
                exit();
            }

            // Batasi ukuran file
            if ($_FILES["foto_mobil"]["size"] > 3000000) { // 3MB
                //echo "File terlalu besar. Maksimal 1MB.";
                header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-photo-size=failed');
                exit();
            }

            // Generate nama file baru dengan nama random
            $newFileName = uniqid() . '.' . $fileType;
            $targetFilePath = $targetDir . $newFileName;

            // Pindahkan file yang diupload ke direktori tujuan
            if (move_uploaded_file($_FILES["foto_mobil"]["tmp_name"], $targetFilePath)) {
                // Panggil method insertProduk dari model
                $success = $dashboardModel->createCars(
                    $newFileName, // Gunakan nama file baru
                    $harga_mobil,
                    $nama_mobil,
                    $merk_mobil,
                    $kilometer,
                    $transmisi,
                    $kursi,
                    $bagasi,
                    $jenis_bensin,
                    $deskripsi_mobil,
                    $slug_mobil
                );

                if ($success) {
                    // Redirect atau response sukses
                    header('Location: ' . BASE_URL . '/dashboard?status-create-mobil=success');
                    exit();
                } else {
                    // Handle jika gagal menyimpan ke database
                    header('Location: ' . BASE_URL . '/dashboard?status-create-mobil=failed');
                    exit();
                }
            } else {
                // Handle jika gagal memindahkan file
                header('Location: ' . BASE_URL . '/dashboard?status-create-mobil=failed');
                exit();
            }
        }
    }

    public function mobilUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateMobil'])) {
            $dashboardModel = new DashboardModel();

            $id_mobil = $_POST['id'];

            $foto_mobil = $_FILES['foto_mobil'];
            $harga_mobil = $_POST['harga_mobil'];
            $nama_mobil = $_POST['nama_mobil'];
            $merk_mobil = $_POST['merk_mobil'];
            $kilometer = $_POST['kilometer'];
            $transmisi = $_POST['transmisi'];
            $kursi = $_POST['kursi'];
            $bagasi = $_POST['bagasi'];
            $jenis_bensin = $_POST['jenis_bensin'];
            $deskripsi_mobil = $_POST['deskripsi_mobil'];

            $slug_mobil = $this->generateSlug($nama_mobil);

            // Mendapatkan data foto lama
            $oldMobil = $dashboardModel->getMobilById($id_mobil);

            // Jika tidak ada file baru, gunakan file lama
            $newFileName = $oldMobil['photo'];

            // Mengecek apakah ada file gambar yang diupload
            if (isset($foto_mobil) && $foto_mobil['error'] != UPLOAD_ERR_NO_FILE) {
                // Tentukan direktori tujuan untuk menyimpan file
                // $targetDir = "../public/assets/cars/";
                $targetDir = "../htdocs/assets/cars/"; // <-- Ketika Di Deploy

                $fileType = strtolower(pathinfo($foto_mobil['name'], PATHINFO_EXTENSION));

                // Cek jenis file yang diizinkan
                $allowedFileTypes = ["jpg", "jpeg", "png"];
                if (!in_array($fileType, $allowedFileTypes)) {
                    header('Location: ' . BASE_URL . '/dashboard?status-update-photo-extension=failed');
                    exit();
                }

                // Batasi ukuran file
                if ($foto_mobil["size"] > 3000000) { // 1MB
                    header('Location: ' . BASE_URL . '/dashboard?status-update-photo-size=failed');
                    exit();
                }

                // Generate nama file baru dengan nama random
                $randomFileName = uniqid() . '.' . $fileType;
                $targetFile = $targetDir . $randomFileName;
                $photoPath = $randomFileName; // hanya menyimpan nama file

                // Memindahkan file yang diupload ke direktori tujuan di server
                if (move_uploaded_file($foto_mobil["tmp_name"], $targetFile)) {
                    // Menghapus file gambar lama
                    if (file_exists($targetDir . $oldMobil['photo'])) {
                        unlink($targetDir . $oldMobil['photo']);
                    }

                    // Update nama file gambar baru
                    $newFileName = $photoPath;
                } else {
                    echo "Gagal mengupload file";
                    exit();
                }
            }

            // Update informasi mobil dengan gambar baru atau lama
            $dashboardModel->updateMobil($id_mobil, $newFileName, $harga_mobil, $nama_mobil, $slug_mobil, $merk_mobil, $kilometer, $transmisi, $kursi, $bagasi, $jenis_bensin, $deskripsi_mobil);
            header('Location: ' . BASE_URL . '/dashboard?status-update-mobil=success');
            exit();
        } else {
            header('Location: ' . BASE_URL . '/dashboard?status-update-mobil=failed');
            exit();
        }
    }

    function mobilDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteMobil'])) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $dashboardModel = new DashboardModel();
                $success = $dashboardModel->deleteMobilById($id);

                if ($success) {
                    // Redirect atau response success
                    header('Location: ' . BASE_URL . '/dashboard?status-delete-mobil=success');
                    exit();
                } else {
                    // Handle jika gagal menghapus
                    header('Location: ' . BASE_URL . '/dashboard?status-delete-mobil=failed');
                    exit();
                }
            }
        }
    }

    // TESTIMONIAL
    function testimonialDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['testiDelete'])) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $dashboardModel = new DashboardModel();
                $success = $dashboardModel->deleteTestiById($id);

                if ($success) {
                    // Redirect atau response success
                    header('Location: ' . BASE_URL . '/dashboard?status-delete-testimonial=success');
                    exit();
                } else {
                    // Handle jika gagal menghapus
                    header('Location: ' . BASE_URL . '/dashboard?status-delete-testimonial=failed');
                    exit();
                }
            }
        }
    }

    // GALERI MOBIL SPESIFIKASI
    function galeriSpesifikasiCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['uploadSpesifikasi'])) {
            $dashboardModel = new DashboardModel();

            // Cek jumlah gambar saat ini di galeri
            $countData = $dashboardModel->getCountGaleriSpesifikasi();
            if ($countData['total_galeri_spesifikasi'] >= 1000) {
                header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-limit=failed');
                exit();
            }

            $foto_spesifikasi = $_FILES['foto_spesifikasi'];
            $judul_spesifikasi = $_POST['judul_spesifikasi'];
            $deskripsi_spesifikasi = $_POST['deskripsi_spesifikasi'];

            $targetDir = "../public/assets/cars-gallery/";
            // $targetDir = "../htdocs//assets/cars-gallery/"; // <-- Ketika Di Deploy

            // Proses setiap file gambar yang diupload
            foreach ($foto_spesifikasi['name'] as $key => $value) {
                $fileName = basename($value); // Mengambil nama file saat ini
                $targetFile = $targetDir . $fileName;
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Cek jenis file yang diizinkan
                if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
                    header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-photo-require=failed');
                    exit();
                }

                // Batasi ukuran file
                if ($foto_spesifikasi["size"][$key] > 3000000) { // 3MB
                    header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-photo-size=failed');
                    exit();
                }

                $newFileName = uniqid() . '.' . $fileType;
                $targetFilePath = $targetDir . $newFileName;

                // Pindahkan file yang diupload ke direktori tujuan
                if (move_uploaded_file($foto_spesifikasi["tmp_name"][$key], $targetFilePath)) {
                    $success = $dashboardModel->createPhotoGaleriSpesifikasi(
                        $newFileName,
                        $judul_spesifikasi[$key],
                        $deskripsi_spesifikasi[$key]
                    );

                    if (!$success) {
                        header('Location: ' . BASE_URL . '/dashboard?status-create-galeri=failed');
                        exit();
                    }
                } else {
                    header('Location: ' . BASE_URL . '/dashboard?status-create-galeri-photo-status=failed');
                    exit();
                }
            }

            header('Location: ' . BASE_URL . '/dashboard?status-create-galeri=success');
            exit();
        }
    }

    function galeriSpesifikasiUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateGaleriSpesifikasi'])) {
            $dashboardModel = new DashboardModel();

            $id_foto = $_POST['id_foto'];
            $update_foto = $_FILES['update_foto'];
            $nama_foto = $_POST['nama_foto'];
            $deskripsi_foto = $_POST['deskripsi_foto'];

            // Mendapatkan data foto lama
            $oldFoto = $dashboardModel->getGaleriSpesifikasiById($id_foto);

            // Jika tidak ada file baru, gunakan file lama
            $newFileName = $oldFoto['photo'];

            // Mengecek apakah ada file gambar yang diupload
            if (isset($update_foto) && $update_foto['error'] != UPLOAD_ERR_NO_FILE) {
                // Tentukan direktori tujuan untuk menyimpan file
                // $targetDir = "../public/assets/cars-gallery/";
                $targetDir = "../htdocs/assets/cars-gallery/"; // <-- Ketika Di Deploy

                $fileType = strtolower(pathinfo($update_foto['name'], PATHINFO_EXTENSION));

                // Cek jenis file yang diizinkan
                $allowedFileTypes = ["jpg", "jpeg", "png"];
                if (!in_array($fileType, $allowedFileTypes)) {
                    header('Location: ' . BASE_URL . '/dashboard?status-update-photo-extension=failed');
                    exit();
                }

                // Batasi ukuran file
                if ($update_foto["size"] > 3000000) { // 3MB
                    header('Location: ' . BASE_URL . '/dashboard?status-update-photo-size=failed');
                    exit();
                }

                // Generate nama file baru dengan nama random
                $randomFileName = uniqid() . '.' . $fileType;
                $targetFile = $targetDir . $randomFileName;
                $photoPath = $randomFileName; // hanya menyimpan nama file

                // Memindahkan file yang diupload ke direktori tujuan di server
                if (move_uploaded_file($update_foto["tmp_name"], $targetFile)) {
                    // Menghapus file gambar lama
                    if (file_exists($targetDir . $oldFoto['photo'])) {
                        unlink($targetDir . $oldFoto['photo']);
                    }

                    // Update nama file gambar baru
                    $newFileName = $photoPath;
                } else {
                    echo "Gagal mengupload file";
                    exit();
                }
            }

            // Update informasi galeri dengan gambar baru atau lama
            $dashboardModel->updateGaleriSpesifikasi($id_foto, $newFileName, $nama_foto, $deskripsi_foto);
            header('Location: ' . BASE_URL . '/dashboard?status-update-galeri=success');
            exit();
        } else {
            header('Location: ' . BASE_URL . '/dashboard?status-update-galeri=failed');
            exit();
        }
    }

    function galeriSpesifikasiDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteGaleriSpesifikasi'])) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $dashboardModel = new DashboardModel();
                $success = $dashboardModel->deleteGaleriSpesifikasi($id);

                if ($success) {
                    // Redirect atau response success
                    header('Location: ' . BASE_URL . '/dashboard?status-delete-galeri=success');
                    exit();
                } else {
                    // Handle jika gagal menghapus
                    header('Location: ' . BASE_URL . '/dashboard?status-delete-galeri=failed');
                    exit();
                }
            }
        }
    }
}