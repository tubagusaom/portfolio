<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Appraisal : </td>
                    <td>
                        <!-- <input id="id_karyawan" name="id_karyawan" style="width: 250px;"> -->
                        <input style="width: 250px;" name="id_karyawan" id="id_karyawan" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Pemilik Kendaraan : </td>
                    <td>
                        <input id="id_detail_kendaraan" name="id_detail_kendaraan" style="width: 250px;" data-options="required: true">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
	<?php
    echo $member_grid;
	?>

  $("#id_karyawan").combogrid({panelWidth: 350,idField:'id', textField:'nama',mode: 'remote'});
    $("#id_karyawan").combogrid('clear');
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
