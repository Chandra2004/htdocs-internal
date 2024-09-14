<?php require 'partials/top-bottom/header.php'; ?>
<style>
    .gallery {
        column-count: 3;
        column-gap: 1rem;
    }

    .gallery-item {
        break-inside: avoid;
        margin-bottom: 1rem;
    }
</style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= BASE_URL ?>/assets/internal/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= BASE_URL ?>/">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Galeri<i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Galeri</h1>
            </div>
        </div>
    </div>
</section>

<!-- Section Gallery -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Galeri Foto</h2>
                <p>Koleksi foto-foto terbaik kami.</p>
            </div>
        </div>
        <div class="container py-4">
            <div class="gallery">
                <?php foreach ($model['allGaleri'] as $index => $image) : ?>
                    <div class="gallery-item">
                        <img src="<?= BASE_URL ?>/assets/gallery/<?= $image['photo'] ?>" class="img-fluid" alt="<?= $image['nama'] ?>" data-toggle="modal" data-target="#galleryModal<?= $index ?>">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="galleryModal<?= $index ?>" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel<?= $index ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="galleryModalLabel<?= $index ?>"><?= $image['nama'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                                            <img src="<?= BASE_URL ?>/assets/gallery/<?= $image['photo'] ?>" class="img-fluid shadow-sm rounded" alt="<?= $image['nama'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <p>Deskripsi Foto : <?= $image['deskripsi'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php require 'partials/top-bottom/footer.php'; ?>