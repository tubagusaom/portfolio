<style>
.table_mak07 td,th{
    /* padding: 1mm; */
}

</style>
<table class="tabel"  border="1" cellpadding="3" >
	<tr>
		<td class="thead"> <strong> Penjelasan :</strong> </td>
	</tr>
	<tr>
		<td class="tpadd">1. Peninjauan seharusnya dilakukan oleh asesor yang mensupervisi implementasi asesmen. </td>
 	</tr>
	<tr>
		<td class="tpadd">2. Jika tinjauan dilakukan oleh asesor lain, tinjauan akan dilakukan setelah seluruh proses implementasi asesmen telah selesai. </td>
 	</tr>
	<tr>
		<td class="tpadd">3. Peninjauan dapat dilakukan secara terpadu dalam skema sertifikasi dan / atau peserta kelompok yang homogen. </td>
 	</tr>
</table>

<table class="tabel" border="1" cellpadding="3" cellspacing="0" >
  <tr align="center">
    <td class="thead" style="width:53%;" rowspan="2"><strong> Aspek yang ditinjau</strong></td>
    <td class="thead" colspan="4" style="width:45%;"><strong> Kesesuaian dengan prinsip Asesmen</strong></td>
  </tr>
  <tr align="center">
    <td class="thead" style="width:11%;">
      <em>Validitas</em><br>
      <input type="checkbox" id="valid">
    </td>
    <td class="thead" style="width:11%;">
      <em>Reliable</em><br>
      <input type="checkbox" id="reliabel">
    </td>
    <td class="thead" style="width:11%;">
      <em>Fleksible</em><br>
      <input type="checkbox" id="fleksibel">
    </td>
    <td class="thead" style="width:12%;">
      <em>Adil</em><br>
      <input type="checkbox" id="fair">
    </td>
  </tr>
  <tr>
    <td><p><strong> Prosedur Asesmen:</strong></p>
    <p> • Rencana asesmen</p></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07valid"  name="mak07[0]" <?=(isset($mak07[0]) && $mak07[0]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07reliabel" name="mak07[1]" <?=(isset($mak07[1]) && $mak07[1]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fleksibel" name="mak07[2]" <?=(isset($mak07[2]) && $mak07[2]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fair" name="mak07[3]" <?=(isset($mak07[3]) && $mak07[3]=='on' ? 'checked' :'')?>/></td>
  </tr>
  <tr>
    <td> • Persiapan asesmen</td>
    <td style="text-align: center;"><input type="checkbox" class="mak07valid"  name="mak07[4]" <?=(isset($mak07[4]) && $mak07[4]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07reliabel" name="mak07[5]" <?=(isset($mak07[5]) && $mak07[5]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fleksibel" name="mak07[6]" <?=(isset($mak07[6]) && $mak07[6]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fair" name="mak07[7]" <?=(isset($mak07[7]) && $mak07[7]=='on' ? 'checked' :'')?>/></td>
  </tr>
  <tr>
    <td> • Implementasi asesmen</td>
    <td style="text-align: center;"><input type="checkbox" class="mak07valid" name="mak07[8]" <?=(isset($mak07[8]) && $mak07[8]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07reliabel" name="mak07[9]" <?=(isset($mak07[9]) && $mak07[9]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fleksibel" name="mak07[10]" <?=(isset($mak07[10]) && $mak07[10]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fair" name="mak07[11]" <?=(isset($mak07[11]) && $mak07[11]=='on' ? 'checked' :'')?>/></td>
  </tr>
  <tr>
    <td> • Keputusan asesmen</td>
    <td style="text-align: center;"><input type="checkbox" class="mak07valid" name="mak07[12]" <?=(isset($mak07[12]) && $mak07[12]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07reliabel" name="mak07[13]" <?=(isset($mak07[13]) && $mak07[13]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fleksibel" name="mak07[14]" <?=(isset($mak07[14]) && $mak07[14]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fair" name="mak07[15]" <?=(isset($mak07[15]) && $mak07[15]=='on' ? 'checked' :'')?>/></td>
  </tr>
  <tr>
    <td> • Umpan balik asesmen</td>
    <td style="text-align: center;"><input type="checkbox" class="mak07valid"  name="mak07[16]" <?=(isset($mak07[16]) && $mak07[16]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07reliabel" name="mak07[17]" <?=(isset($mak07[17]) && $mak07[17]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fleksibel" name="mak07[18]" <?=(isset($mak07[18]) && $mak07[18]=='on' ? 'checked' :'')?>/></td>
    <td style="text-align: center;"><input type="checkbox" class="mak07fair" name="mak07[19]" <?=(isset($mak07[19]) && $mak07[19]=='on' ? 'checked' :'')?>/></td>
  </tr>
  <tr>
    <td colspan="5"> Rekomendasi untuk peningkatan : <textarea style="width: 100%;" rows="2" name="mak07[20]"><?php echo (isset($mak07[20])?$mak07[20]:''); ?></textarea>
  </tr>
</table>

<br>


<table class="table" border="1" cellpadding="3" cellspacing="0" style="background:#fff" >
 <tr align="center">
    <td class="thead" style="width:42%;" rowspan="2"><strong> Aspek yang ditinjau</strong></td>
    <td class="thead" colspan="5" style="width:54%;"><strong> Pemenuhan terhadap Dimensi Kompetensi</strong></td>
  </tr>
  <tr align="center">
    <td class="thead" style="width:11%;font-size: 10px;"><em>Task Skill</em></td>
    <td class="thead" style="width:11%;font-size: 10px;"><em>Task Management Skill</em></td>
    <td class="thead" style="width:11%;font-size: 10px;"><em>Contingency Management Skill</em></td>
    <td class="thead" style="width:12%;font-size: 10px;"><em>Jobe Role/<br>Environment<br>Management Skill</em></td>
    <td class="thead" style="width:11%;font-size: 10px;"><em>Transfer Skill</em></td>
  </tr>
  <tr>
    <td style="width:42%;">
      <p><strong> Konsistensi keputusan asesmen</strong></p>
      <p>&nbsp; Bukti dari berbagai asesmen diperiksa </p>
	    <p>&nbsp; untuk konsistensi dimensi kompetensi</p>
    </td>
    <td style="width:11%;text-align: center;"><input type="checkbox"  name="mak07[24]" <?=(isset($mak07[24]) && $mak07[24]=='on' ? 'checked' :'')?>/></td>
    <td style="width:11%;text-align: center;"><input type="checkbox"  name="mak07[25]" <?=(isset($mak07[25]) && $mak07[25]=='on' ? 'checked' :'')?>/></td>
    <td style="width:11%;text-align: center;"><input type="checkbox"  name="mak07[26]" <?=(isset($mak07[26]) && $mak07[26]=='on' ? 'checked' :'')?>/></td>
    <td style="width:12%;text-align: center;"><input type="checkbox"  name="mak07[27]" <?=(isset($mak07[27]) && $mak07[27]=='on' ? 'checked' :'')?>/></td>
    <td style="width:11%;text-align: center;"><input type="checkbox"  name="mak07[28]" <?=(isset($mak07[28]) && $mak07[28]=='on' ? 'checked' :'')?>/></td>
  </tr>
  <tr>
    <td colspan="6" style="height: 90px;width: 98%;"> Rekomendasi untuk peningkatan : <textarea style="width: 100%;" rows="2" name="mak07[29]"><?php echo (isset($mak07[29])?$mak07[29]:''); ?></textarea>
    </td>
  </tr>
</table>

<script type="text/javascript">
  $('#valid').click(function() {
    $('.mak07valid').prop('checked', $(this).prop("checked"));
  });
  $('#reliabel').click(function() {
    $('.mak07reliabel').prop('checked', $(this).prop("checked"));
  });
  $('#fleksibel').click(function() {
    $('.mak07fleksibel').prop('checked', $(this).prop("checked"));
  });
  $('#fair').click(function() {
    $('.mak07fair').prop('checked', $(this).prop("checked"));
  });
</script>
