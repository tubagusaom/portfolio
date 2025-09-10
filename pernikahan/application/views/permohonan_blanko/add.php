<div class="form-panel" style="margin-left: 5px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 180px;">Nomor Permohonan Blanko : </td>
                    <td>
                      <input type="hidden" name="no_urut" value="<?=$no_urut_permohonan ?>">
                      <input id="nomor_permohonan" name="nomor_permohonan" style="width: 420px;" class="easyui-textbox" readonly data-options="required: true" value="<?= no_permohonan_blanko(); ?>">
                    </td>
                </tr>
               <!-- <tr>
                    <td style="width: 200px;">Nomor Keputusan LSP : </td>
                    <td>
                        <input id="nomor_keputusan" name="nomor_keputusan" style="width: 250px;" readonly class="easyui-textbox" data-options="required: true" value="<?= no_keputusan_surat(); ?>">
                    </td>
                </tr>  -->
                <tr>
                    <td style="width: 180px;">Tanggal Permohonan Blanko : </td>
                    <td>
                        <input id="tgl_permohonan" name="tgl_permohonan" style="width: 420px;" class="easyui-datebox" data-options="required: true">
                    </td>
                </tr>
<!--                <tr>
                    <td style="width: 200px;">Tanggal Surat Keputusan : </td>
                    <td>
                        <input id="tgl_keputusan" name="tgl_keputusan" style="width: 250px;" class="easyui-datebox" data-options="required: true">
                    </td>
                </tr>                -->
<!--                <tr>
                    <td style="width: 200px;">Jadwal Uji Kompetensi : </td>
                    <td>
                        <input id="jadwal_id" name="jadwal_id[]" style="width: 250px;" data-options="required: true, multiple: true">
                    </td>
                </tr>    -->
                <tr>
                    <td style="width: 180px;">Jadwal Uji Kompetensi : </td>
                    <td>
                        <select multiple name="jadwal_id[]" style="height: 200px; width: 420px;" class="">
							  <?php $no="1"; foreach ($select_jadwal as $key => $value) {
							  	 echo '
                                    <option value="'.$value->id.'">
                                        '.$no.'.&nbsp;&nbsp;'.$value->jadual.'
                                    </option>';
							  $no++;}
							  ?>

                        </select>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
<?php
echo $jadwal;
?>
</script>
