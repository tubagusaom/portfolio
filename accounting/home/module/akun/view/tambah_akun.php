<?php //urutan akun
	$sql= "SELECT id FROM akun order by id DESC";
	$query=mysqli_query($koneksi,$sql);
	$data=mysqli_fetch_array($query);

	$id=$data[0];
	$urutan=$id+1;
?>

<form action="?Proses-Tambah-Anggota" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Pendaftaran Anggota</h1></td>
		</tr>

		<tr>
			<td>Tanggal Bergabung di perusahaan</td>
			<td>
				<input type="date" name="tgl_perusahaan" value="" required oninvalid="this.setCustomValidity('Silahkan Pilih Tanggal Bergabung di perusahaan')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td>Tanggal bergabung di koperasi</td>
			<td>
				<input type="date" name="tgl_koperasi" value="" required oninvalid="this.setCustomValidity('Silahkan Pilih Tanggal Bergabung di koperasi')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">NIK</td>
			<td style="border-top:2px solid #999">
				<input type="text" name="kodeanggota" value="" required oninvalid="this.setCustomValidity('Silahkan Masukan NIK')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>
				<input type="hidden" name="acuan" value="<?php echo $urutan ?>">
				<input type="text" name="nama" value="" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td>Alamat Email</td>
			<td>
				<textarea name="almt" rows="8" cols="40" required oninvalid="this.setCustomValidity('Silahkan Masukan Alamat Email')" oninput="setCustomValidity('')"></textarea>
			</td>
		</tr>
		<tr>
			<td>No Hp (WhatsApp)</td>
			<td>
				<input type="text" name="tlp" value="" required oninvalid="this.setCustomValidity('Silahkan Masukan No Hp (WhatsApp)')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<script>
			function filtcomp(){
			  var company=document.getElementById("comp").value;
			  if (company=="1"){
					echo alert('1');
			  }else if (company=="2"){
					echo alert('2');
			  }
			}
		</script>
		<tr>
			<td style="border-top:2px solid #999">Perusahaan</td>
			<td style="border-top:2px solid #999">
				<select id="comp" name="comp" onchange="filtcomp()" required oninvalid="this.setCustomValidity('Silahkan Pilih Perusahaan')" oninput="setCustomValidity('')">
					<option value="" selected>-</option>
					<?php
						if ($akses == "sekertaris") {
							$wherecomp = "AND id NOT LIKE '1'";
						}elseif($akses == "admin"){
							$wherecomp = "";
						}

	          $sql_c="select * from company WHERE stts_comp NOT LIKE '3' $wherecomp";
	          $query_c=mysqli_query($koneksi,$sql_c);
	          while($datac=mysqli_fetch_array($query_c))
	          {
	            echo "<option value='$datac[0]'>$datac[1]</option>";
	          };
	        ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Bisnis Unit
				<!-- <br> -->
				<b style="font-size:9px;color:#005382">( Divisi )</b>
			</td>
			<td>

				<?php
					// if (isset($_POST['idper'])) {
					// $kd_comp=$_POST['idper'];
					// 	if ($_POST['idper'] == '1') {
					// 		echo "<script>alert('1');</script>";
					// 	}elseif ($kd_comp == '2') {
					// 		echo "<script>alert('1');</script>";
					// 	}
					// }else {
					// 	echo "<script>alert('0');</script>";
					// }
					// include APPPATH."module/akun/model/ok.php";
				?>

				<select id="divi" disabled name="divisi" required oninvalid="this.setCustomValidity('Silahkan Pilih Bisnis Unit')" oninput="setCustomValidity('')">
					<option id="optd" value="" selected>Tentukan Perusahaan</option>
					<?php

						if ($akses == "admin") {
							$wheredivisi = "AND id = '1' OR id = '2'";
						}elseif($akses == "sekertaris"){
								$wheredivisi = "AND id = '2' OR id = '3' OR id = '4'";
						}else {
							$wheredivisi = "";
						}

						$sql_dv="select * from divisi WHERE kd_comp != '' AND stts_divisi NOT LIKE '3' $wheredivisi";
						$query_dv=mysqli_query($koneksi,$sql_dv);
						while($datadv=mysqli_fetch_array($query_dv))
						{
							echo "<option value='$datadv[0]'>$datadv[1]</option>";
						};
	        ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Departemen</td>
			<td>
				<select name="dept" required oninvalid="this.setCustomValidity('Silahkan Pilih Departemen')" oninput="setCustomValidity('')">
					<option value="" selected>-</option>
					<?php
	          $sql_a="select * from dept WHERE stts_dept NOT LIKE '3'";
	          $query_a=mysqli_query($koneksi,$sql_a);
	          while($dataa=mysqli_fetch_array($query_a))
	          {
	            echo "<option value='$dataa[0]'>$dataa[1]</option>";
	          };
	        ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Lokasi</td>
			<td>
				<select name="lokasi" required oninvalid="this.setCustomValidity('Silahkan Pilih Lokasi')" oninput="setCustomValidity('')">
					<option value="" selected>-</option>
					<?php
	          $sql_b="select * from lokasi WHERE stts_lokasi NOT LIKE '3'";
	          $query_b=mysqli_query($koneksi,$sql_b);
	          while($datab=mysqli_fetch_array($query_b))
	          {
	            echo "<option value='$datab[0]'>$datab[1]</option>";
	          };
	        ?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">Simpanan Pokok Rp.</td>
			<td style="border-top:2px solid #999">
				 <input type="text" name="sp" value="" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Simpanan Wajib Rp.</td>
			<td>
				 <input type="text" name="sw" value="" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Simpanan Sukarela Rp.</td>
			<td>
				 <input type="text" name="sr" value="" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">Rekening</td>
			<td style="border-top:2px solid #999">
				<input type="text" name="nabank" value="" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama Bank')" oninput="setCustomValidity('')" placeholder="Bank">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type="number" name="norek" value="" required oninvalid="this.setCustomValidity('Silahkan Masukan No Rekening')" oninput="setCustomValidity('')" placeholder="No Rekening">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="text" name="perek" value="" required oninvalid="this.setCustomValidity('Silahkan Masukan Pemilik Rekening')" oninput="setCustomValidity('')" placeholder="Pemilik"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan" style="width:100%">
			</td>
		</tr>
	</table>
	<!-- <?=$idper; ?> -->
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
	function filtcomp(){
		var compy = $("#comp").val();

		if (compy != '') {
			$("#divi").removeAttr("disabled");
			$('#optd').html("-");
		}else if (compy == '') {
			$('#divi').attr('disabled', 'disabled');
			$("#optd").html("-");
		}

	}

	// var base_url = '<?=$this_url->base_url()?>';
	//
  //   function filtcomp(){
  //       var compy = $("#comp").val();
	// 				// alert(base_url);
  //       $.ajax({
	// 					type : 'POST',
  //           // url: 'module/akun/view/tambah_akun.php',
  //           url: 'module/akun/model/ok.php',
	// 					// url: test_select(compy),
  //           data:"idper="+compy ,
  //       }).success(function (data) {
  //           var json = data,
  //           obj = JSON.parse(json);
  //   	  });
  // }
</script>
