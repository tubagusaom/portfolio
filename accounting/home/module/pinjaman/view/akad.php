<title>FORMULIR PERSETUJUAN PINJAMAN</title>
<link href="../../../images/b_print.png" rel="icon" type="image/png" />

<div style="width:100%">
  <div style="float:left">
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
  <p style="margin-bottom:0px"><strong><u>FORMULIR PERSETUJUAN PINJAMAN</u></strong></p>
</div>

<div align="center" style="margin-bottom:20px">
  <input type="text" value="No.  .../KOP/<?php echo date('m/Y'); ?>" style="margin-left:50px;border-top:1px solid white; border-left:1px solid white; border-right:1px solid white; border-bottom:1px solid white">
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

  $sqlb    ="SELECT id, nm_akun FROM akun where id='$dataa[IDAKUN]'";
  $queryb  =mysqli_query($koneksi,$sqlb);
  $datab   =mysqli_fetch_array($queryb);
?>

<div style="float:right;width:100%;font-family: sans-serif; font-size:14px">
  Berdasarkan hasil survey Panitia Kredit atas permohonan pinjaman anggota :
  <hr>
</div>

<div style="float:right;width:100%;font-family: sans-serif">
<div style="width:50%;float:left; padding-left:50px">
<table border="0" cellspacing="0" cellpadding="0" width="100%" style="font-size:14px">
  <tr>
    <td width="40%"><p>Nama Anggota</p></td>
    <td width="5%"><p>:</p></td>
    <td><p><b><?php echo "$datab[1]"; ?></b></p></td>
  </tr>
  <tr>
    <td style="padding-top:10px"><p>Jumlah Pinjaman</p></td>
    <td style="padding-top:10px"><p>:</p></td>
    <td style="padding-top:10px"><hr style="margin:0; padding:0">Rp.
      <p style="float:right; padding:0; margin:0">
          <?php echo number_format($data[1],0,',','.'); ?>
      </p>
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td><p>Jasa Koperasi <?php echo "$data[8]"; ?>%</p></td>
    <td><p>:</p></td>
    <td>Rp.
      <p style="float:right; padding:0; margin:0">
          <?php
            $jasakop=($data[1]*$data[8])/100;
            echo number_format($jasakop,0,',','.');
          ?>
      </p>
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td><p>Total</p></td>
    <td><p>:</p></td>
    <td>Rp.
      <p style="float:right; padding:0; margin:0">
        <b>
          <?php
            $tot=$data[1]+$jasakop;
            echo number_format($tot,0,',','.');
          ?>
        </i>
      </p>
    </td>
  </tr>
  <tr>
    <td style="padding-top:10px"><p>Pelunasan</p></td>
    <td style="padding-top:10px"><p>:</p></td>
    <td style="padding-top:10px"><?php echo "$data[7]"; ?> Bln</td>
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
      Dana pinjaman akan ditransfer melalui rekening :
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td width="25%" style="padding-left:50px">Bank</td>
    <td width="1%" style="padding-left:50px">:</td>
    <td colspan="3" style="padding-left:30px">
      <div><b><?php echo $data[4]; ?></b></div>
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td style="padding-left:50px">Norek</td>
    <td width="1%" style="padding-left:50px">:</td>
    <td colspan="3" style="padding-left:30px">
      <div><b><?php echo "$data[5]"; ?></b></div>
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td style="padding-left:50px">Pemilik</td>
    <td style="padding-left:50px">:</td>
    <td colspan="3" style="padding-left:30px">
      <div>
        <b>
          <?php echo "$data[6]"; ?>
        </b>
      </div>
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <tr>
    <td colspan="5"><hr style="margin:0; padding:0"><br></td>
  </tr>
</table>

<table width="100%" border="0" style="font-size:14px">
  <tr>
    <td colspan="5">
      Cicilan pinjaman akan dilakukan melalui potongan gaji sesuai jadwal berikut : --
      <hr style="margin:0; padding:0">
    </td>
  </tr>
  <table style="border-top:1px solid #000; font-size:14px" width="100%">
    <tr align="center">
      <th rowspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000; border-left:1px solid #000" width="5%">No</th>
      <th rowspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000">Bulan</th>
      <th colspan="3" style="border-bottom:1px solid #000">Cicilan Rp</th>
      <th rowspan="2" style="border-bottom:1px solid #000;border-left:1px solid #000; border-right:1px solid #000">Sisa pinjaman</th>
    </tr>
    <tr align="center">
      <th style="border-bottom:1px solid #000;border-right:1px solid #000">Pokok</th>
      <th style="border-bottom:1px solid #000;border-right:1px solid #000">Jasa</th>
      <th style="border-bottom:1px solid #000">Total</th>
    </tr>

    <?php for ($i= 1; $i <= $data[7]; $i++){ ?>

    <tr align="right">
      <td align="center" style="border-right:1px solid #000; padding-right:3px; border-bottom:1px solid #000; border-left:1px solid #000">
        <?php
          $x=$data[1];
          $y=$data[7];
          $z=$data[8];

          echo "$i";
        ?>
      </td>
      <td align="center" style="border-right:1px solid #000; padding-right:3px; border-bottom:1px solid #000">
        <?php
        $tanggalpinjam=$data[3];
        // $tanggalpinjam="2018-01-12";
          $Day=date("d",strtotime($tanggalpinjam));

          if ($Day>=20) {
            $i_day=$i;
          }else {
            $i_day=$i-1;
          }
          // tanggalclose penagihan
          // $datex = mktime(0,0,0,date("m",strtotime($tanggalpinjam))+$i,date("d",strtotime($tanggalpinjam)),date("Y",strtotime($tanggalpinjam)));

          // $date = mktime(0,0,0,date("m",strtotime($tanggalpinjam))+$i,date("d",strtotime($tanggalpinjam)),date("Y",strtotime($tanggalpinjam)));
          // echo $datex=date("d-M-Y", $datex);
          // echo $date." - ".$i_day."--".date("d-m-y", strtotime('+'.$i_day.' month', strtotime($tanggalpinjam)));

          // echo ">>".$data[3];

          $datey = "28-".substr($tanggalpinjam,5,2)."-".(substr($tanggalpinjam,0,4));

          // echo $datey;
          echo date("d-M-Y", strtotime('+'.$i_day.' month', strtotime($datey)));;

        ?>
      </td>
      <td style="border-right:1px solid #000; padding-right:3px; border-bottom:1px solid #000">
        <?php
          $cipok=$x/$y;
          echo number_format($cipok,0,',','.');
        ?>
      </td>
      <td style="border-right:1px solid #000; padding-right:3px; border-bottom:1px solid #000">
        <?php
          $cijas=(($x*$z)/100)/$y;
          echo number_format($cijas,0,',','.');
        ?>
      </td>
      <td style="padding-right:3px; border-bottom:1px solid #000">
        <?php
          $totalpinjaman=$cipok+$cijas;
          echo number_format($totalpinjaman,0,',','.');
        ?>
      </td>
      <td style="padding-right:3px; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">
        <?php
          $sisapinjaman=$tot-($totalpinjaman*$i);
          echo number_format($sisapinjaman,0,',','.');
        ?>
      </td>
    </tr>

  <?php } ?>
  </table>
</table>

<div class="">
  <p align="left"><hr style="border:1px solid"></p>
</div>
<br>
<div style="float:right;width:100%; font-family:sans-serif">
  <table width="100%" style="font-size:13px">
    <tr>
      <td align="center" colspan="4">
        <?php
          date_default_timezone_set("Asia/Jakarta");

          $tgl=date("d");
          $bln=bulan(date("m"));
          $thn=date("Y");
          echo "Jakarta, $tgl $bln $thn";
        ?>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="4"><u>Mengetahui</u></td>
    </tr>
    <tr>
      <td colspan="4" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" width="25%"><u>Panitia Kredit</u></td>
      <td align="center" width="25%"><u>Panitia Kredit/Payroll</u></td>
      <td align="center" width="25%"><u>Ketua koperasi</u></td>
      <td align="center" width="25%"><u>Peminjam</u></td>
    </tr>
  </table>
</div>

</div>
</div>

<!-- <script>
   window.print();
</script> -->
