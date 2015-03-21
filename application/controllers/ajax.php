<?php
session_start();

// Used for channel administration

class Ajax extends CI_Controller {

// For logging into chat and decalring new name
	public function chat_login($slug)
	{
	    if(isset($_POST['name']) && $_POST['name'] != '')
	    {
			$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
		}
		if (isset($_SESSION['name']) && $_SESSION['name'] != '')
		{
			?>
                <div class="col-sm-10">
					<form name="chatForm" id="chatForm" action="post/chat-post.php" method="post" enctype="multipart/form-data">
		                <input type="text" name="message" class="form-control" id="chatInput" autocomplete="off" placeholder="">
		                <input type="hidden" name="slug" value="<?php echo $slug; ?>">
		                <!-- submit button positioned off screen -->
		                <input name="submitChat" type="submit" id="submitChat" value="foo" style="position: absolute; left: -9999px">
	                </form>
                </div>
                <div class="col-sm-2">
                	<button id="change_name" class="form-control btn btn-danger">
                		<span class="glyphicon glyphicon-remove-sign" aria=hidden="true"></span>
                	</button>
                </div>
			<?php
			
		}
	}
// For logging out of chat, and changing name
	public function chat_logout($slug)
	{
		unset($_SESSION['name']);
		?>
			<div id="loginform">
			  <form action="" method="post" >
			    <div class="row">
			      <div class="col-sm-8">
			        <input class="form-control" type="text" name="name" id="name" 
			        placeholder="Enter Your Name" onKeydown="memSort(event);"/>
			      </div>
			      <div class="col-sm-4">
			        <input name="enter-room" id="enter-room" class="form-control btn- btn-default" type="submit" value="Join">
			      </div>
			    </div>
			  </form>
			</div>
		<?php
	}

}