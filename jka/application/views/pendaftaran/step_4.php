<section>
  <div class="inner">
    <div class="wizard-header">
      <h3 class="heading">FR-APL 02 ASESMEN MANDIRI</h3>
      <p>Lakukan asesmen mandiri untuk menilai kompetensi Anda pada setiap Kriteria Unjuk Kerja (KUK) dalam Unit Kompetensi sesuai paket skema sertifikasi yang dipilih. Pilih bukti pendukung yang telah Anda unggah sebelumnya, yang tepat dan mendukung terhadap setiap KUK.</p>
    </div>

    <div class="form-row">
      <div class="form-holder form-holder-2">

        <!-- <input type="radio" class="radio" name="radio1" id="plan-1" value="plan-1"> -->
        <!-- <input type="radio" id="plan-1" class="radio" value="bk" class="value_bk"/><label class="plan-icon plan-1-label" style="width:15px;height: 15px;" for="plan-1"><img style="width: 10px;" src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-icon-2.png" alt="pay-1"></label> -->

        <div class="table-responsive" id="div_skema_yang_dipilih">
            <div id="div_inner"></div>
        </div>

        <!-- <input type="radio" class="radio" name="radio1" id="plan-1" value="plan-1">
        <label class="plan-icon plan-1-label" for="plan-1">
          <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-icon-2.png" alt="pay-1">
        </label>

        <div class="plan-total">
          <span class="plan-title">Specific Plan</span>
          <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.</p>
        </div>

        <input type="radio" class="radio" name="radio1" id="plan-2" value="plan-2">
        <label class="plan-icon plan-2-label" for="plan-2">
          <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-icon-2.png" alt="pay-1">
        </label>

        <div class="plan-total">
          <span class="plan-title">Medium Plan</span>
          <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.</p>
        </div>

        <input type="radio" class="radio" name="radio1" id="plan-3" value="plan-3" checked>
        <label class="plan-icon plan-3-label" for="plan-3">
          <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-icon-3.png" alt="pay-2">
        </label>

        <div class="plan-total">
          <span class="plan-title">Special Plan</span>
          <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.</p>
        </div> -->

        <div class="jarak-batas"></div>

        <div class="box-arow">
          <div class="col-xs-12">
            <!-- <div class="col-xs-6">
              <span class="arrow">
                <a href="javascript:void(0)">
                  <i class="fa fa-arrow-left"></i>
                  <label class="label-prev">Kembali</label>
                </a>
              </span>
            </div> -->
            <div class="col-xs-12">
              <!-- <span class="arrow"> -->
                <!-- <a id="" class="btn btn-warning btn-block nextBtn2" href="javascript:void(0)">
                  <label class="label-next" style="cursor:pointer">Selesai dan Kirim</label>
                </a> -->

                <!-- <button type="submit" class="btn btn-warning btn-block">Selesai dan Kirim</button> -->
                <button class="btn btn-warning btn-block" type="button" id="selanjutnya-4">Selesai dan Kirim</button>
                <!-- <button id="selanjutnya-2" type="button" >
                  <i class="fa fa-arrow-right"></i>
                  <label class="label-next">Selanjutnya</label>
                </button> -->
              <!-- </span> -->
            </div>
          </div>
        </div>

      </div>


    </div>
  </div>
</section>

<script type="text/javascript">
  $("#selanjutnya-4").click(function () {
    $('#step_langkah').val('5');
    var valuess = $("select[name^='pilih']").map(function (idx, ele) {
      $('#div_pilih').append('<input type="hidden" name="pilih_array[]" value="' + $(ele).val() + '" />');
      //console.log($(ele).val());
    }).get();

    //var pilihid = $('.drop-pilih').val();
    //console.log(pilihid);
    //return false;
    //preventDefault();
    var cek_radio = $("input:radio[class='value_bk']").is(":checked");
    if (cek_radio == true) {
      alert("Semua Elemen Kompetensi atau KUK harus Kompeten");
    } else { 
      var tanya = confirm('Apakah Data yang anda isi sudah benar ?');
      if (tanya) {
        $('#formRegister').submit();
      }
   }
  })
</script>
