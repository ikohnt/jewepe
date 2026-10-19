<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

	protected $table = 'tb_settings';
	private $select_str = "id, website_name as nama_website, phone_number1 as telepon, email1 as email, address as alamat, header_bussines_hour as jam_header, time_bussines_hour as jam_waktu";

	// Data profil website bersifat singleton (hanya 1 baris, id = 1).
	public function get_profil()
	{
		return $this->db->select($this->select_str)->get($this->table)->row();
	}

	public function update_profil($id, $data)
	{
		$mapped = array();
		if (isset($data['nama_website'])) $mapped['website_name'] = $data['nama_website'];
		if (isset($data['telepon'])) $mapped['phone_number1'] = $data['telepon'];
		if (isset($data['email'])) $mapped['email1'] = $data['email'];
		if (isset($data['alamat'])) $mapped['address'] = $data['alamat'];
		if (isset($data['jam_header'])) $mapped['header_bussines_hour'] = $data['jam_header'];
		if (isset($data['jam_waktu'])) $mapped['time_bussines_hour'] = $data['jam_waktu'];
		$mapped['updated_at'] = date('Y-m-d H:i:s');

		$this->db->where('id', $id);
		return $this->db->update($this->table, $mapped);
	}
}
