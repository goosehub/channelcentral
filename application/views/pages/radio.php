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

<!-- Left -->

  <div class="col-md-4">
    <div id="navCnt">
      <div id="navBar" class="btn-group" role="group" aria-label="...">
          <a id="homeBtn" class="btn btn-default" href="/">esfores</a>
          <button id="scheduleBtn" class="btn btn-default" href="#">Calendar</button>
          <button id="vocaBtn" class="btn btn-default" href="#">Record</button>
          <button id="uploadBtn" class="btn btn-default" href="#">Upload</button>
          <button id="chanBtn" class="btn btn-default" href="#">4chan</button>
      </div>
    </div>
    <div id="viewer">
    <iframe id="uploadFrame" src="./ajax/upload.php" seamless></iframe>
    </div>
  </div>

<!-- Center -->
  
  <div class="col-md-4">
    <div id="headline">
        <p>S4S RADIO</p>
    </div>

  	<div id="contentWindow">
		<!-- <iframe id="youtubeFrame" src="//www.youtube.com/embed/QjsPG0Kspxo" frameborder="0" allowfullscreen></iframe> -->

    <img id="imageCover" src="/s4sradio/images/example.jpg">
		<audio controls id="audioPlayer">
		  <source src="audio/test.mp3" type="audio/mpeg">
		  Your browser does not support this audio.
		</audio>
  	</div>

<!--     <div id="uploadFormCnt">

    <form name="uploadForm" id="UploadForm" action="/s4sradio/ajax/formpost.php" method="post" enctype="multipart/form-data">
    <div class="form-group">

    <div class="input-group">
      <div class="input-group-addon">Enter Youtube URL</div>
      <input class="form-control" type="input" name="youtubeInput" /><br />
    </div>
    
    <div class="input-group">
      <div class="input-group-addon contributeFileAddon"><strong>Or</strong> Upload Audio</div>
      <input class="form-control contributeFile" name="audioInput" type="file" />
    </div>

    <div class="input-group">
      <div class="input-group-addon contributeFileAddon"><strong>With</strong> An Image</div>
      <input class="form-control contributeFile" name="imageInput" type="file" />
    </div>

    <div id="typeInput" class="form-group">
      <div class="input-group">
        <div class="input-group-addon"><strong>And</strong> Pick Type</div>

        <select class="form-control" name="typeInput">
          <option value="default">Pick An Option</option>
          <option value="Music">Music</option>
          <option value="Shoutout">Shoutout</option>
          <option value="Segment">Segment</option>
          <option value="Other">Other</option>
        </select>

      </div>
    </div>

    <input class="form-control input-lg" id="contributeSubmit" type="submit" name="submitForm" value="Contribute" />

    </div>
    </form>
    </div> -->
  </div>

<!-- Right -->

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
