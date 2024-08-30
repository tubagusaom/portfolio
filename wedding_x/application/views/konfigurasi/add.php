<div class="form-panel" style="margin-left: 0;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap" style="margin-left: 0;">

        <form id="myform">
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Format nomor telepon yang benar 0xxx-nomor telepon atau 0xx-nomor telepon</a></li>
                </ol>
            </div>
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Nama : </td>
                    <td style="width: 300px;">
                        <input id="nama_unit" value="<?php if (isset($data->nama_unit)) echo $data->nama_unit ?>" name="nama_unit" class="easyui-textbox" data-options="required: true" style="width: 300px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Singkatan : </td>
                    <td style="width: 300px;">
                        <input id="singkatan_unit" value="<?php if (isset($data->singkatan_unit)) echo $data->singkatan_unit ?>" name="singkatan_unit" class="easyui-textbox" data-options="required: true" style="width: 300px;">
                    </td>
                </tr>
                <tr>
                    <td>Alamat : </td>
                    <td>
                        <input id="alamat" value="<?php if (isset($data->alamat)) echo $data->alamat ?>" name="alamat" class="easyui-textbox" data-options="required: true" style="width: 300px;">
                    </td>
                </tr>
                <tr>
                    <td>No. Telepon : </td>
                    <td style="width: 300px;">
                        <input id="no_telpon" name="no_telpon" value="<?php if (isset($data->no_telpon)) echo $data->no_telpon ?>" class="easyui-textbox" data-options="required: true,validType:'phonenumber'" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td>No. Fax : </td>
                    <td>
                        <input id="no_fax" name="no_fax" value="<?php if (isset($data->no_fax)) echo $data->no_fax ?>" class="easyui-textbox" data-options="required: true,validType:'phonenumber'" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td>Alamat Email : </td>
                    <td>
                        <input id="alamat_email" name="alamat_email" value="<?php if (isset($data->alamat_email)) echo $data->alamat_email ?>" class="easyui-textbox" data-options="required: true, validType: 'email'" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td>No. SMS Center : </td>
                    <td>
                        <input id="sms_center" name="sms_center" value="<?php if (isset($data->sms_center)) echo $data->sms_center ?>" class="easyui-textbox" data-options="required: true, validType:'mobile'" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td>URL Aplikasi : </td>
                    <td>
                        <input id="url_aplikasi" name="url_aplikasi" value="<?php if (isset($data->url_aplikasi)) echo $data->url_aplikasi ?>" class="easyui-textbox" data-options="required: true" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td>Kode : </td>
                    <td>
                        <input id="kode_tbl" name="kode_tbl" value="<?php if (isset($data->kode_tbl)) echo $data->kode_tbl ?>" class="easyui-textbox" readonly data-options="required: true" style="width: 200px;">
                    </td>
                </tr>
                <!-- <tr>
                    <td>Kode Sektor : </td>
                    <td>
                        <input id="kode_sektor" name="kode_sektor" value="<?php if (isset($data->kode_sektor)) echo $data->kode_sektor ?>" class="easyui-textbox" data-options="required: true" style="width: 200px;">
                    </td>
                </tr> -->
                <tr>
                    <td>Ketua / Direktur : </td>
                    <td>
                        <input id="ketua" name="ketua" value="<?php if (isset($data->ketua)) echo $data->ketua ?>" class="easyui-textbox" data-options="required: true" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td>Manajer : </td>
                    <td>
                        <input id="manajer_sertifikasi" name="manajer_sertifikasi" value="<?php if (isset($data->manajer_sertifikasi)) echo $data->manajer_sertifikasi ?>" class="easyui-textbox" data-options="required: true" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td>Header Body : </td>
                    <td>
                        <input id="unit_name" name="unit_name" value="<?php if (isset($data->unit_name)) echo $data->unit_name ?>" class="easyui-textbox" data-options="required: true" style="width: 200px;">
                    </td>
                </tr>
            </table>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Format Pesan atau Notifikasi Sistem</a></li>
                </ol>
            </div>
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Pesan Pendaftaran Sukses : </td>
                    <td style="width: 300px;">
                        <input id="pesan_sukses_pendaftaran" value="<?= $data->pesan_sukses_pendaftaran ?>" name="pesan_sukses_pendaftaran" class="easyui-textbox" data-options="required: true" style="width: 300px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Pesan Gagal Double : </td>
                    <td style="width: 300px;">
                        <input id="pesan_gagal_double" value="<?= $data->pesan_gagal_double ?>" name="pesan_gagal_double" class="easyui-textbox" data-options="required: true" style="width: 300px;">
                    </td>
                </tr>

            </table>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Body</a></li>
                </ol>
            </div>
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Text Body : </td>
                    <td style="width: 300px;">
                        <input id="text_body" name="text_body" value="<?php if (isset($data->text_body)) echo $data->text_body ?>" class="easyui-textbox" data-options="required: true" style="width: 300px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tahun 2019 : </td>
                    <td style="width: 300px;">
                        <input type="checkbox" name="th2019" <?php echo $data->th2019 == '1' ? 'checked' : '' ?>>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tahun 2020 : </td>
                    <td style="width: 300px;">
                        <input type="checkbox" name="th2020" <?php echo $data->th2020 == '1' ? 'checked' : '' ?>>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tahun 2021 : </td>
                    <td style="width: 300px;">
                        <input type="checkbox" name="th2021" <?php echo $data->th2021 == '1' ? 'checked' : '' ?>>
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
