<?php
session_start();

// Used for channel administration

class Ajax extends CI_Controller {

	public function chat_login($slug)
	{
	    if($_POST['name'] != '')
	    {
			$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
			?>
					<form name="chatForm" id="chatForm" action="post/chat-post.php" method="post" enctype="multipart/form-data">
	                <input type="text" name="message" class="form-control" id="chatInput" autocomplete="off" placeholder="">
	                <input type="hidden" name="slug" value="<?php echo $slug; ?>">
	                <!-- submit button positioned off screen -->
	                <input name="submitChat" type="submit" id="submitChat" value="foo" style="position: absolute; left: -9999px">
	                </form>
			<?php
		}
	}

}