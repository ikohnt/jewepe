<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * admin/Katalog
 * Implementasi CRUD Katalog sesuai Materi 3 (Implementasi Rancangan):
 * - index()  : Menampilkan Data Katalog
 * - tambah() / simpan()  : Membuat Katalog (dengan Algoritma Menambahkan Katalog:
 *   cek file tersedia -> cek ekstensi -> cek ukuran -> upload -> notifikasi)
 * - edit() / update()    : Mengubah Katalog (boleh ganti gambar / tidak)
 * - hapus()              : Menghapus Katalog (data + file gambar)
 */
class Katalog extends Admin_Controller {

	private $upload_path = './uploads/katalog/';
	private $allowed_types = '*';
	private $max_size_kb = 2048; // 2 MB

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Katalog_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['title']   = 'Kelola Katalog Paket';
		$data['katalog'] = $this->Katalog_model->get_all();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/katalog/index', $data);
		$this->load->view('admin/templates/footer', $data);
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Katalog Paket';

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/katalog/tambah', $data);
		$this->load->view('admin/templates/footer', $data);
	}

	public function simpan()
	{
		// $_GET['aksi'] = add pada flowchart -> di sini diwakili oleh method simpan()

		if (empty($this->input->post('nama_paket')) || empty($this->input->post('harga')))
		{
			$this->session->set_flashdata('error', 'Nama paket dan harga wajib diisi.');
			redirect('admin/katalog/tambah');
			return;
		}

		// Cek File Tersedia
		if (empty($_FILES['gambar']['name']))
		{
			$this->session->set_flashdata('error', 'Gambar paket wajib diunggah.');
			redirect('admin/katalog/tambah');
			return;
		}

		// Pisahkan file dan extention + Cek extention + Ukuran, lalu Upload
		$config = array(
			'upload_path'   => $this->upload_path,
			'allowed_types' => $this->allowed_types,
			'max_size'      => $this->max_size_kb,
			'encrypt_name'  => TRUE,
		);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar'))
		{
			// Cek Upload Berhasil = Tidak -> Notifikasi Hapus/Upload Gagal
			$this->session->set_flashdata('error', 'Upload gambar gagal: ' . strip_tags($this->upload->display_errors('', '')));
			redirect('admin/katalog/tambah');
			return;
		}

		$upload_data = $this->upload->data();

		$data = array(
			'nama_paket' => $this->input->post('nama_paket', TRUE),
			'harga'      => (int) $this->input->post('harga'),
			'gambar'     => $upload_data['file_name'],
			'deskripsi'  => $this->input->post('deskripsi', TRUE),
			'status'     => $this->input->post('status') === 'draft' ? 'draft' : 'publish',
			'created_at' => date('Y-m-d H:i:s'),
		);

		$this->Katalog_model->insert($data);

		$this->session->set_flashdata('sukses', 'Paket katalog berhasil ditambahkan.');
		redirect('admin/katalog');
	}

	public function edit($id)
	{
		$row = $this->Katalog_model->get_by_id($id);

		if ( ! $row)
		{
			show_404();
			return;
		}

		$data['title']   = 'Ubah Katalog Paket';
		$data['katalog'] = $row;

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/katalog/edit', $data);
		$this->load->view('admin/templates/footer', $data);
	}

	public function update($id)
	{
		$lama = $this->Katalog_model->get_by_id($id);

		if ( ! $lama)
		{
			show_404();
			return;
		}

		$gambar = $lama->gambar;

		// Upload Header baru? (opsional saat edit — kalau kosong, gambar lama dipakai)
		if ( ! empty($_FILES['gambar']['name']))
		{
			$config = array(
				'upload_path'   => $this->upload_path,
				'allowed_types' => $this->allowed_types,
				'max_size'      => $this->max_size_kb,
				'encrypt_name'  => TRUE,
			);
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar'))
			{
				$this->session->set_flashdata('error', 'Upload gambar gagal: ' . strip_tags($this->upload->display_errors('', '')));
				redirect('admin/katalog/edit/' . $id);
				return;
			}

			$upload_data = $this->upload->data();

			// Hapus gambar lama supaya tidak menumpuk file di server
			if ($lama->gambar && file_exists($this->upload_path . $lama->gambar))
			{
				unlink($this->upload_path . $lama->gambar);
			}

			$gambar = $upload_data['file_name'];
		}

		$data = array(
			'nama_paket' => $this->input->post('nama_paket', TRUE),
			'harga'      => (int) $this->input->post('harga'),
			'gambar'     => $gambar,
			'deskripsi'  => $this->input->post('deskripsi', TRUE),
			'status'     => $this->input->post('status') === 'draft' ? 'draft' : 'publish',
		);

		if ($this->Katalog_model->update($id, $data))
		{
			$this->session->set_flashdata('sukses', 'Paket katalog berhasil diperbarui.');
		}
		else
		{
			$this->session->set_flashdata('error', 'Tidak ada perubahan atau gagal memperbarui data.');
		}

		redirect('admin/katalog');
	}

	public function hapus($id)
	{
		$row = $this->Katalog_model->get_by_id($id);

		if ($row)
		{
			// Hapus Gambar dari server, lalu Proses Hapus Data
			if ($row->gambar && file_exists($this->upload_path . $row->gambar))
			{
				unlink($this->upload_path . $row->gambar);
			}

			$this->Katalog_model->delete($id);
			$this->session->set_flashdata('sukses', 'Paket katalog berhasil dihapus.');
		}
		else
		{
			$this->session->set_flashdata('error', 'Data tidak ditemukan, hapus gagal.');
		}

		redirect('admin/katalog');
	}
}
