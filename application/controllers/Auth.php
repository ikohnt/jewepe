<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth
 * Login/logout Admin. Sesuai admin_nav.drawio: "Login Admin" adalah pintu
 * masuk sebelum admin bisa mengakses Dashboard dan menu-menu pengelolaan.
 */
class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->library('form_validation');
	}

	public function login()
	{
		if ($this->session->userdata('admin_logged_in'))
		{
			redirect('admin');
			return;
		}

		$data['title'] = 'Login Admin';
		$this->load->view('templates/header', $data);
		$this->load->view('auth/login', $data);
		$this->load->view('templates/footer', $data);
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('error', 'Username dan password wajib diisi.');
			redirect('login');
			return;
		}

		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password');

		$admin = $this->Admin_model->get_by_username($username);

		if ($admin && password_verify($password, $admin->password))
		{
			$this->session->set_userdata(array(
				'admin_logged_in' => TRUE,
				'admin_id'        => $admin->id,
				'admin_nama'      => $admin->nama,
				'admin_username'  => $admin->username,
			));
			redirect('admin');
		}
		else
		{
			$this->session->set_flashdata('error', 'Username atau password salah.');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
