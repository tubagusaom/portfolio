<?php
  if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

  // echo account_xxx();

  class Model_support {
    public static $this_url;

    function test_model(){
      return "TEST MODEL OK";
    }

    function _load_model() {
      // $class='';
      // $dir = new DirectoryIterator(APPPATH.'module');
      // foreach (new DirectoryIterator(APPPATH.'module') as $fileInfo) {
      // if($fileInfo->isDot()) continue;
      //   $class= $fileInfo->getFilename() . "<br>\n";
      //   $data = APPPATH.'module'."/{$class}/";
      //
      //   // return $dir;
      // }

        // if (is_readable($data)) {
        //     require_once $data;
        // }



        // return $dir;
    }

    // function modelarray($this_url){
    //   $method = get_class_methods($this_url);
    //   $json_method = json_encode($method);
    //   $str_method = str_replace('"', "", str_replace("[", "", str_replace("]", "", $json_method)));
    //   $arr_method = explode (",",$str_method);
    //
    //   foreach ($arr_method as $key => $method_name) {
    //
    //     $inisial_method= strtoupper(str_replace('_', "", $method_name));
    //     $thisurl=  $this_url->$method_name();
    //
    //     $define = define($inisial_method, $thisurl);
    //   }
    // }

  }
