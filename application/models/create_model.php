<?php

Class create_model extends CI_Model
{
	function new_room($slug, $password, $hostLengthInput, 
                $hostQueueLimitInput, $hostCurrentShowNameInput, $hostCurrentShowDescInput, $filename)
	{
	    $data = array(
	    'slug' => $slug,
	    'password' => md5($password),
	    'showName' => $hostCurrentShowNameInput,
	    'showDescription' => $hostCurrentShowDescInput,
	    'headline' => $slug,
	    'length' => $hostLengthInput,
	    'queue' => $hostQueueLimitInput,
	    'background' => $filename,
	    'reload' => '0',
	    'shuffle' => '0',
	    'started' => time(),
	    'last_login' => time()
	    );
	   $this->db->insert('rooms', $data);
	}

}