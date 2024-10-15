<form class="" action="" method="post" class="form_input">
  <table>
    <tr>
      <td colspan="8">
        <table>

          <tr>
            <td colspan="8">
              <h1>Tambah Menu ACL</h1>
            </td>
          </tr>

          <tr>
            <td>-</td>
            <td>
              <input type="number" name="no_urut" required oninvalid="this.setCustomValidity('Silahkan Pilih No Urut')" oninput="setCustomValidity('')">
            </td>
          </tr>
      		<tr>
      			<td colspan="2">
              <input type="submit" name="simpan" value="Simpan " style="width:50%;">
              <a href="?Hak-Akses&&header=<?php echo "Konfigurasi" ?>">
                <input type="button" name="batal" value="Batal" class="bback" style="width:48%;">
              </a>
      			</td>
      		</tr>
      	</table>
      </td>
    </tr>

  </table>
</form>
