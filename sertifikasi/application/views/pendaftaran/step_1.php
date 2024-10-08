<section>
  <div class="inner">

    <div class="wizard-header">
      <h3 class="heading">SKEMA SERTIFIKASI</h3>
      <p>Silahkan pilih salah satu skema yang akan diujikan </p>
    </div>

    <div id="accordion" class="panel-group">

      <?php foreach ($data_skema as $key => $value) { ?>

      <div class="panel panel-default">

        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>">
          <div class="panel-heading">
            <h4 class="panel-title accordion-toggle">
              <?=$key+1?>. <?= $value->skema ?>
            </h4>
          </div>
        </a>

        <div id="collapse<?=$key?>" class="panel-collapse collapse">
          <div class="panel-body card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <div class="ms-3">
                    <p class="text-muted mb-0">
                      <?= $value->description ?> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer bg-light p-2 d-flex justify-content-around">
              <a class="btn btn-info btn-sm m-0" href="#" role="button" data-ripple-color="primary">
                Download <i class="fa fa-download ms-2"></i>
              </a>
              <a href="javascript:void(0)" class="nextBtn btn btn-warning btn-sm m-0" onclick='pilih_skema(<?= $value->id; ?>)'>
                Pilih Skema <i class="fa fa-check-square-o ms-2"></i>
              </a>
            </div>
          </div>
        </div>

      </div>

      <?php } ?>

  </div>
  <div class="pembatas"></div>
</section>

<script type="text/javascript">

  allNextBtnS = $('.nextBtn'),
  allPrevBtnS = $('.prevBtn');

  allNextBtnS.click(function (e) {

    // alert('next');

    step5     = $('#step_langkah').val();

    idfSatu   = document.getElementById("form-total-p-0");
    idfDua    = document.getElementById("form-total-p-1");
    idfTiga   = document.getElementById("form-total-p-2");
    idfEmpat  = document.getElementById("form-total-p-3");

    stepSatu  = document.getElementById("step1");
    stepDua   = document.getElementById("step2");
    stepTiga  = document.getElementById("step3");
    stepEmpat = document.getElementById("step4");



    if(step5 == "2") {
      idfSatu.style.display = "none";
      idfDua.style.display = "block";

      stepDua.classList.remove("disabled");
      stepDua.classList.add("active2");

      // alert(step5);
    }

    // $("#selanjutnya-3").on('click', function () {
    //   idfDua.style.display = "none";
    //   idfTiga.style.display = "block";
    //
    //   stepTiga.classList.remove("disabled");
    //   stepTiga.classList.add("active2");
    // })

  })


</script>
