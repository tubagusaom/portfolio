<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$host = $_SERVER['HTTP_HOST'];
//if($host=='www.jmkp.local' || $host=='jmkp.local' || $host=='jmkp.bnsp.go.id' || $host=='www.jmkp.bnsp.go.id'){
//	$route['default_controller'] = "welcome";
//
//}else{
//	$route['default_controller'] = "mobile";
//}

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['gambar/(:any)'] = "welcome/$1";
$route['uji_kompetensi/(:any)'] = "welcome/uji_kompetensi/$1";

$route['uji_kompetensi'] = "welcome/uji_kompetensi/1";
$route['sejarah-lsp'] = "profile/index/7";
$route['visi-misi-lsp'] = "profile/index/8";
$route['struktur-organisasi-lsp'] = "profile/index/11";
$route['tugas-fungsi-lsp'] = "profile/index/12";
$route['tugas-pokok-personel-lsp'] = "profile/index/27";
$route['program-kerja-lsp'] = "profile/index/28";
$route['zona-integritas'] = "profile/index/34";
$route['integrity'] = "profile/index/35";
$route['uji_kompetensi.html'] = "welcome/uji_kompetensi";

$route['detail-skema/(:any)'] = "sertifikasi/vskema_detail/$1";
// $route['daftar-skema/(:any)'] = "sertifikasi/vskema/$1";
$route['daftar-asesor'] = "asesor/view";
$route['daftar-pemegang-sertifikat'] = "asesi/view";
$route['faq-lsp'] = "faq/view";
$route['tempat-uji-kompetensi'] = "tuk/view";
$route['kontak-lsp'] = "welcome/kontak";
$route['profile-lsp/(:any)'] = "profile/index/$1";
$route['galeri-foto'] = "album_galeri/galeri_album";
$route['galeri-foto-detail/(:any)'] = "album_galeri/galeri_foto/$1";
$route['download-category-lsp'] = "repositori/download_category";
$route['download-file-lsp/(:any)'] = "repositori/vdownload/$1";
$route['sertifikasi/pembayaran'] = "administrasi_ujk/konfirmasi";

$route['kontak-us'] = "welcome/kontak";
$route['pendaftaran'] = "welcome/daftar_ujikom/1"; 

/* End of file routes.php */
/* Location: ./application/config/routes.php */