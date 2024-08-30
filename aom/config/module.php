<?php
  if(isset($_GET['Profile'])){
    // header("Location:https://tb.indonesia-kompeten.com");
    include "profiles.php";
  }
  elseif(isset($_GET['SkilLs'])){
    include "skills.php";
  }
  elseif(isset($_GET['Work'])){
    include "work.php";
  }
  elseif(isset($_GET['Resume'])){
    include "resume.php";
  }
  elseif(isset($_GET['QRcode'])){
    include "../plugin/phpqrcode/index.php";
  }
  elseif(isset($_GET['dirQRcode'])){
    header('location:../plugin/phpqrcode/temp/');
  }
  elseif(isset($_GET['Download-Resume'])){
    // include "../cv/CV_tubagus.docx";
    header('location:../cv/CV_tubagus.docx');
  }
?>
