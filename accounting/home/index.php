<?php
  session_start();
  // var_dump($_SESSION['akses']);

  // $run = error_reporting(E_ALL);
  // $run.=ini_set('display_errors', TRUE);
  // $run.=ini_set('display_startup_errors', TRUE);
  
  $jalur_sistem = "system";
  $app_folder = "home";

  $app_folder   = str_replace("\n\r", ".", rtrim("\n\r\n\r/".$app_folder));
  if (realpath($app_folder) !== FALSE) {
		$app_folder = realpath($app_folder).'/';
	}

  define('BASEPATH', str_replace("\\", "/", $app_folder));
  define('SYSDIR', str_replace("\n\r", ".", rtrim("\n\r\n\r/".$jalur_sistem).'/'));

  if (is_dir($app_folder)) {
      define('APPPATH', $app_folder );
  } else {
    if (!is_dir(SYSDIR . '/')) {
      exit("Jalur folder aplikasi Anda tidak disetel dengan benar. Silakan buka file berikut dan perbaiki ini: " . SELF);
    }

    define('APPPATH', SYSDIR . $app_folder );
  }

  // echo BASEPATHX;
  // printf (base_url());
  // echo $this_load->load_test();
  // echo SYSDIR;
  // echo load_view('test','data', true);

?>


<html>
	<?php
    require_once SYSDIR.'Rupro.php';
    require_once load_view('fs_head');
    require_once load_view('fs_body');
  ?>
</html>
