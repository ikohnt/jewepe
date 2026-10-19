<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profil_model');
	}

	public function index()
	{
		$data['title']  = 'Kelola Profil Website';
		$data['profil'] = $this->Profil_model->get_profil();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/profil/index', $data);
		$this->load->view('admin/templates/footer', $data);
	}

	public function update()
	{
		$id = (int) $this->input->post('id');

		$data = array(
			'nama_website' => $this->input->post('nama_website', TRUE),
			'telepon'      => $this->input->post('telepon', TRUE),
			'email'        => $this->input->post('email', TRUE),
			'alamat'       => $this->input->post('alamat', TRUE),
			'jam_header'   => $this->input->post('jam_header', TRUE),
			'jam_waktu'    => $this->input->post('jam_waktu', TRUE),
		);

		$this->Profil_model->update_profil($id, $data);

		$this->session->set_flashdata('sukses', 'Profil website berhasil diperbarui.');
		redirect('admin/profil');
	}
}
