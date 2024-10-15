<form class="" action="?Proses-toolbar" method="post" class="form_input">
  <table>
    <tr>
      <td colspan="8">
        <table>
          <tr>
            <td colspan="8">
              <h1><?=isset($_GET['Toolbar-Edit']) ? 'Ubah':'Tambah'?> Toolbar</h1>
            </td>
          </tr>
      		<tr>
      			<td>Toolbar</td>
      			<td>
              <input type="text" name="tool" <?=isset($_GET['Toolbar-Edit']) ? 'value="'.$_GET['nama'].'"':''?> required>
              <input type="hidden" name="acuan" value="<?=$_GET['id']?>">
              <input type="hidden" name="url_get" value="<?=get_url()?>">
      			</td>
      		</tr>
          <tr>
      			<td>Keterangan</td>
      			<td>
              <input type="text" name="keterangan" <?=isset($_GET['Toolbar-Edit']) ? 'value="'.$_GET['ket'].'"':''?>>
      			</td>
      		</tr>
      		<tr>
      			<td colspan="2">
              <input type="submit" name="<?=isset($_GET['Toolbar-Edit']) ? 'ubah':'simpan'?>" value="<?=isset($_GET['Toolbar-Edit']) ? 'Ubah':'Simpan'?> Toolbar" style="width:50%;">
              <a href="?Toolbar&&header=<?php echo "Konfigurasi" ?>">
                <input type="button" name="simpan" value="Batal" class="bback" style="width:48%;">
              </a>
      			</td>
      		</tr>
      	</table>
      </td>
    </tr>

  </table><br>
</form>
