<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Welcome (Beranda)
 * Menampilkan halaman landing + grid katalog paket (hanya status publish),
 * sesuai "Algoritma Menampilkan Katalog di Halaman Landing".
 */
class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Katalog_model');
		$this->load->model('Profil_model');
	}

	public function index()
	{
		$data['title']   = 'Beranda';
		$data['katalog'] = $this->Katalog_model->get_publish();
		$data['profil']  = $this->Profil_model->get_profil();

		$this->load->view('templates/header', $data);
		$this->load->view('beranda', $data);
		$this->load->view('templates/footer', $data);
	}
}
