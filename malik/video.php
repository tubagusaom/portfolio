<?php
    include "config/master_koneksi.php";

    $sql_v	      ="SELECT `id`, `name_file`, `jenis_file`, `size_file`, `ext_file` FROM files WHERE jenis_file = '2' ORDER BY id desc";
    $query_v      =mysqli_query($koneksi,$sql_v);
    while($data_v =mysqli_fetch_array($query_v)) {
?>

<style>
    .video-fluid {
        background-image: url('https://terabytee.my.id/malik/images/play_malik.png');
        background-position: center;
        background-size: 66px!important;
        background-repeat: no-repeat;
        background-color: transparent;
    }
</style>

<div class="item">
    <!-- <video class="video-fluid item_img" src="./assets/m-video/<?=$data_v[1]?>" poster="./images/icon_play.png"></video> -->
    <video class="video-fluid item_img" src="./assets/m-video/<?=$data_v[1]?>"></video>
</div>

<?php } ?>