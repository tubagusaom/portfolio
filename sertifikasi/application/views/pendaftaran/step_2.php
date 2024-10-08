<section>
    <div class="inner">
      <div class="wizard-header">
        <h3 class="heading">FR-APL-01. FORMULIR PERMOHONAN SERTIFIKASI</h3>
        <p>Pada bagian ini, isi data pribadi, data pendidikan formal, dan data pekerjaan saat ini.</p>
      </div>

      <!-- <button type="button" id="selanjutnya-3" class="nextBtn btn btn-success" name="button">Selanjutnya</button> -->

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <fieldset>
            <legend>Tempat Uji Kompetensi <b class="harus_diisi">*</b></legend>
            <select id="id_tuk" name="id_tuk" required>
                <option disabled="disabled" selected="selected" value="">Pilih TUK</option>
                <?php foreach ($data_tuk as $value) { ?>
                  <option value="<?=$value->id?>"><?=$value->tuk?> - <?=$value->alamat?></option>
                <?php } ?>
            </select>
          </fieldset>
        </div>
      </div>

      <div id="select-jadwal" class="form-row">
        <div class="form-holder form-holder-2">
          <fieldset>
            <legend>Jadwal Uji Kompetensi <b class="harus_diisi">*</b></legend>
            <select id="jadwal_id" name="jadwal_id" required>
                <option disabled="disabled" selected="selected" value="">Pilih Jadwal</option>
            </select>
          </fieldset>
        </div>
      </div>

      <div class="garis-batas"></div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <fieldset>
            <legend>No.Identitas <b class="harus_diisi">*</b></legend>
            <!-- <input type="number" name="your_email" id="your_email" class="form-control effect-col-12" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required> -->
            <!-- <input type="text" onblur="checklengthnik(this)" maxlength="16" name="no_identitas" id="no_identitas" required class="form-control input-number input-number-ktp" placeholder="Masukkan Nomor Identitas (KTP)"  /> -->
            <input type="text" class="form-control effect-col-12" name="no_identitas" id="no_identitas" required placeholder="Masukkan Nomor Identitas (KTP)"  />
            <span class="focus-border"></span>
          </fieldset>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder">
          <fieldset>
            <legend>First Name <b class="harus_diisi">*</b></legend>
            <input type="text" class="form-control effect-col-6" id="first-name" name="first-name" placeholder="First Name" required>
            <span class="focus-border"></span>
          </fieldset>
        </div>

        <div class="form-holder">
          <fieldset>
            <legend>Last Name <b class="harus_diisi">*</b></legend>
            <input type="text" class="form-control effect-col-6" id="last-name" name="last-name" placeholder="Last Name" required>
            <span class="focus-border"></span>
          </fieldset>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <fieldset>
            <legend>Your Email <b class="harus_diisi">*</b></legend>
            <input type="text" name="your_email" id="your_email" class="form-control effect-col-12" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
            <span class="focus-border"></span>
          </fieldset>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <fieldset>
            <legend>Phone Number <b class="harus_diisi">*</b></legend>
            <input type="text" class="form-control effect-col-12" id="phone" name="no_telp" placeholder="+1 888-999-7777" required>
            <span class="focus-border"></span>
          </fieldset>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <fieldset>
            <legend>Subject</legend>
            <select id="subject" name="subject">
                <option disabled="disabled" selected="selected">Choose option</option>
                <option>Subject 1</option>
                <option>Subject 2</option>
                <option>Subject 3</option>
            </select>
          </fieldset>
        </div>
      </div>

      <div class="form-row form-row-date">
        <div class="form-holder form-holder-2">
          <label class="special-label">Birth Date:</label>
          <select name="month" id="month">
            <option value="MM" disabled selected>MM</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
          </select>
          <select name="date" id="date">
            <option value="DD" disabled selected>DD</option>
            <option value="Feb">Feb</option>
            <option value="Mar">Mar</option>
            <option value="Apr">Apr</option>
            <option value="May">May</option>
          </select>
          <select name="year" id="year">
            <option value="YYYY" disabled selected>YYYY</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="SSN" required>
        </div>
      </div>

      <!-- <div class="form-row">
        <div class="form-holder form-holder-2">
          <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="SSN" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="SSN" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="SSN" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="SSN" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="SSN" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-holder form-holder-2">
          <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="SSN" required>
        </div>
      </div> -->

      <!-- <div class="actions clearfix">
        <ul role="menu" aria-label="Pagination">
          <li>
            <a id='nextBtns' href="#next" role="menuitem">
              <i class="fa fa-arrow-right"></i>
            </a>
          </li>
        </ul>
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
        <a id="" class="nextBtn2" href="javascript:void(0)">
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



<script type="text/javascript">
  $("#subject").select2({
    tags: "true",
    placeholder: "Select an option",
    allowClear: true
  });

  $("#id_tuk").select2({
    tags: "true",
    placeholder: "Pilih TUK",
    allowClear: true
  });

  $("#jadwal_id").select2({
    tags: "true",
    placeholder: "Pilih Jadwal",
    allowClear: true
  });

  NextBtn2 = $('.nextBtn2');

  NextBtn2.click(function (e) {
    $('#step_langkah').val('3');

    $('#wajib1').val("");
    id = $('#skema_yang_dipilih').val();

    // alert(id);

    $.ajax({
      type: 'post',
      url: base_url + 'welcome/detail',
      data: {id: id},
      cache: false,
      success: function (data) {
        $('#unit_dipilih').remove();
        $('#div_unit_dipilih').append('<div id="unit_dipilih"></div>');
        $('#unit_dipilih').append(data);
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

        $('#file_bukti_pendukung').focus();
      }
    });

    idfSatu   = document.getElementById("form-total-p-0");
    idfDua    = document.getElementById("form-total-p-1");
    idfTiga   = document.getElementById("form-total-p-2");
    idfEmpat  = document.getElementById("form-total-p-3");

    stepSatu  = document.getElementById("step1");
    stepDua   = document.getElementById("step2");
    stepTiga  = document.getElementById("step3");
    stepEmpat = document.getElementById("step4");

    // alert(id);
    // alert($('#skema_yg_dipilih').val());

    var idTuk = $('#id_tuk').val();
    var jadwalId = $('#jadwal_id').val();

    var noIdentitas = $('#no_identitas').val();
    var firstName = $('#first-name').val();
    var lastName = $('#last-name').val();
    var yourEmail = $('#your_email').val();

    if (idTuk == "") {
      alert('TUK Harus Diisi!');
      $('#id_tuk').focus();
    }else if (jadwalId == "") {
      alert('Jadwal Harus Diisi!');
      $('#jadwal_id').focus();
    }else if (noIdentitas == "") {
      // alert('Nomor Identitas Harus Diisi!');
      $('#no_identitas').focus();
      Swal.fire({
        type: 'info',
        title: 'Oops...',
        text: 'Nomor Identitas Harus Diisi!'
      });
    }else if (firstName == "") {
      // alert('First Name Kosong !');
      $('#first-name').focus();
      Swal.fire({
        type: 'info',
        title: 'Oops...',
        text: 'First Name Harus Diisi!'
      });
    }else if (lastName == "") {
      // alert('Last Name Kosong !');
      $('#last-name').focus();
      Swal.fire({
        type: 'info',
        title: 'Oops...',
        text: 'Last Name Harus Diisi!'
      });
    }else if (yourEmail == "") {
      // alert('Email Kosong !');
      $('#your_email').focus();
      Swal.fire({
        type: 'info',
        title: 'Oops...',
        text: 'Email Harus Diisi!'
      });
    }else {
      idfDua.style.display = "none";
      idfTiga.style.display = "block";

      stepDua.classList.remove("disabled");
      stepTiga.classList.add("active2");
    }

    // function validateForm() {
    //   let x = document.forms["formRegister"]["first-name"].value;
    //   if (x == "") {
    //     alert("Name must be filled out");
    //     return false;
    //   }
    // }

  })


  $('#select-jadwal').hide();
  $('#id_tuk').change(function () {
      $('#myOverlay').show();
      $('#loadingGIF').show();
      var id = $(this).val();
      $.ajax({
          url: "<?php echo base_url('welcome/get_jadwal'); ?>",
          method: "POST",
          data: {id: id},
          async: true,
          dataType: 'json',
          success: function (data) {
              if(data.length > 0){
                  $('#select-jadwal').show();
                  var html = '';
                  html += '<option value="" selected="selected">Pilih Jadwal</option>';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value='+data[i].id+'>'+data[i].jadual+'</option>';
                  }
                  $('#jadwal_id').html(html);
              }else{
                  $('#id_tuk').focus();
                  $('#select-jadwal').hide();
                  // alert('Belum ada jadwal di TUK yang dipilih. Silahkan pilih TUK lainnya!')
                  Swal.fire({
                      type: 'warning',
                      title: 'Belum ada jadwal di TUK yang dipilih',
                      text: 'Silahkan pilih TUK lainnya!'
                  });

                  html = '<option value=""></option>';
                  $('#jadwal_id').html(html);
              }
              $('#myOverlay').hide();
              $('#loadingGIF').hide();

          }
      });
      return false;
  });


</script>
