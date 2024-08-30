<?php if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

/* load the MX_Loader class */


class I_Loader {}

  $modul   = 'home/module';
  $modul   = str_replace("\n\r", ".", rtrim("\n\r\n\r/".$modul).'/');
  define('MODUL', $modul);

  function _model($module) {
    $inisial = $module.'_model';
    $data = MODUL."{$module}/model/{$inisial}".EXT;

    if (is_readable($data)) {
      require_once $data;
    }

    // echo (strtolower(str_replace("\\", "/", $model)));
  }

  spl_autoload_register("_model");

  // $this_module_ = new account();
  // $this_modul_->account_xxx();

// $this_iload = new I_Loader;
// $model = 'account';
// echo MODUL."{$model}/model/{$model}_model".EXT;

// echo SELF;
