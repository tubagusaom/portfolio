<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Appraisal : </td>
                    <td>
                        <input id="id_karyawan" name="id_karyawan" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->id_karyawan ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Customer: </td>
                    <td>
                        <input id="id_detail_kendaraan" name="id_detail_kendaraan" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->id_detail_kendaraan ?>">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
	<?php
		echo $karyawan_grid;
    echo $member_grid;
	?>

  var pgrid = $("#id_karyawan").combogrid('grid');
  var cols = [[
    {field:'id',hidden:true},
    {field:'nama',title:'<b>Nama</b>',width:200},
    {field:'telepon',title:'<b>No Tlp</b>',width:100}
  ]];
  pgrid.datagrid({
    columns:cols,
    pagination: true,
    url: '<?php echo base_url() ?>pegawai/combogrid/17',
    fitColumns: true,
              mode: 'remote',
  });
</script>
