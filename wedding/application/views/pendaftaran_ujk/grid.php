<?php 
foreach($record as $key => $data):?>
<tr id="kolom<?=$data->id?>" onclick="action('<?=$data->id?>')" class="">
	<!-- <td><?=$key+1?></td> -->
    <td><?=$data->nama_lengkap?></td>
    <td><?=$data->jadwal_id?></td>
    <td><?=$data->skema_sertifikasi?></td>
    <td><?=$data->id_tuk?></td>
    <td class="center"><?=$data->rekomendasi_apl01?></td>
</tr>
<?php endforeach;?>
