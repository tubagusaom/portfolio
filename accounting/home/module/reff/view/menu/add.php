<form class="" action="?Proses-Dir" method="post" class="form_input">
  <table>
    <tr>
      <td colspan="8">
        <table>
          <tr>
            <td colspan="8">
              <h1><?=isset($_GET['MenuEdit']) ? 'Ubah':'Tambah'?> Menu</h1>
            </td>
          </tr>
      		<tr>
      			<td><b>Nama Menu</b></td>
      			<td>
              <input type="text" name="dir" <?=isset($_GET['MenuEdit']) ? 'value="'.$_GET['menu'].'"':''?> required <?=isset($_GET['MenuEdit']) ? 'readonly style="background:#ddd"':''?>>
              <input type="hidden" name="url_get" value="<?=get_url()?>">
      			</td>
      		</tr>

          <tr>
            <td> <b> Status Menu </b></td>
            <td>
              <input type="hidden" name="acuan" value="<?=$_GET['id']?>">
              <select name="status" required>
                <option <?=!isset($_GET['MenuEdit']) ? 'selected':''?> value="">Pilih Status</option>
                <option <?=$_GET['status'] == '1' ? 'selected':''?> value="1">Aktif</option>
                <option <?=$_GET['status'] == '0' ? 'selected':''?> value="0">Tidak Aktif</option>
              </select>
            </td>
          </tr>

      		<tr>
      			<td colspan="2">
              <input type="submit" name="<?=isset($_GET['MenuEdit']) ? 'ubah':'simpan_menu'?>" value="<?=isset($_GET['MenuEdit']) ? 'Ubah':'Simpan'?> Menu" style="width:50%;">
              <a href="?Menu&&header=<?php echo "Konfigurasi" ?>">
                <input type="button" name="simpan" value="Batal" class="bback" style="width:48%;">
              </a>
      			</td>
      		</tr>
      	</table>
      </td>
    </tr>

  </table><br>
</form>
