<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Katalog_model');
		$this->load->model('Pesanan_model');
	}

	public function index()
	{
		$data['title']          = 'Dashboard';
		$data['total_katalog']  = $this->Katalog_model->count_all();
		$data['total_request']  = $this->Pesanan_model->count_by_status('request');
		$data['total_approved'] = $this->Pesanan_model->count_by_status('approved');
		$data['total_pesanan']  = $this->Pesanan_model->count_all();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/templates/footer', $data);
	}
}
