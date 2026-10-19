<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_cli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!is_cli()) {
			echo "Only CLI allowed\n";
			exit;
		}
		$this->load->model('Admin_model');
		$this->load->model('Katalog_model');
		$this->load->model('Pesanan_model');
		$this->load->model('Profil_model');
	}

	public function run()
	{
		echo "Starting tests...\n";

		// 1. Profil
		echo "\n[Test 1] Fetch Profil:\n";
		$profil = $this->Profil_model->get_profil();
		if ($profil) {
			echo "Success. Nama Website: " . $profil->nama_website . "\n";
		} else {
			echo "Failed to fetch profil.\n";
		}

		// 2. Admin
		echo "\n[Test 2] Fetch Admin by username 'admin':\n";
		$admin = $this->Admin_model->get_by_username('admin');
		if ($admin) {
			echo "Success. Nama Admin: " . $admin->nama . "\n";
		} else {
			echo "Failed to fetch admin.\n";
		}

		// 3. Katalog Insert & Fetch
		echo "\n[Test 3] Katalog CRUD:\n";
		$data_katalog = array(
			'nama_paket' => 'Paket Testing',
			'harga' => 15000000,
			'gambar' => 'test.jpg',
			'deskripsi' => 'Deskripsi testing',
			'status' => 'publish',
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->Katalog_model->insert($data_katalog);
		$insert_id = $this->db->insert_id();
		echo "Inserted Katalog ID: " . $insert_id . "\n";

		$katalog = $this->Katalog_model->get_by_id($insert_id);
		if ($katalog) {
			echo "Fetched Katalog: " . $katalog->nama_paket . " (Harga: " . $katalog->harga . ")\n";
		} else {
			echo "Failed to fetch katalog.\n";
		}

		// 4. Pesanan Insert & Fetch
		echo "\n[Test 4] Pesanan CRUD:\n";
		$data_pesanan = array(
			'nama_pemesan' => 'Tester User',
			'email' => 'test@example.com',
			'no_hp' => '08123456789',
			'id_katalog' => $insert_id,
			'tanggal_acara' => '2026-12-31',
			'catatan' => 'Tolong dipercepat',
			'status' => 'request',
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->Pesanan_model->insert($data_pesanan);
		$order_id = $this->db->insert_id();
		echo "Inserted Pesanan ID: " . $order_id . "\n";

		$pesanan = $this->Pesanan_model->get_by_id($order_id);
		if ($pesanan) {
			echo "Fetched Pesanan: " . $pesanan->nama_pemesan . " (Paket: " . $pesanan->nama_paket . ")\n";
		} else {
			echo "Failed to fetch pesanan.\n";
		}

		// Count tests
		echo "\n[Test 5] Count Methods:\n";
		echo "Total Katalog: " . $this->Katalog_model->count_all() . "\n";
		echo "Total Pesanan: " . $this->Pesanan_model->count_all() . "\n";
		echo "Total Pesanan Request: " . $this->Pesanan_model->count_by_status('request') . "\n";

		// Update pesanan status
		$this->Pesanan_model->update_status($order_id, 'approved');
		$pesanan_updated = $this->Pesanan_model->get_by_id($order_id);
		echo "Updated Pesanan Status: " . $pesanan_updated->status . "\n";

		// Cleanup
		echo "\n[Test 6] Cleanup:\n";
		$this->Pesanan_model->delete($order_id);
		$this->Katalog_model->delete($insert_id);
		echo "Cleanup done.\n";

		echo "\nAll tests completed.\n";
	}
}
