<?php

Class home_model extends CI_Model
{
	function channel_list()
	{
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->order_by('last_login', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	function active_channels_by_chat($active_limit)
	{
		$this->db->select('*');
		$this->db->from('chat');
		$this->db->where('timestamp > ' . $active_limit );
		$this->db->group_by('slug');
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	function active_channels_by_upload($active_limit)
	{
		$this->db->select('*');
		$this->db->from('upload');
		$this->db->where('end > ' . $active_limit );
		$this->db->group_by('slug');
		$this->db->order_by('end', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	function empty_channels_by_chat($active_limit)
	{
		$this->db->select('*');
		$this->db->from('chat');
		$this->db->where('timestamp <= ' . $active_limit );
		$this->db->group_by('slug');
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	function recently_uploaded()
	{
		$this->db->select('*');
		$this->db->from('upload');
		$this->db->where('start <', time());
		$this->db->where('special !=', 'repeat');
		$this->db->order_by('start', 'DESC');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}
	function recent_chats()
	{
		$this->db->select('*');
		$this->db->from('chat');
		$this->db->where('timestamp <', time());
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}
	function random_room()
	{
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->order_by('start', 'random');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

}