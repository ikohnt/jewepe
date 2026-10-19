<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * admin/Pesanan
 * "Untuk kelola pesanan, admin dapat melakukan edit dari status request
 * menjadi approved." (Study Kasus)
 */
class Pesanan extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesanan_model');
	}

	public function index()
	{
		$data['title']   = 'Kelola Pesanan Masuk';
		$data['pesanan'] = $this->Pesanan_model->get_all();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/pesanan/index', $data);
		$this->load->view('admin/templates/footer', $data);
	}

	public function approve($id)
	{
		$this->Pesanan_model->update_status($id, 'approved');
		$this->session->set_flashdata('sukses', 'Status pesanan #' . $id . ' diubah menjadi Approved.');
		redirect('admin/pesanan');
	}

	public function batalkan($id)
	{
		$this->Pesanan_model->update_status($id, 'request');
		$this->session->set_flashdata('sukses', 'Status pesanan #' . $id . ' dikembalikan menjadi Request.');
		redirect('admin/pesanan');
	}
}
