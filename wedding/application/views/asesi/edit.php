<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Jadwal Terpilih</a></li>
                </ol>
            </div>
            
            <table class="table-data">
                
                <tr>
                    <td style="width: 150px;">Jadwal: </td>
                    <td>
                        <b><?php echo $jadwal->jadual ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">TUK: </td>
                    <td><b><?php echo $tuk->tuk ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Asesor : </td>
                    <td><b><?php echo $asesor->nama_asesor ?></b>
                    </td>
                </tr>
            </table>
            
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Delegasi Praasesmen</a></li>
                </ol>
            </div>
            <table class="table-data" style="margin-bottom: 30px;">
                <input type="hidden" value="<?= $data->file_bukti_pendukung; ?>" id="file_bukti_pendukung" name="file_bukti_pendukung">
                <input type="hidden" value="<?= $data->bukti_pendukung; ?>" id="bukti_pendukung" name="bukti_pendukung">
                <input type="hidden" value="<?= $data->tgl_lahir; ?>" id="tgl_lahir" name="tgl_lahir">
                <input type="hidden" value="<?= $data->organisasi; ?>" id="organisasi" name="organisasi">
                <input type="hidden" value="<?= $data->is_perpanjangan; ?>" id="is_perpanjangan" name="is_perpanjangan">
                <input type="hidden" value="<?= $data->metode_bayar; ?>" id="metode_bayar" name="metode_bayar">
                <input type="hidden" value="<?= $data->id_users; ?>" id="id_users" name="id_users">
                <input type="hidden" value="<?= $data->jadwal_id; ?>" id="jadwal_id" name="jadwal_id">
                <input type="hidden" value="<?= $data->tuk_usulan; ?>" id="tuk_usulan" name="tuk_usulan">
                <input type="hidden" value="<?= $data->id_tuk; ?>" id="id_tuk" name="id_tuk">
                <input type="hidden" value="<?= $data->pendidikan_terakhir; ?>" id="pendidikan_terakhir" name="pendidikan_terakhir">

                <tr style="text-align: left;">
                    <td style="width: 150px;">Penugasan Asesor: </td>
                    <td style="text-align: left;">
                        <select id="pra_asesmen_checked" name="pra_asesmen_checked">
                        <?php foreach ($query_asesor as $key => $value) { ?>
                            <option value="<?=$value->id?>"><?=$value->users?></option>
                        <?php } ?>
                        
                    </td>
                    <td rowspan="6">

                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Skema Sertifikasi: </td>
                    <td>
                        <input id="skema_sertifikasi" name="skema_sertifikasi" style="width: 200px;"  value="<?php echo $data->skema_sertifikasi; ?>">
                    </td>
                </tr>
            </table>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Dokumen Praasesmen</a></li>
                </ol>
            </div>


            <table class="" border="1"  style="width:97%">
                <tr>
                    <th style="width:35%">Nama Dokumen</th>
                    <th style="width:35%">Nama File</th>
                    <th style="width:10%">Validitas</th>
                    <th style="width:20%">Catatan</th>
                </tr>
                <?php
                //var_dump($data->validitas_dokumen);
                $catatan_validitas_dokumen = is_null($data->catatan_validitas_dokumen) ? array() : unserialize($data->catatan_validitas_dokumen);
                $validitas_dokumen = is_null($data->validitas_dokumen) ? array() : unserialize($data->validitas_dokumen);
                // dump($files_asesi);
                foreach ($files_asesi as $key => $value) {
//foreach ($pendukung as $dt) {
                    $extFile = explode(".", @$value->nama_file);
                    $jmlArr = count($extFile) - 1;
                    switch ($extFile[$jmlArr]) {
                        case "ppt":
                            $linkFile = "<a href='" . base_url('repo/asesi/' . @$value->nama_file) . "' target='_blank'>" . limit_string($value->nama_file, 10) . "</a>";
                            break;
                        case "pptx":
                            $linkFile = "<a href='" . base_url('repo/asesi/' . @$value->nama_file) . "' target='_blank'>" . limit_string($value->nama_file, 10) . "</a>";
                            break;
                        case "doc":
                            $linkFile = "<a href='" . base_url('repo/asesi/' . @$value->nama_file) . "' target='_blank'>" . limit_string($value->nama_file, 10) . "</a>";
                            break;
                        case "docx":
                            $linkFile = "<a href='" . base_url('repo/asesi/' . @$value->nama_file) . "' target='_blank'>" . limit_string($value->nama_file, 10) . "</a>";
                            break;
                        case "xls":
                            $linkFile = "<a href='" . base_url('repo/asesi/' . @$value->nama_file) . "' target='_blank'>" . limit_string($value->nama_file, 10) . "</a>";
                            break;
                        case "xlsx":
                            $linkFile = "<a href='" . base_url('repo/asesi/' . @$value->nama_file) . "' target='_blank'>" . limit_string($value->nama_file, 10) . "</a>";
                            break;
                        default:
                            $linkFile = "<a href='javascript:void(0);' onclick='buka(\"" . @$value->nama_file . "\");'>" . limit_string($value->nama_file, 10) . "</a>";
                            break;
                    }
                    ?>
                    <?php
                    //}
                    ?>
                    <tr>
                        <td style="width:35%" ><?= strtoupper($value->nama_dokumen) ?></td>
                        <td style="width:35%"> <?= $linkFile; ?> </td>
                        <td style="text-align: center;width:10%;"><input type="checkbox" class="validitas_dokumen" name="validitas_dokumen[<?= $key ?>]" value="1" <?= isset($validitas_dokumen[$key]) && $validitas_dokumen[$key] == '1' ? 'checked' : '' ?> /></td>
                        <td style="width:20%"><input type="text" name="catatan_validitas_dokumen[]" value="<?= @$catatan_validitas_dokumen[$key] ?>"></td>
                    </tr>
                <?php } ?>
            </table>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Kode ISBN Buku</a></li>
                </ol>
            </div>
            <div style="margin-left: 25px;">
            <?php
            
            foreach ($isbn as $key => $item) {
                echo 'ISBN: ' . $item . '<br />';
            }
            ?>
            </div>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Biodata Peserta/APL 01</a></li>
                </ol>
            </div>
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Pendaftar: </td>
                    <td>
                        <?=form_dropdown('marketing',$pendaftar,$data->marketing)?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">No Identitas: </td>
                    <td>
                        <input type="hidden" id="u_date_create" name="u_date_create" value="<?php echo $data->u_date_create ?>">
                        <b><?php echo $data->no_identitas ?></b>
                        <input type="hidden" id="no_identitas" name="no_identitas" style="width: 200px;"  value="<?php echo $data->no_identitas ?>">
                    </td>
                </tr>
                <tr style="display: none;">
                    <td style="width: 150px;">No UJK: </td>
                    <td>
                        <input id="no_uji_kompetensi" name="no_uji_kompetensi" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->no_uji_kompetensi ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama Lengkap: </td>
                    <td><b><?php echo $data->nama_lengkap ?></b>
                        <input id="nama_lengkap" name="nama_lengkap" style="width: 200px;" type="hidden" value="<?php echo $data->nama_lengkap ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Telpon : </td>
                    <td><b><?php echo $data->telp ?></b>
                        <input id="telp" name="telp" style="width: 200px;" type="hidden" value="<?php echo $data->telp ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Email: </td>
                    <td><b><?php echo $data->email ?></b>
                        <input id="skema" name="email" style="width: 200px;" type="hidden" value="<?php echo $data->email ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tempat Lahir: </td>
                    <td><b><?php echo $data->tempat_lahir ?></b>
                        <input id="tempat_lahir" name="tempat_lahir" style="width: 200px;" type="hidden" value="<?php echo $data->tempat_lahir ?>">
                    </td>
                </tr>
                <tr style="display: none;">
                    <td style="width: 150px;">Tanggal Lahir: </td>
                    <td>
                        <input id="tgl_lahir" name="tgl_lahir" style="width: 200px;" class="easyui-datebox" value="<?php echo date('d/m/Y', strtotime($data->tgl_lahir)) ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Jenis Kelamin: </td>
                    <td> <b><?php echo $jenis_kelamin[$data->jenis_kelamin] ?></b>
                        <input id="jenis_kelamin" name="jenis_kelamin" type="hidden" value="<?php echo $data->jenis_kelamin ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Alamat: </td>
                    <td> <b><?php echo $data->alamat ?></b>
                        <input id="alamat" name="alamat" type="hidden" value="<?php echo $data->alamat ?>">

                    </td>
                </tr>

            </table>
            <table>
                <tr>
                    <td style="width: 150px;">Rekomendasi APL 01: </td>
                    <td>
                        <?php echo form_dropdown('rekomendasi_apl01', $array_opsi_apl01, $data->rekomendasi_apl01, 'id="rekomendasi_apl01" onchange="rekomendasi_apl(this)"'); ?>

                    </td>
                </tr>

                <tr>
                    <td style="width: 150px;">Catatan: </td>
                    <td>
                        <textarea rows="4" cols="40" name="catatan_rekomendasi_apl01" id="catatan_rekomendasi_apl01" ><?php echo $data->catatan_rekomendasi_apl01 ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;"></td>
                    <td>
                        <input type="checkbox" class="akses_login" name="akses_login" value="1" /> Kirim Pesan ke peserta

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div id="vFile" >
    <input type="hidden">
</div>
<script type="text/javascript">
<?php
//echo $pra_asesmen_grid;
echo $skema_grid;
?>
    var nama_asesor = '<?php echo $nama_asesor ?>';
    var id_asesor = '<?php echo $data->pra_asesmen_checked ?>';
//console.log(id_asesor);
    // if (id_asesor != '0') {
    //     $("#pra_asesmen_checked").combogrid('setValue', {id: id_asesor, nama_user: nama_asesor});
    // }
    var base_url = "<?= base_url(); ?>";

    function buka(data) {
        $('#vFile').empty();
        $('#vFile').dialog({
            title: 'View File ' + data,
            width: 900,
            height: 500,
            closed: true,
            cache: false,
            modal: true
        });

        $('#vFile').dialog('open');
        $('#vFile').dialog('refresh', base_url + 'asesi/show_file?nmfile=' + data);
        //return false;
    }
    function rekomendasi_apl(sel) {

        if (sel.value == '0') {
             
            $('#catatan_rekomendasi_apl01').val('<?= $array_catatan_apl01[0] ?>');
        } else if (sel.value == '1') {
            $('#catatan_rekomendasi_apl01').val('<?= $array_catatan_apl01[1] ?>');
            $('.validitas_dokumen').prop("checked", true);
            $('.akses_login').prop("checked", true);
            
            //alert('ok');
        } else {
            $('#catatan_rekomendasi_apl01').val('');
        }
    }
</script>