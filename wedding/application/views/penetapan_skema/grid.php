<?php 
foreach($record as $key => $data):?>
<tr id="kolom<?=$data->id?>" onclick="action('<?=$data->id?>')" class="">
	<!-- <td><?=$key+1?></td> -->
    <td><?=$data->jadual?></td>
    <td><?=$data->skema?></td>
</tr>
<?php endforeach;?>
