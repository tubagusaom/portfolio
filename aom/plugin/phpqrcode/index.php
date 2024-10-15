<style media="screen">
  *{
    font-family: Arial, Helvetica, sans-serif;
  }
</style>

<?php
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

    echo "<h1>PHP QR Code ";
    echo "<a href='https://tb.indonesia-kompeten.com/tubagus/?dirQRcode' target='_blank' style='text-decoration: none'>Folder File</a></h1><hr/>";

    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

    //html PNG location prefix
    $PNG_WEB_DIR = 'http://tb.indonesia-kompeten.com/me/plugin/phpqrcode/temp/';

    include "qrlib.php";

    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $filename = $_REQUEST['nama'];// code...
    }else {
      $filename = $PNG_TEMP_DIR.'qrcode-ig.png';
    }

    // $filename = $PNG_TEMP_DIR.'qrcode_'.$filename.'.png';

    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) {

        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');

        // user data
        // $filename = $PNG_TEMP_DIR.'tera_byte_'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        // $filename = $PNG_TEMP_DIR.'qrcode_'.$filename.'.png';
        // var_dump($_POST['data']); die();
        // QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

        QRcode::png($_REQUEST['data'], $PNG_TEMP_DIR.'qrcode_'.$filename.'_008_4.png', QR_ECLEVEL_L, 3, 4);
        // QRcode::png($_REQUEST['data'], $PNG_TEMP_DIR.'008_6.png', QR_ECLEVEL_L, 3, 6);
        // QRcode::png($_REQUEST['data'], $PNG_TEMP_DIR.'008_12.png', QR_ECLEVEL_L, 3, 10);

        // echo "data berhasil disimpan";

    } else {

        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';
        QRcode::png('Tera_Byte_', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    }

    //display generated file
    // echo '<img src="'.$PNG_WEB_DIR.$filename.'" /><hr/>';

    //config form
    echo '<form action="https://tb.indonesia-kompeten.com/tubagus/?QRcode" method="post">
        Nama:&nbsp;<input name="nama" value="" />&nbsp;
        Data:&nbsp;<input name="data" value="" />&nbsp;
        ECC:&nbsp;<select name="level">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - best</option>
        </select>&nbsp;
        Size:&nbsp;<select name="size">';

    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';

    echo '</select>&nbsp;
        <input type="submit" value="GENERATE"></form><hr/>';

    // benchmark
    QRtools::timeBenchmark();
