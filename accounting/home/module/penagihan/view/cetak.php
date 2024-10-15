

<?php
  error_reporting(0);
  $periode=$_GET['period'];
  $kdcomp=$_GET['comp'];
  $company=$_GET['company'];

  if ($company == "-") {
    $comp ="Otsuka Bhakti";
  }else {
    $comp =$company;
  }

  if ($_GET['Penagihan']=='Cetak') {
    include '../../../model/modul/casedate.php';
?>

<title>Penagihan Koperasi Karyawan <?=$comp ?> Periode <?php echo date('M-Y',strtotime($periode)); ?></title>
<link href="../../../images/b_print.png" rel="icon" type="image/png" />

<div>
<div style="width:100%">
  <div style="float:right">
    <b style="font-family:sans-serif; text-shadow: 0px 1px 1px #000;">
      <lable style="color:red;">KOPERASI</lable>
      <lable style="color:#138ac9;">OBS</lable>
    </b>
  </div>
  <div style="float:left">
    <input type="text" name="" value="001/KOP/<?php echo date('m/Y',strtotime($periode)); ?>" style="width:80%; border-top:1px solid white; border-left:1px solid white; border-right:1px solid white; border-bottom:1px solid white;">
  </div>
</div>
</div>

<div align="center" style="float:right;width:100%;font-size:17px; font-family:sans-serif">
  <hr style="border: 1px double">
  <p style="margin-bottom:5px"><strong>Penagihan Koperasi Karyawan <?=$comp ?></strong></p>
</div>
<div align="center" style="float:right;width:100%;font-size:17px; font-family:sans-serif; margin-bottom:0px">
  <h5 style="margin-top:0px">
    Periode <?php echo date('M-Y',strtotime($periode)); ?>
  </h5>
</div>

<div style="float:right;width:100%" align="center">
  <hr>
</div>

<table width="100%" border="0" align="center" style="border:solid 2px black;border-collapse:collapse; font-size:13px">
  <tr style="border-bottom:solid 2px; background:rgba(0, 0, 0, 0.1)">
    <th rowspan="2" width="1%" style="border-right:solid;border-width:1px; font-family:sans-serif">No</th>
    <th rowspan="2" style="border-right:solid;border-width:1px; font-family:sans-serif">No Anggota</th>
	  <th rowspan="2" style="border-right:solid;border-width:1px; font-family:sans-serif">Nama</th>
    <th rowspan="2" style="border-right:solid;border-width:1px; font-family:sans-serif">Simpanan Pokok</th>
    <th colspan="2" style="border-right:solid;border-width:1px; font-family:sans-serif">Simpanan</th>
    <th colspan="2" style="border-right:solid;border-width:1px; font-family:sans-serif">Pinjaman</th>
    <th rowspan="2" style="border-right:solid;border-width:1px; font-family:sans-serif">Total</th>
  </tr>
  <tr align="center" style="border-bottom:solid 2px; background:rgba(0, 0, 0, 0.1)">
		<th style="border-right:solid;border-width:1px; font-family:sans-serif">Wajib</th>
		<th style="border-right:solid;border-width:1px; font-family:sans-serif">Sukarela</th>
		<th style="border-right:solid;border-width:1px; font-family:sans-serif">Pokok</th>
		<th style="border-right:solid;border-width:1px; font-family:sans-serif">Jasa Koperasi</th>
	</tr>

    <?php
      include "../../../model/config/master_koneksi.php";
      $no		  =1;
  		$sb			=0;
      $SUM['pokok']     = 0;
      $SUM['wajib']     = 0;
      $SUM['sukarela']  = 0;
      $SUM['cicil']     = 0;
      $SUM['jasa']      = 0;
      session_start();
      $akses=$_SESSION['akses_user'];

      if ($akses=='default' OR $akses=='superuser'){
        $acuan="";
      }elseif ($akses=='ketua'){
        $acuan="AND `schm`.`ket_schm` NOT LIKE '1'";
      }elseif ($akses=='akunting'){
  		  $acuan="AND `schm`.`ket_schm` NOT LIKE '2'";
      }else{
  		  $acuan="AND ket_schm NOT LIKE '1' AND ket_schm NOT LIKE '2'";
      }

      if ($kdcomp != "") {
        $company = "`akun`.`kd_comp` = $kdcomp AND";
      }else {
        $company = "";
      }

      $sql="SELECT
                `schm`.`id` AS IDSCHM,
                `akun`.`id` AS IDAKUN,
                `akun`.`kd_akun` AS NIK,
                `akun`.`nm_akun` AS nama,
                IF(MAX(`trans_simpan`.`id`) IS NULL,`schm`.`p_schm`,0) AS pokok,
                `schm`.`w_schm` AS wajib,
                `schm`.`s_schm` AS sukarela,
                IF(`pinjam`.`ket_pinjam` = '1','aktif','nonaktif'),
                IF(`pinjam`.`ket_pinjam` = '1',`pinjam`.`jumlah_pinjam` / `pinjam`.`jangka_pinjam`,0) AS cicil,
                IF(`pinjam`.`ket_pinjam` = '1',`pinjam`.`jumlah_pinjam` * (`jasa_pinjam` / 100) / `jangka_pinjam`,0) AS jasa
            FROM
                `schm`
            LEFT JOIN `akun` ON `schm`.`id_akun` = `akun`.`id`
            LEFT JOIN `trans_simpan` ON `schm`.`id`=`trans_simpan`.`id_schm`
            LEFT JOIN `pinjam` ON `schm`.`id` = `pinjam`.`id_schm`
            WHERE
                $company
                `pinjam`.`id` IS NULL AND
                `schm`.`stts_schm` NOT LIKE '3' AND
                `schm`.`stts_schm` NOT LIKE '4' AND
                `schm`.`stts_schm` NOT LIKE '5' AND
                `schm`.`stts_schm` NOT LIKE '6'
                $acuan OR
                $company
                `pinjam`.`ket_pinjam` NOT LIKE '4' AND
                `schm`.`stts_schm` NOT LIKE '3' AND
                `schm`.`stts_schm` NOT LIKE '4' AND
                `schm`.`stts_schm` NOT LIKE '5' AND
                `schm`.`stts_schm` NOT LIKE '6'
                $acuan
                GROUP BY IDSCHM
              ";

      $query	=mysqli_query($koneksi,$sql);
  		while($data=mysqli_fetch_array($query))
  		{
    ?>

  <tr style="border-bottom:solid;border-width:1px">
    <td align="center" width="1%" style="border-right:solid;border-width:1px; font-family:sans-serif"><?=$no?>.</td>
    <td style="border-right:solid;border-width:1px; padding-left:5; font-family:sans-serif"><?=$data['NIK']?></td>
    <td style="border-right:solid;border-width:1px; padding-left:5; font-family:sans-serif"><?=$data['nama']?></td>
    <td align="right" style="border-right:solid;border-width:1px; padding-right:5; font-family:sans-serif">
      <?=number_format($data['pokok'],0,',','.')?>
      <?php $SUM['pokok']+=$data['pokok'] ?>
    </td>
	  <td align="right" style="border-right:solid;border-width:1px; padding-right:5; font-family:sans-serif">
      <?=number_format($data['wajib'],0,',','.')?>
      <?php $SUM['wajib']+=$data['wajib'] ?>
    </td>
    <td align="right" style="border-right:solid;border-width:1px; padding-right:5; font-family:sans-serif">
      <?=number_format($data['sukarela'],0,',','.')?>
      <?php $SUM['sukarela']+=$data['sukarela'] ?>
    </td>
    <td align="right" style="border-right:solid;border-width:1px; padding-right:5; font-family:sans-serif">
      <?=(number_format($data['cicil'],0,',','.'))?> <br>
      <?php
      // $decimals = 2;
      // $number = $data['cicil'];
      // $number = $number * pow(10, $decimals);
      // $number = intval($number);
      // $number = $number / pow(10, $decimals);
      // $number = number_format($data['cicil'],0,',','.');

        echo $number;
      ?>

      <?php $SUM['cicil']+=$data['cicil'] ?>
    </td>
    <td align="right" style="border-right:solid;border-width:1px; padding-right:5; font-family:sans-serif">
      <?=number_format($data['jasa'],0,',','.')?>
      <?php $SUM['jasa']+=$data['jasa'] ?>
    </td>
    <td align="right" style="border-right:solid;border-width:1px; padding-right:5; font-family:sans-serif">
      <?php
        $jumlah=$data['pokok']+$data['wajib']+$data['sukarela']+$data['cicil']+$data['jasa'];
        echo number_format($jumlah,0,',','.');

        $sb += $jumlah;
      ?>
    </td>
  </tr>

  <?php
    $no++;};
  ?>

  <tr align="right" style="background:rgba(0, 0, 0, 0.1); font-family:sans-serif">
		<th>&nbsp;</th>
		<th colspan="2"><b>Sub Total :</th>
      <th>
        <i>
          <?=number_format($SUM['pokok'],0,',','.')?>
        </i>
      </th>
      <th>
        <i>
          <?=number_format($SUM['wajib'],0,',','.')?>
        </i>
      </th>
      <th>
        <i>
          <?=number_format($SUM['sukarela'],0,',','.')?>
        </i>
      </th>
      <th>
        <i>
          <?=number_format($SUM['cicil'],0,',','.')?>
        </i>
      </th>
      <th>
        <i>
          <?=number_format($SUM['jasa'],0,',','.')?>
        </i>
      </th>
		<th style="padding-right:5px">
			<b style="font-size:13">
        <?php
					$rupiahh=number_format($sb,0,',','.');
					echo "$rupiahh";
				?>
			</b>
		</th>
	</tr>

</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div style="float:right;width:100%">
	</div>
  <div style="width:25%;float:right; padding-right:10%;; font-family:sans-serif; font-size:13px">
    <p align="center">
      <?php
        $tgl=date("d");
        $bln=bulan(date("m"));
        $thn=date("Y");
        $hari_skrg=hari(date("l"));

        echo "$hari_skrg, $tgl / $bln / $thn";
      ?>
    </p>
		<p align="center">OTSUKA BHAKTI</p>
		<p align="center">&nbsp;</p>
		<p align="center">&nbsp;</p>
		<hr style="margin:0;">
		<p align="center" style="margin-top:0"><strong>Ketua Koperasi</strong></p>
		<p align="center"><strong>&nbsp;</strong></p>
	</div>
</div>



<!-- export data -->
<?php
  }elseif($_GET['Penagihan']=='Export'){

    if ($company == "Semua") {
      $compe ="ALL";
    }else {
      $compe =$company;
    }

    $MTH=date('m',strtotime($periode));
    $tglskrng =  date('Ymd-his');

    // $objPHPExcel->getActiveSheet()->setTitle('koperasi');

    // $spreadsheet = new Spreadsheet();
    // $sheet = $spreadsheet->getActiveSheet();
    // $sheet->setCellValue('A1', 'Hello World !');

    $namefile = "Export-Tagihan-Koperasi-$compe-MTH-HO-$MTH-$tglskrng.xls";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header("Content-Type: application/xls");
    header("Content-Type: vnd-ms-excel");
    header("Content-Disposition: attachment; filename=$namefile");
    header("Pragma: no-cache");
    header("Expires: 0");

?>

  <style>
    .str{
      mso-number-format:\@;
      padding:5px;
      /* color: red; */
    }
    .num{
      mso-number-format:0;
      padding:5px;
    }
    </style>

  <table border="1">
    <tr align="center">
      <!-- <th style="width:8%;background:#bfbfbf;padding:5px;">No</th> -->
      <th style="width:10%;background:#bfbfbf;padding:5px;">EMPNO</th>
      <th style="width:30%;background:#bfbfbf;padding:5px;">EMPLOYEENAME</th>
      <th style="width:15%;background:#bfbfbf;padding:5px;">PERIODCODE</th>
      <th style="width:25%;background:#bfbfbf;padding:5px;">DEKOP</th>
    </tr>

    <?php
      include "../../../model/config/master_koneksi.php";
      $no		  =1;
      $sb			=0;
      session_start();
      $akses=$_SESSION['akses_user'];

      if ($akses=='default' OR $akses=='superuser'){
        $acuan="";
      }elseif ($akses=='ketua'){
        $acuan="AND `schm`.`ket_schm` NOT LIKE '1'";
      }elseif ($akses=='akunting'){
        $acuan="AND `schm`.`ket_schm` NOT LIKE '2'";
      }else{
        $acuan="AND ket_schm NOT LIKE '1' AND ket_schm NOT LIKE '2'";
      }

      if ($kdcomp != "") {
        $companye = "AND `akun`.`kd_comp` = $kdcomp";
      }else {
        $companye = "";
      }

      $noxl = 1;
      $sql="SELECT
                `schm`.`id` AS IDSCHM,
                `akun`.`id` AS IDAKUN,
                `akun`.`kd_akun` AS NIK,
                `akun`.`nm_akun` AS nama,
                IF(MAX(`trans_simpan`.`id`) IS NULL,`schm`.`p_schm`,0) AS pokok,
                `schm`.`w_schm` AS wajib,
                `schm`.`s_schm` AS sukarela,
                IF(`pinjam`.`ket_pinjam` = '1','aktif','nonaktif'),
                IF(`pinjam`.`ket_pinjam` = '1',`pinjam`.`jumlah_pinjam` / `pinjam`.`jangka_pinjam`,0) AS cicil,
                IF(`pinjam`.`ket_pinjam` = '1',`pinjam`.`jumlah_pinjam` * (`jasa_pinjam` / 100) / `jangka_pinjam`,0) AS jasa
            FROM
                `schm`
            LEFT JOIN `akun` ON `schm`.`id_akun` = `akun`.`id`
            LEFT JOIN `trans_simpan` ON `schm`.`id`=`trans_simpan`.`id_schm`
            LEFT JOIN `pinjam` ON `schm`.`id` = `pinjam`.`id_schm`
            WHERE
                `pinjam`.`id` IS NULL AND
                `schm`.`stts_schm` NOT LIKE '3' AND
                `schm`.`stts_schm` NOT LIKE '4' AND
                `schm`.`stts_schm` NOT LIKE '5' AND
                `schm`.`stts_schm` NOT LIKE '6' $companye
                $acuan OR
                `pinjam`.`ket_pinjam` NOT LIKE '4' AND
                `schm`.`stts_schm` NOT LIKE '3' AND
                `schm`.`stts_schm` NOT LIKE '4' AND
                `schm`.`stts_schm` NOT LIKE '5' AND
                `schm`.`stts_schm` NOT LIKE '6' $companye
                $acuan
                GROUP BY IDSCHM
              ";

      $query	=mysqli_query($koneksi,$sql);
      while($data=mysqli_fetch_array($query))
      {
    ?>

    <tr>
      <!-- <td align="center" class="str" style="width:8%;background:#f2f1f1;font-weight:bold;"><?=$noxl?>.</td> -->
      <td align="left" class="str"><?=$data['NIK']?></td>
      <td align="left" class="str"><?=$data['nama']?></td>
      <td align="left" class="str">MTH_HO<?php echo date('m',strtotime($periode)); ?></td>
      <td align="right" class="num">
        <?php
          $jumlah=$data['pokok']+$data['wajib']+$data['sukarela']+$data['cicil']+$data['jasa'];
          echo number_format($jumlah,0,',','')
          // echo $jumlah;
        ?>
      </td>
    </tr>

    <?php $noxl++;} ?>
  </table>

<?php } ?>

<!-- <script>
   window.print();
</script> -->
