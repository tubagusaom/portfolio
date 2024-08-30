<?php if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

require_once realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.ucwords('loader').EXT;

class RP_Controller extends Loader{}

function _support($class) {
    $data = SYSDIR.SUPPORT."/{$class}".EXT;
    if (is_readable($data)) {
        require_once $data;
    }
}

function _library($class) {
    $data = SYSDIR.LIBRARY."/{$class}".EXT;

    if (is_readable($data)) {
        require_once $data;
    }
}

spl_autoload_register("_support");
spl_autoload_register("_library");

$this_login   = new Koneksi();
$this_url     = new Url();
$this_app     = new App();
$this_date    = new Casedate();

$url_support_ = new Url_support();
$url_s = $url_support_->methodarray($this_url);

$model_support_ = new Model_support();
$model_support_ = new Model_support();
$model_support_->_load_model();
// $model_support_->modelarray();

$logSesion=$this_login->logSesion($koneksi,'');

function connectdb($logSesion=FALSE){
  return $logSesion;
}

// function segmen_url($data){
//   $segmenarray = SEGMENURL;
//   return $segmenarray[$data];
// }

function segmen_url(){
  return SEGMENURL;
}

function base_url() {
  return BASEURL;
  // echo constant('BASEURL');
}

function url_berkas() {
  return URLBERKAS;
}

function get_url(){
  return GETURL;
}

function parsing_url(){
  return PARSINGURL;
}

function get_header(){
  return GETHEADER;
}

// echo $this_url->get_header();

function nama_app(){
  $this_app = new App();
  return $this_app->nama_app();
}

function singkatan_app(){
  $this_app     = new App();
  return $this_app->singkatan_app();
}

function hari($hr){
  $this_date     = new Casedate();
  return $this_date->bulan($hr);
}
function bulan($bln){
  $this_date     = new Casedate();
  return $this_date->bulan($bln);
}
function tgl_indo($tgl){
  $this_date     = new Casedate();
  return $this_date->tgl_indo($tgl);
}
function rupiah($rp){
  $this_date     = new Casedate();
  return $this_date->rupiah($rp);
}
function angka_rupiah($rp){
  $this_date     = new Casedate();
  return $this_date->angka_rupiah($rp);
}
function normal_rupiah($rp){
  $this_date     = new Casedate();
  return $this_date->normal_rupiah($rp);
}
function terbilang($nilai){
  $this_date     = new Casedate();
  return $this_date->terbilang($nilai);
}
function thn_awal(){
  $this_date     = new Casedate();
  return $this_date->thn_awal();
}
function thn_akhir(){
  $this_date     = new Casedate();
  return $this_date->thn_akhir();
}

// echo $I_Controler->testicontroler();

// function merge_get_url($url_get){
//   $merge_url = base_url().'?'.$url_get;
//   return $merge_url;
// }

// function load_views($file,$data, $store = false) {
//     // extract($data);
//
//     ob_start();
//     require_once '../home/'.$file.'.php';
//
//     if($store) return ob_get_clean();
//     else ob_end_flush();
// }

function load_view($view){
  $dir= VPATH.$view;
  $data = $dir.EXT;

  return $data;
}

// function load_file($file, $store = false){
//   $dir= APPPATH.$file;
//
//   $data = $dir.EXT;
//   return $data;
// }
function copyright(){
  return COPYRIGHT;
}
function url_tb(){
  return URLTB;
}
function url_copyright(){
  return URLCOPYRIGHT;
}

function run_eror(){
  // $run="AOM ";
  $run = error_reporting(E_ALL);
  $run.=ini_set('display_errors', TRUE);
  $run.=ini_set('display_startup_errors', TRUE);

  // return $run;
}

function testcontrolsystem(){
  echo "testcontrolsystem";
}

function test_select(){
  // echo "Test URL OK";
}

// $this->directory = ROOT_DIR.SESS_TMP_DIR; // didapat dari configuration file config.ini.php
//
// $cookie = $this->_getCookie($this->sess_name);

require_once APPPATH.'controler/init.php';

// define('AOM', array('Kliwon', 'Legi', 'Pahing', 'Pon', 'Wage'));
//   define('SATU', 5 + 3);
//   define('DUA', 2);

// echo BASEPATH;
//
//
//   const ONE = 1 + 1;
//   const TWO = 2;
//
//   // echo ONE + TWO;
//
//   define("GREETING","Hello you! How are you today?");
  // echo constant('BASEURL');


// echo APPPATH;
// echo "<br><br>";
