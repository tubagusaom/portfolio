<?php if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');
  require_once APPPATH.'autu/I_Loader'.EXT;
  // ini_set('unserialize_callback_func', 'spl_autoload_call');
  class Loader extends I_Loader {
    // public static $loader;
    //
    // public static function init() {
    //   if (self::$loader == NULL)
    //   self::$loader = new self();
    //   return self::$loader;
    // }
    //
    // public function __construct() {
    //   spl_autoload_register(array($this,'model'));
    //   spl_autoload_register(array($this,'library'));
    //   spl_autoload_register(array($this,'controller'));
    // }
    //
    // public function library($class) {
    //   set_include_path($_SERVER['DOCUMENT_ROOT'] . implode('/',array_slice(explode('/',$_SERVER['PHP_SELF']),0,-1)).'/library/');
    //   spl_autoload_extensions('.php');
    //   spl_autoload($class);
    // }
    //
    // public function model($class) {
    //   set_include_path($_SERVER['DOCUMENT_ROOT'] . implode('/',array_slice(explode('/',$_SERVER['PHP_SELF']),0,-1)).'/model/');
    //   spl_autoload_extensions('.php');
    //   spl_autoload($class);
    // }
    //
    // public function controller($class) {
    //   set_include_path($_SERVER['DOCUMENT_ROOT'] . implode('/',array_slice(explode('/',$_SERVER['PHP_SELF']),0,-1)).'/controller/');
    //   spl_autoload_extensions('.php');
    //   spl_autoload($class);
    // }

    // function get_content(){
    //   require_once load_view('fs_head');
    //   require_once load_view('fs_body');
    // }
    //
    // function test_loader(){
    //   echo "loader ok";
    // }
    //
    // function load_test(){
    //     return $this->test();
    // }

    // public function getTitle()
    // {
    //     return $this->title;
    // }
    //
    // public function getBody()
    // {
    //     return $this->body;
    // }
  }
  // Loader::init();

  require_once APPPATH.'controler/I_Controler'.EXT;
  require_once APPPATH."model/config/master_koneksi".EXT;

// echo $I_Controler->testicontroler();
// echo login($koneksi);
// $this_iload->model();
// $this_load = new Loader;


	// protected $_module;
  // $clas = array();

  // if (! function_exists('base_url')) {
  //   function base_url(){
  // 		echo $this_url;
  //   }
  // }

  // function __autoload($classname) {
  //   $class_name = strtolower($classname);
  //   $path       = "{$classname}.php";
  //
  //   if (file_exists($path)) {
  //     require_once($path);
  //   } else {
  //     die("The file {$classname}.php could not be found!");
  //   }
  // }

  // spl_autoload_register(function ($classname) {
  //     @require_once(APPPATH."controler/$classname.php");
  // });







  // echo $classname;

  // $classname = new I_Controler;

  // function base_url(){
  //   return I_Controler::base_url();
  // }

  // function get_url(){
  //   return I_Controler::get_url();
  // }
  //
  // function merge_get_url($url_get){
  //   return I_Controler::merge_get_url();
  // }
  //
  // function parsing_url(){
  //   return I_Controler::parsing_url();
  // }


// function base_url(){
//   $base_url = (empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
//   $base_url .= '://'. $_SERVER['HTTP_HOST'];
//   $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
//
//   return $base_url;
// }
  // echo APPPATH;
