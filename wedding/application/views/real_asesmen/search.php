<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Nama Lengkap: </td>
                    <td>
                        <input id="nama_lengkap" name="nama_lengkap" style="width: 200px;" class="easyui-textbox">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Organisasi: </td>
                    <td>
                        <input id="organisasi" name="organisasi" style="width: 200px;" class="easyui-textbox">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Jadwal Asesmen: </td>
                    <td>
                        <input id="jadwal_id" name="jadual" style="width: 200px;" class="easyui-textbox">
                    </td>					
                </tr>
                 <tr>
                    <td style="width: 150px;">Nama Asesor: </td>
                    <td>
                        <input id="id_asesor" name="id_asesor" style="width: 200px;"  value="<?php echo $data->id_asesor ?>"><br/>
                        
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
<?php
echo $jadual;
echo $asesor_grid;
?>
</script>