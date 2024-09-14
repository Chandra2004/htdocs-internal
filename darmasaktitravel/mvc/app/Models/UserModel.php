<?php
// app/Models/UserCarModel.php

namespace Darmasaktitravel\Carrent\Models;

use Darmasaktitravel\Carrent\App\Database;

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserByIdentifier($identifier) {
        $this->db->query("SELECT * FROM users WHERE username = :identifier OR email = :identifier LIMIT 1");
        $this->db->bind(':identifier', $identifier);
        return $this->db->single();
    }
}