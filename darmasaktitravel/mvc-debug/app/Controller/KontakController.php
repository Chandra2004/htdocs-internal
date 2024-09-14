<?php

namespace Darmasaktitravel\Carrent\Controller;

use Darmasaktitravel\Carrent\App\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class KontakController
{
    function index()
    {
        $model = [
            'title' => 'Kontak Tour and Travel | Darma Sakti Travel Bandung'
        ];

        View::render('interface/kontak', $model);
    }

    function emailSender()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['message']);

            // Format pesan WhatsApp
            $whatsappMessage = urlencode(
                " _*Hallo Darma Sakti Travel Anda Dapat Pesan*_\n\nEmail : $email\nNama : $name\nSubjek : $subject\n\nPesan :\n $message"
            );

            // Nomor WhatsApp tujuan
            $whatsappNumber = '6285730676143';

            // URL WhatsApp
            $whatsappURL = "https://wa.me/$whatsappNumber?text=$whatsappMessage";

            // Arahkan ke URL WhatsApp
            header('Location: ' . $whatsappURL);
            exit();
        }
    }
}
?>
