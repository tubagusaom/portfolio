<form class="" action="?Proses-Hak-Akses" method="post" class="form_input">
  <table>
    <tr>
      <td colspan="8">
        <table>
          <tr>
            <td colspan="8">
              <h1>Ubah Akses</h1>
            </td>
          </tr>
      		<tr>
      			<td>Akses</td>
      			<td>
              <input type="text" name="akses" value="<?=$_GET['nama']?>" required>
              <input type="hidden" name="acuan" value="<?=$_GET['id']?>">
              <input type="hidden" name="url_get" value="<?=get_url()?>">
      			</td>
      		</tr>
          <tr>
      			<td>Keterangan</td>
      			<td>
              <input type="text" name="keterangan" value="<?=$_GET['ket']?>" required>
      			</td>
      		</tr>
      		<tr>
      			<td colspan="2">
              <input type="submit" name="ubah" value="Edit Akses" style="width:50%;">
              <a href="?Hak-Akses&&header=<?php echo "Konfigurasi" ?>&&Akses=Addhakakses">
                <input type="button" name="simpan" value="Kembali" class="bback" style="width:48%;">
              </a>
      			</td>
      		</tr>
      	</table>
      </td>
    </tr>

  </table><br>
</form>
