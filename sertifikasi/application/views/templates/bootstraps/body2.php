<style type="text/css">

.text {
  text-align: justify;
  color: #16A085;
}

</style>

<div role="main" class="main" id="home">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Carousel indicators -->
          <ol class="carousel-indicators">
            <?php
              $no_to=0;
              foreach($slideshow as $key=>$value){

                if ($no_to==0) {
                  $classto="active";
                }else {
                  $classto="lsp@gmail.com";
                }
            ?>
              <li data-target="#myCarousel" data-slide-to="<?=$no_to ?>" class="<?=$classto ?>"></li>
            <?php $no_to++;} ?>
              <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li> -->
          </ol>
          <!-- Wrapper for carousel items -->
          <div class="carousel-inner">
            <?php
              $no_slide=1;
              foreach($slideshow as $key=>$value){

                if ($no_slide==1) {
                  $classslide="item active";
                }else {
                  $classslide="item";
                }
            ?>
              <div class="<?=$classslide ?>">
                  <img src="<?php echo base_url()."assets/img/slides/".$value->foto_slide ?>" alt="LSP KIMIA INDUSTRI" style="width:100%; height:100%">
                    <div class="carousel-caption">
                    <h3><?=$value->nama_slide1 ?></h3>
                    <h6><?=$value->nama_slide2 ?></h6>
                  </div>
              </div>
            <?php $no_slide++;} ?>
          </div>
          <!-- Carousel controls -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>

          <section class="call-to-action call-to-action-primary call-to-action-front">
            <div class="row">
                <div class="call-to-action-content align-center mb-none">
                    <h3>Lembaga Sertifikasi Profesi <strong>PUSPA INTEGRITAS BANGSA</strong></h3>
                    <p>Puspa Integritas Bangsa is an organisation and an active network of committed NGOs, universities and policy makers, working closely with governments, media organisations, businesses and our peers to identify ways of making integrity work in some of the world’s challenging settings.</p>
                </div>
                <div class="call-to-action-btn">
                    <a href="<?= base_url().'uji_kompetensi.html'?>" target="_blank" class="btn btn-lg btn-primary btn-primary-scale-2 mr-md">Daftar Sekarang</a>
                </div>
            </div>
          </section>


    <section style="margin-bottom:50px;">
      <div class="row">
        <div class="col-md-12 center">
          <h2 class="mt-xl mb-none">Daftar Skema Sertifikasi <strong><?=$aplikasi->singkatan_unit?></strong> <span class="alternative-font font-size-md">New!</span></h2>
        </div>
      </div>

      <div class="owl-carousel owl-theme full-width" data-plugin-options="{'items': 5, 'loop': false, 'nav': true, 'dots': false}">
              <?php foreach ($data_skema as $value) {  ?>
              <div>
                <a href="<?=base_url().'detail-skema/'.$value->id?>">
                  <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                    <span class="thumb-info-wrapper">
                      <img src="<?=base_url().'assets/img/icons/'.$value->foto?>" class="img-responsive" title="skema LSP PIB">
                      <span class="thumb-info-title">
                        <span class="thumb-info-inner"><?= $value->skema ?></span>
                        <span class="thumb-info-type">Selengkapnya</span>
                      </span>
                      <span class="thumb-info-action">
                        <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                      </span>
                    </span>
                  </span>
                </a>
              </div>
            <?php } ?>
      </div>
    </section>

    <section class="section section-primary">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="mb-xs">Berita <strong>LSP</strong></h2>
            <div class="row">
              <?php foreach ($berita_lsp_pilihan as $value) { ?>
                <div class="col-md-6">
                  <div class="recent-posts mt-xl">
                    <article class="post">
                      <div class="date">
                        <span class="day">15</span>
                        <span class="month background-color-secondary">Jan</span>
                      </div>
                      <h4><a class="text-light" href="blog-post.html"><?=word_limiter($value->headline,5)?></a></h4>
                      <p><?= $value->headline ?></p>
                      <a href='<?=base_url()."profile/index/".$value->id?>' class="btn btn-secondary mt-md mb-xl">Read More</a>
                    </article>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-6">

            <h2 class="mb-xs">Status <strong>LSP</strong></h2>

            <div class="content-grid content-grid-dashed mt-xlg mb-lg">
              <div class="row content-grid-row">
                <div class="content-grid-item col-md-6 center">
                  <div class="counters">
                    <div class="counter text-color-light">
                      <i class="icon-book-open icons"></i>
                      <strong data-to="<?= $total_skema; ?>">0</strong>
                      <label>Skema Sertifikasi</label>
                    </div>
                  </div>
                </div>
                <div class="content-grid-item col-md-6 center">
                  <div class="counters">
                    <div class="counter text-color-light">
                      <i class="icon-user icons"></i>
                      <strong data-to="<?= $total_asesor; ?>">0</strong>
                      <label>Asesor Kompetensi</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row content-grid-row">
                <div class="content-grid-item col-md-6 center">
                  <div class="counters">
                    <div class="counter text-color-light">
                      <i class="icon-people icons"></i>
                      <strong data-to="352">0</strong>
                      <label>Pemegang Sertifikat</label>
                    </div>
                  </div>
                </div>
                <div class="content-grid-item col-md-6 center">
                  <div class="counters">
                    <div class="counter text-color-light">
                      <i class="icon-directions icons"></i>
                      <strong data-to="<?= $total_tuk; ?>">0</strong>
                      <label>Tempat Uji Kompetensi</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


    <div class="container">
      <div class="row">
        <div class="col-md-12 center">
          <h2 class="mt-xl mb-none">Menu <strong>Popular</strong> <span class="alternative-font font-size-md">LSP!</span></h2>
        </div>
      </div>
      <hr style="border:3px;">
      <div class="row mt-xl mb-xl">
        <a href="<?=base_url();?>sertifikasi/vskema">
        <div class="col-md-3">
          <img class="img-responsive mt-xl appear-animation" src="<?php echo base_url() ?>assets/img/icons/skema.png" alt="" data-appear-animation="fadeInLeft">
        </div>
        <div class="col-md-9">
          <h2 class="mt-xl">Skema <strong>Sertifikasi</strong></h2>
          <p>
            merupakan persyaratan sertifikasi spesifik yang berkaitan dengan kategori profesi yang ditetapkan dengan menggunakan standar dan aturan khusus yang sama, serta prosedur yang sama.
          </p>
        </div>
        </a>
      </div>
    </div>
    <section class="section section-default">
      <div class="container">
        <div class="row">
          <a href="<?=base_url();?>daftar-asesor">
          <div class="col-md-9">
            <h2>Asesor <strong>Kompetensi</strong></h2>
            <p>
              adalah seseorang yang memahami prosedur pelaksanaan assessment, dan telah mengikuti pelatihan assessor serta telah mendapat sertifikat kompeten sebagai assessor yang dikeluarkan oleh Badan Nasional Sertifikasi Profesi (BNSP).
            </p>
          </div>
          <div class="col-md-3">
            <img class="hidden-xs img-responsive appear-animation" style="margin-top: -100px;" src="<?php echo base_url() ?>assets/img/icons/asesor.png" alt="" data-appear-animation="fadeInRight">
          </div>
          </a>
        </div>
      </div>
    </section>

    <div class="container">
      <div class="row mt-xl mb-xl">
        <a href="<?=base_url();?>daftar-pemegang-sertifikat">
        <div class="col-md-3">
          <img class="img-responsive mt-xl appear-animation" src="<?php echo base_url() ?>assets/img/icons/pemegang-sertifikat.png" alt="" data-appear-animation="fadeInLeft">
        </div>
        <div class="col-md-9">
          <h2 class="mt-xl">Pemegang <strong>Sertifikat</strong></h2>
          <p>
            adalah seseorang yang telah mengikuti proses asessment melalui Lembaga Sertifikasi Profesi dan dinyatakan kompeten pada bidangnya.
          </p>
        </div>
        </a>
      </div>
    </div>

    <section class="section" id="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12 center">
            <h2 class="word-rotator-title mb-sm">Foto <strong>Kegiatan</strong> <span class="alternative-font font-size-md">LSP!</span></h2>
          </div>
        </div>
        <hr style="border:3px;">

          <ul class="portfolio-list sort-destination lightbox" data-sort-id="portfolio" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                  <?php foreach ($galeri as $key => $value) { ?>
                      <li class="col-md-3 col-xs-12 ">
                          <div class="portfolio-item">
                              <span class="thumb-info thumb-info-lighten thumb-info-bottom-info thumb-info-centered-icons">
                                  <span class="thumb-info-wrapper">
                                      <img src="<?php echo base_url().'assets/img/gallery/'.$value->foto ?>" alt="" style="width: 100%; height: 250px;">
                                      <span class="thumb-info-title">
                                          <span class="thumb-info-inner">
                                          <?php echo $value->keterangan; ?>
                                          </span>
                                      </span>
                                      <span class="thumb-info-action">
                                          <a href="<?php echo base_url().'assets/img/gallery/'.$value->foto ?>" class="lightbox-portfolio">
                                              <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fa fa-search-plus"></i></span>
                                          </a>
                                      </span>
                                  </span>
                              </span>
                          </div>
                      </li>
                  <?php } ?>
          </ul>
      </div>
    </section>
