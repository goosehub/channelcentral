<?php

Class room_model extends CI_Model
{
	function get_host_info($slug)
	{
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->where('slug', $slug);
		$query = $this->db->get();
		return $query->row();
	}
	function check_slug_exists($slug)
	{
		$this->db->select('slug');
		$this->db->from('rooms');
		$this->db->where('slug', $slug);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query -> num_rows() == 1)
		{
		 return $query->result();
		}
		else
		{
		 return false;
		}
	}
	function verify_room_password($slug, $password)
	{
		// $array = array('slug' => $slug, 'password' => md5($password));
		$this->db->select('slug', 'id', 'password');
		$this->db->from('rooms');
		// $this->db->where($array);
		$this->db->where('slug', $slug);
		$this->db->where('password', md5($password));
		$this->db->limit(1);

		$query = $this->db->get();

		if($query -> num_rows() == 1)
		{
		 return $query->result();
		}
		else
		{
		 return false;
		}
	}
	function update_last_login($slug)
	{
		$data = array(
		'last_login' => time()
		);
		$this->db->where('slug', $slug);
		$this->db->update('rooms', $data);
	}

}

?>