<?php

Class create_model extends CI_Model
{
	function new_room($slug, $password)
	{
	    $data = array(
	    'slug' => $slug,
	    'password' => md5($password),
	    'showName' => 'Welcome',
	    'showDescription' => 'This is a recently created room. If you are the owner, you can customize it by going to channelcentral.me/'.$slug.'/host, and channelcentral.me/'.$slug.'/master',
	    'headline' => 'ChannelCentral',
	    'length' => '600',
	    'queue' => '1200',
	    'background' => 'default.jpg',
	    'reload' => '0',
	    'purple' => '<h1>TEST</h1>',
	    'orange' => '<h1>TEST</h1>',
	    'green' => '<h1>TEST</h1>',
	    'started' => time()
	    );
	   $this->db->insert('rooms', $data);
	}

}