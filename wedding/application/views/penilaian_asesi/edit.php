<style>
.icons-check {
    background: url('<?=base_url().'assets/img/icons/check.png'?>') no-repeat center center;
}
.icons-no_check {
    background: url('<?=base_url().'assets/img/icons/no_check.png'?>') no-repeat center center;
}
</style><div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">Real Asesmen</a></li>
    			</ol>
    		</div>
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Jadwal Asesmen: </td>
                    <td>
                    <input type="hidden" id="administrasi_ujk" name="administrasi_ujk" value="<?php echo $data->administrasi_ujk ?>">
                    <input type="hidden" id="skema_sertifikasi" name="skema_sertifikasi" value="<?php echo $data->skema_sertifikasi ?>">
                    <input type="hidden" id="pra_asesmen_checked" name="pra_asesmen_checked" value="<?php echo $data->pra_asesmen_checked ?>">
                        <input id="jadwal_id" name="jadwal_id"  value="<?php echo $data->jadwal_id ?>" readonly="true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama Lengkap: </td>
                    <td>
                        <input readonly="true" id="nama_lengkap" name="nama_lengkap" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->nama_lengkap ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">No Uji Kompetensi : </td>
                    <td>
                        <input readonly="true" id="no_uji_kompetensi" name="no_uji_kompetensi" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->no_uji_kompetensi ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama Asesor: </td>
                    <td>
                        <input readonly="true" id="id_asesor" name="id_asesor" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->id_asesor ?>">
                        
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tempat Uji Kompetensi : </td>
                    <td>
                        <input readonly="true" id="id_tuk" name="id_tuk" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->id_tuk ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">File Bukti Pendukung : </td>
                    <td>
                        <a href="<?php echo $data->file_bukti_pendukung ?>" target="_blank">Download</a>
                        <input type="hidden" value="<?php echo $data->file_bukti_pendukung ?>" name="file_bukti_pendukung" />
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama Bukti Pendukung : </td>
                    <td>
                        <?php echo $jenis_bukti ?>
                    </td>
                </tr>
            </table>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">Daftar Unit Kompetensi</a></li>
    			</ol>
    		</div>
          
            <table class="easyui-datagrid" style="width: 97%;" data-options="nowrap:false,striped:true,rownumbers:true">
            <thead>
                <tr><th data-options="field:'kode_unit'" style="width: 38%;">Unit Kompetensi</th>
                <th data-options="field:'nama_unit'" style="width: 57%;">Unit Kompetensi</th>
                
            </thead>
            <tbody>
                <?php
                foreach($unit_kompetensi as $value){
                        echo '<tr><td>'.$value->id_unit_kompetensi.'</td><td>'.$value->unit_kompetensi.'</td>
                        </tr>';    
                    }
                ?>   
            </tbody> 
            </table>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">Asesmen Mandiri / APL 02</a></li>
    			</ol>
    		</div>
          
            <table class="easyui-datagrid" style="width: 97%;" data-options="nowrap:false,striped:true,rownumbers:true">
            <thead>
                <tr><th data-options="field:'code'" style="width: 38%;">Elemen Kompetensi / KUK(Kriteria Unjuk Kerja)</th>
                <th data-options="field:'code1'" style="width: 27%;">Jenis Bukti</th>
                <th data-options="field:'code2',align:'center'" style="width: 5%;">K</th>
                <th data-options="field:'code3',align:'center'" style="width: 5%;">BK</th>
                <th data-options="field:'code4',align:'center'" style="width: 5%;">V</th>
                <th data-options="field:'code5',align:'center'" style="width: 5%;">A</th>
                <th data-options="field:'code6',align:'center'" style="width: 5%;">T</th>
                <th data-options="field:'code7',align:'center'" style="width: 5%;">M</th></tr>
            </thead>
            <tbody>
                <?php
                foreach($detail_asesi as $value){
                    if($value['v'] == '1'){
                        $checkedv = 'checked';
                        $iconv = '<i class="icons-check"></i>';
                    }else{
                        $checkedv = '';
                        $iconv = '<i class="icons-no_check"></i>';
                    }
                    if($value['a'] == '1'){
                        $checkeda = 'checked';
                        $icona = '<i class="icons-check"></i>';
                    }else{
                        $checkeda = '';
                        $icona = '<i class="icons-no_check"></i>';
                    }
                    if($value['t'] == '1'){
                        $checkedt = 'checked';
                        $icont = '<i class="icons-check"></i>';
                    }else{
                        $checkedt = '';
                        $icont = '<i class="icons-no_check"></i>';
                    }
                    if($value['m'] == '1'){
                        $checkedm = 'checked';
                        $iconm = '<i class="icons-check"></i>';
                    }else{
                        $checkedm = '';
                        $iconm = '<i class="icons-no_check"></i>';
                    }
                    if($value['is_kompeten']=='k'){
                        echo '<tr><td>'.$value['elemen'].'</td><td>'.$value['jenis_bukti'].'</td>
                        <td>K</td><td>-</td>
                        <td><input hidden type="checkbox" class="v_all" name="v['.$value['id'].']" '.$checkedv.'  />'.$iconv.'</td>
                        <td><input hidden type="checkbox" class="a_all"  name="a['.$value['id'].']" '.$checkeda.'  />'.$icona.'</td>
                        <td><input hidden type="checkbox" class="t_all"  name="t['.$value['id'].']" '.$checkedt.'  />'.$icont.'</td>
                        <td><input hidden type="checkbox" class="m_all"  name="m['.$value['id'].']" '.$checkedm.'  />'.$iconm.'</td>
                        </tr>';    
                    }else{
                        echo '<tr><td>'.$value['elemen'].'</td><td>'.$value['jenis_bukti'].'</td><td>-</td><td>BK</td>
                        <td><input hidden type="checkbox" class="v_all" name="v['.$value['id'].']" '.$checkedv.'  />'.$iconv.'</td>
                        <td><input hidden type="checkbox" class="a_all"  name="a['.$value['id'].']" '.$checkeda.'  />'.$icona.'</td>
                        <td><input hidden type="checkbox" class="t_all"  name="t['.$value['id'].']" '.$checkedt.'  />'.$icont.'</td>
                        <td><input hidden type="checkbox" class="m_all"  name="m['.$value['id'].']" '.$checkedm.'  />'.$iconm.'</td>
                        </tr>';
                    }
                    
                }
                ?>   
            </tbody> 
            </table>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">FR-MAK-01 : CEKLIS MENGASES KOMPETENSI</a></li>
    			</ol>
    		</div>
            <?php $this->load->view('penilaian_asesi/mak01'); ?>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">FR-MAK-02 : FORMULIR BANDING ASESMEN</a></li>
    			</ol>
    		</div>
            <?php $this->load->view('penilaian_asesi/mak02'); ?>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">FR-MAK-03 : FORMULIR PERSETUJUAN ASESMEN DAN KERAHASIAAN</a></li>
    			</ol>
    		</div>
            <?php $this->load->view('penilaian_asesi/mak03'); ?>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">FR-MAK-04 : KEPUTUSAN DAN UMPAN BALIK ASESMEN</a></li>
    			</ol>
    		</div>
            <?php $this->load->view('penilaian_asesi/mak04'); ?>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">FR-MAK-05 : UMPAN BALIK DARI ASESI</a></li>
    			</ol>
    		</div>
            <?php $this->load->view('penilaian_asesi/mak05'); ?>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">FR-MAK-06 : FORMULIR LAPORAN ASESMEN</a></li>
    			</ol>
    		</div>
            <?php $this->load->view('penilaian_asesi/mak06'); ?>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">FR-MAK-07 : MENINJAU PROSES ASESMEN</a></li>
    			</ol>
    		</div>
            <?php $this->load->view('penilaian_asesi/mak07'); ?>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">Summary Rekomendasi Asesor</a></li>
    			</ol>
    		</div>
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Penilaian Asesor : </td>
                    <td>
                        <?php
                            if($data->rekomendasi_asesor == '1'){
                                $hasil_rekomendasi_asesor = 'Kompeten';
                            }else if($data->rekomendasi_asesor == '2'){
                                $hasil_rekomendasi_asesor = 'Belum Kompeten';
                            }else{
                                $hasil_rekomendasi_asesor = '';
                            }
                        ?>
                        <?=$hasil_rekomendasi_asesor?>
                        <input  type="hidden" value="<?=$data->rekomendasi_asesor?>" name="rekomendasi_asesor"/>
                        
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Keterangan : </td>
                    <td><?=$data->rekomendasi_description?>
                        <textarea hidden name="rekomendasi_description" id="rekomendasi_description" rows="4" cols="40"><?=$data->rekomendasi_description?></textarea>
                    </td>
                </tr>
                
            </table>
      </form>
    </div>
</div>
<script type="text/javascript">
function alertsv(){
    if($("#v_all").is(':checked')){
        $('.v_all').prop("checked", true);    
    }else{
        $('.v_all').prop("checked", false);
    }
}
function alertsa(){
    if($("#a_all").is(':checked')){
        $('.a_all').prop("checked", true);    
    }else{
        $('.a_all').prop("checked", false);
    }
}
function alertst(){
    if($("#t_all").is(':checked')){
        $('.t_all').prop("checked", true);    
    }else{
        $('.t_all').prop("checked", false);
    }
}
function alertsm(){
    if($("#m_all").is(':checked')){
        $('.m_all').prop("checked", true);    
    }else{
        $('.m_all').prop("checked", false);
    }
}

 
<?php
echo $jadwal_grid;
echo $asesor_grid;
echo $tuk_grid;
?>

    
</script>