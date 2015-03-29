<?php

Class create_model extends CI_Model
{
	function new_room($slug, $password)
	{
	    $data = array(
	    'slug' => $slug,
	    'password' => md5($password),

// Default channel information panel after =>
	    'showName' => 

	    'Welcome',

	    'showDescription' => '<center>
<h1>'.$slug.'</h1>

<img height="50%" width="50%" src="http://channelcentral.me/resources/images/purple.gif">
</center>'
		,
		// End channel information panel after ,
	    'headline' => $slug,
	    'length' => '900',
	    'queue' => '1200',
	    'background' => 'default.jpg',
	    'reload' => '0',
	    'shuffle' => '0',
	    'started' => time(),
	    'last_login' => time()
	    );
	   $this->db->insert('rooms', $data);
	}

}