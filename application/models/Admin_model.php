<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	protected $table = 'tb_users';

	public function get_by_username($username)
	{
		return $this->db->select('user_id as id, name as nama, username, password')
						->get_where($this->table, array('username' => $username))
						->row();
	}
}
