<?php
// app/Models/DashboardModel.php

namespace Darmasaktitravel\Carrent\Models;

use Darmasaktitravel\Carrent\App\Database;

class DashboardModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllTestimonial() {
        // Query Testimonial
        $this->db->query("SELECT * FROM testimonial ORDER BY timestamp DESC");
        $data['testimonial'] = $this->db->resultSet();
        
        return $data;
    }

    public function getAllGaleri() {
        // Query Galeri
        $this->db->query("SELECT * FROM galeri ORDER BY timestamp DESC");
        $data['galeri'] = $this->db->resultSet();
        return $data;
    }

    public function getAllMobil() {
        // Query Mobil
        $this->db->query("SELECT * FROM mobil ORDER BY timestamp DESC");
        $data['mobil'] = $this->db->resultSet();
        return $data;
    }

    public function getAllGaleriSpesifikasi() {
        // Query Mobil
        $this->db->query("SELECT * FROM galeri_mobil ORDER BY timestamp DESC");
        $data['galeri_mobil'] = $this->db->resultSet();
        return $data;
    }

    public function getCountGaleri() {
        // Query untuk mengambil Total Mailbox
        $this->db->query("SELECT COUNT(*) as total_galeri FROM galeri");
        $data = $this->db->single();
        return $data;
    }

    public function getCountGaleriSpesifikasi() {
        // Query untuk mengambil Total Mailbox
        $this->db->query("SELECT COUNT(*) as total_galeri_spesifikasi FROM galeri_mobil");
        $data = $this->db->single();
        return $data;
    }

    // Galeri
    public function getFotoById($id) {
        $this->db->query("SELECT * FROM galeri WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function checkTitleExistence($nama_mobil) {
        $this->db->query("SELECT COUNT(*) as total FROM mobil WHERE nama_mobil = :nama_mobil");
        $this->db->bind(':nama_mobil', $nama_mobil);
        $result = $this->db->single();
        return $result['total'] > 0;
    }

    public function createPhotoGaleri($foto_galeri, $judul_galeri, $deskripsi_galeri) {
        $this->db->query("INSERT INTO galeri (nama, photo, deskripsi, timestamp) 
                            VALUES (:nama_foto, :judul_foto, :deskripsi_foto, CURRENT_TIMESTAMP())");
            
        $this->db->bind(':nama_foto', $judul_galeri);
        $this->db->bind(':judul_foto', $foto_galeri);
        $this->db->bind(':deskripsi_foto', $deskripsi_galeri);
        
        return $this->db->execute();
    }

    public function updatePhotoGaleri($id_foto, $update_foto, $nama_foto, $deskripsi_foto) {
        $this->db->query("UPDATE galeri SET 
        nama = :nama_foto,
        photo = :update_foto,
        deskripsi = :deskripsi_foto,
        timestamp = CURRENT_TIMESTAMP()
        WHERE id = :id_foto");

        $this->db->bind(':id_foto', $id_foto);
        $this->db->bind(':update_foto', $update_foto);
        $this->db->bind(':nama_foto', $nama_foto);
        $this->db->bind(':deskripsi_foto', $deskripsi_foto);

        return $this->db->execute();
    }

    public function deletePhotoById($id) {
        // Ambil informasi produk berdasarkan ID
        $foto = $this->getFotoById($id);
    
        // Hapus file gambar dari direktori jika ada
        // $imagePath = "../public/assets/gallery/" . $foto['photo'];
        $imagePath = "../htdocs/assets/gallery/" . $foto['photo']; // <-- Ketika Di Deploy

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        // Hapus data banner dari database
        $this->db->query("DELETE FROM galeri WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Mobil
    public function getMobilById($id) {
        $this->db->query("SELECT * FROM mobil WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function deleteMobilById($id) {
        // Ambil informasi produk berdasarkan ID
        $foto = $this->getMobilById($id);
    
        // Hapus file gambar dari direktori jika ada
        // $imagePath = "../public/assets/cars/" . $foto['photo'];
        $imagePath = "../htdocs/assets/cars/" . $foto['photo']; // <-- Ketika Di Deploy

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        // Hapus data banner dari database
        $this->db->query("DELETE FROM mobil WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function deleteTestiById($id) {
        // Hapus data banner dari database
        $this->db->query("DELETE FROM testimonial WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function createCars($foto_mobil, $harga_mobil, $nama_mobil, $merk_mobil, $kilometer, $transmisi, $kursi, $bagasi, $jenis_bensin, $deskripsi_mobil, $slug_mobil) {
        $this->db->query("INSERT INTO mobil (photo, harga_mobil, nama_mobil, slug_mobil, merk_mobil, kilometer_mobil, transmisi_mobil, kursi_mobil, bagasi_mobil, jenis_mobil, deskripsi_mobil, timestamp) 
                            VALUES (:photo, :harga_mobil, :nama_mobil, :slug_mobil, :merk_mobil, :kilometer_mobil, :transmisi_mobil, :kursi_mobil, :bagasi_mobil, :jenis_mobil, :deskripsi_mobil, CURRENT_TIMESTAMP())");
            
        $this->db->bind(':photo', $foto_mobil);
        $this->db->bind(':harga_mobil', $harga_mobil);
        $this->db->bind(':nama_mobil', $nama_mobil);
        $this->db->bind(':slug_mobil', $slug_mobil);
        $this->db->bind(':merk_mobil', $merk_mobil);
        $this->db->bind(':kilometer_mobil', $kilometer);
        $this->db->bind(':transmisi_mobil', $transmisi);
        $this->db->bind(':kursi_mobil', $kursi);
        $this->db->bind(':bagasi_mobil', $bagasi);
        $this->db->bind(':jenis_mobil', $jenis_bensin);
        $this->db->bind(':deskripsi_mobil', $deskripsi_mobil);
        
        return $this->db->execute();
    }

    public function updateMobil($id_mobil, $foto_mobil, $harga_mobil, $nama_mobil, $slug_mobil, $merk_mobil, $kilometer, $transmisi, $kursi, $bagasi, $jenis_bensin, $deskripsi_mobil) {
        $this->db->query("UPDATE mobil SET 
        photo = :foto_mobil,
        harga_mobil = :harga_mobil,
        nama_mobil = :nama_mobil,
        slug_mobil = :slug_mobil,
        merk_mobil = :merk_mobil,
        kilometer_mobil = :kilometer,
        transmisi_mobil = :transmisi,
        kursi_mobil = :kursi,
        bagasi_mobil = :bagasi,
        jenis_mobil = :jenis_bensin,
        deskripsi_mobil = :deskripsi_mobil,
        timestamp = CURRENT_TIMESTAMP()
        WHERE id = :id_mobil");

        $this->db->bind(':id_mobil', $id_mobil);
        $this->db->bind(':foto_mobil', $foto_mobil);
        $this->db->bind(':harga_mobil', $harga_mobil);
        $this->db->bind(':nama_mobil', $nama_mobil);
        $this->db->bind(':slug_mobil', $slug_mobil);
        $this->db->bind(':merk_mobil', $merk_mobil);
        $this->db->bind(':kilometer', $kilometer);
        $this->db->bind(':transmisi', $transmisi);
        $this->db->bind(':kursi', $kursi);
        $this->db->bind(':bagasi', $bagasi);
        $this->db->bind(':jenis_bensin', $jenis_bensin);
        $this->db->bind(':deskripsi_mobil', $deskripsi_mobil);

        return $this->db->execute();
    }

    // Mobil Galeri Spesifikasi
    public function getGaleriSpesifikasiById($id) {
        $this->db->query("SELECT * FROM galeri_mobil WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function createPhotoGaleriSpesifikasi($foto_galeri, $judul_galeri, $deskripsi_galeri) {
        $this->db->query("INSERT INTO galeri_mobil (photo, nama, deskripsi, timestamp) 
                            VALUES (:foto_spesifikasi, :nama_spesifikasi, :deskripsi_spesifikasi, CURRENT_TIMESTAMP())");
            
        $this->db->bind(':foto_spesifikasi', $foto_galeri);
        $this->db->bind(':nama_spesifikasi', $judul_galeri);
        $this->db->bind(':deskripsi_spesifikasi', $deskripsi_galeri);
        
        return $this->db->execute();
    }

    public function deleteGaleriSpesifikasi($id) {
        // Ambil informasi produk berdasarkan ID
        $foto = $this->getGaleriSpesifikasiById($id);
    
        // Hapus file gambar dari direktori jika ada
        // $imagePath = "../public/assets/cars-gallery/" . $foto['photo'];
        $imagePath = "../htdocs/assets/cars-gallery/" . $foto['photo']; // <-- Ketika Di Deploy
        
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        // Hapus data banner dari database
        $this->db->query("DELETE FROM galeri_mobil WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function updateGaleriSpesifikasi($id_foto, $update_foto, $nama_foto, $deskripsi_foto) {
        $this->db->query("UPDATE galeri_mobil SET 
        photo = :update_foto,
        nama = :nama_foto,
        deskripsi = :deskripsi_foto,
        timestamp = CURRENT_TIMESTAMP()
        WHERE id = :id_foto");

        $this->db->bind(':id_foto', $id_foto);
        $this->db->bind(':update_foto', $update_foto);
        $this->db->bind(':nama_foto', $nama_foto);
        $this->db->bind(':deskripsi_foto', $deskripsi_foto);

        return $this->db->execute();
    }


}