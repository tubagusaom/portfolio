<body>
<form action="?Proses-Tambah-Jurnal" method="post" class="form_input">
<table id=datatable>
	<tr>
		<td colspan="2"><h1>Jurnal</h1></td>
	</tr>
	<tr>
		<td>Inisial</td>
		<td>
			<input type="text" name="" value="Jurnal Sementara" placeholder="max 20 character" disabled>
			<input type="hidden" name="init" value="Jurnal Sementara" placeholder="max 20 character">
			<input type="hidden" name="idakun" value="<?php echo $idakun=$_SESSION['id_akun']; ?>">
		</td>
	</tr>
	<tr>
		<td>Account</td>
		<td>
      <select name="account">
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
		<td>Jenis</td>
		<td>
      <select name="jenis">
				<option value="D">Debit</option>
				<option value="K">Kredit</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Value Rp.</td>
		<td>
			<input type="text" name="saldo" value="" placeholder="Value Rp." id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
		</td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>
			<textarea name="keterangan" placeholder="keterangan" required oninvalid="this.setCustomValidity('Silahkan Masukan Keterangan')" oninput="setCustomValidity('')"></textarea>
		</td>
	</tr>
	<tr>
		<td>Kode Reffrensi</td>
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

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

<?php
	$akses=$_SESSION['id_akun'];
  $sql	  ="SELECT * FROM `trans_them` WHERE id_akun='$akses'";
  $query	=mysqli_query($koneksi,$sql);
  $data   =mysqli_fetch_array($query);

	if (isset($data)) {
?>

<form action="?Posting-Jurnal" method="post">
  <table>

    <tr align="center">
      <th rowspan="2">No</th>
      <th rowspan="2" width="10%">Inisial</th>
      <th rowspan="2">Account</th>
      <th rowspan="2">Kode Reff</th>
      <th rowspan="2">Keterangan</th>
      <th rowspan="2">Actual Date</th>
      <th colspan="2">Value</th>
      <th rowspan="2" width="10%">-</th>
    </tr>
		<tr align="center">
			<th>D</th>
			<th>K</th>
		</tr>

    <?php
      $no=1;
			$d=0;
			$k=0;
      $sqls	  ="SELECT `id`, `init_trans`, `saldo_trans`, `jenis_trans`, `reff_trans`, `ket_trans`, `efv_trans`, `id_schema`, `kd_acount`, `stts_trans`, `c_trans` FROM `trans_them` where id_akun='$akses' ORDER BY id ASC";
      $querys	=mysqli_query($koneksi,$sqls);
      while($datas=mysqli_fetch_array($querys)){

      if(fmod($no,2)==1)
        {$warna="ghostwhite";}
      else
        {$warna="whitesmoke";}
    ?>

    <tr class="hover" bgcolor="<?php echo $warna ?>">
      <td><?php echo "$no"; ?></td>
      <td><?php echo "$datas[1]"; ?></td>
      <td>
        <?php
          $sqla	  ="SELECT `id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount` FROM acount WHERE kd_acount='$datas[8]'";
          $querya	=mysqli_query($koneksi,$sqla);
          $dataa	=mysqli_fetch_array($querya);

          echo "$datas[8]";
          echo " - ";
          echo "$dataa[2]";
        ?>
      </td>
      <td><?php echo "$datas[4]"; ?></td>
      <td><?php echo "$datas[5]"; ?></td>
      <td>
        <?php
  				$a=substr($datas[6],8);
  				$b=substr($datas[6],5,2);
  				$c=substr($datas[6],0,4);

  				echo "$a-$b-$c";
  			?>
      </td>
      <td align="right" width="8%">
        <?php
					if ($datas[3]=='D') {
						$debit=$datas[2];
	  				echo number_format($debit,0,',','.');

						$d += $debit;
					}else {
						echo "-";
					}
  			?>
      </td>
			<td align="right" width="8%">
        <?php
					if ($datas[3]=='K') {
						$kredit=$datas[2];
						echo number_format($kredit,0,',','.');

						$k += $kredit;
					}else {
						echo "-";
					}
  			?>
      </td>
      <td align="center">
        <a href="?Edit-Jurnal&&header=<?php echo "Jurnal" ?>&&id=<?php echo "$datas[0]" ?>&&inisial=<?php echo "$datas[1]" ?>&&account=<?php echo "$datas[8]" ?>&&saldo=<?php echo "$datas[2]" ?>&&jenis=<?php echo "$datas[3]" ?>&&reff=<?php echo "$datas[4]" ?>&&ket=<?php echo "$datas[5]" ?>&&date=<?php echo "$datas[6]" ?>">Edit</a> |
  			<a onclick="return confirm('apakah anda yakin hapus ?')" href="?Hapus-Jurnal&&id=<?php echo "$datas[0]" ?>">Hapus</a>
      </td>
    </tr>

    <?php $no++;} ?>

    <tr>
			<td colspan="7" align="right" style="color:darkblue">
				<?php
					$rupiahdebit=number_format($d,0,',','.');
					echo "$rupiahdebit";
				?>
			</td>
			<td align="right" style="color:darkblue">
				<?php
					$rupiahkredit=number_format($k,0,',','.');
					echo "$rupiahkredit";
				?>
			</td>
      <td>
        <input onclick="return confirm('Jurnal sementara akan diposting maka data tidak lagi bisa diubah atau dihapus, Pastikan data yg akan diposting sudah benar !')" type="submit" name="posting" value="Posting" class="import">
      </td>
    </tr>
  </table>
</form>

<?php }else { echo ""; }?>
