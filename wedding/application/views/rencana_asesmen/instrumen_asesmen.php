<!-- <script src="<?= base_url(); ?>assets/boots/emotion-ratings.js" charset="utf-8"></script> -->
<link rel="stylesheet" href="<?=base_url().'assets/css/ujikom/input.css'?>" />

<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">

      <form id="myform">

        <div class="easyui-accordion" style="width:98%;height:383px;">
            <div title="FR-MAPA-02" data-options="
                collapsed:false,
                collapsible:false,
                tools:'#divbtn'
              ">

              <h3 style="padding:0 0 4px 4px;margin:4px"><?=$data_asesi->nama_lengkap ?></h3>
            </div>

            <div title="Peta instrumen Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;">
            <?php $this->load->view('rencana_asesmen/mapa02') ?>
            </div>

            <div id="divbtn" style="right: -111px!important;">
              <a href="<?php echo base_url() . 'pra_asesmen/cetak_mapa02/'.$data->id?>" target="_blank" class="icon-print" style="color:#688195;text-decoration: none;width:111px!important;font-weight:bold;">CETAK</a>
            </div>

        </div>

      </form>

  </div>
</div>


<script type="text/javascript">
// $(":radio[name='ins_clo']").click(function() {
//   var radioName = "ins_clo"; 
//   $(":radio[name='" + radioName + "']:not(:checked)").attr("disabled", true); 
// });

  // var emotionsArray = ['disappointed','meh','smile'];
  // var titleArray = ['disappointed','meh','smile'];
  // $("#rating1").emotionsRating({
  //   emotions: emotionsArray,
  //   inputName: "rating1",
  //   initialRating: "ratings1"
  //
  // });
  // $("#rating2").emotionsRating({
  //   emotions: emotionsArray,
  //   inputName: "rating2",
  //   initialRating: "ratings2"
  //
  // });
  // $("#rating3").emotionsRating({
  //   emotions: emotionsArray,
  //   inputName: "rating3",
  //   initialRating: "ratings3"
  //
  // });
</script>
