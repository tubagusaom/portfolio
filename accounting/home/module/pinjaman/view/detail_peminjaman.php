<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.tape.value == "") {
        alert( "Tentukan Tanggal Transfer.!!" );
        form.tape.focus();
        return false ;
      }
      return true ;
    }
</script>

<?php
  $acuan=$_GET['kode'];

  $sql="SELECT
    `id`,
    `jumlah_pinjam`,
    `keperluan_pinjam`,
    `tgl_pinjam`,
    `bank_pinjam`,
    `norek_pinjam`,
    `pemilik_pinjam`,
    `jangka_pinjam`,
    `jasa_pinjam`,
    `ket_pinjam`,
    `c_pinjam`,
    `id_schm`
      FROM pinjam_them where id='$acuan'";
  $query  =mysqli_query($koneksi,$sql);
  $data   =mysqli_fetch_array($query);

  $sqla    ="SELECT id AS IDSCHM, id_akun AS IDAKUN FROM schm where id='$data[11]'";
  $querya  =mysqli_query($koneksi,$sqla);
  $dataa   =mysqli_fetch_array($querya);

  $sqlb    =
    "SELECT id, kd_akun, nm_akun
      FROM akun
      where id='$dataa[IDAKUN]'
    ";
  $queryb  =mysqli_query($koneksi,$sqlb);
  $datab   =mysqli_fetch_array($queryb);
?>

<form action="?Aprove-Pinjaman" method="post" onsubmit="return checkform(this);">
<table>
	<tr>
		<td colspan="4"><h1>Detail Peminjaman <?php echo $datab[2]; ?></h1></td>
	</tr>

  <tr>
		<td colspan="4" style="border-bottom:2px solid #999">

      <?php if ($akses=='default' OR $akses=='superuser') { ?>

      <input type="submit" name="acc" value="Aprove" onclick="return confirm('Peminjaman <?php echo $datab[2] ?> akan aprove ???')">
      <input type="submit" name="kirim" value="Kirim" onclick="return confirm('Data pinjaman <?php echo $datab[2] ?> akan kirim ???')">
      <a href="module/pinjaman/view/cetak.php?kode=<?php echo $data[0] ?>" target="_blank">
				<input type="button" name="cetak" value="Cetak">
			</a>
      <a href="module/pinjaman/view/akad.php?kode=<?php echo $data[0] ?>" target="_blank">
        <input type="button" name="cetak" value="Akad" class="import">
      </a>

    <?php }elseif ($akses=='ketua'){ ?>

    <input type="submit" name="acc" value="Aprove" onclick="return confirm('Peminjaman <?php echo $datab[2] ?> akan aprove ???')">

    <?php }elseif ($akses=='akunting'){ ?>

    <input type="submit" name="aprove" value="Aprove" onclick="return confirm('Peminjaman <?php echo $datab[2] ?> akan aprove ???')">

    <?php
  }elseif ($akses=='admin' OR $akses=='sekertaris'){
        if ($data[9]!=1) {
          echo "";
        }else{
    ?>

    <input type="submit" name="kirim" value="Kirim" onclick="return confirm('Data pinjaman <?php echo $datab[2] ?> akan kirim ???')">

    <?php } ?>

    <a href="module/pinjaman/view/cetak.php?kode=<?php echo $data[0] ?>" target="_blank">
      <input type="button" name="cetak" value="Cetak">
    </a>

    <a href="module/pinjaman/view/akad.php?kode=<?php echo $data[0] ?>" target="_blank">
      <input type="button" name="cetak" value="Akad" class="import">
    </a>

    <?php } ?>
		</td>
	</tr>

	<tr>
		<th style="width:20%">Kode Anggota</th>
		<td colspan="3">
      <input type="hidden" name="kodepinjaman" value="<?php echo $data[0] ?>">
      <input type="hidden" name="kodeschm" value="<?php echo $dataa[0] ?>">
      <?php echo $datab[1]; ?>
    </td>
	</tr>
	<tr>
		<th style="width:20%">Nama</th>
		<td colspan="3"><?php echo $datab[2]; ?></td>
	</tr>
  <tr>
		<th style="width:20%">Tanggal Transfer</th>
		<td colspan="3" style="float:left">
      <?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
      <input type="date" name="tape" value="<?php echo $data[3] ?>" placeholder="format Thn-Bln-Tgl ( Contoh:2017-08-17 )" style="float:left">
      <?php
        }else{
          $a=substr($data[3],8);
          $b=substr($data[3],5,2);
          $c=substr($data[3],0,4);

          echo "$a-$b-$c";
        }
      ?>
    </td>
	</tr>
	<tr>
		<th>Total Pinjaman</th>
		<td colspan="3">
			<?php
				$x=$data[1];
				$y=$data[7];
				$z=$data[8];

				echo "Rp. "; echo number_format($x,0,',','.');
			?>
		</td>
	</tr>
	<tr>
		<th>Total Jasa Koperasi</th>
		<td colspan="3"><?php echo "Rp. "; echo $cijas=number_format((($x*$z)/100),0,',','.'); ?></td>
	</tr>
	<tr>
		<th>Jangka Waktu</th>
		<td colspan="3"><?php echo $data[7]; ?> Bulan</td>
	</tr>
	<tr>
		<th>Cicilan Perbulan</th>
		<td bgcolor="whitesmoke" align="center"><b>Pokok</b></td>
		<td bgcolor="whitesmoke" align="center"><b>Jasa Koprasi</b></td>
    <td bgcolor="whitesmoke" align="center"><b style="color:darkblue">Total</b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="center">
			<?php
				$cipok=$x/$y;
				echo "Rp."; echo number_format($cipok,0,',','.');
			?>
		</td>
		<td align="center">
			<?php
				$cijas=(($x*$z)/100)/$y;
				echo "Rp."; echo number_format($cijas,0,',','.');
			?>
		</td>
    <td align="center">
      <b style="color:darkblue">
			<?php
				$totalpinjaman=$cipok+$cijas;
				echo "Rp."; echo number_format($totalpinjaman,0,',','.');
			?>
      </b>
		</td>
	</tr>

</table>
</form>
