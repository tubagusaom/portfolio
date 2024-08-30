<?php

	$base_ = (empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
	$base_ .= '://'. $_SERVER['HTTP_HOST'];

	if ($_SERVER['HTTP_HOST'] == "localhost") {
		$base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	}
  elseif ($_SERVER['HTTP_HOST'] == "192.168.1.19") {
    $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
  }
  else{
		$base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_).'/';
	}

  $base_home = str_replace('error/','', $base_url);

	// echo $base_home;
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PEMELIHARAAN SISTEM</title>
    <meta name="keywords" content="MAINTENANCE, APLIKASI, APP, EROR, PEMELIHARAAN, maintenance, PAGE, pemeliharaan, aplikasi, Aplikasi Maintenance" />
    <meta name="description" content="MAINTENANCE">
    <meta name="author" content="https://www.instagram.com/tera.bytee/">

    <link rel="shortcut icon" href="<?= $base_home.'berkas/images/maintenance.png'?>" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?=$base_home?>berkas/css/notfound.css">
  </head>

  <body>

    <div class="container">
      <div class="error">
        <h1 style="font-size:68px;">MAINTENANCE</h1>
        <!-- <h2>MAINTENANCE</h2> -->
        <p><font class="font1" style="font-size:25px;">Aplikasi Sedang Dalam Pemeliharaan Sistem</font></p>
        <p><font class="font2" style="font-size:25px;">PEMELIHARAAN SISTEM</font></p>
        <p style="font-size:20px;">silahkan <a href="<?=$base_home?>">KEMBALI</a> dalam beberapa saat </p>
        <!-- <p>atau kembali ke BERANDA</p> -->
      </div>
      <div class="stack-container">
        <div class="card-container">
          <div class="perspec" style="--spreaddist: 125px; --scaledist: .75; --vertdist: -25px;">
            <div class="card">
              <div class="writing">
                <div class="topbar">
                  <div class="red"></div>
                  <div class="yellow"></div>
                  <div class="green"></div>
                </div>
                <div class="code">
									<ul style="color:#fff;font-size:9px;text-align:right;padding:5px 0 10px 0;">
										<a href="https://www.instagram.com/coits.id/" target="_blank"> COITS.ID </a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-container">
          <div class="perspec" style="--spreaddist: 100px; --scaledist: .8; --vertdist: -20px;">
            <div class="card">
              <div class="writing">
                <div class="topbar">
                  <div class="red"></div>
                  <div class="yellow"></div>
                  <div class="green"></div>
                </div>
                <div class="code">
									<ul style="color:#fff;font-size:9px;text-align:right;padding:5px 0 10px 0;">
										<a href="https://www.facebook.com/coits.id/" target="_blank"> coits.id </a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-container">
          <div class="perspec" style="--spreaddist:75px; --scaledist: .85; --vertdist: -15px;">
            <div class="card">
              <div class="writing">
                <div class="topbar">
                  <div class="red"></div>
                  <div class="yellow"></div>
                  <div class="green"></div>
                </div>
                <div class="code">
									<ul style="color:#fff;font-size:9px;text-align:right;padding:5px 0 10px 0;">
										<a href="https://www.instagram.com/tera.bytee/" target="_blank"> Rumah Produktif </a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-container">
          <div class="perspec" style="--spreaddist: 50px; --scaledist: .9; --vertdist: -10px;">
            <div class="card">
              <div class="writing">
                <div class="topbar">
                  <div class="red"></div>
                  <div class="yellow"></div>
                  <div class="green"></div>
                </div>
                <div class="code">
									<ul style="color:#fff;font-size:9px;text-align:right;padding:5px 0 10px 0;">
										<a href="https://www.instagram.com/tera.bytee/" target="_blank"> Rumah Produktif </a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-container">
          <div class="perspec" style="--spreaddist: 25px; --scaledist: .95; --vertdist: -5px;">
            <div class="card">
              <div class="writing">
                <div class="topbar">
                  <div class="red"></div>
                  <div class="yellow"></div>
                  <div class="green"></div>
                </div>
                <div class="code">
									<ul style="color:#fff;font-size:9px;text-align:right;padding:5px 0 10px 0;">
										<a href="https://www.instagram.com/tera.bytee/" target="_blank"> Rumah Produktif </a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-container">
          <div class="perspec" style="--spreaddist: 0px; --scaledist: 1; --vertdist: 0px;">
            <div class="card">
              <div class="writing">
                <div class="topbar">
                  <div class="red"></div>
                  <div class="yellow"></div>
                  <div class="green"></div>
                </div>
                <div class="code">
                  <ul style="color:#fff;font-size:9px;text-align:right;padding:5px 0 10px 0;">
										<a href="https://www.instagram.com/tera.bytee/" target="_blank"> Rumah Produktif </a>
                  </ul>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>

  <script src="<?=$base_home?>berkas/js/notfound.js"></script>

  </html>
