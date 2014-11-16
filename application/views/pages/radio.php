<?php

//Check if logged in
if(!isset($_SESSION['name'])){
    loginForm();
}
else
//Must be connected to end on same view
{
//begin page content
?>

<div class="row">
  <div class="col-md-4">
  	<div class="btn-group" role="group" aria-label="...">
        <a class="btn btn-default" href="#">Link</a>
        <a class="btn btn-default" href="#">Link</a>
        <a class="btn btn-default" href="#">Link</a>
    </div>
  </div>
  <div class="col-md-4">
	  <div id="titleWindow">
	      <h1>S4S RADIO</h1>
      </div>
  </div>
  <div class="col-md-4">
	<div id="chatHeadWindow">
		<h2>0 users active</h2>
	</div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
  <iframe id="vocaFrame" src="http://vocaroo.com/?minimal" seamless></iframe>
  </div>
  <div class="col-md-4">
  	<div id="contentWindow">
	  	<!-- height might need to be custom -->
		<iframe width="100%" height="100%" src="//www.youtube.com/embed/QjsPG0Kspxo" frameborder="0" allowfullscreen></iframe>
<!-- 		<audio controls>
		  <source src="audio/test.mp3" type="audio/mpeg" height="500px">
		Your browser does not support this audio.
		</audio> -->
	</div>
  </div>
  <div class="col-md-4">
  	<div id="chatWindow">

                <!-- chatroom -->
    <form name="chatForm" id="chatForm" action="/s4sradio/ajax/chatpost.php" method="post" enctype="multipart/form-data">
    <input name="message" type="text" class="form-control" id="chatInput">
    <!-- submit button positioned off screen -->
    <input name="submitChat" type="submit" id="submitChat" value="DICK" style="position: absolute; left: -9999px">
    </form>

    <div id="chatBox">
    <span id="chatContainer">
    Loading...
    </span>
    </div>

    </div>
  </div>
</div>

<?php 
} //no content after this bracket 
?>
