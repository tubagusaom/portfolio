<link rel="stylesheet" href="<?=url_berkas() ?>css/popup.css">

<?php

$sqlpinjamthem="SELECT
    pinjam_them.id,
    pinjam_them.jumlah_pinjam,
    pinjam_them.keperluan_pinjam,
    pinjam_them.tgl_pinjam,
    pinjam_them.bank_pinjam,
    pinjam_them.norek_pinjam,
    pinjam_them.pemilik_pinjam,
    pinjam_them.jangka_pinjam,
    pinjam_them.jasa_pinjam,
    pinjam_them.ket_pinjam
  FROM pinjam_them
  WHERE pinjam_them.id_schm='$kodeschm'
  ORDER BY pinjam_them.id DESC";

  $querypinjamthem	= mysqli_query($koneksi,$sqlpinjamthem);
  $datapinjamthem	  = mysqli_fetch_array($querypinjamthem);

  // var_dump($datapinjamthem);

?>

<?php require_once('detail_pinjaman.php'); ?>



<div id="DetailPopup">
  <div class="popup-content">
    <div class="popup-header">
      <a href="<?=base_url()?>?Profile-Pinjaman=0&&header=Profile" class="close-button" data-title="close">x</a>
      <h2>FORMULIR</h2>
    </div>
    <div class="popup-body">
      <?php require_once "popup_pinjam.php" ?>
    </div>
    <a href="<?=url_copyright()?>" target="_blank" style="cursor: default;"><div class="popup-footer"> © <?=copyright()?>  2021 </div> </a>
  </div>
  <a href="<?=base_url()?>?Profile-Pinjaman&&header=Profile" class="tooltip">
    <div class="overlay"></div>
    <div class="tooltiptext">klik sembarang untuk close</div>
  </a>
</div>
