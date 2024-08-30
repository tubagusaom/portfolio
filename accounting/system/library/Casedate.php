
<?php if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

class Casedate {

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

  // function tgl_indo($tgl){
  //   $tanggal = date('d F Y', strtotime($tgl));
  //   return $tanggal;
  // }

  function tgl_indo($tgl){
     $pecahkan = explode('-', $tgl);
     $bulan = $this->bulan($pecahkan[1]);
     return $pecahkan[2] . ' ' . $bulan . ' ' . $pecahkan[0];
  }

  function rupiah($rp){
    $rupiah = number_format($rp,2,',','.');
    return $rupiah;
  }

  function angka_rupiah($rp){
    $rupiah = number_format($rp,0,',','.');
    return $rupiah;
  }

  function normal_rupiah($rp){
    $rupiah = str_replace('.','', $rp);
    return $rupiah;
  }

  function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}
		return $temp;
  }

  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". $this->penyebut($nilai);
    } else {
      $hasil = $this->penyebut($nilai);
    }
    return $hasil;
  }

  function thn_awal(){
    return "2010";
  }

  function thn_akhir(){
    return "2025";
  }

}
