<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Biodata Peserta</a></li>
                </ol>
            </div>
            <table class="table-data">
                <tr>
                <input type="hidden" id="skema_sertifikasi" name="skema_sertifikasi" value="<?php echo $data->skema_sertifikasi ?>" />
                <input type="hidden" id="is_dpl" name="is_dpl" value="<?php echo $data->is_dpl ?>" />
                <input type="hidden" id="is_dpt" name="is_dpt" value="<?php echo $data->is_dpt ?>" />
                <input type="hidden" id="id_asesor" name="id_asesor" value="<?php echo $data->id_asesor ?>" />
                <input type="hidden" id="id_perangkat" name="id_perangkat" value="<?php echo $data->id_perangkat ?>" />
                <input type="hidden" id="u_date_create" name="u_date_create" value="<?php echo $data->u_date_create ?>" />

                <td style="width: 150px;">Nama Lengkap: </td>
                <td> <h3><?php echo $data->nama_lengkap ?></h3>
                    <input id="nama_lengkap" name="nama_lengkap" type="hidden" value="<?php echo $data->nama_lengkap ?>">
                </td>
                </tr>


            </table>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Daftar Pertanyaan Lisan</a></li>
                </ol>
            </div>
            <table width="97%" class="table-data" border="1" style='border-collapse: collapse;'>
                <tr>
                    <th style="width: 30px;">No.</th>
                    <th style="width: 200px;">Pertanyaan Lisan </th>
                    <th style="width: 350px;">Jawaban yg diharapkan </th>
                    <th> Hasil Jawaban Asesi </th>
                </tr>
                <?php
                $ch_dpl = @unserialize($data->ch_dpl);
                foreach ($query_soal_dpl as $key => $value) {
                    echo '<tr><td>' . ($key + 1) . '</td>
                        <td>' . $value->pertanyaan . '</td>
                        <td>' . $value->jawaban_a . '</td>
                        <td><textarea width="auto" style="width:100%;" type="text" rows="6" name="ch_dpl[' . $key . ']" >' . $ch_dpl[$key] . '</textarea></td></tr>';
                }
                ?>
                <tr>
                    <td colspan="2">Kompeten: </td>
                    <td colspan="2">
                        <?php echo form_dropdown('is_dpl_kompeten', array('-Pilih-', 'K', 'BK'), $data->is_dpl_kompeten, 'id="is_dpl_kompeten" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Catatan: </td>
                    <td colspan="2">
                        <textarea rows="4" cols="40" name="catatan_dpl" id="catatan_dpl" ><?php echo $data->catatan_dpl ?></textarea>
                    </td>
                </tr>
            </table>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Daftar Pertanyaan Tertulis </a></li>
                </ol>
            </div>
            <table width="97%" class="table-data" border="1" style='border-collapse: collapse;'>
                <tr>
                    <th style="width: 30px;">No </th>
                    <th style="width: 130px;">Pertanyaan </th>
                    <th style="width: 180px;">Pilihan Jawaban/Jawaban diharapkan</th>
                    <th style="width: 40px;text-align: center;"> Jawaban <br/>Asesi </th>
                </tr>
                <?php
                // var_dump($query_soal_dpt);
                $ch_dpt = @unserialize($data->ch_dpt);
                $jawaban_benar = 0;
                foreach ($query_soal_dpt as $key => $value) {
                    //if (count($jawaban_dpt) > 0) {
                    if ($value->jenis_soal == '2') {
                        if($value->jawaban_benar==$jawaban_dpt[$key]){
                            $jawaban_benar++;
                        }
                        $summary = '';
                        //foreach ($query_soal_dpt as $key => $value) {
                        echo '<tr><td>' . ($key + 1) . '</td>
                        <td >' . $value->pertanyaan . '</td>
                        <td >' . $value->jawaban_a . '</td>
                        <td style="text-align:center;">' . $jawaban_dpt[$key] . '</td></tr>
                        ';
                        // }
                    } else {
                        if($value->jawaban_benar==$jawaban_dpt[$key]){
                            $jawaban_benar++;
                        }
                        echo '<tr><td rowspan="4">' . ($key + 1) . '</td>
                        <td rowspan="4">' . $value->pertanyaan . '</td>
                        <td >A. ' . $value->jawaban_a . '</td>
                        <td rowspan="4" style="text-align:center;">' . $jawaban_dpt[$key] . '('.$value->jawaban_benar.')</td></tr>
                        <tr><td style="text-align:left;">B. ' . $value->jawaban_b . '</td></tr>
                        <tr><td style="text-align:left;" >C. ' . $value->jawaban_c . '</td></tr>
                        <tr><td style="text-align:left;">D. ' . $value->jawaban_d . '</td></tr>';
                        //}
                    }
                    //var_dump($jawaban_dpt);
                    // }
                }
                $summary = '| Benar: ' . $jawaban_benar . ' | Salah: ' . (count($jawaban_dpt) - $jawaban_benar);
                        
//                var_dump($query_soal_dpt);
//                $ch_dpt = @unserialize($data->ch_dpt);
//                if (count($jawaban_dpt) > 0) {
//                    if (strlen($jawaban_dpt[0]) > 1) {
//                        $summary = '';
//                        foreach ($query_soal_dpt as $key => $value) {
//                            echo '<tr><td>' . ($key + 1) . '</td>
//                        <td >' . $value->pertanyaan . '</td>
//                        <td >' . $value->jawaban_a . '</td>
//                        <td style="text-align:center;">' . $jawaban_dpt[$key] . '</td></tr>
//                        ';
//                        }
//                    } else {
//                        $summary = '| Benar : ' . $query_jawaban_dpt->jawaban_benar . ' | Salah : ' . $query_jawaban_dpt->jawaban_salah;
//                        foreach ($query_soal_dpt as $key => $value) {
//                            echo '<tr><td rowspan="4">' . ($key + 1) . '</td>
//                        <td rowspan="4">' . $value->pertanyaan . '</td>
//                        <td >A. ' . $value->jawaban_a . '</td>
//                        <td rowspan="4" style="text-align:center;">' . $jawaban_dpt[$key] . '</td></tr>
//                        <tr><td style="text-align:left;">B. ' . $value->jawaban_b . '</td></tr>
//                        <tr><td style="text-align:left;" >C. ' . $value->jawaban_c . '</td></tr>
//                        <tr><td style="text-align:left;">D. ' . $value->jawaban_d . '</td></tr>';
//                        }
//                    }
//                    //var_dump($jawaban_dpt);
//                }
                ?>
                <tr>
                    <td colspan="2">Summary: </td>
                    <td colspan="2"> Jumlah Soal: <?= count($jawaban_dpt) ?> <?= $summary ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Kompeten: </td>
                    <td colspan="2">
                        <?php echo form_dropdown('is_dpt_kompeten', array('-Pilih-', 'K', 'BK'), $data->is_dpt_kompeten, 'id="is_dpt_kompeten" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Catatan: </td>
                    <td colspan="2">
                        <textarea rows="4" cols="40" name="catatan_dpt" id="catatan_dpt" ><?php echo $data->catatan_dpt ?></textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
