<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Kode Skema: </td>
                    <td>
                        <input id="kode_skema" name="kode_skema" style="width: 200px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->kode_skema ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Skema Sertifikasi: </td>
                    <td>
                        <input id="skema" name="skema" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->skema ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Metode Asesmen : </td>
                    <td>
                        <input id="title_skema" name="title_skema" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->title_skema ?>">
                    </td>
                </tr>
                <?php
                $perangkat_asesmen = unserialize(str_replace('|','"',$data->perangkat_asesmen));
                ?>
                <tr>
                    <td style="width: 150px;">Perangkat Asesmen : </td>
                    <td>
                        <input  name="ch_perangkat_asemen[0]" type="checkbox"  value="1" <?=(isset($perangkat_asesmen[0]) && $perangkat_asesmen[0]=='1'?'checked':'')?>> Observasi Demonstrasi <br/>
                        <input  name="ch_perangkat_asemen[1]" type="checkbox"  value="1" <?=(isset($perangkat_asesmen[1]) && $perangkat_asesmen[1]=='1'?'checked':'')?>> Tes Lisan <br/>
                        <input  name="ch_perangkat_asemen[2]" type="checkbox"  value="1" <?=(isset($perangkat_asesmen[2]) && $perangkat_asesmen[2]=='1'?'checked':'')?>> Tes Tertulis <br/>
                        <input  name="ch_perangkat_asemen[3]" type="checkbox"  value="1" <?=(isset($perangkat_asesmen[3]) && $perangkat_asesmen[3]=='1'?'checked':'')?>> Verifikasi Portofolio <br/>
                        <input  name="ch_perangkat_asemen[4]" type="checkbox"  value="1" <?=(isset($perangkat_asesmen[4]) && $perangkat_asesmen[4]=='1'?'checked':'')?>> Wawancara <br/>
                        <input  name="ch_perangkat_asemen[5]" type="checkbox"  value="1" <?=(isset($perangkat_asesmen[5]) && $perangkat_asesmen[5]=='1'?'checked':'')?>> Verifikasi Pihak Ketiga <br/>
                        <input  name="ch_perangkat_asemen[6]" type="checkbox"  value="1" <?=(isset($perangkat_asesmen[6]) && $perangkat_asesmen[6]=='1'?'checked':'')?>> Studi Kasus <br/>
                        <input  name="ch_perangkat_asemen[7]" type="checkbox"  value="1" <?=(isset($perangkat_asesmen[7]) && $perangkat_asesmen[7]=='1'?'checked':'')?>> Lainnya
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Title of Skema : </td>
                    <td>
                        <input id="title_skema" name="title_skema" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->title_skema ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Jumlah Unit: </td>
                    <td>
                        <input id="jumlah_unit" name="jumlah_unit" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->jumlah_unit ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Persyaratan Skema : </td>
                    <td>
                        <textarea rows="4" cols="40" name="syarat_skema" id="syarat_skema" ><?php echo $data->syarat_skema ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Link Download Dokumen Skema: </td>
                    <td>
                        <input id="link_download" name="link_download" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->link_download ?>">
                        <a href="<?php echo $data->link_download ?>" target="_blank" >Download</a>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Link Download SKKNI: </td>
                    <td>
                        <input id="link_skkni" name="link_skkni" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->link_skkni ?>">
                        <a href="<?php echo $data->link_skkni ?>" target="_blank" >Download</a>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Kategori : </td>
                    <td>
                        <?php echo form_dropdown('kategori_skema', $kategori_skema, $data->kategori_skema, 'id="kategori_skema" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">KBLUI : </td>
                    <td>
                        <input id="kblui" name="kblui" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->kblui ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">KBJI: </td>
                    <td>
                        <input id="kbji" name="kbji" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->kbji ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Jenjang KKNI : </td>
                    <td>
                        <input id="jenjang" name="jenjang" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->jenjang ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Bidang : </td>
                    <td>
                        <input id="bidang" name="bidang" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->bidang ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Area : </td>
                    <td>
                        <input id="bidang_title" name="bidang_title" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->bidang_title ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Kode Sektor : </td>
                    <td>
                        <input id="kode_sektor" name="kode_sektor" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->kode_sektor ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Biaya Sertifikasi : </td>
                    <td>
                        <input id="biaya_skema" name="biaya_skema" style="width: 200px;" class="easyui-numberbox" value="<?php echo $data->biaya_skema ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Potongan Harga : </td>
                    <td>
                        <input  name="discount_skema[0]" type="text"  value="<?=(isset($discount_skema[0]) && $discount_skema[0]!=''? $discount_skema[0] :'')?>" /> Umum (PSKK) <br/>
                        <input  name="discount_skema[1]" type="text"  value="<?=(isset($discount_skema[1]) && $discount_skema[1]!=''? $discount_skema[1] :'')?>" /> Mahasiswa (PSKK) <br/>
                        <input  name="discount_skema[2]" type="text"  value="<?=(isset($discount_skema[2]) && $discount_skema[2]!=''? $discount_skema[2] :'')?>" /> Umum <br/>
                       
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Description : </td>
                    <td>
                        <textarea rows="4" cols="40" name="description" id="description" ><?php echo $data->description ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Ruang Lingkup : </td>
                    <td>
                        <textarea rows="4" cols="40" name="ruang_lingkup" id="ruang_lingkup" ><?php echo $data->ruang_lingkup ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Paket Sertifikasi : </td>
                    <td>
                        <textarea rows="4" cols="40" name="paket_sertifikasi" id="paket_sertifikasi" ><?php echo $data->paket_sertifikasi ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Syarat Pendaftaran : </td>
                    <td>
                        <textarea rows="4" cols="40" name="syarat_pendaftaran" id="syarat_pendaftaran" ><?php echo $data->syarat_pendaftaran ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Ketentuan Sertifikasi : </td>
                    <td>
                        <textarea rows="4" cols="40" name="ketentuan_sertifikasi" id="ketentuan_sertifikasi" ><?php echo $data->ketentuan_sertifikasi ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Skenario Observasi : </td>
                    <td>
                        <textarea rows="4" cols="40" name="skenario_observasi" id="skenario_observasi" ><?php echo $data->skenario_observasi ?></textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
<?php
echo $lsp_grid;
?>
$("#description").cleditor({
    width:550, height:230
    });
    $("#ruang_lingkup").cleditor({
    width:550, height:230
    });
    $("#paket_sertifikasi").cleditor({
    width:550, height:230
    });
    $("#syarat_pendaftaran").cleditor({
    width:550, height:230
    });
    $("#ketentuan_sertifikasi").cleditor({
    width:550, height:230
    });
    $("#skenario_observasi").cleditor({
    width:550, height:230
    });
</script>
