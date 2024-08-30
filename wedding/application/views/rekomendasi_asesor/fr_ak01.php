<style>
#table_mak03 td,th{
    padding: 1mm;
}

.tabel{
  width:98%;
  font-size: 12px;
  border-collapse: collapse;
  border-radius:4px;
  table-layout: fixed;
  margin: 10px 0 15px 10px;
  background: #fff;
  padding: 1mm;
}
.thead{
  background-color: #ddd;
}
.tpadd{
  padding-left: 10px;
}
.td{
  border-color:#777;
}
.tx-center{
text-align:center;
}
.tx-bold{
  font-weight:bold;
}
</style>
<table id="table_mak03" class="tabel" border="1" cellpadding="3" cellspacing="0">
<tr>
	<td colspan="2" ><strong>Asesi:</strong>
    <input type="hidden" value="<?php echo (isset($mak03[0]) && $mak03[0]=='1'?'1':'0'); ?>" name="mak03[0]" />
    <?php echo (isset($mak03[0]) && $mak03[0]=='1'?'Setuju':''); ?>
	<br/>
	<br/>
<strong>Bahwa saya sudah mendapatkan Penjelasan Hak dan Prosedur Banding Oleh Asesor.
</strong>
</td>

	</tr>
<tr>
	<td colspan="2"><strong>Asesor:</strong> <select name="mak03[1]">
    <option value="1" <?php echo (isset($mak03[1]) && $mak03[1]=='1'?'Selected':''); ?>>Setuju</option>
    <option value="0" <?php echo (isset($mak03[1]) && $mak03[1]=='0'?'Selected':''); ?>>Tidak Setuju</option></select>
	<br/>
	<br/>
<strong>Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai asesor
 dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang berwenang sehubungan
 dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP.
</strong>
</td>

	</tr>
  <tr>
	<td colspan="2" ><strong>Asesi:</strong>
    <input type="hidden" value="<?php echo (isset($mak03[0]) && $mak03[0]=='1'?'1':'0'); ?>" name="mak03[0]" />
    <?php echo (isset($mak03[0]) && $mak03[0]=='1'?'Setuju':''); ?>
	<br/>
	<br/>
<strong>Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan untuk pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja.
</strong>
</td>

	</tr>
</table>
