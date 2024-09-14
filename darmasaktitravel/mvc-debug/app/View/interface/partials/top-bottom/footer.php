<?php
$file = __DIR__ . "/../../../counter.txt";  // Pastikan path ini sesuai dengan lokasi file Anda
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
?>
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Tentang Darma Sakti Travel</h2>
                    <p>Dengan Darma Sakti Travel, setiap perjalanan adalah petualangan yang menunggu.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="https://www.instagram.com/darmasaktitravel"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Informasi</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?= BASE_URL ?>/tentang" class="py-2 d-block">Tentang</a></li>
                        <li><a href="<?= BASE_URL ?>/list-mobil" class="py-2 d-block">Layanan</a></li>
                        <li><a href="<?= BASE_URL ?>/terms-and-condition" class="py-2 d-block">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Pelayanan Customer</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?= BASE_URL ?>/faq" class="py-2 d-block">FAQ</a></li>
                        <li><a href="<?= BASE_URL ?>/opsi-pembayaran" class="py-2 d-block">Opsi Pembayaran</a></li>
                        <li><a href="<?= BASE_URL ?>/tips-booking" class="py-2 d-block">Tips Booking</a></li>
                        <li><a href="<?= BASE_URL ?>/kontak" class="py-2 d-block">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Jl. Darma Sakti No.33 Mekarwangi, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40236</span></li>
                            <li><a href="https://wa.me/628122346660" target="_blank"><span class="icon icon-phone"></span><span class="text">+62 812-2346-660</span></a></li>
                            <li><a href="https://wa.me/6282120419151" target="_blank"><span class="icon icon-phone"></span><span class="text">+62 821-2041-9151</span></a></li>
                            <li><a href="mailto:darmasaktitravel@gmail.com"><span class="icon icon-envelope"></span>&nbsp;&nbsp;<span class="text">darmasaktitravel@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p style="background-color: #2c3e50; padding: 10px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <span id="visitorCountText" style="font-weight: semibold; color: #ecf0f1; font-size: 12px;">Darma Sakti Travel telah dikunjungi oleh:</span>
                    <span id="visitorCount" style="display: inline-block; background-color: #1abc9c; color: #fff; padding: 10px 15px; font-size: 18px; font-family: 'Courier New', monospace; border-radius: 5px; margin: 0 10px;"><?= $counter ?></span>
                    <span id="visitorCountSuffix" style="font-weight: bold; color: #ecf0f1; font-size: 12px;">orang</span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://www.instagram.com/chandratriantomo.2077" target="_blank">LUMINO</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


<script src="<?= BASE_URL ?>/js/jquery.min.js"></script>
<script src="<?= BASE_URL ?>/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= BASE_URL ?>/js/popper.min.js"></script>
<script src="<?= BASE_URL ?>/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>/js/jquery.easing.1.3.js"></script>
<script src="<?= BASE_URL ?>/js/jquery.waypoints.min.js"></script>
<script src="<?= BASE_URL ?>/js/jquery.stellar.min.js"></script>
<script src="<?= BASE_URL ?>/js/owl.carousel.min.js"></script>
<script src="<?= BASE_URL ?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?= BASE_URL ?>/js/aos.js"></script>
<script src="<?= BASE_URL ?>/js/jquery.animateNumber.min.js"></script>
<script src="<?= BASE_URL ?>/js/bootstrap-datepicker.js"></script>
<script src="<?= BASE_URL ?>/js/jquery.timepicker.min.js"></script>
<script src="<?= BASE_URL ?>/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= BASE_URL ?>/js/google-map.js"></script>
<script src="<?= BASE_URL ?>/js/main.js"></script>

</body>

</html>