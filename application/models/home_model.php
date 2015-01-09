<?php

Class home_model extends CI_Model
{
	function channel_list()
	{
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->order_by("last_login", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
	function recently_uploaded()
	{
		$this->db->select('*');
		$this->db->from('upload');
		$this->db->where('start <', time());
		$this->db->order_by("start", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

}