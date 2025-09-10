<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['aboutus/(:any)'] = "aboutus/index/$1";
$route['daftar-member'] = 'pendaftaran_dealer/daftar';
$route['daftar-member-save'] = 'pendaftaran_dealer/save';
$route['cek-harga-save'] = 'welcome/cek_harga_save';
$route['galery-foto'] = 'album_galeri/galeri_album';
$route['faq'] = 'sertifikasi/faq';
$route['kontak'] = 'kontak/index';

// appraisal
$route['data-member'] = 'mapping_appraisal/view';
$route['data-member/detail/(:any)'] = "mapping_appraisal/detail/$1";
$route['data-member/laporan/(:any)'] = "mapping_appraisal/laporan/$1";
$route['data-member/dokumen/(:any)'] = "mapping_appraisal/dokumen/$1";
$route['data-member/tambah-dokumen/(:any)'] = "mapping_appraisal/tambah_dokumen/$1";
$route['simpan-dokumen'] = "mapping_appraisal/save";
$route['simpan-laporan'] = "mapping_appraisal/simpan";
$route['undangan'] = "welcome/tamu_undangan";

// showroom




/* End of file routes.php */
/* Location: ./application/config/routes.php */
