<form class="" action="?Proses-Akses" method="post" class="form_input">
  <table>
    <tr>
      <td colspan="8">
        <table>

          <tr>
            <td colspan="8">
              <h1>Tambah Akses Menu</h1>
            </td>
          </tr>

          <tr>
      			<td>Akses</td>
      			<td>
      				<select name="akses" required oninvalid="this.setCustomValidity('Silahkan Pilih Akses')" oninput="setCustomValidity('')">
      					<option value="" selected>-</option>
      					<?php
                  $sql_a=
                      "SELECT
                        a.id,
                        a.nama_peran,
                        a.keterangan
                        FROM t_role a
                        -- JOIN conf_akses ON conf_akses.id_akses = t_role.id
                        WHERE
                              a.nama_peran NOT LIKE 'anonymous'
                              -- a.nama_peran NOT LIKE 'default'
                       -- ORDER BY user.akses_user ASC
                       -- GROUP BY akun.id
                      ";
      	          $query_a=mysqli_query($koneksi,$sql_a);
      	          while($dataa=mysqli_fetch_array($query_a))
      	          {
      	            echo "<option value='$dataa[id]'>$dataa[keterangan] - $dataa[nama_peran]</option>";
      	          };
      	        ?>
      				</select>
      			</td>
      		</tr>
      		<tr>
      			<td>Menu</td>
      			<td>
              <select name="menu" required oninvalid="this.setCustomValidity('Silahkan Pilih Menu')" oninput="setCustomValidity('')">
      					<option value="" selected>-</option>
                <?php
                  $sql_b=
                      "SELECT
                        a.id,
                        a.nm_menu,
                        a.keterangan
                        FROM t_menu a
                        -- WHERE a.stts_divisi LIKE '1' OR
                        --       a.stts_divisi LIKE '2'
                      ";
                  $query_b=mysqli_query($koneksi,$sql_b);
                  while($datab=mysqli_fetch_array($query_b))
                  {
                    echo "<option value='$datab[id]'>$datab[nm_menu] - $datab[keterangan]</option>";
      	          };
                ?>
      				</select>
      			</td>
      		</tr>
          <tr>
            <td>No Urut</td>
            <td>
              <?php
                $sql_n = "SELECT
                  a.no_menu
                  FROM conf_akses a
                  ORDER BY a.no_menu DESC
                ";
                $query_n=mysqli_query($koneksi,$sql_n);
                $datan=mysqli_fetch_array($query_n)
              ?>
              <input type="number" name="no_urut"  required oninvalid="this.setCustomValidity('Silahkan Pilih No Urut')" oninput="setCustomValidity('')">
            </td>
          </tr>
      		<tr>
      			<td colspan="2">
              <input type="submit" name="simpan" value="Simpan " style="width:50%;">
              <a href="?Akses-Menu&&header=<?php echo "Konfigurasi" ?>">
                <input type="button" name="batal" value="Batal" class="bback" style="width:48%;">
              </a>
      			</td>
      		</tr>
      	</table>
      </td>
    </tr>

  </table>
</form>
