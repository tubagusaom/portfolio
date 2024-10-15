<div role="main" class="main">

  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
            <ul class="breadcrumb">
              <li class="active">Pendaftaran</li>
            </ul>
                </h1>
        </div>
      </div>
    </div>
  </section>

  <section class="form-section register-form">
    <div class="container">

      <?php if($this->session->flashdata('result')!=''){ ?>

          <div id="Div-Alert" class="alert alert-<?=$this->session->flashdata('mode_alert')?>" role="alert">
            <button class="close" onclick="hide()">×</button>
            <?php echo $this->session->flashdata('result'); ?>
          </div>

      <?php } ?>

      <h1 class="h2 heading-primary font-weight-normal mb-md mt-lg">DAFTAR MEMBER</h1>

      <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
        <div class="box-content">
          <form action="<?=base_url().'daftar-member-save'?>" method="post">

            <h4 class="heading-primary text-uppercase mb-lg">PERSONAL INFORMATION</h4>
            <div class="row">
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label class="font-weight-normal">Nama Lengkap <span class="required">*</span></label>
                  <input type="text" class="form-control" name="pemilik_dealer" placeholder="Masukan nama lengkap" required>
                </div>
              </div>
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label class="font-weight-normal">No Handphone <span class="required">*</span></label>
                  <input type="number" class="form-control" name="no_hp_dealer" placeholder="Masukan no HP aktif" required>
                </div>
              </div>
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label class="font-weight-normal">Email <span class="required">*</span></label>
                  <input type="email" class="form-control" name="email_dealer" placeholder="Masukan email aktif" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12">
                <h4 class="heading-primary text-uppercase mb-lg">DEALER INFORMATION</h4>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="font-weight-normal">Nama Dealer <span class="required">*</span></label>
                  <input type="text" class="form-control" name="nama_dealer" placeholder="Masukan nama dealer" required>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group">
                  <label class="font-weight-normal">Alamat </label>
                  <textarea name="alamat_dealer" class="form-control"></textarea>
                </div>
              </div>
            </div>

            <!-- <hr class="tall"> -->

            <div class="row">
              <div class="col-sm-12">
                <!-- <p class="required mt-lg mb-none">* Required Fields</p> -->

                <div class="form-action clearfix mt-none">
                  <div class="col-md-6">
                    <a href="<?=base_url()?>" class="btn btn-default btn-block">
                      <i class="fa fa-angle-double-left"></i> Kembali
                    </a>
                  </div>

                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Daftar">
                  </div>

                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
   </section>

</div>

<script type="text/javascript">
  function hide() {
    document.getElementById('Div-Alert').style.display = 'none';
    // alert(name);
  }
</script>
