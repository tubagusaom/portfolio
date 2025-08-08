<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
         <form id="myform" enctype="multipart/form-data" action="<?php echo base_url() ?>perangkat_asesmen_detail/upload">
             <table class="table-data">
                <tr>
                    <td style="width: 140px;">Master Perangkat : </td>
                    <td>
                        <?php echo form_dropdown('id_perangkat_asesmen', $nama_perangkat, '', 'id="id_perangkat_asesmen" class="easyui-combobox" style="width:250px;"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px;">Nama Perangkat Detail: </td>
                    <td>
                        <input data-options="required: true" id="perangkat_detail" name="perangkat_detail" style="width: 250px;" class="easyui-textbox" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Kode Perangkat : </td>
                    <td>
                        <input id="no_perangkat_detail" name="no_perangkat_detail" style="width: 250px;" class="easyui-textbox" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px;">Jenis Perangkat : </td>
                    <td>
                        <?php echo form_dropdown('jenis_perangkat', $jenis_perangkat, '', 'id="jenis_perangkat" class="easyui-combobox" style="width:250px;"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Versi : </td>
                    <td>
                        <input id="versi_perangkat" name="versi_perangkat" style="width: 250px;" class="easyui-textbox" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Jumlah Soal : </td>
                    <td>
                        <input id="jumlah_soal" name="jumlah_soal" style="width: 250px;" class="easyui-textbox" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Waktu Pengerjaan : </td>
                    <td>
                        <input id="waktu_pengerjaan" name="waktu_pengerjaan" style="width: 250px;" class="easyui-textbox" >
                    </td>
                </tr>
               
                <tr>
                    <td style="width: 100px;">Description : </td>
                    <td>
                        <input id="description_detail" name="description_detail" style="width: 250px;" class="easyui-textbox">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 80px;text-align: right; margin-left: 0;">Browse : </td>
                    <td>
                        <input id="fileToUpload" class="easyui-filebox" name="fileToUpload" style="width: 250px;" data-options="buttonText: 'Pilih File'">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
