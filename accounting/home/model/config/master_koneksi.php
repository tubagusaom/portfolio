
<?php

	$env = 'online'; // lokal atau online

	if($env=='lokal'){
		$host	 		= "localhost";
		$user	 		= "root";
		$pass	 		= "";
		$dabname		= "accounting_db";
		// $base			= "http://localhost/project/koprasi/";
	}else{
		$host	 		= "151.106.119.249";
		$user		 	= "deelabs_terabyte";
		$pass	 		= "bismIll@h";

		$dabname		= "deelabs_accounting_terabyte_db";

		// if($_SERVER['HTTP_HOST'] == 'dev.kopkarwb.com') {
		//     $dabname 	= "kopkarw1_2021_dev";
		// }else{
		//     $dabname 	= "kopkarw1_2021";
		// };

		// $base			= "http://koperasiobs.otsuka.co.id/";
	};

	// $conn = mysql_connect( $host, $user, $pass) or die('Could not connect to mysql server.' );
	// mysql_select_db($dabname, $conn) or die('Could not select database.');

	$base_ = (empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
	$base_ .= '://'. $_SERVER['HTTP_HOST'];

	if ($_SERVER['HTTP_HOST'] == "localhost") {
		$xbase_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	}else{
		$xbase_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_);
	}

	$base = str_replace('home/','', $xbase_url);

	// var_dump($base); die();

	$koneksi = mysqli_connect($host, $user, $pass, $dabname) or die('<script>location.replace("'. $base .'error/db")</script>');
	$baseurl=$base;

	// $env = 'lokal'; // lokal atau online
	//
	// if($env=='lokal'){
	// 	define('host_DB', 'localhost');
	// 	define('user_DB', 'root');
	// 	define('pass_DB', '');
	// 	define('name_DB', 'kopkarw1_kope');
	// 	define('base_DB', 'http://localhost/project/koprasi_oop/');
	// }else{
	// 	define('host_DB', 'ftp.simks.id');
	// 	define('user_DB', 'simf1855_koperasi_oi');
	// 	define('pass_DB', 'koperasi@2021');
	// 	define('name_DB', 'simf1855_koperasi_oi');
	// 	define('base_DB', 'http://koperasi-oi.simks.id/');
	// }

?>
