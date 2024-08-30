<div style="margin: 2px;">
	<div id="import_skema" style="width: 98.5%;"></div>
</div>
<script type="text/javascript">
	<?php echo $grid; ?> 
	function posting_(){
		$.ajax({
        url: 'import_skema/proses',
        type: 'POST',
        success: function(result){
            if(result.msgType == 'error')
            {
                $.messager.alert('Error', 'Data berhasil di Import');
            }           
            else
            {
                $.messager.alert('Sukses', 'Data Skema berhasil di Import ');
            }
        }
    })
	  
	 }
</script>