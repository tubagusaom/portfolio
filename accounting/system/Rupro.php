<?php if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

  /*
  * NOTE: Pengaturan ERROR REPORTING development , production , testing
  */
  define('ENVIRONMENT', 'production');
  /*
  *---------------------------------------------------------------
  * ERROR REPORTING
  *---------------------------------------------------------------
  *
  * Lingkungan yang berbeda akan membutuhkan tingkat pelaporan kesalahan yang berbeda.
  * Secara default pengembangan akan menunjukkan kesalahan tetapi pengujian dan live akan menyembunyikannya.
  */
  if (defined('ENVIRONMENT'))
  {
  	switch (ENVIRONMENT)
  	{
  		case 'development':
  			error_reporting(E_ALL);
  			ini_set('display_errors', '1');
  		break;

  		case 'testing':
  		case 'production':
  			error_reporting(0);
  		break;

  		default:
  			exit('The application environment is not set correctly.');
  	}
  }

  define('EXT', '.php');

  define('_Berkas_JS_', 'berkas/js/');

	define('_Berkas_CSS_', 'berkas/css/');

	define('_Berkas_IMG_', 'berkas/image/');

	define('_Berkas_FILE_', 'berkas/file/');

  $view_path = 'home/view';
  $library = 'library';
  $support = 'support';
  // $modul   = 'home/module';
  // $modul   = str_replace("\n\r", ".", rtrim("\n\r\n\r/".$modul).'/');

  $view_path  = str_replace("\n\r", ".", rtrim("\n\r\n\r/".$view_path).'/');
  $errors     = str_replace("..", "", str_replace("$view_path","error/notfound", rtrim($view_path.'')));

  define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
  define('FCPATH', str_replace(SELF, '', __FILE__));
  define('VPATH', $view_path );
  define('LIBRARY', $library );
  define('SUPPORT', $support );
  // define('MODUL', $modul);
  define('ERROR', $errors);

  require_once realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.ucwords('controler').EXT;
  // echo $realpath;

  // define('APPPATH', $app_folder );

  // echo ERROR;



  // echo testtesttest();

  // $akses = $this_login->akses(5);

  // class RP extends RP_Controller{}

  // class Demos {
  //    function Demo() {
  //       return(true);
  //    }
  //    function displayOne() {
  //       return(true);
  //    }
  //    function displayTwo() {
  //       return(true);
  //    }
  // }
  //
  // $method = get_class_methods(new Demos());
  // foreach ($method as $key => $method_name) {
  //    echo "$method_name \n";
  // }




// echo "<b style='color:red'>".register_shutdown_function('')."</b>";
