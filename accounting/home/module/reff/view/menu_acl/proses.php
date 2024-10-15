<form class="" action="?Proses-ACL" method="post" class="form_input">
  <table>
    <tr>
      <td colspan="8">
        <table>
          <tr>
            <td colspan="8">
              <h1><?=isset($_GET['ACL-Edit']) ? 'Ubah':'Tambah'?> Menu ACL</h1>
            </td>
          </tr>
      		<tr>
      			<td>Menu</td>
      			<td>

              <select name="menu">
                <option value="">Pilih Menu</option>

                <?php
                  $sql_menu = "SELECT
                    a.id,
                    a.nm_menu,
                    a.keterangan
                    FROM t_menu a
                    WHERE a.stts_menu NOT LIKE '0'
                    ORDER BY a.keterangan ASC
                   -- GROUP BY akun.id
                  ";

                  $query_menu=mysqli_query($koneksi,$sql_menu);
                  while($datamenu=mysqli_fetch_array($query_menu)) {
                ?>

                <option <?=$_GET['idm']==$datamenu['id'] ? 'selected':''?> value="<?=$datamenu['id']?>">
                  <?=$datamenu['keterangan'] . " - " . $datamenu['nm_menu']?>
                </option>

                <?php } ?>
              </select>

              <input type="hidden" name="acuan" value="<?=$_GET['id']?>">
              <input type="hidden" name="url_get" value="<?=get_url()?>">
      			</td>
      		</tr>
          <tr>
      			<td>ACL</td>
      			<td>
              <input type="text" name="acl" <?=isset($_GET['ACL-Edit']) ? 'value="'.$_GET['menu'].'"':''?>>
      			</td>
      		</tr>
          <tr>
      			<td>No Urut</td>
      			<td>
              <input type="number" name="urutan" <?=isset($_GET['ACL-Edit']) ? 'value="'.$_GET['no'].'"':''?>>
      			</td>
      		</tr>
      		<tr>
      			<td colspan="2">
              <input type="submit" name="<?=isset($_GET['ACL-Edit']) ? 'ubah':'simpan'?>" value="<?=isset($_GET['ACL-Edit']) ? 'Ubah':'Simpan'?> Menu ACL" style="width:50%;">
              <a href="?Menu-ACL&&header=<?php echo "Konfigurasi" ?>">
                <input type="button" name="simpan" value="Batal" class="bback" style="width:48%;">
              </a>
      			</td>
      		</tr>
      	</table>
      </td>
    </tr>

  </table><br>
</form>
