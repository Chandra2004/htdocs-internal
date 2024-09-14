<?php
// app/Models/ProdukModel.php

namespace ECommerce\Shoping\Models;

use ECommerce\Shoping\App\Database;

class ProdukModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllData()
    {
        // Query untuk mengambil data Banner
        $this->db->query("SELECT * FROM ads_banner");
        $data['ads_banner'] = $this->db->resultSet();

        // Query untuk mengambil data produk//
        $this->db->query("SELECT * FROM produk ORDER BY RAND()");
        $data['produk'] = $this->db->resultSet();

        return $data;
    }

    public function getStatusMailbox()
    {
        $this->db->query("SELECT COUNT(*) AS unread_count FROM mailbox WHERE status_mail = 'unread'");
        $data = $this->db->single();
        return $data;
    }

    public function getProductBySlug($productId)
    {
        // Query database untuk mengambil produk berdasarkan slug
        $query = "SELECT * FROM produk WHERE slug_produk = :slug";
        $this->db->query($query);
        $this->db->bind(':slug', $productId);
        return $this->db->single();
    }

    public function searchProducts($keyword)
    {
        // Query untuk mencari produk berdasarkan keyword
        $query = "SELECT * FROM produk WHERE title_produk LIKE :keyword OR deskripsi_produk LIKE :keyword";
        $this->db->query($query);
        $this->db->bind(':keyword', '%' . $keyword . '%');
        return $this->db->resultSet();
    }

    // dashboard
    public function insertProduk($photo_produk, $title_produk, $rating_produk, $kota_produk, $harga_produk, $slug_produk, $deskripsi_produk, $status_produk)
    {
        $this->db->query("INSERT INTO produk (photo_produk, title_produk, rating_produk, kota_produk, harga_produk, slug_produk, deskripsi_produk, status_produk, timestamp) 
                          VALUES (:photo_produk, :title_produk, :rating_produk, :kota_produk, :harga_produk, :slug_produk, :deskripsi_produk, :status_produk, CURRENT_TIMESTAMP())");

        $this->db->bind(':photo_produk', $photo_produk);
        $this->db->bind(':title_produk', $title_produk);
        $this->db->bind(':rating_produk', $rating_produk);
        $this->db->bind(':kota_produk', $kota_produk);
        $this->db->bind(':harga_produk', $harga_produk);
        $this->db->bind(':slug_produk', $slug_produk);
        $this->db->bind(':deskripsi_produk', $deskripsi_produk);
        $this->db->bind(':status_produk', $status_produk);

        $result = $this->db->execute();

        if ($result) {
            $this->addToSitemap($slug_produk);
        }

        return $result;
    }

    public function checkTitleExistence($title_produk)
    {
        $this->db->query("SELECT COUNT(*) as total FROM produk WHERE title_produk = :title_produk");
        $this->db->bind(':title_produk', $title_produk);
        $result = $this->db->single();
        return $result['total'] > 0;
    }

    public function getProdukById($id)
    {
        $this->db->query("SELECT * FROM produk WHERE id_produk = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function checkUpdateTitleExistence($title_produk, $id_produk = null)
    {
        if ($id_produk) {
            $this->db->query("SELECT COUNT(*) AS count FROM produk WHERE title_produk = :title_produk AND id_produk != :id_produk");
            $this->db->bind(':title_produk', $title_produk);
            $this->db->bind(':id_produk', $id_produk);
        } else {
            $this->db->query("SELECT COUNT(*) AS count FROM produk WHERE title_produk = :title_produk");
            $this->db->bind(':title_produk', $title_produk);
        }
        $this->db->execute();
        $result = $this->db->single();
        return $result['count'] > 0;
    }

    public function updateProduk($id_produk, $photo_produk, $title_produk, $rating_produk, $kota_produk, $harga_produk, $slug_produk, $deskripsi_produk, $status_produk)
    {
        $this->db->query("UPDATE produk SET 
            photo_produk = :photo_produk,
            title_produk = :title_produk,
            rating_produk = :rating_produk,
            kota_produk = :kota_produk,
            harga_produk = :harga_produk,
            slug_produk = :slug_produk,
            deskripsi_produk = :deskripsi_produk,
            status_produk = :status_produk,
            timestamp = CURRENT_TIMESTAMP()
            WHERE id_produk = :id_produk");

        $this->db->bind(':id_produk', $id_produk);
        $this->db->bind(':photo_produk', $photo_produk);
        $this->db->bind(':title_produk', $title_produk);
        $this->db->bind(':rating_produk', $rating_produk);
        $this->db->bind(':kota_produk', $kota_produk);
        $this->db->bind(':harga_produk', $harga_produk);
        $this->db->bind(':slug_produk', $slug_produk);
        $this->db->bind(':deskripsi_produk', $deskripsi_produk);
        $this->db->bind(':status_produk', $status_produk);

        $result = $this->db->execute();

        if (!$result) {
            // Tangani jika update gagal
            return false;
        }

        // Perbarui sitemap
        return $this->updateSitemapWithNewSlug($id_produk, $slug_produk);
    }

    private function updateSitemapWithNewSlug($id_produk, $newSlug) {
        // Ambil produk berdasarkan ID
        $produk = $this->getProdukById($id_produk);
    
        if (!$produk) {
            // Produk tidak ditemukan
            return false;
        }
    
        $oldSlug = $produk['slug_produk'];
    
        // Perbarui sitemap dengan slug baru
        return $this->updateSitemap($newSlug, $oldSlug);
    }

    public function deleteProdukById($id)
    {
        // Ambil informasi produk berdasarkan ID
        $produk = $this->getProdukById($id);

        // Hapus file gambar dari direktori jika ada
        $imagePath = "../htdocs/assets/img/eksternal/produk/" . $produk['photo_produk'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Hapus data banner dari database
        $this->db->query("DELETE FROM produk WHERE id_produk = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->execute();

        if ($result) {
            $this->removeFromSitemap($produk['slug_produk']);
        }

        return $result;
    }

    // SITEMAP
    // Fungsi untuk menambahkan entri ke sitemap
    private function addToSitemap($slug)
    {
        $sitemapFile = __DIR__ . '/../../htdocs/sitemap-produk.xml'; // Path sistem file

        if (!file_exists($sitemapFile)) {
            // Buat file sitemap jika tidak ada
            $sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $sitemapContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
            file_put_contents($sitemapFile, $sitemapContent);
        }

        $sitemap = simplexml_load_file($sitemapFile);

        $url = $sitemap->addChild('url');
        $encodedSlug = urlencode($slug);
        $url->addChild('loc', BASE_URL . '/produk/pesan/' . $encodedSlug);
        $url->addChild('lastmod', date('Y-m-d\TH:i:sP'));

        $sitemap->asXML($sitemapFile);
    }

    // Fungsi untuk memperbarui entri di sitemap
    private function updateSitemap($newSlug, $oldSlug) {
        $sitemapFile = __DIR__ . '/../../htdocs/sitemap-produk.xml'; // Path sistem file
    
        if (!file_exists($sitemapFile)) {
            // Buat file sitemap jika tidak ada
            $sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $sitemapContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
            file_put_contents($sitemapFile, $sitemapContent);
        }
    
        $sitemap = simplexml_load_file($sitemapFile);
    
        if ($sitemap === false) {
            // Tangani kesalahan saat memuat sitemap
            return false;
        }
    
        // Hapus URL lama jika ada
        $updated = false;
        foreach ($sitemap->url as $index => $url) {
            if ($url->loc == BASE_URL . '/produk/pesan/' . $oldSlug) {
                unset($sitemap->url[$index]);
                $updated = true;
                break;
            }
        }
    
        // Tambahkan atau perbarui URL dengan slug baru
        if ($updated) {
            // Tambahkan entri baru dengan slug baru
            $url = $sitemap->addChild('url');
            $url->addChild('loc', BASE_URL . '/produk/pesan/' . $newSlug);
            $url->addChild('lastmod', date('Y-m-d\TH:i:sP'));
    
            // Simpan perubahan ke file sitemap
            if ($sitemap->asXML($sitemapFile) === false) {
                // Tangani kesalahan saat menyimpan sitemap
                return false;
            }
        } else {
            // Jika slug lama tidak ditemukan, tambahkan entri baru
            $url = $sitemap->addChild('url');
            $url->addChild('loc', BASE_URL . '/produk/pesan/' . $newSlug);
            $url->addChild('lastmod', date('Y-m-d\TH:i:sP'));
    
            // Simpan perubahan ke file sitemap
            if ($sitemap->asXML($sitemapFile) === false) {
                // Tangani kesalahan saat menyimpan sitemap
                return false;
            }
        }
    
        return true;
    }
    
    


    // Fungsi untuk menghapus entri dari sitemap
    private function removeFromSitemap($slug)
    {
        $sitemapFile = __DIR__ . '/../../htdocs/sitemap-produk.xml'; // Path sistem file

        if (!file_exists($sitemapFile)) {
            // Buat file sitemap jika tidak ada
            $sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $sitemapContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
            file_put_contents($sitemapFile, $sitemapContent);
        }

        $sitemap = simplexml_load_file($sitemapFile);

        foreach ($sitemap->url as $index => $url) {
            if ($url->loc == BASE_URL . '/produk/pesan/' . $slug) {
                unset($sitemap->url[$index]);
                break;
            }
        }

        $sitemap->asXML($sitemapFile);
    }
}
