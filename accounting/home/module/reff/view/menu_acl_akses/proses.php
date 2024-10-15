<form class="" action="?Proses-Akses-ACL" method="post" class="form_input">
  <table>
    <tr>
      <td colspan="8">
        <table>
          <tr>
            <td colspan="8">
              <h1><?=isset($_GET['ACLakses-Edit']) ? 'Ubah':'Tambah'?> Akses Menu ACL</h1>
            </td>
          </tr>

          <tr>
      			<td>Akses</td>
      			<td>
              <select name="akses" required oninvalid="this.setCustomValidity('Silahkan Pilih Akses')" oninput="setCustomValidity('')">
      					<option value="" selected>- Pilih Akses -</option>
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
      			<td>Menu ACL</td>
      			<td>

              <select <?=isset($_GET['ACLakses-Edit']) ? 'name="acl" readonly' : 'name="acl[]" multiple style="height:80px!important"'?>>
                <option value="" disabled><b style="color:red">Pilih Menu</b></option>

                <?php
                  $sql_menu = "SELECT
                    a.id,
                    a.menu_acl,
                    a.id_menu,
                    b.keterangan as ketmenu
                    FROM t_menu_acl a
                    JOIN t_menu b ON b.id = a.id_menu
                    WHERE a.stts_menu_acl NOT LIKE '0'
                    ORDER BY b.keterangan ASC
                   -- GROUP BY akun.id
                  ";

                  $query_menu=mysqli_query($koneksi,$sql_menu);
                  while($datamenu=mysqli_fetch_array($query_menu)) {
                ?>

                <option <?=$_GET['idm']==$datamenu['id'] ? 'selected':''?> value="<?=$datamenu['id']?>">
                  <?=$datamenu['ketmenu'] . " - " . $datamenu['menu_acl'] ?>
                </option>

                <?php } ?>
              </select>

              <input type="hidden" name="acuan" value="<?=$_GET['id']?>">
              <input type="hidden" name="url_get" value="<?=get_url()?>">
      			</td>
      		</tr>

          <tr>
      			<td>Status</td>
      			<td>

              <select class="" name="status">
                <option value="">Pilih Status</option>
                <option <?=$_GET['stts']=='1' ? 'selected':''?> value="1"> Aktif </option>
                <option <?=$_GET['stts']=='0' ? 'selected':''?> value="0"> Tidak Aktif </option>
              </select>

      			</td>
      		</tr>

      		<tr>
      			<td colspan="2">
              <input type="submit" name="<?=isset($_GET['ACLakses-Edit']) ? 'ubah':'simpan'?>" value="<?=isset($_GET['ACLakses-Edit']) ? 'Ubah':'Simpan'?> Akses Menu ACL" style="width:50%;">
              <a href="?Akses-Menu-ACL&&header=<?php echo "Konfigurasi" ?>">
                <input type="button" name="simpan" value="Batal" class="bback" style="width:48%;">
              </a>
      			</td>
      		</tr>
      	</table>
      </td>
    </tr>

  </table>
</form>
