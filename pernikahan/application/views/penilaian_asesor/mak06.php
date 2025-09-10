<table style="width: 97%;font-size: 11px;border-collapse: collapse;padding: 5px" border="1" data-options="nowrap:false,striped:true,rownumbers:true">
<thead>
    <tr><th data-options="field:'mak061',align:'center'" style="width: 20%;padding: 5px">Unit Kompetensi</th>
    <th data-options="field:'mak062'" style="width: 40%;padding: 5px">Unit Kompetensi</th>
    <th data-options="field:'mak063',align:'center'" style="width: 7.5%;text-align: center">
      K
      <!-- <br> <input type="checkbox" id="mak06k_all" onclick="alertsmak06k()" /> -->
    </th>
    <th data-options="field:'mak064',align:'center'" style="width: 7.5%;text-align: center">
      BK
      <!-- <br> <input type="checkbox" id="mak06bk_all" onclick="alertsmak06bk()" /> -->
    </th>
    <th data-options="field:'mak065',align:'center'" style="width: 21%;">Keterangan</th>

</thead>
<tbody>
    <?php
    foreach($unit_kompetensi as $key=>$value){
            echo '<tr>
            <td style="padding: 5px">'.$value->id_unit_kompetensi.'</td>
            <td style="padding: 5px">'.$value->unit_kompetensi.'</td>
            <td style="padding: 5px;text-align: center">
              <input type="radio" class="ch_mak06_k" name="mak06['.$key.']" value="K" '.(isset($mak06[$key]) && $mak06[$key]=='K'?'checked':'').'/>
            </td>
            <td style="padding: 5px;text-align: center">
              <input type="radio" class="ch_mak06_bk" name="mak06['.$key.']" value="BK" '.(isset($mak06[$key]) && $mak06[$key]=='BK'?'checked':'').'/>
            </td>
            <td style="padding: 5px"><input name="mak06a[]" style="width=100%" value="'.(isset($mak06a[$key])?$mak06a[$key]:'-').'" /></td>
            </tr>';
        }
    ?>

</tbody>
</table>

            <table style="width:97%;border-collapse: collapse;" border="1"  >
  <tr align="center">
    <td style="width:35%;font-weight: bold;" >Aspek Negatif dan Positif dalam Asesmen</td>
    <td style="width:35%;font-weight: bold;" >Pencatatan Penolakan Hasil Asesmen</td>
    <td style="width:35%;font-weight: bold;" >Saran Perbaikan:
(Asesor/Personil Terkait)</td>
  </tr>
  <tr>
    <td style="height: 100px;width:33%;"><textarea name="mak06b[0]" style="width: 100%;height: 100%;"><?php echo (isset($mak06b[0])?$mak06b[0]:''); ?></textarea> </td>
    <td style="height: 100px;width:33%;"><textarea name="mak06b[1]" style="width: 100%;height: 100%;"><?php echo (isset($mak06b[1])?$mak06b[1]:''); ?></textarea> </td>
    <td style="height: 100px;width:34%;"><textarea name="mak06b[2]" style="width: 100%;height: 100%;"><?php echo (isset($mak06b[2])?$mak06b[2]:''); ?></textarea></td>
  </tr>
  <tr>
    <td colspan="3"><p>Kode File: (Diisi oleh LSP)</p></td>
  </tr>
</table>

<br/>
<br/>
<b> Catatan: Format dapat dimodifikasi sesuai dengan jumlah unit kompetensi yang di asesmen </b>

<br/>
<br/>

<script type="text/javascript">
function alertsmak06k(){
    if($("#mak06k_all").is(':checked')){
        $('.ch_mak06_k').prop("checked", true);
    }else{
        $('.ch_mak06_k').prop("checked", false);
    }
}

function alertsmak06bk(){
    if($("#mak06bk_all").is(':checked')){
        $('.ch_mak06_bk').prop("checked", true);
    }else{
        $('.ch_mak06_bk').prop("checked", false);
    }
}
</script>
