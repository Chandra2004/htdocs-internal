<?php
// app/Models/DetailCarModel.php

namespace Darmasaktitravel\Carrent\Models;

use Darmasaktitravel\Carrent\App\Database;

class DetailCarModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getCarBySlug($slug) {
        $this->db->query("SELECT * FROM mobil WHERE slug_mobil = :slug");
        $this->db->bind(':slug', $slug);
        return $this->db->single();
    }

    public function getAllMobil() {
        // Query Mobil
        $this->db->query("SELECT * FROM mobil ORDER BY timestamp DESC");
        $data['mobil'] = $this->db->resultSet();
        return $data;
    }

    public function getAllTestimonial() {
        // Query Testimonial
        $this->db->query("SELECT * FROM testimonial ORDER BY timestamp DESC");
        $data['testimonial'] = $this->db->resultSet();
       
        $this->db->query("SELECT COUNT(*) as total_testi FROM testimonial");
        $data['total_testi'] = $this->db->resultSet()[0]['total_testi'];

        $this->db->query("SELECT ROUND(AVG(CAST(rating_testi AS DECIMAL(5,2))), 1) as average_rating FROM testimonial");
        $data['average_rating'] = $this->db->resultSet()[0]['average_rating'];
       
        return $data;
    }

    public function saveTestimonial($nama, $posisi, $rating, $deskripsi) {
        $this->db->query("INSERT INTO testimonial (nama_testi, posisi_testi, rating_testi, deskripsi_testi, timestamp) 
                            VALUES (:nama_testi, :posisi_testi, :rating_testi, :deskripsi_testi, CURRENT_TIMESTAMP())");
        
        $this->db->bind(':nama_testi', $nama);
        $this->db->bind(':posisi_testi', $posisi);
        $this->db->bind(':rating_testi', $rating);
        $this->db->bind(':deskripsi_testi', $deskripsi);
        
        return $this->db->execute();
    }
}