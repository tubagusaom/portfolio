
<table class="tabel"  border="1" cellpadding="3" cellspacing="0">
<thead>
    <tr>
      <th class="thead" style="width: 20%; text-align: center;">Kode Unit</th>
      <th class="thead" style="width: 40%;">Unit Kompetensi</th>
      <th class="thead" style="width: 7.5%; text-align: center;">K </br>
        <input id="mak06k"  type="checkbox">
      </th>
      <th class="thead" style="width: 7.5%; text-align: center;">BK </br>
        <input id="mak06bk"  type="checkbox">
      </th>
      <th class="thead" style="width: 21%; text-align: center;">Keterangan</th>
</thead>
<tbody>
    <?php
    foreach($unit_kompetensi as $key=>$value){
            echo '<tr>
            <td align="center">'.$value->id_unit_kompetensi.'</td><td>'.$value->unit_kompetensi.'</td>
            <td align="center" style="padding-left:9px;">
              <input id="mak06_k['.$key.']" type="radio" name="mak06['.$key.']" class="mak06_k" value="K" '.(isset($mak06[$key]) && $mak06[$key]=='K'?'checked':'').'/>
              <label for="mak06_k['.$key.']"><span><span></span></span></label>
            </td>
            <td align="center" style="padding-left:9px;">
              <input id="mak06_bk['.$key.']" type="radio" name="mak06['.$key.']" class="mak06_bk" value="BK" '.(isset($mak06[$key]) && $mak06[$key]=='BK'?'checked':'').'/>
              <label for="mak06_bk['.$key.']"><span><span></span></span></label>
            </td>
            <td align="center">
              <input name="mak06a[]" style="width=100%" value="'.(isset($mak06a[$key])?$mak06a[$key]:'-').'" />
            </td>
            </tr>';
        }
    ?>
</tbody>
</table>

<table class="table" border="1"  cellpadding="3" cellspacing="0">
  <tr align="center">
    <td class="thead" style="width:33%;font-weight: bold;" >Aspek Negatif dan Positif Dalam Asesmen</td>
    <td class="thead" style="width:33%;font-weight: bold;" >Pencatatan Penolakan Hasil Asesmen</td>
    <td class="thead" style="width:34%;font-weight: bold;" >Saran Perbaikan :
(Asesor/Personil  Terkait)</td>
  </tr>
  <tr>
    <td style="height: 100px;width:33%;"><textarea name="mak06b[0]" style="width: 100%;height: 100%;"><?php echo (isset($mak06b[0])?$mak06b[0]:''); ?></textarea> </td>
    <td style="height: 100px;width:33%;"><textarea name="mak06b[1]" style="width: 100%;height: 100%;"><?php echo (isset($mak06b[1])?$mak06b[1]:''); ?></textarea> </td>
    <td style="height: 100px;width:34%;"><textarea name="mak06b[2]" style="width: 100%;height: 100%;"><?php echo (isset($mak06b[2])?$mak06b[2]:''); ?></textarea></td>
  </tr>
  <tr>
    <td colspan="3" style="background:#fff"><p>Kode File : (Diisi oleh LSP)</p></td>
  </tr>
</table>

<br/>
<br/>
<b> Catatan : Format dapat dimodifikasi sesuai dengan jumlah unit kompetensi yang diases </b>

<br/>
<br/>

<script type="text/javascript">
  $('#mak06k').click(function() {
    $('#mak06bk').attr('checked', false);
    $('.mak06_bk').prop('checked', false);
    $('.mak06_k').prop('checked', $(this).prop("checked"));
  });
  $('#mak06bk').click(function() {
    $('#mak06k').attr('checked', false);
    $('.mak06_k').prop('checked', false);
    $('.mak06_bk').prop('checked', $(this).prop("checked"));
  });
</script>
