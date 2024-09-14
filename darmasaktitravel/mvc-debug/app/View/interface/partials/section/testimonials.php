<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-3">Klien Bangga</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <?php $counter = 0;
                    $limit = 5; ?>
                    <?php foreach ($model['allTestimonial'] as $testi) : ?>
                        <?php
                        if ($counter >= $limit) {
                            break;
                        }
                        ?>
                        <div class="item text-center">
                            <div class="testimony-wrap py-4 pb-5">
                                <div class="text pt-4">
                                    <p class="name"><?= $testi['nama_testi'] ?></p>
                                    <span class="position"><?= $testi['posisi_testi'] ?></span>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>&nbsp;
                                        <span><?= $testi['rating_testi'] ?></span>
                                    </div>
                                    <p class="mb-4"><?= $testi['deskripsi_testi'] ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                        $counter++
                        ?>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>