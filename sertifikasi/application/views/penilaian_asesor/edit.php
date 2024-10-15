<style>
    .icons-check {
        background: url('<?= base_url() . 'assets/img/icons/check.png' ?>') no-repeat center center;
    }
    .icons-no_check {
        background: url('<?= base_url() . 'assets/img/icons/no_check.png' ?>') no-repeat center center;
    }
</style><div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Real Asesmen</a></li>
                </ol>
            </div>
            <!-- <input type="hidden" value="<?= $data->is_perpanjangan; ?>" id="is_perpanjangan" name="is_perpanjangan"> -->
            <table class="table-data">
                <tr style="display:none;">
                    <td style="width: 150px;">Jadwal Asesmen: </td>
                    <td>
                        <input type="hidden" id="administrasi_ujk" name="administrasi_ujk" value="<?php echo $data->administrasi_ujk ?>">
                        <input type="hidden" id="skema_sertifikasi" name="skema_sertifikasi" value="<?php echo $data->skema_sertifikasi ?>">
                        <input type="hidden" id="pra_asesmen_checked" name="pra_asesmen_checked" value="<?php echo $data->pra_asesmen_checked ?>">
                        <input type="hidden" id="id_users" name="id_users" value="<?php echo $data->id_users ?>">
                        <input type="hidden" id="telp" name="telp" value="<?php echo $data->telp ?>">

                        <input id="jadwal_id" name="jadwal_id"  value="<?php echo $data->jadwal_id ?>" readonly="true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama Lengkap: </td>
                    <td><h4><?php echo $data->nama_lengkap ?></h4>
                        <input style="display:none;" readonly="true" id="nama_lengkap" name="nama_lengkap" style="width: 200px;"  value="<?php echo $data->nama_lengkap ?>">
                    </td>
                </tr>
                <tr style="display:none;">
                    <td style="width: 150px;">No Uji Kompetensi : </td>
                    <td>
                        <input readonly="true" id="no_uji_kompetensi" name="no_uji_kompetensi" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->no_uji_kompetensi ?>">
                    </td>
                </tr>
                <tr style="display:none;">
                    <td style="width: 150px;">Nama Asesor: </td>
                    <td>
                        <input readonly="true" id="id_asesor" name="id_asesor" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->id_asesor ?>">

                    </td>
                </tr>
                <tr style="display:none;">
                    <td style="width: 150px;">Tempat Uji Kompetensi : </td>
                    <td>
                        <input readonly="true" id="id_tuk" name="id_tuk" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->id_tuk ?>">
                    </td>
                </tr>
                <tr style="display:none;">
                    <td style="width: 150px;">File Bukti Pendukung : </td>
                    <td>
                        <a href="<?= base_url() . 'pra_asesmen/download/' . $data->id ?>" target="_blank">Download</a>
                        <input type="hidden" value="<?php echo $data->file_bukti_pendukung ?>" name="file_bukti_pendukung" />
                    </td>
                </tr>

            </table>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Daftar Unit Kompetensi</a></li>
                </ol>
            </div>

            <table class="easyui-datagrid" style="width: 97%;" data-options="nowrap:false,striped:true,rownumbers:true">
                <thead>
                    <tr><th data-options="field:'kode_unit'" style="width: 20%;text-align: center;">Kode Unit</th>
                        <th data-options="field:'nama_unit'" style="width: 77%;">Unit Kompetensi</th>

                </thead>
                <tbody>
                    <?php
                    foreach ($unit_kompetensi as $value) {
                        echo '<tr><td style="width: 20%;text-align: center;">' . $value->id_unit_kompetensi . '</td><td>' . $value->unit_kompetensi . '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">FR-MAK-01 : FORMULIR PERSETUJUAN ASESMEN DAN KERAHASIAAN</a></li>
                </ol>
            </div>
            <?php $this->load->view('penilaian_asesor/mak01_baru'); ?>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">FR-MAK-02 : KEPUTUSAN DAN UMPAN BALIK ASESMEN</a></li>
                </ol>
            </div>
            <?php $this->load->view('penilaian_asesor/mak02_baru'); ?>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">FR-MAK-04 : UMPAN BALIK DARI PESERTA</a></li>
                </ol>
            </div>
            <?php $this->load->view('penilaian_asesor/mak05'); ?>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">FR-MAK-05 : FORMULIR LAPORAN ASESMEN</a></li>
                </ol>
            </div>
            <?php $this->load->view('penilaian_asesor/mak06'); ?>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">FR-MAK-06 : MENINJAU PROSES ASESMEN</a></li>
                </ol>
            </div>
            <?php $this->load->view('penilaian_asesor/mak07'); ?>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Summary Rekomendasi Asesor</a></li>
                </ol>
            </div>

            <table>
                <tr>
                    <td style="width: 150px;">Perangkat Asesmen: </td>
                    <td style="width: 600px;"><table class="table_mak07" style="width:97%;border-collapse: collapse;" border="1" >
                            <tr><th width="30%" align="center">Nama Perangkat</th><th>Hasil Penilaian</th></tr>
                            <?php
                            $urutan = 0;
                            foreach ($array_perangkat as $key => $value) {
                                if (in_array($key, $perangkat)) {
                                    if($value == 'Pertanyaan Tulisan'){
                                        $kode_perangkat = 1;
                                    }else{
                                        $kode_perangkat = 2;
                                    }

                            //         echo '<tr>
                            //         <td align="center">
                            //           <a href="#" onclick="buka_clo('.$data->skema_sertifikasi.','.$kode_perangkat.')">' . $value . '</a>
                            //         </td>
                            //         <td>
                            //           <textarea style="width: 100%;" rows="2" name="penilaian_perangkat[]">' . $penilaian_perangkat[$urutan] . '</textarea>
                            //         </td>
                            //         </tr>';
                            //         $urutan++;
                            //     }
                            // }
                            ?>

                            <tr>
                              <td align="left">
                                <?=$value ?>
                              </td>
                              <td>
                                <?php
                                  if ($key == 0) {
                                    if ($data->is_dpl_kompeten == 2) {
                                      echo "Belum Kompeten ( BK )";
                                    }else if ($data->is_dpl_kompeten == 1) {
                                      echo "Kompeten ( K )";
                                    }else {
                                      echo "-";
                                    }
                                  }else if ($key == 1) {
                                    if ($data->is_dpt_kompeten == 2) {
                                      echo "Belum Kompeten ( BK )";
                                    }else if ($data->is_dpt_kompeten == 1) {
                                      echo "Kompeten ( K )";
                                    }else {
                                      echo "-";
                                    }
                                  }else if ($key == 2) {
                                    if ($data->is_observasi_kompeten == 2) {
                                      echo "Belum Kompeten ( BK )";
                                    }else if ($data->is_observasi_kompeten == 1) {
                                      echo "Kompeten ( K )";
                                    }else {
                                      echo "-";
                                    }
                                  }else if ($key == 3) {
                                    if ($data->is_memadai == 2) {
                                      echo "Belum Memadai ( Belum Kompeten )";
                                    }else if ($data->is_memadai == 1) {
                                      echo "Memadai ( Kompeten )";
                                    }else {
                                      echo "-";
                                    }
                                  }else {
                                    if ($data->is_memadai == 2) {
                                      echo "Belum Memadai ( Belum Kompeten )";
                                    }else if ($data->is_memadai == 1) {
                                      echo "Memadai ( Kompeten )";
                                    }else {
                                      echo "-";
                                    }
                                  }
                                ?>
                              </td>
                            </tr>

                            <?php }} ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px; padding-top:10px">Penilaian Asesor: </td>
                    <td style="padding:10px 0 10px 0">
                        <?php echo form_dropdown('rekomendasi_asesor', $rekomendasi_asesor, $data->rekomendasi_asesor, 'id="rekomendasi_asesor" class="easyui-combobox"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Keterangan: </td>
                    <td>
                        <textarea name="rekomendasi_description" id="rekomendasi_description" rows="4" cols="40"><?= $data->rekomendasi_description ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;"></td>
                    <td>
                        <input type="checkbox" name="notifikasi" value="1" /> Notifikasi Asesi

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div id="dd_clo" ><div id="div_clo"></div></div>
<div id="dd_dpl" ><div id="div_dpl"></div></div>
<script type="text/javascript">
    function alertsv() {
        if ($("#v_all").is(':checked')) {
            $('.v_all').prop("checked", true);
        } else {
            $('.v_all').prop("checked", false);
        }
    }
    function alertsa() {
        if ($("#a_all").is(':checked')) {
            $('.a_all').prop("checked", true);
        } else {
            $('.a_all').prop("checked", false);
        }
    }
    function alertst() {
        if ($("#t_all").is(':checked')) {
            $('.t_all').prop("checked", true);
        } else {
            $('.t_all').prop("checked", false);
        }
    }
    function alertsm() {
        if ($("#m_all").is(':checked')) {
            $('.m_all').prop("checked", true);
        } else {
            $('.m_all').prop("checked", false);
        }
    }


<?php
echo $jadwal_grid;
echo $asesor_grid;
echo $tuk_grid;
?>
    $("#rekomendasi_asesor").combobox({
        onChange: function (newVal, oldVal) {
            if (newVal == '1') {
                $('#aspek_negatif').val('Asesmen Berjalan Lancar');
                $('#catatan_penolakan').val('Tidak Ada');
                $('#saran_perbaikan').val('Tidak Ada');
                $('#rekomdasi_perbaikan_mak6').val('-');
                $('.ch_dimensi_kompetensi').prop("checked", true);
                $('.ch_tinjauan_asesmen').prop("checked", true);
                $('.radio_k').prop("checked", true);
                $('.radio_bk').prop("checked", false);
                $('.ch_laporan_k').prop("checked", true);
                $('.ch_laporan_bk').prop("checked", false);
                $('.ch_tinjau_proses').prop("checked", true);
                $('.ch_pencapaian').prop("checked", true);
                $('.ch_pencapaian_n').prop("checked", false);
                $('.ch_umpan_balik_y').prop("checked", true);
                $('.ch_umpan_balik_n').prop("checked", false);
                $('.ch_saran_y').prop("checked", true);
                $('.ch_saran_n').prop("checked", false);
                $('#unit_kesenjangan').remove();
                $('.ch_identifikasi_y').prop("checked", true);
                $('.ch_identifikasi_n').prop("checked", false);
                $('#asesmen_ulang').remove();
                $('#aspek_1').val('Asesmen berjalan dengan lancar');
                $('#aspek_2').val('Tidak ada');
                $('#aspek_3').val('Tidak ada');
                $('#rekomendasi_description').val('Direkomendasi KOMPETEN oleh Asesor. Pelihara dan Kembangkan kompetensimu!');
                $('.ch_mak06_k').prop("checked", true);
                $('.ch_mak06_bk').prop("checked", false);
                $('.mak07').prop("checked", true);

            } else if (newVal == '2') {
                $('.ch_dimensi_kompetensi').prop("checked", true);
                $('.ch_tinjauan_asesmen').prop("checked", true);
                $('#aspek_negatif').val('-');
                $('#catatan_penolakan').val('-');
                $('#saran_perbaikan').val('-');
                $('.radio_k').prop("checked", false);
                $('.radio_bk').prop("checked", true);
                $('#rekomendasi_description').val('Silahkan melakukan banding sesuai dengan rekomendasi perbaikan dari Asesor. Atau melaksanakan asesmen lanjutan!');
                $('.ch_laporan_k').prop("checked", false);
                $('.ch_laporan_bk').prop("checked", true);
                $('.ch_pencapaian').prop("checked", false);
                $('.ch_pencapaian_n').prop("checked", true);
                $('.ch_umpan_balik_y').prop("checked", false);
                $('.ch_umpan_balik_n').prop("checked", true);
                $('.ch_saran_y').prop("checked", false);
                $('.ch_saran_n').prop("checked", true);
                $('#aspek_1').val('-');
                $('#aspek_2').val('-');
                $('#aspek_3').val('-');
                $('.ch_mak06_k').prop("checked", false);
                $('.ch_mak06_bk').prop("checked", true);
                $('.mak07').prop("checked", false);

            } else if (newVal == '3') {
                $('#rekomendasi_description').val('Anda di rekomendasikan untuk melakukan Asesmen Lanjut!');
            } else {
                $('#rekomendasi_description').val('');
            }
        }
    })

</script>
<script type="text/javascript">
//$('#pra_asesmen_date').datebox('setValue', '6/1/2012');

    var base_url = "<?php echo base_url() ?>";
    $('#dd_clo').dialog({
        title: 'Detail Perangkat',
        width: 800,
        height: 540,
        closed: true,
        cache: false,
        modal: true
    });

    function buka_clo(skema,jenis) {
        if(jenis == '1'){
            $('#dd_clo').dialog('open');
            var dt = {id_asesi: <?=$data->id?>,id_perangkat:<?=$data->id_perangkat?>};
            $.ajax({
                type: "POST",
                url: base_url + "penilaian_asesor/proses_dpl",
                data: dt,
                success: function (result) {
                    $('#div_clo').remove();
                    $('#dd_clo').append('<div id="div_clo"></div>');
                    $('#div_clo').append(result);
                }
            })
        }else{
            $('#dd_clo').dialog('open');
            var dt = {skema: skema};
            $.ajax({
                type: "POST",
                url: base_url + "penilaian_asesor/proses_clo",
                data: dt,
                success: function (result) {
                    $('#div_clo').remove();
                    $('#dd_clo').append('<div id="div_clo"></div>');
                    $('#div_clo').append(result);
                }
            })
        }
    }

</script>
