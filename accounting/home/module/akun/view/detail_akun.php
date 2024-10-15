<link rel="stylesheet" href="<?=url_berkas() ?>css/popup.css">

		<div id="DetailPopup">
		  <div class="popup-content">
		    <div class="popup-header">
					<a href="<?=base_url()?>?Data-Anggota=0&&header=Anggota" class="close-button" data-title="close">x</a>
		      <h2>Detail Anggota</h2>
		    </div>
		    <div class="popup-body">
					<?php require_once "detail_popup.php" ?>
				</div>
				<a href="<?=url_copyright()?>" target="_blank" style="cursor: default;"><div class="popup-footer"> © <?=copyright()?>  2021 </div> </a>
		  </div>
			<a href="<?=base_url()?>?Data-Anggota=0&&header=Anggota" class="tooltip">
		  	<div class="overlay"></div>
				<div class="tooltiptext">klik sembarang untuk close</div>
			</a>
		</div>


<form class="" action="" method="post">

<table style="padding-bottom: 50px">
	<tr>
		<td colspan="11">
			<h1 style="text-align:center;">Data Anggota</h1>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<?php
				if (isset($_POST['submit'])) {
					if ($_POST['search']=='') {
						echo "";
					}
					else{
						echo "Pencarian berdasarkan <b>$_POST[search]</b>";
					}
				}
			?>
		</td>
		<td colspan="9">
			<button type="submit" name="submit" class="cari">
				<i class="fa fa-search"></i>
			</button>
			<input type="text" name="search" placeholder="Nama Anggota" class="acount">
		</td>
	</tr>

	<tr>
		<th><i class="fa fa-list-alt"></i></th>
		<th style="font-size:12px;"> <i class="fa fa-user"></i> </th>
		<th>NIK</th>
		<th>Nama</th>
		<th>Mail</th>
		<th>No Hp</th>
		<th>Perusahaan</th>
		<th>
			Divisi <br>
			<font style="font-size:9px;"> Bisnis Unit </font>
		</th>
		<th>Departemen</th>
		<th>Lokasi</th>
		<th style="font-size:14px;"><i class="fa fa-pencil-square-o"></i></th>
	</tr>

	<?php

		// echo $akses;

		if ($akses == "admin") {
			$wheredivisi = "AND kd_divisi IN ('1','2')";
		}elseif($akses == "sekertaris"){
			$wheredivisi = "AND kd_divisi IN ('3','4')";
		}else {
			$wheredivisi = "";
		}

		if (isset($_POST['submit'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

		if ($akses == 'superuser') {
			$whereuser = "";
		}elseif ($akses == 'kredit') {
			$whereuser = "";
			// $whereuser = "stts_user = '0' AND";
		}else {
			$whereuser = "";
			// $whereuser = "stts_user = '1' AND";
		}

		// $halaman = 50;
		// $page = isset($_GET['Data-Anggota'])? (int)$_GET["Data-Anggota"]:1;
		// $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

		// $nopages= 0;
		$no		  = 1;
		$sql	  =
		"SELECT
			`Id`,
			`kd_akun`,
			`nm_akun`,
			`almt_akun`,
			`tlp_akun`,
			`stts_akun`,
			`c_akun`,
			`kd_comp`,
			`kd_divisi`,
			`tgl_perusahaan`,
			`tgl_koperasi`,
			`stts_user`
		FROM akun
		WHERE nm_akun LIKE '%$cari%' AND
					$whereuser
					stts_akun NOT LIKE '3' AND
					stts_akun NOT LIKE '4' AND
					stts_akun NOT LIKE '5' AND
					stts_akun NOT LIKE '6'
          $wheredivisi
		ORDER BY nm_akun ASC";
		// LIMIT $mulai, $halaman";

		$query	=mysqli_query($koneksi,$sql);

		// $total = count(mysqli_fetch_array($query));
		// $pages = ceil($total/$halaman);

		// var_dump($total); die();

		while($data=mysqli_fetch_array($query))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqls	  ="SELECT * FROM schm where id_akun=$data[0]";
			$querys	=mysqli_query($koneksi,$sqls);
			$datas	=mysqli_fetch_array($querys);

			$sqld	  ="SELECT * FROM dept where id=$datas[12]";
			$queryd	=mysqli_query($koneksi,$sqld);
			$datad	=mysqli_fetch_array($queryd);

			$sqll	  ="SELECT * FROM lokasi where id=$datas[13]";
			$queryl	=mysqli_query($koneksi,$sqll);
			$datal	=mysqli_fetch_array($queryl);

			$sqlc	  ="SELECT * FROM company where id=$data[7]";
			$queryc	=mysqli_query($koneksi,$sqlc);
			$datac	=mysqli_fetch_array($queryc);

			$sqldv	  ="SELECT * FROM divisi where id=$data[8]";
			$querydv	=mysqli_query($koneksi,$sqldv);
			$datadv		=mysqli_fetch_array($querydv);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>" style="cursor:pointer" onclick="window.location='<?=base_url()?>?Data-Anggota=<?=$data[0]?>&&header=Anggota#DetailPopup';">

		<td style="text-align:center;">
			<?php
				echo "$no";
			?>.
		</td>


		<?php
			$datastatus = $data['stts_user'];
			// $check = $datastatus == '0' ? '&#10006;' : '&#10004;';
			$check = $datastatus == '0' ? '<i class="fa fa-times"></i>' : '<i class="fa fa-check"></i>';
			$color = $datastatus == '0' ? 'red' : '#000';
		?>
		<td style="text-align:center;">
			<font style="font-size:13px;color:<?=$color?>;">
				<?=$check?>
			</font>
		</td>

		<td><?php echo "$data[1]"; ?></td>
		<td>
			<span class="spnTooltip">Klik untuk melihat detail anggota <br> <?php echo "$data[2]"; ?></span>
			<?php echo "$data[2]"; ?>
		</td>
		<td><?php echo "$data[3]"; ?></td>
		<td><?php echo "$data[4]"; ?></td>
		<td style="text-align: left; font-size:8.5px">
			<font> <?php echo "$datac[1]"; ?> </font>
		</td>
		<td style="text-align: left; font-size:8.5px">
			<font> <?php echo "$datadv[1]"; ?> </font>
		</td>
		<td><?php echo "$datad[1]"; ?></td>
		<td><?php echo "$datal[1]"; ?></td>

		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
		<td align="center">
			<a href="?Edit-Anggota&&header=<?php echo "Anggota" ?>&&id=<?php echo "$data[0]" ?>&&ids=<?php echo "$datas[0]" ?>&&iddept=<?php echo "$datad[0]" ?>&&iddivisi=<?php echo "$data[8]" ?>&&divisi=<?php echo "$datadv[1]" ?>&&idcomp=<?php echo "$data[7]" ?>&&comp=<?php echo "$datac[1]" ?>&&dept=<?php echo "$datad[1]" ?>&&idlok=<?php echo "$datal[0]" ?>&&lokasi=<?php echo "$datal[1]" ?>">
				Edit
			</a> |
			<a href="?Hapus-Anggota&&id=<?php echo "$data[0]" ?>" onclick="return confirm('apakah anda yakin')" href="#">Hapus</a>
		</td>
		<?php }else{ ?>
		<td align="center" width="5%">
			<a href="?Edit-Anggota&&header=<?php echo "Anggota" ?>&&id=<?php echo "$data[0]" ?>&&ids=<?php echo "$datas[0]" ?>&&iddept=<?php echo "$datad[0]" ?>&&iddivisi=<?php echo "$data[8]" ?>&&divisi=<?php echo "$datadv[1]" ?>&&idcomp=<?php echo "$data[7]" ?>&&comp=<?php echo "$datac[1]" ?>&&dept=<?php echo "$datad[1]" ?>&&idlok=<?php echo "$datal[0]" ?>&&lokasi=<?php echo "$datal[1]" ?>">
				Edit
			</a>
		</td>
		<?php } ?>
	</tr>
	<!-- xxxxx -->

	<?php
		$no++;};
	?>
	<!-- <tr>
		<td>
			<?php
				// for ($nopages; $nopages<=$pages ; $nopages++){
			?>
			<a href="?Data-Anggota=<?php // echo $nopages; // ?>&&header=Anggota">
				<?php // echo $nopages; // ?>
			</a>
			<?php // } // ?>
		</td>
	</tr> -->

</table>

</form>

<script type="text/javascript">

</script>
