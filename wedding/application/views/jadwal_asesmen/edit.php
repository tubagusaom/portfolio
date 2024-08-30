<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">

            <table class="table-data">
                <tr>
                    <td style="width: 200px;">Kode Jadwal </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input value="<?php echo $data->kode_jadwal; ?>" id="kode_jadwal" name="kode_jadwal" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Jadwal Uji Kompetensi </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input value="<?php echo $data->jadual; ?>" id="jadual" name="jadual" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>

                <!-- <tr>
                    <td style="width: 150px;">Skema </td>
                    <td>
                        <?php echo form_dropdown('id_skema', $skema, $data->id_skema, 'id="id_skema" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr> -->
                <tr>
                    <td style="width: 200px;">Uji Kolektif </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <?php echo form_dropdown('is_kolektif', array('N','Y'), $data->is_kolektif, 'id="is_kolektif" class="easyui-combobox"  style="width: 250px;" data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Tempat Uji Kompetensi </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input id="id_tuk" name="id_tuk" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->id_tuk; ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Tanggal & Jam Mulai </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input value="<?php echo date('d/m/Y', strtotime($data->tanggal)) ?>" id="tanggal" name="tanggal" style="width: 122px;" class="easyui-datebox" data-options="">
                        <input id="starttime" name="starttime" class="easyui-timespinner" value="<?php echo $data->starttime ?>" labelPosition="top" style="width:122px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Tanggal & Jam Akhir </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input value="<?php echo date('d/m/Y', strtotime($data->tanggal_akhir)) ?>" id="tanggal_akhir" name="tanggal_akhir" style="width: 122px;" class="easyui-datebox" data-options="">
                        <!-- <input id="endtime" name="endtime" class="easyui-timespinner" style="width:122px;" data-options="min:'00:00',showSeconds:true"> -->
                        <input id="endtime" name="endtime" class="easyui-timespinner" label="End Time:" labelPosition="top" value="<?php echo $data->endtime ?>" style="width:122px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Kuota Peserta </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input id="kuota_peserta" name="kuota_peserta" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->kuota_peserta; ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Potongan Biaya Asesmen </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input id="discount_event" name="discount_event" style="width: 250px;" class="easyui-numberbox" data-options="required: true" value="<?php echo $data->discount_event; ?>">
                    </td>
                </tr>

                <tr>
                    <td style="width: 200px;">Persyaratan / Notifikasi Peserta </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <textarea rows="4" cols="40" name="persyaratan" id="persyaratan" style="width: 250px;" ><?php echo $data->persyaratan; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Panitia / Pengawas <br> (Jika lebih dari satu orang pisahkan dengan koma(,) </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input id="panitia" name="panitia" style="width: 250px;" class="easyui-textbox" data-options="" placeholder="Jika lebih dari satu orang pisahkan dengan (,)" value="<?php echo $data->panitia; ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <td style="width: 200px;">Download Policy (Contoh : 08:00) : </td>
                    <td><input class="easyui-textbox" name="download_time" style="width:250px" placeholder="Contoh : 08:00" value="<?php echo $data->download_time; ?>">

                    </td>
                </tr> -->
                <tr>
                    <td style="width: 200px;">Perangkat Asesmen </td>
                    <td style="width: 5px">:</td>
                    <td>
                        <input id="id_perangkat" name="id_perangkat" style="width: 250px;"  value="<?php echo $data->id_perangkat; ?>"/>
                    </td>
                </tr>
                 <!-- <tr>
                    <td style="width: 150px;">Status Permohonan Blanko : </td>
                    <td> -->
                        <?php
                          // echo form_dropdown('status_permohonan_blanko', array('N','Y'), $data->status_permohonan_blanko, 'id="status_permohonan_blanko" class="easyui-combobox"  data-options="required: true"');
                        ?>
                    <!-- </td>
                </tr> -->
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
<?php
echo $id_tuk;
echo $perangkat_grid;
?>
</script>
