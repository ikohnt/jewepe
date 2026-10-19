<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pesanan (Publik)
 * - form()   : menampilkan form pemesanan paket (identitas = email)
 * - simpan() : proses simpan pesanan baru, status awal = 'request'
 * - cek()    : fitur "Cek Pesanan" berdasarkan email, sebagai pengganti/
 *              pelengkap pengecekan lewat balasan email dari admin.
 */
class Pesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesanan_model');
		$this->load->model('Katalog_model');
		$this->load->library('form_validation');
	}

	public function form($id_katalog)
	{
		$katalog = $this->Katalog_model->get_by_id($id_katalog);

		if ( ! $katalog || $katalog->status !== 'publish')
		{
			redirect(base_url());
			return;
		}

		$data['title']   = 'Form Pemesanan Paket';
		$data['katalog'] = $katalog;

		$this->load->view('templates/header', $data);
		$this->load->view('form_pesanan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama_pemesan', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('no_hp', 'Nomor WhatsApp/HP', 'required|numeric|trim');
		$this->form_validation->set_rules('id_katalog', 'Paket', 'required|numeric');
		$this->form_validation->set_rules('tanggal_acara', 'Tanggal Rencana Acara', 'required|trim');

		$id_katalog = (int) $this->input->post('id_katalog');
		$katalog    = $this->Katalog_model->get_by_id($id_katalog);

		if ($this->form_validation->run() === FALSE || ! $katalog)
		{
			$data['title']   = 'Form Pemesanan Paket';
			$data['katalog'] = $katalog;
			$this->load->view('templates/header', $data);
			$this->load->view('form_pesanan', $data);
			$this->load->view('templates/footer', $data);
			return;
		}

		$data = array(
			'nama_pemesan'  => $this->input->post('nama_pemesan', TRUE),
			'email'         => $this->input->post('email', TRUE),
			'no_hp'         => $this->input->post('no_hp', TRUE),
			'id_katalog'    => $id_katalog,
			'tanggal_acara' => $this->input->post('tanggal_acara', TRUE),
			'catatan'       => $this->input->post('catatan', TRUE),
			'status'        => 'request',
			'created_at'    => date('Y-m-d H:i:s'),
		);

		$this->Pesanan_model->insert($data);

		$this->session->set_flashdata('sukses', 'Pemesanan Anda berhasil dikirim dengan status <strong>Request</strong>. Admin akan meninjau dan mengonfirmasi melalui balasan email ke alamat yang Anda daftarkan.');
		redirect('cek-pesanan?email=' . urlencode($data['email']));
	}

	public function cek()
	{
		$data['title'] = 'Cek Pesanan';
		$data['hasil'] = NULL;
		$data['email'] = $this->input->get('email') ? $this->input->get('email') : $this->input->post('email');

		if ($data['email'])
		{
			$data['hasil'] = $this->Pesanan_model->get_by_email($data['email']);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('cek_pesanan', $data);
		$this->load->view('templates/footer', $data);
	}
}
