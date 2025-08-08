<style>
  .form-upload-tb {
    padding: 10px;
    /* height: 150px; */
  }
  .form-link-tb {
    display: block;
    width: 100px;
    /* height: 150px; */
    /* color: #555; */
    /* background-color: #eee; */
    background-image: none;
    /* border: 1px solid #ccc;
    border-radius: 5px; */
    padding: 5px 98px 5px 5px;
    text-decoration: none!important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
  }
  .form-images-tb {
    width: 80px;
    cursor: pointer;
  }
  .form-link-delete {
    color:red;
    position: absolute;
    top: 7px;
    left: 94px;
    text-decoration: none!important;

    padding: 5px;
    cursor: pointer;
  }

  #imgUpload {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }

  #imgUpload:hover {opacity: 0.7;}

  #myImg2 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }

  #myImg2:hover {opacity: 0.7;}

  #popOverlay {
    position:fixed;
    z-index: 5;
    top:0px;
    right: 0px;
    bottom:0px;
    width:100%;
    overflow-y:auto;
    background: transparent;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 4; /* Sit on top */
    padding: 200px 20px 20px 20px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (image) */
  .img-content {
    margin: auto;
    display: block;
    width: 40%;
    max-width: 700px;
  }

  /* Caption of Modal Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }

  /* Add Animation */
  .img-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
  }

  @keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
  }

  /* The Close Button */
  .close {
    position: absolute;
    z-index: 7;
    top: 15px;
    right: 35px;
    /* color: #f1f1f1; */
    color: #ccc;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    opacity: .5;
  }

  .close:hover,
    .close:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .img-content {
      width: 100%;
    }
  }
</style>


<section>
  <div class="inner formStep3">

    <div class="wizard-header">
      <h3 class="heading">UPLOAD BUKTI PENDUKUNG</h3>
      <p>Pada bagian ini, Anda diminta untuk mengunggah Persyaratan Wajib yang Anda anggap relevan terhadap setiap elemen/KUK unit kompetensi.</p>
    </div>

    <div class="" id="div_unit_dipilih">
        <div id="unit_dipilih"></div>
    </div>

    <div class="wizard-header">
      <p>Upload beberapa dokumen yang menunjukan bukti pemenuhan persyaratan dasar sertifikasi yang ditetapkan dalam dokumen skema sertifikasi.</p>
    </div>

    <!-- <div class="form-row">
      <div class="form-holder form-holder-1">
        <input type="text" name="find_bank" id="find_bank" placeholder="Find Your Bank" class="form-control" required>
      </div>
    </div> -->

    <div class="form-row">
      <div class="form-holder form-holder-2">
        <fieldset>
          <legend>Pasfoto (4x6) <b class="harus_diisi">*</b></legend>
          <input type="file" id="pasfoto" accept="image/*" required>
          <div id="dpasfoto"></div>
          <!-- <img id="imgUpload" class="img-fluid" src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-6.png"> -->
        </fieldset>
      </div>
    </div>

    <div class="form-row">
      <div class="form-holder form-holder-2">
        <fieldset>
          <legend>Identitas Pribadi (KTP) <b class="harus_diisi">*</b></legend>
          <input type="file" id="ktp" accept="image/*" >
          <div id="dktp"></div>
        </fieldset>
      </div>
    </div>

    <div class="form-row">
      <div class="form-holder form-holder-2">
        <fieldset>
          <legend>CV (Daftar Riwayat Hidup) <b class="harus_diisi">*</b></legend>
          <input type="file" id="cv" accept="image/*" >
          <div id="dcv"></div>
        </fieldset>
      </div>
    </div>

    <div class="form-row">
      <div class="form-holder form-holder-2">
        <fieldset>
          <legend>Ijazah <b class="harus_diisi">*</b></legend>
          <input type="file" id="ijazah" accept="image/*" >
          <div id="dijazah"></div>
        </fieldset>
      </div>
    </div>

    <!-- <div class="form-row-total">
      <div class="form-row">
        <div class="form-holder form-holder-2 form-holder-3">
          <input type="radio" class="radio" name="bank-1" id="bank-1" value="bank-1" checked>
          <label class="bank-images label-above bank-1-label" for="bank-1">
            <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-1.png" alt="bank-1">
          </label>

          <input type="radio" class="radio" name="bank-2" id="bank-2" value="bank-2">
          <label class="bank-images label-above bank-2-label" for="bank-2">
            <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-2.png" alt="bank-2">
          </label>

          <input type="radio" class="radio" name="bank-3" id="bank-3" value="bank-3">
          <label class="bank-images label-above bank-3-label" for="bank-3">
            <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-3.png" alt="bank-3">
          </label>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2 form-holder-3">
          <input type="radio" class="radio" name="bank-4" id="bank-4" value="bank-4">
          <label class="bank-images bank-4-label" for="bank-4">
            <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-4.png" alt="bank-4">
          </label>

          <input type="radio" class="radio" name="bank-5" id="bank-5" value="bank-5">
          <label class="bank-images bank-5-label" for="bank-5">
            <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-5.png" alt="bank-5">
          </label>

          <input type="radio" class="radio" name="bank-6" id="bank-6" value="bank-6">
          <label class="bank-images bank-6-label" for="bank-6">
            <img src="<?=base_url()?>assets/_tera_byte/form/images/form-v1-6.png" alt="bank-6">
          </label>
        </div>
      </div>
    </div> -->

  </div>

  <div class="jarak-batas"></div>

  <div class="box-arow">
    <div class="col-xs-12">
      <div class="col-xs-6">
        <span class="arrow">
          <a href="javascript:void(0)">
            <i class="fa fa-arrow-left"></i>
            <label class="label-prev">Kembali</label>
          </a>
        </span>
      </div>
      <div class="col-xs-6">
        <span class="arrow">
          <a id="" class="nextBtn3" href="javascript:void(0)">
            <i class="fa fa-arrow-right"></i>
            <label class="label-next">Selanjutnya</label>
          </a>
          <!-- <button id="selanjutnya-2" type="button" >
            <i class="fa fa-arrow-right"></i>
            <label class="label-next">Selanjutnya</label>
          </button> -->
        </span>
      </div>
    </div>
  </div>

</section>


<div id="uploadModal" class="modal">
  <div id="popOverlay"></div>
  <span id="close" class="close">&times;</span>

  <div id="modal-content"></div>
  <div id="caption"></div>
</div>

<script>
  var baseUrl = "<?= base_url(); ?>";
  $('#popOverlay').hide();

  $("#pasfoto").on('change', function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/foto";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
               data = JSON.parse(data);
               if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#pasfoto").val("");
                alert(data.error);
               }else{

                var idUpload = data.upload_data.file_name;
                var acuanId = idUpload.replace(".", "-");

                 var txt0 = "<div id='box-"+acuanId+"' class='col col-md-3 col-sm-4 col-xs-6 form-upload-tb'>";
                 var txt1 = "<input id='nd-' type='hidden' name='nama_dokumen[]' class='nama_dokumen' value='foto' />";
                 var txt2 = "<input id='fd-' type='hidden' name='file_data[]' id='foto' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' />";
                //  var txt3 = "<a id='al-' target='_blank' class='form-link-tb uploadData' href='" + baseUrl + 'repo/asesi/' + data.upload_data.file_name + "'></a>";
                 var txt4 = "<img id='img-"+acuanId+"' dataimg='"+data.upload_data.file_name+"' inisialjenis='Pasfoto' onclick='popImage(this)' class='form-images-tb' src='" + baseUrl + 'repo/asesi/' + data.upload_data.file_name + "' alt='tera_byte'>";
                 var txt5 = "<span id='span-' class='form-link-delete' title='Hapus Foto' datatb='"+data.upload_data.file_name+"' datajenis='pasfoto' onclick='deleteImage(this)'><i class='fa fa-times'></i></span></div>";

                $("#dpasfoto").append(txt0 + txt1 + txt2 + txt4 + txt5);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
        return false;
    });

  $("#ktp").on('change', function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/ktp";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
               data = JSON.parse(data);
               if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#pasfoto").val("");
                alert(data.error);
               }else{

                var idUpload = data.upload_data.file_name;
                var acuanId = idUpload.replace(".", "-");

                 var txt0 = "<div id='box-"+acuanId+"' class='col col-md-3 col-sm-4 col-xs-6 form-upload-tb'>";
                 var txt1 = "<input id='nd-' type='hidden' name='nama_dokumen[]' class='nama_dokumen' value='ktp' />";
                 var txt2 = "<input id='fd-' type='hidden' name='file_data[]' id='ktp' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' />";
                //  var txt3 = "<a id='al-' target='_blank' class='form-link-tb uploadData' href='" + baseUrl + 'repo/asesi/' + data.upload_data.file_name + "'></a>";
                 var txt4 = "<img id='img-"+acuanId+"' dataimg='"+data.upload_data.file_name+"' inisialjenis='Ktp' onclick='popImage(this)' class='form-images-tb' src='" + baseUrl + 'repo/asesi/' + data.upload_data.file_name + "' alt='tera_byte'>";
                 var txt5 = "<span id='span-' class='form-link-delete' title='Hapus Ktp' datatb='"+data.upload_data.file_name+"' datajenis='ktp' onclick='deleteImage(this)'><i class='fa fa-times'></i></span></div>";

                $("#dktp").append(txt0 + txt1 + txt2 + txt4 + txt5);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
        return false;
    });

  $("#cv").on('change', function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/cv";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
               data = JSON.parse(data);
               if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#pasfoto").val("");
                alert(data.error);
               }else{

                var idUpload = data.upload_data.file_name;
                var acuanId = idUpload.replace(".", "-");

                 var txt0 = "<div id='box-"+acuanId+"' class='col col-md-3 col-sm-4 col-xs-6 form-upload-tb'>";
                 var txt1 = "<input id='nd-' type='hidden' name='nama_dokumen[]' class='nama_dokumen' value='cv' />";
                 var txt2 = "<input id='fd-' type='hidden' name='file_data[]' id='cv' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' />";
                //  var txt3 = "<a id='al-' target='_blank' class='form-link-tb uploadData' href='" + baseUrl + 'repo/asesi/' + data.upload_data.file_name + "'></a>";
                 var txt4 = "<img id='img-"+acuanId+"' dataimg='"+data.upload_data.file_name+"' inisialjenis='Cv' onclick='popImage(this)' class='form-images-tb' src='" + baseUrl + 'repo/asesi/' + data.upload_data.file_name + "' alt='tera_byte'>";
                 var txt5 = "<span id='span-' class='form-link-delete' title='Hapus Cv' datatb='"+data.upload_data.file_name+"' datajenis='cv' onclick='deleteImage(this)'><i class='fa fa-times'></i></span></div>";

                $("#dcv").append(txt0 + txt1 + txt2 + txt4 + txt5);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
        return false;
    });

  $("#ijazah").on('change', function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/ijazah";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
               data = JSON.parse(data);
               if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#pasfoto").val("");
                alert(data.error);
               }else{

                var idUpload = data.upload_data.file_name;
                var acuanId = idUpload.replace(".", "-");

                 var txt0 = "<div id='box-"+acuanId+"' class='col col-md-3 col-sm-4 col-xs-6 form-upload-tb'>";
                 var txt1 = "<input id='nd-' type='hidden' name='nama_dokumen[]' class='nama_dokumen' value='ijazah' />";
                 var txt2 = "<input id='fd-' type='hidden' name='file_data[]' id='ijazah' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' />";
                //  var txt3 = "<a id='al-' target='_blank' class='form-link-tb uploadData' href='" + baseUrl + 'repo/asesi/' + data.upload_data.file_name + "'></a>";
                 var txt4 = "<img id='img-"+acuanId+"' dataimg='"+data.upload_data.file_name+"' inisialjenis='Ijazah' onclick='popImage(this)' class='form-images-tb' src='" + baseUrl + 'repo/asesi/' + data.upload_data.file_name + "' alt='tera_byte'>";
                 var txt5 = "<span id='span-' class='form-link-delete' title='Hapus Ijazah' datatb='"+data.upload_data.file_name+"' datajenis='ijazah' onclick='deleteImage(this)'><i class='fa fa-times'></i></span></div>";

                $("#dijazah").append(txt0 + txt1 + txt2 + txt4 + txt5);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
        return false;
    });

    function deleteImage(d) {
      var getJenis  = d.getAttribute("datajenis");
      var getImg  = d.getAttribute("datatb");
      var getIdinput  = "#" + getJenis;
      var getId  = "#box-" + getImg;
      var resId = getId.replace(".", "-");

      var urlTarget = baseUrl + "welcome/delete_ajax/" + getImg;
      $('#myOverlay').show();
      $('#loadingGIF').show();

      $.ajax({
        type: 'POST',
        url: urlTarget,
        // data: data,
        success: function() {
          $(getIdinput).val('');
          $(resId).remove();
          $('#myOverlay').hide();
          $('#loadingGIF').hide();
        }
      });
      return false;

      // alert(resId);

    };

    function popImage(x) {

      var getId  = x.getAttribute("id");
      var insJenis  = x.getAttribute("inisialjenis");
      var modal = document.getElementById("uploadModal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img  = x.getAttribute("dataimg");
      // var img = document.getElementById("imgUpload");

      var contentModal = "<img class='img-content' src='"+baseUrl+"repo/asesi/"+img+"' alt='tera_byte'>";

      $("#modal-content").append(contentModal);
      var modalImg = document.getElementById('modal-content');
      var captionText = document.getElementById("caption");
      var zIn = "z-index";

      // img.onclick = function(){
        $('#popOverlay').show();
        $("#formHeader").css("z-index","0");
        modal.style.display = "block";
        // modalImg.src = this.src;
        captionText.innerHTML = insJenis;
      // }

      // alert($("#formHeader").css("z-index"));
    }

    var closePop = document.getElementById("close");
    var closeOverlay = document.getElementById("popOverlay");
    var modal = document.getElementById("uploadModal");

    closePop.onclick = function(){
      $('#popOverlay').hide();
      $("#formHeader").css("z-index","2");
      $(".img-content").remove();
      modal.style.display = "none";
    }

    closeOverlay.onclick = function(){
      $('#popOverlay').hide();
      $("#formHeader").css("z-index","2");
      $(".img-content").remove();
      modal.style.display = "none";
    }

    function add_combo() {
      var hasil = [];
      $("input[name='file_data[]']").each(function () {
        var fileName = $(this).val().split('/').pop().split('\\').pop();
        //console.log(fileName);
        hasil.push(fileName);
      });
      return hasil;
    }

    function create_combo() {
      var bukti_sertifikat = "";
      var bukti_s = "";
      var data = add_combo();
      $.each(data, function (key, value) {
       bukti_sertifikat = bukti_sertifikat + "<option value='" + value + "'>" + value + "</option>";
       bukti_s = bukti_s + "<option selected value='" + value + "'>" + value + "</option>";
      })

      //alert(bukti_sertifikat);
      $(".select_bukti").text('');
      $(".select_bukti").append("<select required name='pilih[]' class='form-control drop-pilih'>" + bukti_sertifikat + "</select>");
      $("#div_bukti").append("<select multiple name='bukti_pendukung[]'>" + bukti_s + "</select>");
      //$("#div_bukti").show();
    }

    NextBtn3 = $('.nextBtn3');

    NextBtn3.click(function (e) {
      // alert('next 4');

      idfSatu   = document.getElementById("form-total-p-0");
      idfDua    = document.getElementById("form-total-p-1");
      idfTiga   = document.getElementById("form-total-p-2");
      idfEmpat  = document.getElementById("form-total-p-3");

      stepSatu  = document.getElementById("step1");
      stepDua   = document.getElementById("step2");
      stepTiga  = document.getElementById("step3");
      stepEmpat = document.getElementById("step4");

      var cekStep3 = $(".formStep3 input:required");
      var countDt = 0;
      $.each(cekStep3, function (key, value) {
          if (value.value == "") {
              $("#" + value.id).focus();
              return false;
          } else {
              countDt++;
          }
      })

      if (countDt < cekStep3.length) {
          // alert("Upload File Bukti Pendukung terlebih dahulu !");
          // return false;
          Swal.fire({
            type: 'info',
            title: 'Oops...',
            text: 'Upload File Bukti Pendukung terlebih dahulu !'
          });
          return false;
      }else {
        idfTiga.style.display = "none";
        idfEmpat.style.display = "block";

        stepTiga.classList.remove("disabled");
        stepEmpat.classList.add("active2");

        $('#step_langkah').val('4');
        id = $('#skema_yang_dipilih').val();
        $.ajax({
            type: 'post',
            url: base_url + 'welcome/uji_kompetensi_skema',
            data: {id: id},
            cache: false,
            success: function (data) {
                $('#div_inner').remove();
                $('#div_skema_yang_dipilih').append('<div id="div_inner"></div>');
                $('#div_inner').append(data);
                create_combo();
                $('#all_bk').attr('checked', true);
                $('.value_bk').attr('checked', true);
                $('#all_k').change(function () {
                    $('#all_bk').attr('checked', false);
                    $('.value_k').prop('checked', $(this).prop("checked"));
                })
                $('#all_bk').click(function () {
                    $('#all_k').attr('checked', false);
                    $('.value_bk').prop('checked', $(this).prop("checked"));
                })
            }
        });
      }

    })

</script>
