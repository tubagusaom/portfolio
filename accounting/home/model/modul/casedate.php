<?php
function hari($hr){
  $hari=$hr;
  switch ($hari) {
    case 'Sunday':$hari="Minggu";
    break;
    case 'Monday':$hari="Senin";
    break;
    case 'Tuesday':$hari="Selasa";
    break;
    case 'Wednesday':$hari="Rabu";
    break;
    case 'Thursday':$hari="Kamis";
    break;
    case 'Friday':$hari="Jum'at";
    break;
    case 'Saturday':$hari="Sabtu";
    break;
  }return $hari;
}

function bulan($bln){
  $bulan=$bln;
  switch ($bulan) {
    case '01':$bulan="Januari";
    break;
    case '02':$bulan="Februari";
    break;
    case '03':$bulan="Maret";
    break;
    case '04':$bulan="April";
    break;
    case '05':$bulan="Mei";
    break;
    case '06':$bulan="Juni";
    break;
    case '07':$bulan="Juli";
    break;
    case '08':$bulan="Agustus";
    break;
    case '09':$bulan="September";
    break;
    case '10':$bulan="Oktober";
    break;
    case '11':$bulan="November";
    break;
    case '12':$bulan="Desember";
    break;
  }return $bulan;
}
?>
