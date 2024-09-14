<?php require 'partials/top-bottom/header.php'; ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= BASE_URL ?>/assets/internal/bg_2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?= BASE_URL ?>/">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Kontak <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Kontak Kami</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex mb-5 contact-info justify-content-center">
      <div class="col-md-8">
        <div class="row mb-5">
          <div class="col-md-4 text-center py-4">
            <div class="icon">
              <span class="icon-map-o"></span>
            </div>
            <p><span>Address:</span> Jl. Darma Sakti No.33 Mekarwangi, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40236</p>
          </div>
          <div class="col-md-4 text-center border-height py-4">
            <div class="icon">
              <span class="icon-mobile-phone"></span>
            </div>
            <p><span>Phone:</span>
              <a href="https://wa.me/628122346660">+62 812-2346-660</a><br>
              <a href="https://wa.me/6282120419151">+62 821-2041-9151</a>
            </p>
          </div>
          <div class="col-md-4 text-center py-4">
            <div class="icon">
              <span class="icon-envelope-o"></span>
            </div>
            <p><span>Email:</span> <a href="mailto:darmasaktitravel@gmail.com">darmasaktitravel@gmail.com</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row block-9 justify-content-center mb-5">
      <div class="col-md-8 mb-md-5">
        <h2 class="text-center">If you got any questions <br>please do not hesitate to send us a message</h2>
        <form action="<?= BASE_URL ?>/kontak/send-email" method="POST" class="bg-light p-5 contact-form">
          <?php if (isset($_GET['email-send'])): ?>
            <div class="alert <?= $_GET['email-send'] === 'success' ? 'alert-success' : 'alert-danger'; ?>" role="alert">
              <?= $_GET['email-send'] === 'success' ? 'Email Anda Sukses Terkirim.' : 'Email Anda Gagal Terkirim.'; ?>
            </div>
          <?php endif; ?>
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10" style="width: 80%; margin-left: auto; margin-right: auto;">
        <div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4491420612558!2d107.59747347606134!3d-6.956226793044101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8e9a5544083%3A0x8c0c44225f74d8eb!2sJl.%20Darma%20Sakti%20No.33%2C%20Mekarwangi%2C%20Kec.%20Bojongloa%20Kidul%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040236!5e0!3m2!1sid!2sid!4v1722944912190!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require 'partials/top-bottom/footer.php'; ?>