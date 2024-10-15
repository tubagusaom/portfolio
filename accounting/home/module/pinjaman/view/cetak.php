<title>FORMULIR PINJAMAN</title>
<link href="../../../images/b_print.png" rel="icon" type="image/png" />

<div style="width:100%">
  <div style="float:left">
    <!-- <img src="../../../images/logokoperasi_k.jpeg" width="5%" align="center" style="margin:10"> -->
    <b style="font-family:sans-serif; text-shadow: 1px 1px 3px maroon;">
      <lable style="color:red;">KOPERASI</lable>
      <lable style="color:darkblue;">OBS</lable>
    </b>
  </div>
</div>

<div align="center" style="float:right;width:100%">
  <hr style="border: 2px double">
</div>

<div align="center" style="float:right;width:100%;font-size:17px; font-family:sans-serif">
  <p><strong><u>FORMULIR PINJAMAN</u></strong></p>
</div>

<?php
  include "../../../model/config/master_koneksi.php";

  function bulan($bln){
    $bulan=$bln;
    switch ($bulan) {
      case 1:$bulan="Januari";
      break;
      case 2:$bulan="Februari";
      break;
      case 3:$bulan="Maret";
      break;
      case 4:$bulan="April";
      break;
      case 5:$bulan="Mei";
      break;
      case 6:$bulan="Juni";
      break;
      case 7:$bulan="Juli";
      break;
      case 8:$bulan="Agustus";
      break;
      case 9:$bulan="September";
      break;
      case 10:$bulan="Oktober";
      break;
      case 11:$bulan="November";
      break;
      case 12:$bulan="Desember";
      break;
    }return $bulan;
  }
?>

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

  $sqlb    ="SELECT id, kd_akun, nm_akun FROM akun where id='$dataa[IDAKUN]'";
  $queryb  =mysqli_query($koneksi,$sqlb);
  $datab   =mysqli_fetch_array($queryb);
?>

<div style="float:right;width:100%;font-family: sans-serif; font-size:14px">
  Yang bertanda tangan dibawah ini :
  <hr>
</div>

<div style="float:right;width:100%;font-family: sans-serif">
<div style="width:50%;float:left; padding-left:50px">
<table border="0" cellspacing="0" cellpadding="0" width="100%" style="font-size:14px">
  <tr>
    <td width="103" valign="top"><p>Nomor Anggota</p></td>
    <td width="19" valign="top"><p>:</p></td>
    <td width="237" valign="top"><p><b><?php echo "$datab[1]"; ?></b></p></td>
  </tr>
  <tr>
    <td valign="top"><p>Nama </p></td>
    <td valign="top"><p>:</p></td>
    <td valign="top"><p><hr style="margin:0; padding:0"><b><?php echo "$datab[2]"; ?></b><hr style="margin:0; padding:0"></p></td>
  </tr>
</table>
</div>
</div>

<div style="float:right;width:100%" align="center">
  <hr>
</div>

<div style="float:right;width:100%;font-family: sans-serif; margin-top:10">
<div style="float:left;width:100%">
<table width="100%" border="0"  style="font-size:14px">
  <tr>
    <td colspan="5">
      Bermaksud mengajukan permohonan pinjaman dana dengan rincian sbb :
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td width="25%" style="padding-left:50px">Jumlah uang</td>
    <td width="1%" style="padding-left:50px">:</td>
    <td colspan="3" style="padding-left:30px">
      <div><b><?php echo "Rp."; echo number_format($data[1],0,',','.'); ?></b></div>
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td style="padding-left:50px">Keperluan</td>
    <td width="1%" style="padding-left:50px">:</td>
    <td colspan="3" style="padding-left:30px">
      <div><b><?php echo "$data[2]"; ?></b></div>
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td style="padding-left:50px">Tanggal Diperlukan</td>
    <td style="padding-left:50px">:</td>
    <td colspan="3" style="padding-left:30px">
      <div>
        <b>
          <?php
            $a=substr($data[3],8);
            $b=substr($data[3],5,2);
            $c=substr($data[3],0,4);

            echo "$a-$b-$c";
          ?>
        </b>
      </div>
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td style="padding-left:50px">Rekening Transfer</td>
    <td style="padding-left:50px">:</td>
    <td style="padding-left:30px" width="20%">Nama Bank</td>
    <td>:</td>
    <td style="padding-left:20px">
      <div><b><?php echo "$data[4]"; ?></b></div>
    </td>
  </tr>
  <tr>
    <td style="padding-left:50px">&nbsp;</td>
    <td style="padding-left:50px">&nbsp;</td>
    <td style="padding-left:30px" width="20%">No rekening</td>
    <td>:</td>
    <td style="padding-left:20px">
      <div><b><?php echo "$data[5]"; ?></b></div>
    </td>
  </tr>
  <tr>
    <td style="padding-left:50px">&nbsp;</td>
    <td style="padding-left:50px">&nbsp;</td>
    <td style="padding-left:30px" width="20%">Nama pemilik</td>
    <td>:</td>
    <td style="padding-left:20px">
      <div><b><?php echo "$data[6]"; ?></b></div>
    </td>
  </tr>
  <tr>
    <td style="padding-left:50px">Dilunasi selama</td>
    <td style="padding-left:50px">:</td>
    <td colspan="3" style="padding-left:30px">
      <hr style="margin:0; padding:0">
      <div><b><?php echo "$data[7]"; ?> Bulan</b></div>
    </td>
  </tr>
  <tr>
    <td colspan="5"><hr style="margin:0; padding:0"><br></td>
  </tr>
</table>

<div style="float:right;width:100%;font-family: sans-serif">
  <table style="font-size:13px">
    <tr>
      <td colspan="2">Dengan ini saya menyatakan :</td>
    </tr>
    <tr>
      <td width="1%">1.</td>
      <td>Besarnya <u><b>Take Home Pay yang saya terima setiap bulannya lebih dari 70%</b></u> dari penghasilan saya.</td>
    </tr>
    <tr>
      <td width="1%">2.</td>
      <td>Bersedia dikenakan biaya administrasi & alokasi SHU sebagai jasa koperasi sebesar 4% per tahun.</td>
    </tr>
    <tr>
      <td width="1%">3.</td>
      <td>Memberikan kuasa pada bagian payrol perusahaan untuk melakukan pemotongan gaji setiap bulannya sesuai dengan besarnya cicilan yang harus saya bayar.</td>
    </tr>
    <tr>
      <td width="1%">4.</td>
      <td>Sanggup melunasi sisa hutang jika saya keluar dari keanggotaan koperasi/keluar dari sebagai karyawan PT Otsuka Bhakti.</td>
    </tr>
    <tr>
      <td width="1%">5.</td>
      <td>Semua data yang disampaikan adalah benar dan bersedia dikenakan sanksi jika dengan sengaja memberikan data yang salah.</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Demikian permohonan ini saya buat dengan sebenarnya tanpa ada paksaan dari pihak manapun.</td>
    </tr>
  </table>
</div>

<div class="">
  <p align="left"><hr style="border:1px solid"></p>
</div>

<div style="float:right;width:100%; font-family:sans-serif">
	<div style="width:40%;float:left; padding-left:2%; font-size:13px">
    <p align="left">Catatan :</p>
    <p align="left">Gambaran pinjaman dan pelunasan perbulan</p>
		<p align="left">
      <table style="border:1px solid #000; font-size:13px" width="100%">
        <tr align="center">
          <th rowspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000">Pinjaman</th>
          <th colspan="3" style="border-bottom:1px solid #000">Cicilan Perbulan</th>
        </tr>
        <tr align="center">
          <th style="border-bottom:1px solid #000;border-right:1px solid #000">Pokok</th>
          <th style="border-bottom:1px solid #000;border-right:1px solid #000">Jasa</th>
          <th style="border-bottom:1px solid #000">Total</th>
        </tr>

        <tr align="right">
          <td style="border-right:1px solid #000; padding-right:3px">
            <?php
              $x=$data[1];
              $y=$data[7];
              $z=$data[8];

              echo "Rp."; echo number_format($x,0,',','.');
            ?>
          </td>
          <td style="border-right:1px solid #000; padding-right:3px">
            <?php
      				$cipok=$x/$y;
      				echo "Rp."; echo number_format($cipok,0,',','.');
      			?>
          </td>
          <td style="border-right:1px solid #000; padding-right:3px">
            <?php
      				$cijas=(($x*$z)/100)/$y;
      				echo "Rp."; echo number_format($cijas,0,',','.');
      			?>
          </td>
          <td style="padding-right:3px">
            <?php
      				$totalpinjaman=$cipok+$cijas;
      				echo "Rp."; echo number_format($totalpinjaman,0,',','.');
      			?>
          </td>
        </tr>
      </table>
    </p>
	</div>
  <div style="width:30%;float:right; padding-right:5%; font-size:14px">
    <p align="right">
      <?php
        date_default_timezone_set("Asia/Jakarta");

        $tgl=date("d");
        $bln=bulan(date("m"));
        $thn=date("Y");
        echo "Jakarta, $tgl $bln $thn";
      ?>
    </p>
    <p align="left">Hormat saya:</p>
		<p align="center">&nbsp;</p>
		<p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
		<hr style="margin:0">
		<p align="center" style="margin-top:0"><strong><?php echo "$datab[2]"; ?></strong></p>
	</div>
</div>

</div>
</div>

<!-- <script>
   window.print();
</script> -->
