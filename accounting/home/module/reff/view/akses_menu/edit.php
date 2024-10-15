<style media="screen">
  .input_blocked{
    font-weight:600;
    font-size: 12px;
    background:transparent;
    border: 1px solid transparent!important;
  }
</style>

<form action="?Proses-Edit-Akses" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Ubah Akses Menu</h1></td>
		</tr>
		<tr>
			<td> Akses </td>
			<td>
				<input type="hidden" name="acuan_kode" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="id_user" value="<?= $id_akses = $_GET['id_user']; ?>">
        <input type="hidden" name="id_menu" value="<?= $id_menu = $_GET['id_menu']; ?>">
        <input type="hidden" name="url_get" value="<?=get_url() ?>">
        <!-- <i class='fa fa-ban'></i> -->
        <input type="text" name="nm_akses" class="input_blocked" value="<?= $_GET['role']; ?>" readonly>
			</td>
		</tr>
    <tr>
      <td>Menu</td>
      <td>
        <select name="id_menu">
          <option value="<?= $id_menu; ?>"><?= $_GET['menu']; ?></option>
          <?php
            $sqlc_akses="SELECT
                        a.id,
                        a.id_akses,
                        a.id_menu
                      FROM conf_akses a
                      JOIN t_menu b ON b.id = a.id_menu
                      -- WHERE
                      --       a.id_menu NOT LIKE $id_menu AND
                      --       a.id_akses NOT LIKE $id_akses
                    ";

  	          $queryc_akses=mysqli_query($koneksi,$sqlc_akses);
              while($datac_akses=mysqli_fetch_array($queryc_akses)){

              $sql_d="SELECT
                    t_menu.id,
                    t_menu.keterangan
                  FROM t_menu
                  WHERE
                        -- divisi.id NOT LIKE $iddv AND
                        t_menu.id NOT LIKE $datac_akses[id_menu]
              ";
              $query_d=mysqli_query($koneksi,$sql_d);
  	          while($data_d=mysqli_fetch_array($query_d))
  	          {
                echo "<option value='$data_d[id]'>$data_d[keterangan]</option>";
  	          };

            };
	        ?>
        </select>
      </td>

      <tr>
        <td>No Urut</td>
        <td>
          <input type="text" name="urutan" value="<?= $_GET['no']; ?>">
        </td>
      </tr>
		</tr>

	</table>
  <table>
    <tr>
      <td>
        <a href="?Akses-Menu&&header=Konfigurasi&&Akses=Addakses">
  			   <input style="width:100%" type="button" class="bback" name="ubah" value="Kembali">
        </a>
  		</td>
      <td>
				<input style="width:100%" type="submit" name="ubah" value="Ubah Akses Menu">
			</td>
		</tr>
  </table>
</form>
