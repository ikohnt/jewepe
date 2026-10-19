<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_Controller
 * -----------------
 * Semua controller di dalam application/controllers/admin/ meng-extend
 * class ini supaya wajib login terlebih dahulu (session admin_logged_in).
 * Ini mengimplementasikan alur "Login Admin" pada struktur navigasi admin
 * (admin_nav.drawio) sebelum bisa mengakses Dashboard, Kelola Katalog,
 * Kelola Pesanan, Laporan, dan Kelola Profil Website.
 */
class Admin_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');

		if ( ! $this->session->userdata('admin_logged_in'))
		{
			$this->session->set_flashdata('error', 'Silakan login terlebih dahulu untuk mengakses halaman admin.');
			redirect('login');
		}
	}
}
