<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profil_model');
	}

	public function index()
	{
		$data['title']  = 'Kontak Kami';
		$data['profil'] = $this->Profil_model->get_profil();

		$this->load->view('templates/header', $data);
		$this->load->view('kontak', $data);
		$this->load->view('templates/footer', $data);
	}
}
