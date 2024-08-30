<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
          <div id="tips">
            <ol class="rounded-list">
              <li><a href="javascript: void(0)">Data Diri</a></li>
            </ol>
          </div>
            <table class="table-data">

              <tr>
                  <td style="width: 150px;">Bagian : </td>
                  <td>
                      <?php echo form_dropdown('jabatan_id', $role_grid, '', 'id="jabatan_id" style="width: 350px;" class="easyui-combobox" data-options="required: true"'); ?>
                  </td>
              </tr>

                <tr id="tr_marketing">
        					<td style="width: 150px;">Penanggung Jawab : </td>
        					<td>
        						<input style="width: 350px;" name="penanggungjawab" id="PenanggungJawab" data-options="required: true">
        					</td>
        				</tr>

                <tr>
                    <td style="width: 150px;">NIK : </td>
                    <td>
                        <input type="hidden" name="akun_karyawan" value="0">
                        <input id="nik" name="nik" style="width: 350px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama : </td>
                    <td>
                        <input id="nama" name="nama" style="width: 350px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">No.HP : </td>
                    <td>
                        <input id="telepon" name="telepon" style="width: 350px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Email : </td>
                    <td>
                        <input id="email" name="email" style="width: 350px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Klamin : </td>
                    <td>
                        <select style="width: 350px;"  id="gender" name="gender" class="easyui-combobox"  data-options="required: true">
                          <option selected></option>
                          <option value="0">Pria</option>
                          <option value="1">Wanita</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Alamat : </td>
                    <td>
                        <textarea rows="3" id="alamat" name="alamat" style="width: 350px;" class="easyui-textarea" data-options="required: true"></textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
	<?php
		echo $role_grid;
	?>

  $("#tr_marketing td").each(function() {
    var cellText = $.trim($(this).text());
    if (cellText.length == 0) {
      $(this).parent().hide();
    }
  });

  $("#jabatan_id").combobox({
    onChange: function(newVal, oldVal){
      $("#PenanggungJawab").combogrid({panelWidth: 350,idField:'id', textField:'nama',mode: 'remote'});
        $("#PenanggungJawab").combogrid('clear');

      var pgrid = $("#PenanggungJawab").combogrid('grid');

      if(newVal == 17 ){
        $("#tr_marketing td").each(function() {
          var cellText = $.trim($(this).text());
          if (cellText.length == 0) {
            $(this).parent().show();
          }
        });

        var cols = [[
          {field:'id',hidden:true},
          {field:'nama',title:'Marketing',width:200},
          {field:'telepon',title:'No Tlp',width:100}
        ]];
        pgrid.datagrid({
          columns:cols,
          pagination: true,
          url: '<?php echo base_url() ?>pegawai/combogrid/18',
          fitColumns: true,
                    mode: 'remote',
        });

      }else {
        $("#tr_marketing td").each(function() {
          var cellText = $.trim($(this).text());
          if (cellText.length == 0) {
            $(this).parent().hide();
          }
        });

        $('#PenanggungJawab').combobox({
            required: false
        });

      }

    }
  });
</script>
