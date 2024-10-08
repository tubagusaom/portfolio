<style media="screen">
  #rekBtpn{
    border:none;
    background:transparent;
  }

  #rekBtpn::selection, #rekBtpn:focus{
    outline: none;
  }
</style>

<section class="the-wedding section section-overlay custom-overlay-1 m-none pb-md our-history pt-md" id="gift">
  <div class="container">
    <div class="row mt-xlg pt-xlg">
      <div class="col-md-8 col-md-offset-2 center">
        <h2 class="tb-wedding-7 custom-font-size-tb-1" style="color:#b07a2d!important">
          <b>Kado Pernikahan</b>
        </h2>
        <p class="tb-montserrat-regular">
          Bagi keluarga dan sahabat yang ingin memberikan kado dapat melalui tautan berikut :
        </p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row pt-xlg mb-xlg pb-xlg tb-quicksand">
      <div class="col-md-12 center">

        <div class="col-md-6">
          <div class="box-tb feature-box feature-box-style-4">
            <div class="feature-box-icon">
              <!-- <i class="fa fa-globe"></i> -->
              <img src="<?=base_url()?>assets/img/logo_bank/logo-bca.png" class="img-responsive img-bank" alt="">
            </div>

            <div class="feature-box-info tb-montserrat-regular">
              <p class="mb-lg">
                Bank BCA a.n <br>
                MOSES PRASTIO SOEPARDI
              </p>
              <h4 class="mb-sm text-uppercase">
                715-121370-1
                <input type="text" id="rekBca" class="center" style="position:fixed;" value="7151213701" readonly>
              </h4>

              <button onclick="copyBca()" type="button" class="btn-tb-wishes" name="button">
                <span>copy no rekening</span>
                <i class="fa fa-clipboard"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box-tb feature-box feature-box-style-4 tb-montserrat-regular">
            <div class="feature-box-icon">
              <!-- <i class="fa fa-globe"></i> -->
              <img src="<?=base_url()?>assets/img/logo_bank/logo-mandiri.png" class="img-responsive img-bank" alt="">
            </div>
            <div class="feature-box-info">
              <p class="mb-lg">
                Bank MANDIRI a.n <br>
                BRIGITA NUGRAHANI PUTRI
              </p>
              <h4 class="mb-sm text-uppercase">
                15-70003-78475-9
                <input type="text" id="rekMandiri" class="center" style="position:fixed;" value="1570003784759" readonly>
              </h4>

              <button onclick="copyMandiri()" type="button" class="btn-tb-wishes" name="button">
                <span>copy no rekening</span>
                <i class="fa fa-clipboard"></i>
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- batas -->

  <div class="container">
    <div class="row pt-xlg mb-xlg pb-xlg tb-quicksand">
      <div class="col-md-12 center">

        <!-- <div class="col-md-4">
          <div class="box-tb feature-box feature-box-style-4">
            <div class="feature-box-icon">
              <img src="<?=base_url()?>assets/img/logo_bank/logo-bca.png" class="img-responsive img-bank" alt="">
            </div>

            <div class="feature-box-info">
              <p class="mb-lg">
                Bank BCA a.n <br>
                TB AOM SOMADININGRAT WIJAYA K
              </p>
              <h4 class="mb-sm text-uppercase">
                628-118844-2
                <input type="text" id="rekBca" class="center" style="position:fixed;" value="6281188442">
              </h4>

              <button onclick="copyBca()" type="button" class="btn-tb-copy" name="button">
                <span>copy no rekening</span>
                <i class="fa fa-clipboard"></i>
              </button>
            </div>
          </div>
        </div> -->

        <div class="col-md-12">
          <div class="box-tb feature-box feature-box-style-4">
            <div class="feature-box-icon" style="margin-bottom:15px;">
              <!-- <i class="fa fa-globe"></i> -->
              <h3 class="mb-sm text-uppercase tb-montserrat-medium">
                Alamat Kirim Kado
              </h3>
              <!-- <img src="<?=base_url()?>assets/img/logo_bank/logo-jenius-btpn.png" class="img-responsive img-bank-1" alt=""> -->
            </div>
            <div class="feature-box-info tb-montserrat-regular">
              <p class="mb-lg">
                <!-- Perum Pesona Prima Karanggan Blok A2 No.2, <br>
                Gunung Putri, Bogor, Jawa Barat -->

                Perum Dephan Pondok Rajeg Asri Jl. Asri 5 no 3 Blok B5  <br>
                Cibinong, Bogor
              </p>
              <h4 class="mb-sm text-uppercase tb-montserrat-medium">
                PUTRI

                <?php $almtkirim = "Perum Dephan Pondok Rajeg Asri Jl. Asri 5 no 3 Blok B5 Cibinong, Bogor"; ?>
                <input type="text" id="almtKirim" class="center" style="position:fixed;" value="<?=$almtkirim?>" readonly>
              </h4>

              <!-- <input type="text" value="90230232421" id="rekBtpn" readonly> -->
              <button onclick="copyAlamat()" type="button" class="btn-tb-wishes tb-montserrat-regular" name="button">
                <span>copy Alamat</span>
                <i class="fa fa-clipboard"></i>
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<!-- <input id="dummy" name="dummy" type="hidden" value="xxxxx">

<script>
var copyText = document.getElementById("dummy");
copyText.type = 'text';
copyText.select();
document.execCommand("copy");
copyText.type = 'hidden';
</script> -->

<script src="<?=base_url('assets/js/sweetalert.js')?>"></script>
<script>

  const rekBca = document.getElementById('rekBca')
  const rekMandiri = document.getElementById('rekMandiri')
  const rekBtpn = document.getElementById('rekBtpn')
  const rekMandirimia = document.getElementById('rekMandirimia')
  const almtKirim = document.getElementById('almtKirim')

  function copyBca() {
    // rekBca.type = 'text';
    rekBca.select();    // Selects the text inside the input
    document.execCommand('copy');    // Simply copies the selected text to clipboard
    // rekBca.type = 'hidden';
    Swal.fire({         //displays a pop up with sweetalert
      icon: 'success',
      title: 'No.rek BCA berhasil di copy',
      showConfirmButton: false,
      timer: 1000
    });
  }

  function copyMandiri() {
    rekMandiri.type = 'text';
    rekMandiri.select();    // Selects the text inside the input
    document.execCommand('copy');    // Simply copies the selected text to clipboard
    rekMandiri.type = 'hidden';
    Swal.fire({         //displays a pop up with sweetalert
      icon: 'success',
      title: 'No.rek MANDIRI di copy',
      showConfirmButton: false,
      timer: 1000
    });
  }

  function copyBtpn() {
    rekBtpn.type = 'text';
    rekBtpn.select();    // Selects the text inside the input
    document.execCommand('copy');    // Simply copies the selected text to clipboard
    rekBtpn.type = 'hidden';
    Swal.fire({         //displays a pop up with sweetalert
      icon: 'success',
      title: 'No.rek BTPN berhasil di copy',
      showConfirmButton: false,
      timer: 1000
    });
  }

  function copyMandirimia() {
    rekMandirimia.type = 'text';
    rekMandirimia.select();    // Selects the text inside the input
    document.execCommand('copy');    // Simply copies the selected text to clipboard
    rekMandirimia.type = 'hidden';
    Swal.fire({         //displays a pop up with sweetalert
      icon: 'success',
      title: 'No.rek MANDIRI di copy',
      showConfirmButton: false,
      timer: 1000
    });
  }

  function copyAlamat() {
    // rekBca.type = 'text';
    almtKirim.select();    // Selects the text inside the input
    document.execCommand('copy');    // Simply copies the selected text to clipboard
    // rekBca.type = 'hidden';
    Swal.fire({         //displays a pop up with sweetalert
      icon: 'success',
      title: 'Alamat berhasil di copy',
      showConfirmButton: false,
      timer: 1000
    });
  }
</script>
