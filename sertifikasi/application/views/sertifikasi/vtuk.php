<div class="body">

  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="<?=base_url();?>welcome/lsp">Home</a></li>
            <li class="active">TUK</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h1>TEMPAT UJI KOMPETENSI</h1>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
     <div class="row">
    <div class="col-md-12">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.160837545341!2d106.84985891449372!3d-6.242523195481364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3bb43483cf3%3A0x38c9c80826b0ecd6!2sWisma+Pede%2C+Jl.+Letjen+M.T.+Haryono+No.Kav+17%2C+RT.11%2FRW.5%2C+Tebet+Bar.%2C+Tebet%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12810!5e0!3m2!1sid!2sid!4v1532053025016" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
    <div class="col-md-12">
      <div class="row">

        <?php foreach($data as $key=>$value){?>
          <div class="col-md-3 col-sm-6">
            <div class="featured-box featured-box-tertiary featured-box-effect-1 mt-xlg">
              <div class="box-content" style="height: 400px;">
                <i class="icon-featured fa fa-location-arrow"></i>
                <h4 class="text-uppercase"><?=$value->tuk?></h4>
                <p><?=$value->alamat?></p>
                <p><?=$value->kabupaten?></p>
                <p><?=$value->telp?></p>
                <!-- <p><a href="/" class="lnk-tertiary learn-more">Learn more <i class="fa fa-angle-right"></i></a></p> -->
              </div>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>


  </div>

</div>
