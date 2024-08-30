<div class="modal fade bs-modal" role="dialog" id="myModal">
  <div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header" style="background: #db0c13; border-bottom: 1px solid #e5e5e5;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <b class="modal-title" style="color:#fff;"> X </b>
      </button>
      <h4 class="modal-title">
        <b style="color:#fff;"> LOGIN </b>
      </h4>
    </div>

    <hr style="margin:0; padding:0;">

    <div class="modal-body" style="padding:0 25px 25px 25px;">

      <!-- <div class="control-label labeled-form" style="text-align: center;padding:20px 0 20px 0;border-bottom: 1px solid #e5e5e5;font-weight:bold;">
        Silahkan Masuk <i class="fa fa-arrow-down" style="color:#1c2a5f"></i> untuk mendapatkan penawaran terbaik. <br>
      </div> -->

    <div class="form-group">
      <div class="row">
        <div class="col-xs-12" style="padding-top:10px;">
          <label class="control-label labeled-form" for="inputUsername">Nama User</label>
        </div>
        <div class="col-xs-12 tooltip-wide">
          <div class="input-group merged">
             <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-xs"></i></span>
             <input type="text" placeholder="Email" class="form-control " aria-describedby="basic-addon1" name="inputUsername" id="inputUsername">
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-xs-12">
          <label class="control-label labeled-form" for="inputPassword">Kata Sandi</label>
        </div>
        <div class="col-xs-12 tooltip-wide">
          <div class="input-group merged">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-key fa-xs"></i></span>
            <input type="password" placeholder="Kata Sandi" class="form-control " aria-describedby="basic-addon2" name="inputPassword" id="inputPassword" onkeypress="if(event.keyCode==13) login_click();">
          </div>
        </div>
      </div>
    </div>

    <div class="control-label labeled-form pull-left" style="font-weight:bold;">
      <b> <a href="#">Lupa Kata Sandi</a> </b>
    </div>

    <div class="control-label labeled-form pull-right" style="font-weight:bold;">
      Belum punya akun  <i class="fa fa-arrow-right" style="color:#1c2a5f"></i>
      <b> <a href="<?=base_url()?>daftar-buyer">Daftar</a> </b>
    </div>

    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-warning" data-dismiss="modal"><b style="color:#1c2a5f;">Keluar</b></button>
      <button type="button" class="btn btn-tb" id="btn-login">Masuk</button>
    </div>


  </div>
  </div>
</div>
