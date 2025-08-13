<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Jadwal : </td>
                    <td>
                        <?php echo form_dropdown('id_jadwal', $jadwal, $data->id_jadwal, 'id="id_jadwal" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Asesor : </td>
                    <td>
                        <?php echo form_dropdown('id_asesor', $user, $data->id_asesor, 'id="id_asesor" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Sebagai : </td>
                    <td>
                        <input <?php echo $data->jenis_asesmen ? 'checked' : ''; ?> name="jenis_asesmen" type="radio" value="1" > Asesor Mandiri <br>
                        <input <?php echo $data->jenis_asesmen ? 'checked' : ''; ?> name="jenis_asesmen" type="radio" value="2" > Asesor Penguji
                        <br>
                        <input <?php echo $data->jenis_asesmen ? 'checked' : ''; ?> name="jenis_asesmen" type="radio" value="3" > Asesor Mandiri/Penguji
                        <br>
                        <input <?php echo $data->jenis_asesmen ? 'checked' : ''; ?> name="jenis_asesmen" type="radio" value="4" > Lead Asesor
                        <br>
                        <input <?php echo $data->jenis_asesmen ? 'checked' : ''; ?> name="jenis_asesmen" type="radio" value="5" > Penanggung Jawab
                        <br>
                        <input <?php echo $data->jenis_asesmen ? 'checked' : ''; ?> name="jenis_asesmen" type="radio" value="6" > Asesor Lisensi
                        <br>
                        <input <?php echo $data->jenis_asesmen ? 'checked' : ''; ?> name="jenis_asesmen" type="radio" value="7" > Subject Specialist
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
