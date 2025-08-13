<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
        <div id="tips" style="background-color: aqua;">
			
		</div>
            <table class="table-data">
                 <tr>
                    <td style="width: 200px;">Nama Perangkat: </td>
                    <td>
                        <?php echo $data->nama_perangkat ?>
                    </td>
                </tr>
               
               
                <tr>
                    <td style="width: 100px;">Versi : </td>
                    <td>
                        <?php echo $data->versi ?>
                        
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Download Perangkat Asesmen : </td>
                    <td>
                        <a href="<?php echo base_url().'perangkat_asesmen/download/'.$data->id ?>" target="_blank">Download</a>
                        
                    </td>
                </tr>
            </table>
            <div id="tips">
    			<ol class="rounded-list">
    				<li><a href="javascript: void(0)">Data Perangkat Detail</a></li>
    			</ol>
    		</div>
            <table class="easyui-datagrid" style="width: 97%;" data-options="nowrap:false,striped:true">
            <thead>
                <tr><th data-options="field:'code'" style="width: 30%;">Kode Perangkat</th>
                <th data-options="field:'code1'" style="width: 58%;">Nama Perangkat Detail</th>
                <th data-options="field:'code2'" style="width: 10%;">Detail</th>
                
                
            </thead>
            <tbody>
                <?php
                foreach($detail_perangkat as $value){
                    echo '<tr>
                    <td>'.$value['no_perangkat_detail'].'</td>
                    <td>'.$value['perangkat_detail'].'</td>
                    <td><a href="'.base_url().'perangkat_asesmen/detail/'.$value['id'].'" target="_blank">detail</a></td>
                    </tr>';    
                }
                ?>   
            </tbody> 
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
<?php
//echo $pra_asesmen_grid;

?>
</script>