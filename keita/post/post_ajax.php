<?php
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   echo "REQUEST_METHOD OK";
  // }else {
  //   echo "eror";
  // }
?>




<?php

  include "../library/terabytee.php";

  $direct_rplc = str_replace("post/post_ajax.php","#doa",get_self());

  // echo $direct_rplc;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    ini_set('date.timezone', 'Asia/Jakarta');
    // $create_waktu = date('N, d n Y - H:i:s a', time());
    $create_waktu = date('N d n Y H:i:s a');

    $hari = array (
      1 => 'Senin',
      2 => 'Selasa',
      3 => 'Rabu',
      4 => 'Kamis',
      5 => 'Jumat',
      6 => 'Sabtu',
      7 => 'Minggu'
    );

    $bulan = array (
      1 => 'Januari',
      2 => 'Februari',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember'
    );

    $pecah_waktu = explode(' ', $create_waktu);
    $waktu = $hari[$pecah_waktu[0]] . ", " . $pecah_waktu[1] . " " . $bulan[$pecah_waktu[2]] . " " . $pecah_waktu[3] . " - " . $pecah_waktu[4] . " " . $pecah_waktu[5];


    if(!empty( $_SERVER [ 'HTTP_CLIENT_IP' ])){
        //ip dari berbagi internet
        $getipxx  =  $_SERVER [ 'HTTP_CLIENT_IP' ];
    }elseif(!empty( $_SERVER [ 'HTTP_X_FORWARDED_FOR' ])){
        //ip pass dari proxy
        $getipxx  =  $_SERVER [ 'HTTP_X_FORWARDED_FOR' ];
    }else{
        $getipxx  =  $_SERVER [ 'REMOTE_ADDR' ];
    }


    $file = 'doa.php';

    // $dataold = @readfile(($newfile));

    $myfile = fopen($file, "r") or die("Unable to open file!");
    $dataold =  fread($myfile,filesize($file));
    fclose($myfile);

    $old_replace = str_replace(array('[', ']'), '', $dataold);

    $data['nama']       = $_POST['nama'];
    // $data['email']      = $_POST['email'];
    // $data['handphone']  = $_POST['handphone'];
    $data['doa']        = $_POST['doa'];
    // $data['hadir']      = $_POST['hadir'];
    $data['datetime']   = $waktu;
    $data['ip_address'] = $getipxx;

    $convjsn = json_encode($data);

    $php_string  = '['.$convjsn.','.$old_replace.']';

    $fp = fopen($file, 'w');
    fwrite($fp, $php_string);

    fclose($fp);

    echo "<script type='text/javascript'>alert('Terimakasih ya om dan tante atas doanya 🙂 ');window.location='$direct_rplc'</script>";

    // var_dump(json_decode($dataold)); die();

  }else {
    header("location: $direct_rplc");
    exit();
  }

?>
