<style>
    /* .nav-sidebar {
        width: 100%;
        padding: 8px 0;
        border-right: 1px solid #ddd;
    }
    .nav-sidebar a {
        color: #333;
        -webkit-transition: all 0.08s linear;
        -moz-transition: all 0.08s linear;
        -o-transition: all 0.08s linear;
        transition: all 0.08s linear;
        border-radius: 0;
    }
    .nav-sidebar .active a {
        cursor: default;
        background-color: #428bca;
        color: #fff;
        text-shadow: 1px 1px 1px #666;
    }
    .nav-sidebar .active a:hover {
        background-color: #428bca;
    }
    .nav-sidebar .text-overflow a,
    .nav-sidebar .text-overflow .media-body {
        white-space: nowrap;
        overflow: hidden;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
    }
    .box-categories .fa-ul > li > * {
        line-height: inherit;
        margin: 0;
    } */
</style>

<!-- page title -->
<section class="page-title-section overlay" data-background="<?=base_url()?>assets/_tera_byte/images/backgrounds/page_title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb mb-2">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="<?=base_url()?>">Home</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Contact Us</li>
        </ul>
        <!-- <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p> -->
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<div class="col-md-12" style="padding-top: 50px;">
    <!-- <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li class="active">Kontak Kami</li>
        </ol>
    </div> -->
    <div class="col-md-12">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0669457572885!2d106.83771812167541!3d-6.254910880991312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3b584ed9e51%3A0x6fd21939873e8687!2sJl.%20Potlot%20III%2C%20Duren%20Tiga%2C%20Kec.%20Pancoran%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012760!5e0!3m2!1sid!2sid!4v1663058537660!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>
    <div class="col-md-12" style="padding-top: 100px;padding-bottom: 20px;">
        <h2><i class="fa fa-comments-o"></i> Kritik &amp; Saran pengembangan</h2>
        <p>Kirimkan saran dan kritik membangun agar pelayanan <?= $aplikasi->singkatan_unit ?> menjadi lebih baik. Silahkan email kami di :</p>
        <p><strong><a href="mailto:<?= $aplikasi->alamat_email ?>"><?= $aplikasi->alamat_email ?></a></strong></p>
        <!-- <h2><i class="fa fa-support"></i> Perlu bantuan</h2>
        <p>Dengan senang hati kami akan membantu anda apabila ada kesulitan dalam pengoperasian aplikasi ini. Temukan FAQ di <a href="<?= base_url() . 'faq-lsp' ?>">Halaman ini</a>. Jika anda masih kesulitan, hubungi kami di WA:</p>
        <p><strong><?= $aplikasi->sms_center?></strong></p> -->
    </div>
</div>
