<?php
  if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

  class Url {
    // public static $dataheader;

    function test_url(){
      // echo "Test URL OK";
    }

    public function base_url(){
      $base_ = (empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
      $base_ .= '://'. $_SERVER['HTTP_HOST'];

      if ($_SERVER['HTTP_HOST'] == "localhost") {
        $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
      }else{
        $segmen = $this->segmen_url();
        if ($segmen[1] == '') {
          $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_);
        }else {
          $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_ . '/home'.'/');
          // $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_);
        }
      }

      return $base_url;
    }

    public function url_berkas(){
      $base_ = (empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
      $base_ .= '://'. $_SERVER['HTTP_HOST'];

      if ($_SERVER['HTTP_HOST'] == "localhost") {
        $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
      }else{
        $segmen = $this->segmen_url();
        if ($segmen[1] == '') {
          $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_);
        }else {
          $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_ . '/home'.'/');
        }
      }

      $url_berkas = str_replace('home','berkas', $base_url);

      return $url_berkas;
    }

    protected function segmen_url(){
      return $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }

    function get_url(){
      // $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    	$url	= $_SERVER['QUERY_STRING'];
    	return $url;
    }

    function get_header(){
      if (!isset($_GET['header'])) {
				$header = '';
			}else {
				$header = $_GET['header'];
			}

      return $header;
    }

    function check_header(){
      $getheader = $this->get_header();

      $cekheader = array(
        ''=>'',
        'User'=>$getheader,
        'Account'=>$getheader,
        'Konfigurasi'=>$getheader,
        'Company'=>$getheader,
        'Divisi'=>$getheader,
        'Anggota'=>$getheader,
        'Departmen'=>$getheader,
        'Lokasi'=>$getheader,
        'Simpanan'=>$getheader,
        'Pinjaman'=>$getheader,
        'Penagihan'=>$getheader,
        'Penyelesaian'=>$getheader,
        'Jurnal'=>$getheader,
        'Laporan'=>$getheader,
        'Akses'=>$getheader,
        'Profile'=>$getheader,
        'Akun'=>$getheader
      );

      return $cekheader[$getheader];

    }

    function parsing_url(){
      $uri = parse_url(base_url(), PHP_URL_PATH);
      return str_replace(array('//', '../'), '/', trim($uri, '/'));
    }

    function url_tb(){
      $url = 'https://www.instagram.com/tera.bytee/';
      return $url;
    }

    function url_copyright(){
      $url = 'https://www.instagram.com/coits.id/';
      return $url;
    }
    function copyright(){
      $url = 'Coits';
      return $url;
    }

  }
