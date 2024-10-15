<?php
  if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

  class Url_support {
    // public static $this_url;

     public function methodarray($this_url){
      $method = get_class_methods($this_url);
      $json_method = json_encode($method);
      $str_method = str_replace('"', "", str_replace("[", "", str_replace("]", "", $json_method)));
      $arr_method = explode (",",$str_method);

      foreach ($arr_method as $key => $method_name) {

        $inisial_method= strtoupper(str_replace('_', "", $method_name));
        $thisurl=  $this_url->$method_name();
        // constant(''.$inisial_method.'');

        define($inisial_method, $thisurl);
      }
    }

    // public static function method_array(){
    //   echo parent::methodarray();
    // }

  }








  // class A {
  //   function b(B $c, array $d, $e) {
  //
  //   }
  // }
  // class B {
  // }
  //
  // $refl = new ReflectionClass('A');
  // $par = $refl->getMethod('b')->getParameters();
  //
  // var_dump($par[0]->getClass()->getName());  // outputs B
  // var_dump($par[1]->getClass());  // note that array type outputs NULL
  // var_dump($par[2]->getClass());  // outputs NULL
