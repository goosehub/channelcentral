<?php

Class create_model extends CI_Model
{
	function new_room($slug, $password)
	{
	    $data = array(
	    'slug' => $slug,
	    'password' => md5($password),
	    'showName' => 'Welcome',
	    'showDescription' => 'This is a freshly created room. If you are the owner, go to <a target="_blank" href="channelcentral.me/'.$slug.'/host"><b>Your host page</b></a>. Customize it, make it your home, invite over friends, and share your favorite things.',
	    'headline' => $slug,
	    'length' => '600',
	    'queue' => '1200',
	    'background' => 'default.jpg',
	    'reload' => '0',
	    'purple' => '<center><img class="img-circle" style="width: 100%; max-height: 100%" src="resources/images/purple.gif"/></center>',
	    'orange' => '<center><img class="img-circle" style="width: 100%; max-height: 100%" src="resources/images/orange.gif"/></center>',
	    'green' => '<center><img class="img-circle" style="width: 100%; max-height: 100%" src="resources/images/green.gif"/></center>',
	    'started' => time(),
	    'last_login' => time()
	    );
	   $this->db->insert('rooms', $data);
	}

}