<?php require 'partials/top-bottom/header.php'; ?>

<div class="hero-wrap" style="background-image: url('<?= BASE_URL ?>/assets/internal/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center">
            <div class="col-lg-6 col-md-6 ftco-animate d-flex align-items-end">
                <div class="text">
                    <h1 class="mb-4">Sekarang <span>lebih mudah untuk kamu</span> <span>menyewa mobil</span></h1>
                    <p style="font-size: 18px;">Destinasi Terbaik di Seluruh Indonesia Jelajahi, nikmati, dan temukan pengalaman baru. Tour dan travel antar kota di seluruh Indonesia dengan Darma Sakti Travel.</p>
                    <a href="<?= LINK_VIDEO ?>" class="icon-wrap popup-vimeo d-flex align-items-center mt-4">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="ion-ios-play"></span>
                        </div>
                        <div class="heading-title ml-5">
                            <span>Cara mudah untuk menyewa mobil</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col"></div>
            <div class="col-lg-4 col-md-6 mt-0 mt-md-5 d-flex">
                <form action="<?= BASE_URL ?>/booking/now" method="POST" class="request-form ftco-animate">
                    <h2>Booking Cepat Sekarang</h2>
                    <div class="d-flex">
                        <div class="form-group mr-2">
                            <label for="nama" class="label">Atas Nama</label>
                            <input required name="nama" id="nama" type="text" class="form-control" placeholder="Mariana Juliete">
                        </div>
                        <div class="form-group ml-2">
                            <label for="lokasi" class="label">Lokasi Jemput</label>
                            <input required name="lokasi" id="lokasi" type="text" class="form-control" placeholder="Kota, Bandara, Stasiun, dsb">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="model" class="label">Model Mobil</label>
                        <select required name="model" id="model" class="form-control">
                            <option value="" disabled selected>Tolong Pilih Mobil Anda</option>
                            <?php foreach ($model['allMobil'] as $mobil) : ?>
                                <option value="<?= $mobil['merk_mobil'] ?> | <?= $mobil['nama_mobil'] ?>"><?= $mobil['merk_mobil'] ?> | <?= $mobil['nama_mobil'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-flex">
                        <div class="form-group mr-2">
                            <label for="book_pick_date" class="label">Tanggal Awal Booking</label>
                            <input required name="tanggalAwal" type="text" class="form-control" id="book_pick_date" placeholder="Pilih Tanggal Awal">
                        </div>
                        <div class="form-group ml-2">
                            <label for="book_off_date" class="label">Tanggal Akhir Booking</label>
                            <input required name="TanggalAkhir" type="text" class="form-control" id="book_off_date" placeholder="Pilih Tanggal Akhir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time_pick" class="label">Jam Booking</label>
                        <input required name="jamBooking" type="text" class="form-control" id="time_pick" placeholder="Pilih Jam">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Booking Sekarang" class="btn btn-primary py-3 px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Section Layanan Kami -->
<?php require 'partials/section/layanan-kami.php'; ?>

<!-- Section List -->
<?php require 'partials/section/car-list.php'; ?>


<!-- Section Bagaimana Cara Bekerja -->
<?php require 'partials/section/bagaimana-cara-bekerja.php'; ?>

<!-- Section Testimonials -->
<?php require 'partials/section/testimonials.php'; ?>

<!-- Section About Us -->
<?php require 'partials/section/about.php'; ?>

<?php require 'partials/top-bottom/footer.php'; ?>