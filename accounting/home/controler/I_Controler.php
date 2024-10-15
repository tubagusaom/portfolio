<?php
  if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

class I_Controler {

  // function sesiOn(){
  // 	$logout = "../"; // redirect halaman logout
  //
  //   if (isset($_SESSION['akses'])) {
  //     $timeout = 30; // setting timeout dalam menit
  //
  //   	$timeout = $timeout * 60; // menit ke detik
  //   	if(isset($_SESSION['start_session'])){
  //   		$elapsed_time = time()-$_SESSION['start_session'];
  //   		if($elapsed_time >= $timeout){
  //   			session_destroy();
  //   			echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
  //   		}
  //   	}
  //
  //   }else {
  //     header("Location: $logout");
  //   }
  //
  // 	$_SESSION['start_session']=time();
  // }

  function merge_get_url($url_get){
    $merge_url = base_url().'?'.$url_get;
  	return $merge_url;
  }

  function load_views($file,$data, $store = false) {
      // extract($data);

      ob_start();
      require_once '../home/'.$file.'.php';

      if($store) return ob_get_clean();
      else ob_end_flush();
  }

  // function load_view($view, $store = false){
  //   $dir= VPATH.$view;
  //
  //   // if (is_dir($dir)) {
  //   //     $data = $dir.EXT;
  //   // } else {
  //       // if (!is_dir($dir)) {
  //       //     exit("Jalur folder aplikasi Anda tidak disetel dengan benar. Silakan buka file berikut dan perbaiki ini: " . SELF);
  //       // }
  //
  //       $data = $dir.EXT;
  //       return $data;
  //
  //       // ob_start();
  //       // require_once $dir.EXT;
  //       //
  //       // if($store) return ob_get_clean();
  //       // else ob_end_flush();
  //   // }
  //
  // }

  function load_file($file, $store = false){
    $dir= APPPATH.$file;

    $data = $dir.EXT;
    return $data;

  }




  // test percobaan
  function testicontroler(){
    return $this->load = "TesT Function I_Controler";
  }
  function testhitung($thn_lahir, $thn_sekarang){
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
  }
  function testpanggil($nama, $salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Aku ".$nama."<br/>";
    // memanggil fungsi lain
    echo "Aku berusia ". testhitung(1992, date('Y')) ." tahun<br/>";
    echo "Senang berkenalan dengan anda<br/>";
  }

  // test('TB');

}


/* create the application object */
$I_Controler = new I_Controler;
?>
