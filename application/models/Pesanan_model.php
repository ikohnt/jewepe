<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

	protected $table = 'tb_order';

	private $select_str = "tb_order.order_id as id, tb_order.name as nama_pemesan, tb_order.email, tb_order.phone_number as no_hp, tb_order.catalogue_id as id_katalog, tb_order.wedding_date as tanggal_acara, '' as catatan, IF(tb_order.status='requested','request','approved') as status, tb_order.created_at, tb_catalogues.package_name as nama_paket, tb_catalogues.price as harga";

	// Join ke tb_katalog supaya nama paket ikut tampil (untuk admin & laporan)
	public function get_all()
	{
		return $this->db->select($this->select_str)
						 ->from($this->table)
						 ->join('tb_catalogues', 'tb_catalogues.catalogue_id = tb_order.catalogue_id', 'left')
						 ->order_by('tb_order.order_id', 'DESC')
						 ->get()
						 ->result();
	}

	public function get_by_id($id)
	{
		return $this->db->select($this->select_str)
						 ->from($this->table)
						 ->join('tb_catalogues', 'tb_catalogues.catalogue_id = tb_order.catalogue_id', 'left')
						 ->where('tb_order.order_id', $id)
						 ->get()
						 ->row();
	}

	// Dipakai fitur "Cek Pesanan": pemesan mengecek status via email identitas
	public function get_by_email($email)
	{
		return $this->db->select($this->select_str)
						 ->from($this->table)
						 ->join('tb_catalogues', 'tb_catalogues.catalogue_id = tb_order.catalogue_id', 'left')
						 ->where('tb_order.email', $email)
						 ->order_by('tb_order.order_id', 'DESC')
						 ->get()
						 ->result();
	}

	public function count_request()
	{
		return $this->db->where('status', 'requested')->count_all_results($this->table);
	}

	public function count_by_status($status)
	{
		$mapped_status = ($status == 'request') ? 'requested' : 'approved';
		return $this->db->where('status', $mapped_status)->count_all_results($this->table);
	}

	public function count_all()
	{
		return $this->db->count_all($this->table);
	}

	private function map_data($data) {
		$mapped = array();
		if (isset($data['nama_pemesan'])) $mapped['name'] = $data['nama_pemesan'];
		if (isset($data['email'])) $mapped['email'] = $data['email'];
		if (isset($data['no_hp'])) $mapped['phone_number'] = $data['no_hp'];
		if (isset($data['id_katalog'])) $mapped['catalogue_id'] = $data['id_katalog'];
		if (isset($data['tanggal_acara'])) $mapped['wedding_date'] = $data['tanggal_acara'];
		if (isset($data['status'])) $mapped['status'] = ($data['status'] == 'request') ? 'requested' : 'approved';
		if (isset($data['created_at'])) $mapped['created_at'] = $data['created_at'];
		if (isset($data['user_id'])) $mapped['user_id'] = $data['user_id'];
		$mapped['updated_at'] = date('Y-m-d H:i:s');
		return $mapped;
	}

	public function insert($data)
	{
		$data['user_id'] = 1; // Default
		return $this->db->insert($this->table, $this->map_data($data));
	}

	public function update_status($id, $status)
	{
		$this->db->where('order_id', $id);
		$mapped_status = ($status == 'request') ? 'requested' : 'approved';
		return $this->db->update($this->table, array('status' => $mapped_status, 'updated_at' => date('Y-m-d H:i:s')));
	}

	public function delete($id)
	{
		$this->db->where('order_id', $id);
		return $this->db->delete($this->table);
	}
}
