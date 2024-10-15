<style media="screen">
.a-tb {
 color: #999;
}

.a-tb:hover {
 color: rgb(255, 210, 0);
}
</style>

<!-- <div id="mainContent" >
<div class="headerContent" >
<div class="container">
<div class="row">
<div class="col-md-12" style="background-color: white;padding-top: 20px;padding-bottom: 20px;width: 96%;margin-left: 15px;padding-left: 2px;padding-right: 2px">
    <div>

        <div class="col-md-12">
            <ol class="breadcrumb" style="background-color: rgb(0, 126, 205);">
                <li><a href="<?=base_url()?>">Home</a></li>
                <li style="color: #333333" class="active">Kontak</li>
            </ol><br />

				<div class="col-md-5">
        <h4>KONTAK <?=strtoupper($aplikasi->singkatan_unit)?></h4>
        </div>
        <div class="col-md-7">

        </div>
    	<div class="col-md-12"> -->


      <div role="main" class="main">
      <section class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li>
                  <a href="<?=base_url() ?>" class="a-tb">
                          <i class="fa fa-home"></i> Home
                        </a>
                </li>
                <!-- <li class="active">Media Informasi</li> -->
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h1>
                      KONTAK KAMI
                    </h1>
            </div>
          </div>
        </div>
      </section>


      <div class="container">
        <div class="row">
          <div class="col-md-12">


            <div class="col-md-12">

              <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.067527049118!2d106.83974876449358!3d-6.25483426298095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3b5834ae785%3A0x67a609d65f41b863!2sPulau+Biru+Indonesia+%2F+Slank+Studio!5e0!3m2!1sid!2sid!4v1554245732067!5m2!1sid!2sid"
                    width="100%"
                    height="300"
                    frameborder="0"
                    style="border:0"
					allowfullscreen>
                 </iframe>
            </div>
			<div class="col-md-12" style="background-color: white;padding-top: 20px;padding-bottom: 20px;width: 96%;margin-left: 15px;padding-left: 2px;padding-right: 2px"></div>
             <div class="col-md-7 ">
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo base_url();?>com_kontak/send_kontak">
                    <div class="col-md-12">
                        <label>Nama Depan</label>
                        <input type="text" class="form-control" name="txtfirstname" id="txtfirstname" required="required" placeholder="Your First Name">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control" name="txtlastname" id="txtlastname" required="required" placeholder="Your Last Name">
                        <label>Alamat Email</label>
                        <input type="text" class="form-control" name="txtemail" id="txtemail" required="required" placeholder="Your Email">
                    </div>
                    <div class="col-md-12">
                        <label>Pesan</label>
                        <textarea name="txtmessage" name="txtmessage" id="txtmessage" required="required" class="form-control" rows="8"></textarea>
                        <br />
                        <button type="submit" class="btn btn-primary btn-large pull-right">Send Message</button>
                    </div>
                </form>
            </div>

            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    <h4>Contact Person</h4>
                    <p><?=$aplikasi->singkatan_unit?></p>
                    <!-- <p>
                        <i class="fa fa-home "></i> <?=$aplikasi->alamat?>
                    </p> -->
                    <p>
                        <i class="fa fa-envelope"></i> &nbsp;<?=$aplikasi->alamat_email?>
                    </p>
                    <p>
                        <i class="fa fa-phone-square"></i> &nbsp;P: <?=$aplikasi->no_telpon?>
                    </p>
                    <p>
                        <i class="fa fa-fax"></i> &nbsp;F: <?=$aplikasi->no_fax?>
                    </p>
                    <p>
                        <i class="fa fa-globe"></i> &nbsp;<?=$aplikasi->url_aplikasi?>
                    </p>
                </div>
            </div>

          </div>
      </div>
    </div>
</div>
