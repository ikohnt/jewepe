<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Katalog (Publik)
 * Menampilkan detail 1 paket katalog untuk pengunjung.
 * Sesuai "Algoritma Menampilkan Detail Katalog": hanya boleh diakses jika
 * id ditemukan DAN berstatus publish, jika tidak dilempar ke Beranda.
 */
class Katalog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Katalog_model');
	}

	public function detail($id)
	{
		$row = $this->Katalog_model->get_by_id($id);

		if ( ! $row || $row->status !== 'publish')
		{
			show_404();
			return;
		}

		$data['title']   = $row->nama_paket;
		$data['katalog'] = $row;

		$this->load->view('templates/header', $data);
		$this->load->view('detail', $data);
		$this->load->view('templates/footer', $data);
	}
}
