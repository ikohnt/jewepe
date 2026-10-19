<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog_model extends CI_Model {

	protected $table = 'tb_catalogues';

	private $select_str = "catalogue_id as id, package_name as nama_paket, price as harga, image as gambar, description as deskripsi, IF(status_publish='Y', 'publish', 'draft') as status, created_at";

	// Dipakai di Halaman Landing / Beranda: hanya tampilkan yang status = publish
	public function get_publish()
	{
		return $this->db->select($this->select_str)
						 ->order_by('catalogue_id', 'DESC')
						 ->get_where($this->table, array('status_publish' => 'Y'))
						 ->result();
	}

	// Dipakai di halaman admin: tampilkan semua data (publish & draft)
	public function get_all()
	{
		return $this->db->select($this->select_str)->order_by('catalogue_id', 'DESC')->get($this->table)->result();
	}

	public function get_by_id($id)
	{
		return $this->db->select($this->select_str)->get_where($this->table, array('catalogue_id' => $id))->row();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table);
	}

	private function map_data($data) {
		$mapped = array();
		if (isset($data['nama_paket'])) $mapped['package_name'] = $data['nama_paket'];
		if (isset($data['harga'])) $mapped['price'] = $data['harga'];
		if (isset($data['gambar'])) $mapped['image'] = $data['gambar'];
		if (isset($data['deskripsi'])) $mapped['description'] = $data['deskripsi'];
		if (isset($data['status'])) $mapped['status_publish'] = ($data['status'] == 'publish') ? 'Y' : 'N';
		if (isset($data['created_at'])) $mapped['created_at'] = $data['created_at'];
		if (isset($data['user_id'])) $mapped['user_id'] = $data['user_id'];
		$mapped['updated_at'] = date('Y-m-d H:i:s');
		return $mapped;
	}

	public function insert($data)
	{
		$data['user_id'] = 1; // Default fallback for insert
		return $this->db->insert($this->table, $this->map_data($data));
	}

	public function update($id, $data)
	{
		$this->db->where('catalogue_id', $id);
		return $this->db->update($this->table, $this->map_data($data));
	}

	public function delete($id)
	{
		$this->db->where('catalogue_id', $id);
		return $this->db->delete($this->table);
	}
}
