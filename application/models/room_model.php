<?php

Class room_model extends CI_Model
{
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

}