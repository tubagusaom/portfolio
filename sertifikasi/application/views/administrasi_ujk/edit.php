<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform" enctype="multipart/form-data" action="<?php echo $url ?>">
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Administrasi Peserta</a></li>
                </ol>
            </div>
             <table class="table-data">
             <input type="hidden" name="organisasi" value="<?php echo $data->organisasi ?>" />
              <input type="hidden" id="is_kolektif" name="is_kolektif" value="<?php echo $data->is_kolektif ?>" />
                <input type="hidden" id="bukti_pembayaran" name="bukti_pembayaran" value="<?php echo $data->bukti_pembayaran ?>" />

                <tr>
                    <td style="width: 150px;">Apakah Kolektif : </td>
                    <td>
                        <?php echo form_dropdown('id_invoice_kolektif', $invoice, $data->id_invoice_kolektif, 'id="id_invoice_kolektif" class="easyui-combobox" style="width: 200px;"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Status Administrasi : </td>
                    <td>
                        <?php echo form_dropdown('administrasi_ujk', $administrasi_ujk, $data->administrasi_ujk, 'id="administrasi_ujk" class="easyui-combobox" style="width: 200px;" data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Jumlah Pembayaran : </td>
                    <td>
                        <input id="jumlah_pembayaran" name="jumlah_pembayaran" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->jumlah_pembayaran ?>" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Sumber Pendanaan : </td>
                    <td>
                        <?php echo form_dropdown('sumber_pendanaan', $sumber_pendanaan, $data->sumber_pendanaan, 'id="sumber_pendanaan" class="easyui-combobox" style="width: 200px;" data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Metode Pembayaran: </td>
                    <td>
                        <?php echo form_dropdown('metode_pembayaran', $metode_pembayaran, $data->metode_pembayaran, 'id="metode_pembayaran" class="easyui-combobox" style="width: 200px;" data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Atas Nama/No Rekening: </td>
                    <td>
                        <input id="atas_nama" name="atas_nama" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->atas_nama ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tanggal Pembayaran: </td>
                     <td>
                        <?php
                            if($data->tanggal_bayar == ""){
                                $tanggal_bayar = date('d/m/Y', strtotime(date('Y-m-d')));
                            }else{
                                $tanggal_bayar = date('d/m/Y', strtotime($data->tanggal_bayar));
                            }
                            //var_dump($data->pra_asesmen_date);
                        ?>
                        <input id="tanggal_bayar" name="tanggal_bayar" style="width: 200px;" class="easyui-datebox" value="<?php echo $tanggal_bayar ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Bukti Pembayaran: </td>
                    <td>
                        <input id="fileToUpload" class="easyui-filebox" name="fileToUpload" style="width: 250px;" data-options="buttonText: 'Pilih File'"  />
                        <?php
                        if($data->bukti_pembayaran != ""){
                        ?>
                        <a id="download_bukti_pendu-kung" href="<?=base_url().'assets/files/administrasi/'.$data->bukti_pembayaran?>" target="_blank" class="easyui-linkbutton" data-options="iconCls:'icon-save'" style="width:80px">Download</a>
                        <?php
                        }
                        ?>
                        <input type="hidden" name="bukti_pembayaran" id="bukti_pembayaran" value="<?php echo $data->bukti_pembayaran ?>" />

                </tr>
                <tr>
                    <td style="width: 150px;">Catatan : </td>
                    <td>
                        <textarea rows="4" cols="40" name="catatan_konfirmasi_pembayaran" id="catatan_konfirmasi_pembayaran" ><?php echo $data->catatan_konfirmasi_pembayaran ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;"></td>
                    <td>
                        <input type="checkbox" name="notifikasi" value="1" /> Notifikasi Calon Peserta
                        
                    </td>
                </tr>
             </table>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Biodata Peserta</a></li>
                </ol>
            </div>
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">No Identitas: </td>
                    <td>
                    <input type="hidden" id="id_users" name="id_users" value="<?php echo $data->id_users ?>">
                    
                    <input type="hidden" id="u_date_create" name="u_date_create" value="<?php echo $data->u_date_create ?>">
                    <input type="hidden" id="skema_sertifikasi" name="skema_sertifikasi" value="<?php echo $data->skema_sertifikasi ?>">
                    <input type="hidden" id="pra_asesmen_checked" name="pra_asesmen_checked" value="<?php echo $data->pra_asesmen_checked ?>">
                        <input id="no_identitas" name="no_identitas" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->no_identitas ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">No UJK: </td>
                    <td>
                        <input id="no_uji_kompetensi" name="no_uji_kompetensi" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->no_uji_kompetensi ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama Lengkap: </td>
                    <td>
                        <input id="nama_lengkap" name="nama_lengkap" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->nama_lengkap ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Telpon : </td>
                    <td>
                        <input id="telp" name="telp" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->telp ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Email: </td>
                    <td>
                        <input id="skema" name="email" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->email ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tempat Lahir: </td>
                    <td>
                        <input id="tempat_lahir" name="tempat_lahir" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->tempat_lahir ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Tanggal Lahir: </td>
                    <td>
                        <input id="tgl_lahir" name="tgl_lahir" style="width: 200px;" class="easyui-datebox" value="<?php echo date('d/m/Y', strtotime($data->tgl_lahir)) ?>">
                    </td>
                </tr>
                
                 <tr>
                    <td style="width: 150px;">Alamat: </td>
                    <td>
                        <textarea rows="4" cols="40" name="alamat" id="alamat" ><?php echo $data->alamat ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">File Bukti Pendukung: </td>
                    <td><a href="<?php echo $data->file_bukti_pendukung ?>" target="_blank">Download</a>
                    
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Pra Asesmen Date: </td>
                    <td>
                        <input id="pra_asesmen_date" name="pra_asesmen_date" style="width: 200px;" class="easyui-datebox" value="<?php echo date('d/m/Y', strtotime($data->pra_asesmen_date)) ?>">
                    </td>
                </tr>
                 
               
                <tr>
                    <td style="width: 150px;">Pra Asesmen Description : </td>
                    <td>
                        <textarea rows="4" cols="40" name="pra_asesmen_description" id="pra_asesmen_description" ><?php echo $data->pra_asesmen_description ?></textarea>
                    </td>
                </tr>
            </table>
      </form>
    </div>
</div>
<script type="text/javascript">
var id_hidden = '<?php echo $id_hidden?>';
$("#id_invoice_kolektif").combobox({
        onChange: function(newVal, oldVal){
            var link_href = 'administrasi_ujk/cek_invoice';
            var link_url = "";
            if(link_href.charAt(link_href.length -1) == "/")
            {
                link_url = link_href;
            }
            else
            {
                link_url = link_href + '/';
            }
            if(newVal!=''){
                $.ajax({
                    type: 'post',
                    url: link_url,
                    data: {id:newVal},

                    cache: false,
                    success: function(data){
                        dataJson = JSON.parse(data);
                        //alert(dataJson.jumlah_pembayaran);
                        $('#atas_nama').textbox('setValue',dataJson.nama_lembaga);
                        $('#administrasi_ujk').textbox('setValue','1');
                        $('#administrasi_ujk').textbox('setText','Selesai');
                        $('#is_kolektif').val('1');
                        $('#bukti_pembayaran').val(dataJson.file_bukti);
                        //console.log(data);
                    }
                })
    
            }
                        
        }
})
</script>