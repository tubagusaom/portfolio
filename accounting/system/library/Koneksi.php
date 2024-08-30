<?php if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

class Koneksi {

  public static $koneksi , $akses , $getdata;

  // function __construct() {
  //
  //   $host	 		= host_DB;
  //   $user	 		= user_DB;
  //   $pass	 		= pass_DB;
  //   $dabname	= name_DB;
  //   $base	 		= base_DB;
  //
  //   $koneksi  = mysqli_connect($host, $user, $pass, $dabname) or die("<script>location.replace('system/error/')</script>");
  //   $baseurl=$base;
  //
  // }

  function testkoneksi(){
    echo "KONEKSI OK";
  }

  function logSesion($koneksi){
    $this->login($koneksi);
  }

  private function login($koneksi){

     if (isset($_POST['login'])) {
       $user		=$_POST['username'];
       $pass		=md5($_POST['password']);

       $cekuser	= mysqli_query($koneksi,"SELECT a.id, a.id_akun, a.kd_user, a.pw_user AS password, a.akses_user, b.kd_user AS id_user, b.kd_role AS akses
         FROM user a JOIN t_user_role b ON b.kd_user = a.id WHERE a.kd_user='$user' AND a.stts_user NOT LIKE '3'AND a.stts_user NOT LIKE '4' AND a.stts_user NOT LIKE '5' AND a.stts_user NOT LIKE '6'");

       $jumlah	= mysqli_num_rows($cekuser);
       $hasil		= mysqli_fetch_array($cekuser);

       // if ($jumlah>0){
       //   var_dump($hasil); die();
       //
       //   session_unset();
 				//  session_destroy();
       // }

       if ($jumlah==0){
           echo "<script>alert('WARNING, ANDA TIDAK BERHAK AKSES !!!')</script>";
       } else{

         if($pass!=$hasil['password']) {
           echo "<script>alert('PASSWORD SALAH'); location.href=''</script>";
         }else{
           $_SESSION['id']=$hasil['id'];
           $_SESSION['id_akun']=$hasil['id_akun'];
           $_SESSION['kd_user']=$hasil['kd_user'];
           $_SESSION['akses_user']=$hasil['akses_user'];
           $_SESSION['id_user']=$hasil['id_user'];
           $akses = $_SESSION['akses']=$hasil['akses'];
           echo"<script>location.replace('home/')</script>";
         }

       }
     }
  }

  function sesiOn($akses,$getdata){

    if ($akses == '' OR $akses == 0 OR $akses == NULL?$datasesion= 0:$datasesion=$akses);
    $replaceurl = str_replace('home/','', base_url());

    $segmen = $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $inhome = in_array('home', $segmen);

    // var_dump($akses); die();

    if ($getdata == '') {
      if ($datasesion > 0) {

        if ($inhome == FALSE ) {
          echo "<script type='text/javascript'>
            window.location='".base_url()."/home'
          </script>";
        }

        $timeout = 30; // setting timeout dalam menit
      	$timeout = $timeout * 60; // menit ke detik

      	if(isset($_SESSION['start_session'])){
      		$elapsed_time = time()-$_SESSION['start_session'];
      		if($elapsed_time >= $timeout){
      			// session_unset();
      			// session_destroy();
      			// echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='../'</script>";
            $logout = "<script type='text/javascript'>alert('Sesi telah berakhir , silahkan masuk kembali');window.location='".$replaceurl."'</script>";

            if ($logout == TRUE) {
              session_unset();
        			session_destroy();
            }

            echo $logout;
      		}
      	}
        $_SESSION['start_session']=time();


        // echo $direct = "<script type='text/javascript'>window.location='".base_url()."'</script>";

        // $this->logSesion();
      }else {

        // $segmen = $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        // $inhome = in_array('home', $segmen);

        // var_dump($replaceurl); die();

        if ($inhome == 1) {
          echo "<script type='text/javascript'>
            window.location='".$replaceurl."'
          </script>";

        }

      }

    } else {
      // echo "<script type='text/javascript'>alert('LOGOUT $akses OK');</script>";

      $aksesusr = array(
        '' => '',
        'default' => 'ROOT',
        'superuser' => 'Superuser',
        'ketua' => 'Ketua Koperasi',
        'admin' => 'Sekertaris 1',
        'sekertaris' => 'Sekertaris 2',
        'akunting' => 'Bendahara 1',
        'analis' => 'Bendahara 2',
        'anggota' => 'Anggota Koperasi',
        'kredit' => 'Panitia Kredit',
        'pengawas' => 'Pengawas'
      );

      if(isset($akses)){
				session_unset();
				session_destroy();
			}
			// echo"<script>alert('Terima Kasih ".$aksesusr[$akses].", Silahkan datang kembali 😉 ');location.replace('../')</script>";
      echo"<script>location.replace('".$replaceurl."')</script>";
    }

    // echo $datasesion;

  }

  function akses($datasession){

    // echo $datasession;

    if ($datasession > 0) {
      $data = array(
        '2' => 'default',
        '3' => 'superuser',
        '4' => 'ketua',
        '5' => 'admin',
        '16' => 'sekertaris',
        '17' => 'akunting',
        '18' => 'analis',
        '66' => 'anggota',
        '20' => 'kredit',
        '21' => 'pengawas'
      );

      // echo $akses;
      // testcontrolsystem();

      $ds_ = $data[$datasession];

    }

    return $ds_;

  }

  function akses_users($data_session){

      $data_aks = array(
        '' => 'Tidak Ada Akses',
        'default' => 'Root',
        'superuser' => 'Superuser',
        'ketua' => 'Ketua Koperasi',
        'admin' => 'Sekertaris 1',
        'sekertaris' => 'Sekertaris 2',
        'akunting' => 'Bendahara 1',
        'analis' => 'Bendahara 2',
        'anggota' => 'Anggota Koperasi',
        'kredit' => 'Panitia Kredit',
        'pengawas' => 'Pengawas'
      );

      $daks_ = $data_aks[$data_session];

      return $daks_;

  }

  function akses_user($datasession){

    if ($datasession > 0) {

      $data = array(
        '2' => 'root',
        '3' => 'Superuser',
        '4' => 'Ketua Koperasi',
        '5' => 'Sekertaris 1',
        '16' => 'sekertaris 2',
        '17' => 'Bendahara 1',
        '18' => 'Bendahara 2',
        '66' => 'Anggota Koperasi',
        '20' => 'Panitia Kredit',
        '21' => 'Pengawas'
      );

      $daks_ = $data[$datasession];

    }

    return $daks_;

  }

  function akses_limit($datasession){

    // echo $datasession;

    if ($datasession > 0) {
      $data = array(
        '2' => '',
        '3' => 'limit 1,1000',
        '4' => 'limit 2,1000'
      );

      // echo $akses;
      // testcontrolsystem();

      $dl_ = $data[$datasession];

    }

    return $dl_;

  }

  // public function __call($method,$arguments) {
  //     if(method_exists($this, $method)) {
  //           $this->test1();
  //           return call_user_func_array(array($this,$method),$arguments);
  //     }
  // }

  // function DBakses(){
  //   $data1 = APPPATH."model/config/master_koneksi".EXT;
  //   $data2 = APPPATH."controler/init".EXT;
  //
  //   $link1 = fopen($data1, "r");
  //   $link2 = fopen($data2, "r");
  //
  //   return $link1;
  //   return $link2;
  // }

  //
  // function test_koneksi(){
  //   echo "Test Koneksi OK";
  // }

}
// spl_autoload_register("_library");
