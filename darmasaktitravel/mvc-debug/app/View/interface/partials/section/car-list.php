<section class="ftco-section">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Apa yang kami punya</span>
                <h2 class="mb-2">Pilih Kendaraan Anda</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($model['allMobil'] as $mobil) : ?>
                <div class="col-md-3">
                    <div class="car-wrap ftco-animate">
                        <div class="img d-flex align-items-end" style="background-image: url(<?= BASE_URL ?>/assets/cars/<?= $mobil['photo'] ?>);">
                            <div class="price-wrap d-flex">
                                <div class="icon">
                                    <span class="flaticon-car-seat" style="width: 20px;"></span>
                                    <span>Kapasitas &nbsp;</span>
                                </div>
                                <span class="rate"><?= $mobil['kursi_mobil'] ?></span>
                                <p class="from-day">
                                    <span>Kursi</span>
                                    <span>/Dewasa</span>
                                </p>
                            </div>
                        </div>
                        <div class="text p-4 text-center">
                            <h2 class="mb-0"><a href="<?= BASE_URL ?>/details/nama-mobil/<?= $mobil['slug_mobil'] ?>"><?= $mobil['nama_mobil'] ?></a></h2>
                            <span><?= $mobil['merk_mobil'] ?></span>
                            <p class="d-flex mb-0 d-block"><a href="https://wa.me/6285730676143?text=*Halo%20Darma%20Sakti%20Travel*,%0A%0ASaya%20ingin%20menyewa%20mobil%20dengan%20spesifikasi%20sebagai%20berikut:%0A%0AMerk%20Mobil%3A%20*<?= $mobil['merk_mobil'] ?>*%0ANama%20Mobil%3A%20*<?= $mobil['nama_mobil'] ?>*%0A%0AApakah%20mobil%20tersebut%20tersedia%20saat%20ini%3F%0A%0ATerima%20kasih." class="btn btn-black btn-outline-black mr-1">Book now</a>
                                <a href="<?= BASE_URL ?>/details/nama-mobil/<?= $mobil['slug_mobil'] ?>" class="btn btn-black btn-outline-black ml-1">Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>