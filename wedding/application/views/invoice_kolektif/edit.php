<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
         <form id="myform">
             <table class="table-data">
                <tr>
                    <td style="width: 140px;">Status Invoice: </td>
                    <td>
                        <?php echo form_dropdown('status_tagihan', array('Lunas','Belum Lunas'), $data->status_tagihan , 'id="status_tagihan" class="easyui-combobox" style="width:250px;"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px;">Nama Lembaga Pengusul : </td>
                    <td>
                        <input data-options="required: true" id="nama_lembaga" name="nama_lembaga" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->nama_lembaga ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px;">Nama Kegiatan : </td>
                    <td>
                        <input data-options="required: true" id="nama_kegiatan" name="nama_kegiatan" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->nama_kegiatan ?>">
                    </td>
                </tr>
                
                <tr>
                    <td style="width: 100px;">No Invoice : </td>
                    <td>
                        <input id="no_invoice" name="no_invoice" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->no_invoice ?>">
                    </td>
                </tr>

                <tr>
                    <td style="width: 100px;">Nominal : </td>
                    <td>
                        <input id="jumlah_pembayaran" name="jumlah_pembayaran" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->jumlah_pembayaran ?>">
                    </td>
                </tr>

                <tr>
                    <td style="width: 100px;">Deskripsi : </td>
                    <td>
                        <input id="description" name="description" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->description ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 80px;text-align: right; margin-left: 0;">Bukti Pembayaran : </td>
                    <td>
                        <input id="fileToUpload" class="easyui-filebox" name="fileToUpload" style="width: 250px;" data-options="buttonText: 'Pilih File'">
                        <input type="hidden" name="file_hidden" value="<?=$value->file_bukti?>" />
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Tanggal Pembayaran : </td>
                    <td>
                        <input value="<?php echo date('d/m/Y', strtotime($data->tanggal_pembayaran)) ?>" id="tanggal_pembayaran" name="tanggal_pembayaran" style="width: 250px;" class="easyui-datebox" data-options="">
                        
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
