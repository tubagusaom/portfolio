<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
          <div id="tips">
            <ol class="rounded-list">
              <li><a href="javascript: void(0)">Data Diri</a></li>
            </ol>
          </div>

            <table class="table-data">
                <tr>
                    <td style="width: 150px;">NIK : </td>
                    <td>
                        <input id="nik" name="nik" value="<?=$data->nik; ?>" style="width: 350px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama : </td>
                    <td>
                        <input id="nama" name="nama" value="<?=$data->nama; ?>" style="width: 350px;" class="easyui-textbox" data-options="required: true">
                        <input type="hidden" name="jabatan_id" value="<?=$data->jabatan_id ?>">
                        <input type="hidden" name="akun_karyawan" value="<?=$data->akun_karyawan ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <td style="width: 150px;">Bagian : </td>
                    <td>
                        <select style="width: 350px;"  id="jabatan_id" name="jabatan_id" class="easyui-selectbox" data-options="required: true">
                          <option <?php echo ($data->jabatan_id == '' ? 'selected' :''); ?> >-</option>
                          <option <?php echo ($data->jabatan_id == '4' ? 'selected' :''); ?> value="4">Admin</option>
                          <option <?php echo ($data->jabatan_id == '17' ? 'selected' :''); ?> value="17">Appraisal</option>
                        </select>
                    </td>
                </tr> -->
                <tr>
                    <td style="width: 150px;">No.HP : </td>
                    <td>
                        <input id="telepon" name="telepon" value="<?=$data->telepon; ?>" style="width: 350px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Email : </td>
                    <td>
                        <input id="email" name="email" value="<?=$data->email; ?>" style="width: 350px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Klamin : </td>
                    <td>
                        <select style="width: 350px;"  id="gender" name="gender" class="easyui-selectbox" data-options="required: true">
                          <option <?php echo ($data->gender == '' ? 'selected' :''); ?> selected>-</option>
                          <option <?php echo ($data->gender == '0' ? 'selected' :''); ?> value="0">Pria</option>
                          <option <?php echo ($data->gender == '1' ? 'selected' :''); ?> value="1">Wanita</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Alamat : </td>
                    <td>
                        <textarea rows="3" id="alamat" name="alamat" style="width: 350px;" class="easyui-textarea" data-options="required: true"><?=$data->alamat; ?></textarea>
                    </td>
                </tr>
            </table>

            <div id="tips">
              <ol class="rounded-list">
                <li><a href="javascript: void(0)">Akses Login</a></li>
              </ol>
            </div>

            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Akses Login : </td>
                    <td>
                      <?php
                        $akun_karyawan=$data->akun_karyawan;

                        if ($akun_karyawan == 0) {
                      ?>
                        <input type="checkbox" name="akun_karyawan" value="1">
                      <?php
                        }else {
                          echo "<input type='hidden' name='akun_karyawan' value='2'>";
                          echo "<b>Akses login sudah ada</b>";
                        }
                      ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
