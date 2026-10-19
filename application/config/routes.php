<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
 | -------------------------------------------------------------------------
 | RUTE HALAMAN PUBLIK (LANDING) - WO JeWePe
 | -------------------------------------------------------------------------
*/
$route['katalog/(:num)']       = 'katalog/detail/$1';
$route['pesan/(:num)']         = 'pesanan/form/$1';
$route['pesan/simpan']         = 'pesanan/simpan';
$route['cek-pesanan']          = 'pesanan/cek';
$route['kontak']               = 'kontak';
$route['login']                = 'auth/login';
$route['login/proses']         = 'auth/proses_login';
$route['logout']               = 'auth/logout';

/*
 | -------------------------------------------------------------------------
 | RUTE ADMIN (memakai sub-folder application/controllers/admin)
 | -------------------------------------------------------------------------
 | Catatan: CodeIgniter 3 otomatis memetakan /admin/xxx ke
 | application/controllers/admin/Xxx.php, jadi rute di bawah ini
 | sifatnya hanya alias/penegasan agar URL tetap rapi.
*/
$route['admin']                        = 'admin/dashboard';
$route['admin/katalog']                = 'admin/katalog';
$route['admin/katalog/tambah']         = 'admin/katalog/tambah';
$route['admin/katalog/simpan']         = 'admin/katalog/simpan';
$route['admin/katalog/edit/(:num)']    = 'admin/katalog/edit/$1';
$route['admin/katalog/update/(:num)']  = 'admin/katalog/update/$1';
$route['admin/katalog/hapus/(:num)']   = 'admin/katalog/hapus/$1';
$route['admin/pesanan']                = 'admin/pesanan';
$route['admin/pesanan/approve/(:num)'] = 'admin/pesanan/approve/$1';
$route['admin/pesanan/batalkan/(:num)']= 'admin/pesanan/batalkan/$1';
$route['admin/laporan']                = 'admin/laporan';
$route['admin/laporan/cetak']          = 'admin/laporan/cetak';
$route['admin/profil']                 = 'admin/profil';
$route['admin/profil/update']          = 'admin/profil/update';
