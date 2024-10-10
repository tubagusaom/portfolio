<?php 
foreach($record as $key => $data):?>
<tr id="kolom<?=$data->id?>" onclick="action('<?=$data->id?>')" class="">
	<!-- <td><?=$key+1?></td> -->
    <td><?=$data->kode_jadwal?></td>
    <td><?=$data->jadual?></td>
    <td><?=tgl_indo($data->tanggal)?></td>
    <td><?=$data->tuk?></td>
    <td class="center"><?=$data->kuota_peserta?></td>
</tr>
<?php endforeach;?>
