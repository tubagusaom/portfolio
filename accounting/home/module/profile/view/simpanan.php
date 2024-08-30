<?php

	$sqlv	  ="SELECT id_schm, SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela FROM `trans_simpan` WHERE id_schm = '$kodeschm'";
	$queryv	=mysqli_query($koneksi,$sqlv);
	$datav  =mysqli_fetch_array($queryv);

	$sqlw	  ="SELECT SUM(jumlah_ambil) AS ambil FROM `trans_ambil` WHERE id_schm = '$kodeschm' AND stts_ambil NOT LIKE '1'";
	$queryw	=mysqli_query($koneksi,$sqlw);
	$dataw  =mysqli_fetch_array($queryw);

	$sqltshu	  ="SELECT SUM(value_shu) AS hasil FROM `shu` WHERE id_schm = '$kodeschm'";
	$querytshu	=mysqli_query($koneksi,$sqltshu);
	$datatshu  =mysqli_fetch_array($querytshu);
?>

<table>
	<tr>
		<td colspan="6">
      <h1>
        SIMPANAN
      </h1>
    </td>
	</tr>
	<tr>
		<th align="left" style="width:20%;font-size:13px;">Kode Anggota</th>
		<td colspan="5" style="font-size:13px;"><?=$dataakun['kd_akun']; ?></td>
	</tr>
	<tr>
		<th align="left" style="width:20%;font-size:13px;">Nama</th>
		<td colspan="5" style="font-size:13px;"><?=$dataakun['nm_akun']; ?></td>
	</tr>
	<tr>
		<th align="left" style="font-size:13px;">Total Simpanan</th>
		<td bgcolor="whitesmoke" align="center" style="font-size:13px;"><b>Simpanan Pokok</b></td>
		<td bgcolor="whitesmoke" align="center" style="font-size:13px;"><b>Simpanan Wajib</b></td>
		<td bgcolor="whitesmoke" align="center" style="font-size:13px;"><b>Simpanan Sukarela</b></td>
		<!-- <td bgcolor="whitesmoke" align="center"><b>Penarikan</b></td> -->
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="font-size:13px;">Rp.
			<?php
				$rupiahw=number_format($datav[1],0,',','.');
				echo "$rupiahw";
			?>
		</td>
		<td style="font-size:13px;">Rp.
			<?php
				$rupiahx=number_format($datav[2]+$datatshu[0],0,',','.');
				echo "$rupiahx";
			?>
		</td>
		<td style="font-size:13px;">Rp.
			<?php
				$rupiahy=number_format($datav[3],0,',','.');
				echo "$rupiahy";
			?>
		</td>
		<!-- <td>Rp. -->
			<?php
				// $rupiahz=number_format($dataw[0],0,',','.');
				// echo "$rupiahz";
			?>
		<!-- </td> -->
	</tr>
	<tr>
		<th align="left" style="width:20%;font-size:13px;">Sisa Simpanan</th>
		<td colspan="5" style="border-top:1px solid #999;font-size:13px;">
			<b>Rp.
				<?php
					$sisasimpanan=($datav[1]+$datav[2]+$datav[3]+$datatshu[0])-$dataw[0];
					$rupiahsisa=number_format($sisasimpanan,0,',','.');
					echo "$rupiahsisa";
				?>
			</b>
		</td>
	</tr>
</table>

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<?php
	if (isset($_POST['tarik'])) {
		require_once "tarik.php";
  }
?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<?php require_once "detail_simpan.php"; ?>

<!-- //////////////////////////////////////////////////////////////////////////////// -->


<!-- <br> -->
<?php require_once "shu.php"; ?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<br>
<?php require_once "detail_tarik.php"; ?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->
