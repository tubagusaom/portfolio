<link rel="stylesheet" type="text/css" href="<?= site_url().'assets/plugins/datatable/datatables.css' ?>"/>
<link rel="stylesheet" type="text/css" href="<?= site_url().'assets/plugins/datatable/dataTables.bootstrap.min.css' ?>"/>
<link href="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    td.jd{
        padding: 5px;
        width: 20%;
        text-align: center;
    }
    td.bukti{
        padding: 5px;
        width: 80%;
    }
    .lebar{
        width: 100%;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Pra Asesmen</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div><?= tgl_indo(date('Y-m-d')) ?>
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                </div>
            </div>
        </div>
        <h1 class="page-title"> Dashboard Pra Asesmen

        </h1>
        <div class="row">
            <table id="pra_asesmen" class="display table-responsive table-condensed table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <td style="width: 20%;">Skema Sertifikasi</td>
                        <td style="width: 20%;">Complete Name</td>
                        <td style="width: 15%;">Pra Asesmen Date</td>
                        <td style="width: 10%;">Pra Asesmen</td>
                        <td style="width: 20%;">Checked Pra Asesmen</td>
                        <td style="width: 15%;">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_pra_asesmen as $key => $value) { ?>
                    <tr>
                        <td style="width: 20%;"><?= $value->skema ?></td>
                        <td style="width: 20%;"><?= $value->nama_lengkap ?></td>
                        <td style="width: 15%;"><?= tgl_indo($value->pra_asesmen_date) ?></td>
                        <td style="width: 10%;"><?= ($value->pra_asesmen=='1'?'Lanjut':'Tidak Lanjut')?></td>
                        <td style="width: 20%;"><?= $value->nama_user ?></td>                    
                        <td style="width: 15%;">
                          <a href="javascript:;" data-toggle="modal" 
                            data-target="<?php echo '#edit_pra_asesmen_'.$value->id; ?>">
                            <button  data-toggle="modal" data-target="bah-data" class="btn btn-info btn-sm">
                                <i class="icon-pencil"></i>
                            </button>
                    </a></button>
                        </td>                     
                    </tr>
                    <?php } ?>
                </tbody>
            </table>  
            <?php foreach ($data_pra_asesmen as $key => $value) { ?>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" 
            id="<?php echo 'edit_pra_asesmen_'.$value->id; ?>" class="modal fade" style="background-color:rgba(0,0,0, 0.4)">
                <div class="modal-dialog" style="width: 800px;">            
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">EDIT PRA ASESMEN</h4>
                        </div>            
                        <div class="modal-body">
                            <div style="width: 100%; padding: 5px; color: #fff; background-color: #659be0; border-radius: 5px; margin-bottom: 15px;">Dokumen Upload Asesi</div>
                            <div class="form-group">
                                <table style="width: 100%; border-collapse: collapse;" border="1">
                                    <tr>
                                        <td class="jd">Jenis Dokumen</td>
                                        <td class="bukti">Nama Dokumen / File</td>
                                    </tr>
                                    <?php
                                        $bp = json_decode($value->bukti_pendukung, true);
                                        foreach ($bp as $key => $bukti){ ?>
                                        <tr>
                                            <td class="jd"><?= $key ?></td>
                                            <td class="bukti"><a href="#" onclick="buka('<?= $bukti ?>')"><?= $bukti ?></a></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <div style="width: 100%; padding: 5px; color: #fff; background-color: #659be0; border-radius: 5px; margin-bottom: 15px;">Hasil Pra Asesmen</div>   
                            <form id="form_pra_asesmen" class="form-horizontal"> 
                                <table style="width: 100%; border-collapse: collapse;" border="0">
                                    <tr>
                                        <td style="width: 25%;">Pra Asesmen Date:</td>
                                        <td style="width: 75%;">
                                            <?php
                                                if($value->pra_asesmen_date == ""){
                                                    $tanggal_pra_asesmen = date('d/m/Y', strtotime(date('Y-m-d')));
                                                }else{
                                                    $tanggal_pra_asesmen = date('d/m/Y', strtotime($value->pra_asesmen_date));
                                                }
                                                //var_dump($data->pra_asesmen_date);
                                            ?>                                            
                                            <input type="text" name="pra_asesmen_date" id="pra_asesmen_date" value="<?= $tanggal_pra_asesmen ?>" class="form-control date-picker lebar">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;">Hasil Rekomendasi Pra Asesmen:</td>
                                        <td style="width: 75%;">
                                            <?php echo form_dropdown('pra_asesmen', $pra_asesmen, $value->pra_asesmen, 'id="pra_asesmen" onchange="rekomendasi(this)"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;">
                                            Perangkat yang digunakan(Tekan Ctrl untuk memilih lebih dari satu) :
                                        </td>
                                        <td style="width: 75%;">
                                        <?php
                                            if($value->perangkat != ""){
                                                $perangkat_asesmen = @unserialize($value->perangkat);
                                                
                                            }else{
                                                $perangkat_asesmen = array();
                                                
                                            }
                                            //var_dump($perangkat_asesmen);
                                            //var_dump($data_perangkat);
                                        ?>
                                               <?php 
                                                    foreach ($data_perangkat as $key => $value) {
                                                    if (in_array($key, $perangkat_asesmen)) {
                                                    //if ($perangkat_asesmen[$key] == $key) {
                                                        $selected = 'checked';
                                                        //$test = $perangkat_asesmen[$key];
                                                    }else{
                                                        $selected = '';
                                                        //$test = '00';
                                                    }
                                                    echo '<input name="perangkat[]" type="checkbox" '.$selected.'  value="'.$key.'" />'.$value.'<br/>';
                                                } ?>                                            
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>    
                    </div>                  
                </div>
            </div>
            <?php } ?>
              <div class="modal fade" id="vFile" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                      <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>            
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url(); ?>";

    function buka(data) {
        $('#vFile').modal({
            show: true,
            remote: base_url + 'asesi/show_file_asesor?nmfile=' + data,
            refresh: true
        });
        //$('#vFile').load(base_url + 'asesi/show_file?nmfile=' + data);
        //return false;
    }
</script>
<script>
    $(document).ready(function() {
        $('#pra_asesmen').DataTable({
              "autoWidth": true
        });
    });
    $(function(){
        $(".date-picker").datepicker({
            format: 'dd/mm/yyyy',

        });                    
    }
    );    
</script>      
<script type="text/javascript" src="<?= site_url().'assets/plugins/datatable/datatables.js' ?>"></script>
<script type="text/javascript" src="<?= site_url().'assets/plugins/datatable/dataTables.bootstrap.min.js' ?>"></script>
<script type="text/javascript" src="<?= site_url().'assets/plugins/datatable/jquery.dataTables.min.js' ?>"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>      