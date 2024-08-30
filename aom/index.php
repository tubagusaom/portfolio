<?php

// header("Location: https://aom.my.id");
// exit();

$serverbase = $base_ = (empty($_SERVER['HTTPS']) or strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';

$base_ = (empty($_SERVER['HTTPS']) or strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
$base_ .= '://' . $_SERVER['HTTP_HOST'];
//
if ($_SERVER['HTTP_HOST'] == "localhost") {
  $base_app = $base_ . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
} else {
  $base_app = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_ . '/');

  // header("Location: https://www.aom.my.id");
  // exit();
}

$locations = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$linkurl = $base_app;

// var_dump($locations); die();

if ($_SERVER['HTTP_HOST'] == "localhost") {
  header('location:tubagus/?Profile=©Tubagus.Aom');
  // $linkurl = "https://www.aom.my.id";
  // $linkurl = "http://aom.my.id";

} elseif ($_SERVER['HTTP_HOST'] == "http") {
  header('Location: ' . $locations);
  exit;
} else {
  // $linkurl = "https://www.aom.my.id";

  // var_dump($serverbase); die();

  // if ($serverbase == "http") {
  //   header("Location: https://www.aom.my.id");
  //   exit();
  // }

  // if ($serverbase == "http") {
  // header("Location: https://aom.my.id");
  // exit();
  // }


  // if ($base_app == "http://aom.my.id/") {
  //   header("Location: https://www.aom.my.id");
  //   exit();
  // }

}

?>




<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تبغس اوم Portfolio</title>
  <!-- <meta http-equiv="refresh" content="2"> -->
  <meta name="keywords" content="Web, Developer, Programer, IT, Consultan IT, Consultan, website" />
  <meta name="description" content="Web Developer from INDONESIA">
  <meta name="google-site-verification" content="c1_exaodmcVzFqPCVaknWvpw-6OX7FOEDq0ZwJ-fYBo" />
  <link rel="shortcut icon" type="image/x-icon" href="img/mini.png" />
</head>

<frameset border="0" rows="100%,*" cols="100%" frameborder="no">
  <frame name="TopFrame" scrolling="yes" noresize src="<?= $linkurl . "/tubagus?Profile" ?>">
    <frame name="BottomFrame" scrolling="no" noresize>
      <noframes></noframes>
</frameset>

</html>



<?php
// }
// header('location:tubagus?Profile');

// var_dump($linkurl); die();

// header("Location: https://www.aom.my.id");
// exit();
?>