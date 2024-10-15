<style media="screen">
	input:read-only,input:disabled,select:disabled {
		background: #eee;
	}
</style>

<script type="text/javascript">
	function validasi_tarik( form ){
		if (form.anggota.value == "") {
			alert( "Silahkan pilih anggota.!!" );
			form.anggota.focus();
			return false ;
		}
		else if (form.user.value == "") {
			alert( "Tentukan Username.!!" );
			form.user.focus();
			return false ;
		}
		else if (form.pws.value == "") {
			alert( "Tentukan Password.!!" );
			form.pws.focus();
			return false ;
		}
		else if (form.pws.value.length < 5) {
			alert( "Password minimal 5 karakter" );
			form.pws.focus();
			return false ;
		}
		else if (form.pws.value.length > 20) {
			alert( "Password maximal 20 karakter" );
			form.pws.focus();
			return false ;
		}
		else if (form.akses.value == "") {
			alert( "Tentukan Hak Akses.!!" );
			form.akses.focus();
			return false ;
		}
  }

	function ShowHide() {
		if (document.getElementById('cek').checked) {
			document.getElementById('password').type = 'text';
		} else {
			document.getElementById('password').type = 'password';
		}
	}
</script>

<form action="?Proses-Tambah-User" onSubmit="return validasi_tarik(this)" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Tambah User</h1></td>
		</tr>

		<tr>
			<td>Hak Akses</td>
			<td>

				<select name="akses" onchange="filtakses()" id="akses">
					<option selected value="">-</option>
					<?php
	          $sql_r="SELECT t_role.id,t_role.nama_peran,t_role.keterangan from t_role WHERE t_role.id > '3' ORDER BY t_role.id DESC ";
	          $query_r=mysqli_query($koneksi,$sql_r);
	          while($datar=mysqli_fetch_array($query_r))
	          {
	            echo "<option value='$datar[0]'>$datar[2]</option>";
	          };
	        ?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Nama Anggota</td>
			<td>
				<select name="anggota" onchange="filtanggota()" id="idanggota" disabled></select>
			</td>
		</tr>

		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="user" value="<?=isset($data)?$data['almt_akun']:''?>" id="user" disabled required>
				<input type="hidden" name="status_user" id="status_user" value="0">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="pws" value="koperasi" id="password" class="password" disabled>
				<label for="cek" class="input-box fa fa-eye">
					<input type="checkbox" id="cek" name="radio2" value="on" onchange="ShowHide();"> Tampil / Sembunyikan Password
				</label>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">

var base_url = '<?=$this_url->base_url()?>';

function filtanggota(){
		var anggota = $("#idanggota").val();
		var akses = $("#akses").val();
		var user = $("#user").val();
		var password = $("#password").val();
		// alert(anggota);

		if (anggota != '') {
			$("#password").removeAttr("disabled");
			$("#user").removeAttr("disabled");

			$.ajax({
				type 	: 'POST',
				url		: 'module/user/view/sql.php',
				data	:"idper="+anggota ,
			}).success(function (data) {
				var json = data,
				// obj = JSON.parse(json);
				obj = $("#user").val(json);
			});
		}else if (anggota == '') {
			$("#user").val('');
			$('#user').attr('disabled', 'disabled');
			$('#password').attr('disabled', 'disabled');
		}
}

function filtakses(){
	var akses = $("#akses").val();
	var user = $("#user").val();
	var password = $("#password").val();
	var anggota = $("#idanggota").val();

	if (akses != '') {
		$("#idanggota").removeAttr("disabled");

		if (akses == 66) {
			$("#status_user").val('1');
			// $('#user').attr('readonly', true);
		}else {
			$("#status_user").val('1');
			// $('#user').attr('readonly', false);
		}


		$.ajax({
		 type: 'post',
		 url: 'module/user/view/sql_anggota.php',
		 data: {
		  get_option:akses
		 },
		 success: function (response) {
		  document.getElementById("idanggota").innerHTML=response;
		 }
		});
	}else if (akses == '') {
		$('#idanggota').attr('disabled', 'disabled');
		$('#user').attr('disabled', 'disabled');
		$('#password').attr('disabled', 'disabled');
		$("#user").val('');
		$("#idanggota").val('');
	}

}

</script>
