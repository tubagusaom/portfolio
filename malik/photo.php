<?php
    include "config/master_koneksi.php";

    $sql_f	     ="SELECT `id`, `name_file`, `jenis_file`, `size_file`, `ext_file` FROM files WHERE jenis_file = '1' ORDER BY id desc";
    $query_f	 =mysqli_query($koneksi,$sql_f);
    while($data_f=mysqli_fetch_array($query_f)) {
?>

<div class="item">
    <img id="myImg" class="img-fluid item_img" src="./assets/m-image/<?=$data_f[1]?>" alt="">
</div>

<?php } ?>