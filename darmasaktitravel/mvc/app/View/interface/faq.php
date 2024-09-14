<?php require 'partials/top-bottom/header.php'; ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= BASE_URL ?>/assets/internal/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= BASE_URL ?>/">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>FAQ <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">FAQ</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="card">
                <div class="card-header" id="faqHeading1">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                            Bagaimana cara memesan paket wisata?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse1" class="collapse show" aria-labelledby="faqHeading1" data-parent="#faqAccordion">
                    <div class="card-body">
                        Anda dapat memesan paket wisata melalui situs web kami dengan memilih paket yang diinginkan dan mengikuti langkah-langkah pemesanan yang tersedia. Pembayaran dapat dilakukan secara online melalui metode yang tersedia.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="faqHeading2">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                            Apa kebijakan pembatalan pemesanan?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse2" class="collapse" aria-labelledby="faqHeading2" data-parent="#faqAccordion">
                    <div class="card-body">
                        Pembatalan pemesanan dapat dilakukan dengan memberi tahu kami minimal 48 jam sebelum tanggal keberangkatan. Biaya pembatalan mungkin berlaku sesuai dengan kebijakan kami. Harap hubungi layanan pelanggan kami untuk informasi lebih lanjut.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="faqHeading3">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                            Apakah Darmasakti Tour and Travel menyediakan layanan penjemputan dari bandara?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse3" class="collapse" aria-labelledby="faqHeading3" data-parent="#faqAccordion">
                    <div class="card-body">
                        Ya, kami menyediakan layanan penjemputan dari bandara untuk paket wisata tertentu. Silakan hubungi kami untuk informasi lebih lanjut mengenai layanan ini dan paket wisata yang termasuk layanan penjemputan.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="faqHeading4">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                            Bagaimana jika saya memiliki permintaan khusus untuk perjalanan saya?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse4" class="collapse" aria-labelledby="faqHeading4" data-parent="#faqAccordion">
                    <div class="card-body">
                        Kami dengan senang hati akan mencoba untuk mengakomodasi permintaan khusus Anda. Silakan hubungi tim layanan pelanggan kami dengan detail permintaan Anda, dan kami akan melakukan yang terbaik untuk memenuhi kebutuhan Anda.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="faqHeading5">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                            Apakah saya memerlukan asuransi perjalanan?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse5" class="collapse" aria-labelledby="faqHeading5" data-parent="#faqAccordion">
                    <div class="card-body">
                        Kami sangat menyarankan Anda untuk memiliki asuransi perjalanan yang mencakup pembatalan, kesehatan, dan kehilangan bagasi. Asuransi perjalanan akan memberikan perlindungan tambahan selama perjalanan Anda.
                    </div>
                </div>
            </div>
            <!-- Tambahkan pertanyaan dan jawaban sesuai kebutuhan -->
        </div>
    </div>
</section>

<?php require 'partials/top-bottom/footer.php'; ?>
