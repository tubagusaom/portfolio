<footer id="footer">
        <div class="container">
          <div class="row">
            <div class="footer-ribbon">
              <span>LSP PUSPA INTEGRITAS BANGSA</span>
            </div>
            <div class="col-md-3">
              <div class="newsletter">
                <h4>Berita Terkini</h4>
            <ul class="widget-2">
                <?php
                foreach ($berita_lainnya as $key => $value) {
                    ?>
                    <li>
                        <a href="<?=base_url().'profile/index/'.$value->id?>"><?= $value->judul ?></a>
                    </li>
                <?php } ?>

            </ul>
              </div>
            </div>
            <div class="col-md-3">
              <div class="contact-details">
                <h4>Link Terkait</h4>
                <ul class="contact">
                  <li><a href="http://bnsp.go.id/">BNSP</a></li>
                  <li><a href="http://www.naker.go.id/">KEMNAKER</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3">
              <div class="contact-details">
                <h4>Contact Us</h4>
                <ul class="contact">
                  <li><p><i class="fa fa-map-marker"></i> <strong>Alamat:</strong> <?=$aplikasi->alamat?></p></li>
                  <li><p><i class="fa fa-phone"></i> <strong>Phone: <?=$aplikasi->no_telpon?></strong></p></li>
                  <li><p><i class="fa fa-fax"></i> Fax: <?=$aplikasi->no_fax?></p></li>
                  <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:<?=$aplikasi->alamat_email?>"><?=$aplikasi->alamat_email?></a></p></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3">
              <h4>Statistik Pengunjung</h4>

              <p style="font-size: 18px;">Hari ini : <?=$pengunjungHariIni?></p>
              <p style="font-size: 18px;">Total : <?=$totalPengunjung;?></p>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <p>© Copyright 2019. Develoved by <a href="http://indonesia-kompeten.com" target="_blank">Indonesia Kompeten</a></p>
              </div>
              <div class="col-md-4">
                <nav id="sub-menu">
                  <ul>
                    <li><a href="<?= site_url().'' ?>">Home</a></li>
                    <li><a href="<?= site_url().'album_galeri/galeri_album' ?>">Galeri</a></li>
                    <li><a href="<?= site_url().'faq/view' ?>">FAQ's</a></li>
                    <li><a href="<?= site_url().'kontak/view' ?>">Kontak</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Vendor -->
    <script src="<?=base_url()?>assets/vendor/jquery.appear/jquery.appear.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstraps/bootbox.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/vendor/common/common.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/jquery.validation/jquery.validation.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/jquery.gmap/jquery.gmap.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/isotope/jquery.isotope.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/vide/vide.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="<?=base_url()?>assets/js/theme.js"></script>

    <!-- Current Page Vendor and Views -->
    <script src="<?=base_url()?>assets/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
    <script src="<?=base_url()?>assets/js/views/view.home.js"></script>
    <script src="<?=base_url()?>assets/vendor/nivo-slider/jquery.nivo.slider.min.js"></script>

    <!-- Theme Custom -->
    <script src="<?=base_url()?>assets/js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="<?=base_url()?>assets/js/theme.init.js"></script>

    <script src="<?php echo base_url() ?>assets/js/examples/examples.demos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/examples/examples.gallery.js"></script>

    <script src="<?php echo base_url() ?>assets\js\demos\demo-construction.js"></script>
    <script src="<?php echo base_url() ?>assets\js\views\view.home.js"></script>

  </body>
</html>
