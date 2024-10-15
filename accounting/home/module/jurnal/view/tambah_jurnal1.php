<html>
<head>
<script>
var idrow = 3;

function tambah(){
    var x=document.getElementById('datatable').insertRow(idrow);
    var td1=x.insertCell(0);
    var td2=x.insertCell(1);
		td1.innerHTML='';
		td2.innerHTML='<input type="button" value="-" onclick="hapus()" class="hapus"><textarea name="keterangan[]" class="acount" placeholder="keterangan" required></textarea><select class="acount" name="jenis[]"><option value="D">Debit</option><option value="K">Kredit</option></select><input class="acount" type="text" name="saldo[]" value="" placeholder="Value Rp." id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><select class="acount" name="account[]"><?php $sql ="SELECT `kd_acount`, `desc_acount`, `jenis_acount` FROM acount WHERE stts_acount NOT LIKE '3' AND type_acount NOT LIKE 'M' ORDER BY kd_acount ASC";
				$query	=mysqli_query($koneksi,$sql);
				while($data=mysqli_fetch_array($query))
				{
					echo "<option value=$data[0]>$data[0] - $data[1]</option>";
				} ?>
		</select>';
    idrow++;
}

function hapus(){
    if(idrow>3){
        var x=document.getElementById('datatable').deleteRow(idrow-1);
        idrow--;
    }
}
</script>
</head>

<body>
<form action="?Proses-Tambah-Jurnal" method="post" class="form_input">
<table id=datatable>
	<tr>
		<td colspan="2"><h1>Jurnal</h1></td>
	</tr>
	<tr>
		<td>Inisial</td>
		<td>
			<input type="text" name="" value="Jurnal" placeholder="max 20 character" disabled>
			<input type="hidden" name="init" value="Jurnal" placeholder="max 20 character">
		</td>
	</tr>
	<tr>
		<td>Account</td>
		<td>
			<input type="button" value="+" onclick="tambah()" class="tambah">

      <textarea name="keterangan[]" class="acount" placeholder="keterangan" required oninvalid="this.setCustomValidity('Silahkan Masukan Keterangan')" oninput="setCustomValidity('')"></textarea>

			<select class="acount" name="jenis[]">
				<option value="D">Debit</option>
				<option value="K">Kredit</option>
			</select>

			<input class="acount" type="text" name="saldo[]" value="" placeholder="Value Rp." id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">

			<select class="acount" name="account[]">
				<?php
					$sql	  ="SELECT `kd_acount`, `desc_acount`, `jenis_acount` FROM acount WHERE stts_acount NOT LIKE '3' AND type_acount NOT LIKE 'M' ORDER BY kd_acount ASC";
					$query	=mysqli_query($koneksi,$sql);
					while($data=mysqli_fetch_array($query))
					{
						echo "<option value=$data[0]>$data[0] - $data[1]</option>";
					} ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Reffrensi</td>
		<td>
			<input type="text" name="reff" value="" placeholder="max 20 character">
		</td>
	</tr>
	<tr>
		<td>Actual Date</td>
		<td>
			<input type="date" name="a_date" value="" placeholder="max 20 character">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="simpan" value="Simpan">
		</td>
	</tr>
</table>
</form>
</body>
</html>
