<?php if ($model['detail']) : ?>

    <?php require 'partials/top-bottom/header.php'; ?>
    <style>
        .car-image {
            width: 100%;
            height: auto;
            background-size: cover;
            background-position: center;
        }
    </style>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= BASE_URL ?>/assets/cars/<?= $model['detail']['photo'] ?>')" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span>
                        <span>Car details <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                    <h1 class="mb-3 bread"><?= $model['detail']['nama_mobil']; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="text text-center">
                            <span class="subheading"><?= $model['detail']['merk_mobil']; ?></span>
                            <h2><?= $model['detail']['nama_mobil']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon">
                                    <span class="flaticon-dashboard"></span>
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Kilometer
                                        <span><?= $model['detail']['kilometer_mobil']; ?></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon">
                                    <span class="flaticon-car-machine"></span>
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Transmisi
                                        <span><?= $model['detail']['transmisi_mobil']; ?></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon">
                                    <span class="flaticon-car-seat"></span>
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Kursi
                                        <span><?= $model['detail']['kursi_mobil']; ?> Dewasa</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon">
                                    <span class="flaticon-backpack"></span>
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Bagasi
                                        <span><?= $model['detail']['bagasi_mobil']; ?> Tas</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon"><span class="flaticon-diesel"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Jenis Bensin
                                        <span><?= $model['detail']['jenis_mobil']; ?></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-booknow-tab" data-toggle="pill" href="#pills-booknow" role="tab" aria-controls="pills-booknow" aria-expanded="true">Book Now</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-booknow" role="tabpanel" aria-labelledby="pills-booknow-tab">
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
                                        <input required name="model" id="lokasi" type="text" class="form-control" value="<?= $model['detail']['nama_mobil'] ?>" readonly>
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

                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <?= $model['detail']['deskripsi_mobil']; ?>
                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    -- Kirim Testimonial Disini --
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="<?= BASE_URL ?>/testimonial/submit" method="POST" class="request-form ftco-animate">
                                                    <?php if (isset($_GET['testimonial'])) : ?>
                                                        <div class="alert <?= $_GET['testimonial'] === 'success' ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                                                            <?= $_GET['testimonial'] === 'success' ? 'Testimonial Anda Sukses Terkirim.' : 'Testimonial Anda Gagal Terkirim.'; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (isset($_GET['required'])) : ?>
                                                        <div class="alert <?= $_GET['required'] === 'failed' ? 'alert-danger' : 'alert-success'; ?>" role="alert">
                                                            <?= $_GET['required'] === 'failed' ? 'Harap Isi Semua Input.' : 'Testimonial Anda sukses Terkirim.'; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <h2>Beri Testimonial</h2>
                                                    <div class="form-group">
                                                        <label for="nama" class="label">Nama</label>
                                                        <input required name="nama" id="nama" type="text" class="form-control" placeholder="Nama Anda">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="posisi" class="label">Posisi</label>
                                                        <input required name="posisi" id="posisi" type="text" class="form-control" placeholder="Posisi atau Jabatan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rating" class="label">Rating: <span id="ratingValue">3</span></label>
                                                        <input required name="rating" id="rating" type="range" class="form-control-range" min="1" max="5" step="0.1" value="3" oninput="updateRatingValue(this.value)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi" class="label">Deskripsi</label>
                                                        <textarea required name="deskripsi" id="deskripsi" class="form-control" rows="5" placeholder="Tulis testimonial Anda disini"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="testimonial" value="Kirim Testimonial" class="btn btn-primary py-3 px-4">
                                                    </div>
                                                </form>

                                                <script>
                                                    function updateRatingValue(value) {
                                                        document.getElementById('ratingValue').innerText = value;
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <hr class="w-75">

                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="head"><?= $model['totalTestimonial'] ?> Reviews <?= $model['averageTestimonial'] ?></h3>
                                        <?php foreach ($model['allTestimonial'] as $testi) : ?>
                                            <?php
                                            $timestamp = $testi['timestamp'];
                                            $dateObj = date_create($timestamp);
                                            $date = date_format($dateObj, "d F Y");
                                            $date = ucfirst($date);
                                            $time = date_format($dateObj, "H:i");
                                            ?>
                                            <div class="review d-flex">
                                                <div class="">
                                                    <p><?= $testi['nama_testi'] ?> | <?= $testi['posisi_testi'] ?></p>
                                                    <div class="d-flex align-items-center">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                        </span>&nbsp;
                                                        <span><?= $testi['rating_testi'] . ' | ' ?>&nbsp;</span>
                                                        <span><?= $date . ' | ' . $time . ' WIB' ?></span>
                                                    </div>
                                                    <p>
                                                        <?= $testi['deskripsi_testi'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section List -->
    <?php require 'partials/section/car-list.php'; ?>

    <?php require 'partials/top-bottom/footer.php'; ?>

<?php endif; ?>