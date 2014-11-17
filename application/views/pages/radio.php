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
<div id="pageWrapper">

<div class="row">
  <div class="col-md-4">
    <div id="navCnt">
      <div class="btn-group" role="group" aria-label="...">
          <a class="btn btn-lg btn-default" href="#">Link</a>
          <a class="btn btn-lg btn-default" href="#">Link</a>
          <a class="btn btn-lg btn-default" href="#">Link</a>
      </div>
    </div>
  <div id="chanCnt">
    <iframe id="chanFrame" src="http://4chan.org/s4s" seamless></iframe>
  </div>
  <div id="vocaCnt">
    <iframe id="vocaFrame" src="http://vocaroo.com/?minimal" seamless></iframe>
  </div>
  </div>


  
  <div class="col-md-4">
    <div id="headline">
        <p>S4S RADIO</p>
    </div>

  	<div id="contentWindow">
		<!-- <iframe id="youtubeFrame" src="//www.youtube.com/embed/QjsPG0Kspxo" frameborder="0" allowfullscreen></iframe> -->

    <img id="imageCover" src="/s4sradio/images/example.jpg">
		<audio controls id="audioPlayer">
		  <source src="audio/test.mp3" type="audio/mpeg" height="500px">
		  Your browser does not support this audio.
		</audio>
  	</div>

  </div>



  <div class="col-md-4">
      <div id="chatHead">
        <p>12 users active</p>
      </div>

                <!-- chatroom -->
    <div id="inputCnt">
    <form name="chatForm" id="chatForm" action="/s4sradio/ajax/chatpost.php" method="post" enctype="multipart/form-data">
    <input name="message" type="text" class="form-control" id="chatInput">
    <!-- submit button positioned off screen -->
    <input name="submitChat" type="submit" id="submitChat" value="DICK" style="position: absolute; left: -9999px">
    </form>
    </div>

    <div id="chatBox">
    Loading...
    </div>

  </div>

<!-- row and pagewrap -->
</div>
</div>
<?php 
} //no content after this bracket 
?>
