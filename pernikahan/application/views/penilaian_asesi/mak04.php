<table border="1" class="easyui-datagrid" style="width: 97%;" data-options="nowrap:false,striped:true,rownumbers:true" >
    <thead>
        <tr><th data-options="field:'kode_unit',align:'center'" style="width: 20%;">Unit Kompetensi</th>
            <th data-options="field:'nama_unit2'" style="width: 50%;">Unit Kompetensi</th>
            <th data-options="field:'nama_unit3',align:'center'" style="width: 8%;text-align: center;">K</th>
            <th data-options="field:'nama_unit4',align:'center'" style="width: 8%;text-align: center;">BK</th>
            <th data-options="field:'nama_unit5',align:'center'" style="width: 8%;text-align: center;">AL</th>

    </thead>
    <tbody>
        <?php
        foreach ($unit_kompetensi as $key => $value) {

            echo '<tr><td style="text-align:center">' . $value->id_unit_kompetensi . '</td><td>' . $value->unit_kompetensi . '</td>
                        <td  style="text-align:center"><input hidden type="radio" name="mak04[' . $key . ']" value="K" ' . (isset($mak04[$key]) && $mak04[$key] == 'K' ? 'checked' : '') . '/>
                        ' . (isset($mak04) && $mak04[$key] == 'K' ? "Y" : "<i class='icons-no_check'></i>") . '
                        <td  style="text-align:center"><input hidden type="radio" name="mak04[' . $key . ']" value="BK" ' . (isset($mak04[$key]) && $mak04[$key] == 'BK' ? 'checked' : '') . '/>
                        ' . (isset($mak04) && $mak04[$key] == 'BK' ? "Y" : "<i class='icons-no_check'></i>") . '
                        </td>
                        <td  style="text-align:center"><input hidden type="radio" name="mak04[' . $key . ']" value="AL" ' . (isset($mak04[$key]) && $mak04[$key] == 'AL' ? 'checked' : '') . '/>
                        ' . (isset($mak04) && $mak04[$key] == 'AL' ? "Y" : "<i class='icons-no_check'></i>") . '
                        </td>
                        </tr>';
        }
        ?>   

    </tbody> 
</table>
<table style="width: 97%;">
    <tr><td style="width: 35%">Umpan balik terhadap pencapaian unjuk kerja :</td>
        <td style="width: 64%;"><textarea hidden style="width: 100%;" rows="1" name="mak04a[0]"><?php echo (isset($mak04a[0]) ? $mak04a[0] : ''); ?></textarea>
            <?php echo (isset($mak04a[0]) ? $mak04a[0] : ''); ?></td>
    </tr>
    <tr><td style="width: 35%">Identifikasi kesenjangan pencapaian unjuk kerja :</td>
        <td style="width: 64%;"><textarea hidden style="width: 100%;" rows="1" name="mak04a[1]"><?php echo (isset($mak04a[1]) ? $mak04a[1] : ''); ?></textarea>
            <?php echo (isset($mak04a[1]) ? $mak04a[1] : ''); ?></td>
    </tr>
    <tr><td style="width: 35%">Saran tindak lanjut hasil asesmen :</td>
        <td style="width: 64%;"><textarea hidden style="width: 100%;" rows="1" name="mak04a[2]"><?php echo (isset($mak04a[2]) ? $mak04a[2] : ''); ?></textarea>
            <?php echo (isset($mak04a[2]) ? $mak04a[2] : ''); ?></td>
    </tr>
    <tr><td style="width: 35%;font-weight: bold;">REKOMENDASI ASESOR :</td>
        <td style="width: 64%;"><textarea hidden style="width: 100%;" rows="1" name="mak04a[3]"><?php echo (isset($mak04a[3]) ? $mak04a[3] : ''); ?></textarea>
            <?php echo (isset($mak04a[3]) ? $mak04a[3] : ''); ?></td>
    </tr>

</table>