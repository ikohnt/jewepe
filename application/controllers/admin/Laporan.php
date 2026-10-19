<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesanan_model');
	}

	public function index()
	{
		$data['title']   = 'Laporan Rekap Pesanan';
		$data['pesanan'] = $this->Pesanan_model->get_all();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/laporan/index', $data);
		$this->load->view('admin/templates/footer', $data);
	}

	// Export data ke format CSV
	public function cetak()
	{
		$pesanan = $this->Pesanan_model->get_all();
		$filename = 'rekap_pesanan_' . date('Ymd_Hi') . '.csv';

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=' . $filename);

		$output = fopen('php://output', 'w');

		// Header Kolom CSV
		fputcsv($output, array('ID Order', 'Nama Pemesan', 'Email', 'Paket', 'Tanggal Acara', 'Status'));

		// Data Baris CSV
		foreach ($pesanan as $row) {
			$baris = array(
				'#' . $row->id,
				$row->nama_pemesan,
				$row->email,
				$row->nama_paket,
				date('d M Y', strtotime($row->tanggal_acara)),
				ucfirst($row->status)
			);
			fputcsv($output, $baris);
		}

		fclose($output);
		exit;
	}
}
