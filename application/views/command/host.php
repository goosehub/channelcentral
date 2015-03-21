<div id="hostFormCnt">

<h2 id="welcome">Welcome to your hosting center</h2>

<a class="btn btn-success" target="_blank" href="<?=base_url()?>">Go to Front Page</a>
<a class="btn btn-primary" target="_blank" href="../<?php echo $slug; ?>">Go to your channel</a>
<a class="btn btn-danger" href="logout">Logout</a>

<hr/>

<form name="uploadForm" id="hostForm" action="../post/host-form-post.php" method="post" enctype="multipart/form-data">
<div class="form-group">

<!-- <div class="input-group hostPassword">
    <div class="input-group-addon passwordAddon">Enter Password</div>
    Remove value="1234" when risk of unauthorized users exists or password changes
      <input class="input-lg" type="input" name="passwordInput" value="1234"/><br />
    </div> -->

<input class="btn btn-primary hostSubmit" type="submit" name="hostSubmitForm" value="Submit Changes" />
<h5 class="note"><strong>Or just press the enter key when you're ready</strong></h5>

<hr/>

<h3>Host Uploads</h3>
<h5 class="note"><strong>Host uploads go to the front of the queue | Host uploads have no length and size limits</strong></h5>

  <div class="input-group">
  <div class="input-group-addon">Enter Youtube URL</div>
  <input class="form-control" type="input" name="hostYoutubeInput" /><br />
</div>

<!-- <button class="btn hostOr" disabled="disabled"><strong>OR</strong></button>

<div class="input-group">
  <div class="input-group-addon">Upload Audio</div>
  <input class="form-control" name="hostAudioInput" type="file" />
</div>

<div class="input-group">
  <div class="input-group-addon">Attach Image</div>
  <input class="form-control" name="hostImageInput" type="file" />
</div> -->

<button class="btn hostOr" disabled="disabled"><strong>OPTIONAL</strong></button>

<div class="input-group">
    <div class="input-group-addon">Start time</div>
      <input class="form-control" type="input" name="hostStart" placeholder="YYYY-MM-DD HH:MM:SSPM" /><br />
    </div>
<h5 class="note">~Format is YYYY-MM-DD HH:MM:SSPM | All times are EST (New York Time)</h5>

<hr/>

<h3>Host Settings</h3>
<h5 class="note">~Set Length to 0 to turn off user uploads</h5>

<div class="input-group">
    <div class="input-group-addon">Shuffle when Playlist Empty</div>
      <input class="checkbox" class="" type="checkbox" name="hostShuffle" value="yes" 
      <?php if($host->shuffle==='1') {echo 'checked';} ?>/>
</div>
<div class="input-group">
  <div class="input-group-addon">Background Image</div>
  <input class="form-control" name="hostBackgroundInput" type="file" />
</div>

<div class="input-group">
    <div class="input-group-addon">Max Upload Length in Minutes</div>
      <input class="form-control" type="input" name="hostLengthInput" 
      value="<?php echo $host->length; ?>"/><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Max Queue in Minutes</div>
      <input class="form-control" type="input" name="hostQueueLimitInput" 
      value="<?php echo $host->queue; ?>" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Current Show Name</div>
      <input class="form-control" type="input" name="hostCurrentShowNameInput" 
      value="<?php echo $host->showName; ?>" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Current Show Description</div>
      <textarea class="form-control" type="input" name="hostCurrentShowDescInput" 
      /><?php echo $host->showDescription; ?></textarea><br />
    </div>
<h5 class="note">~If your choose, HTML tags <a href="https://quip.com/aO0pAZO9m9SG" target="_blank">on this list</a> are allowed for the show description.</h5>
<h5 class="note">~<a href="http://getbootstrap.com/css/">Bootstrap HTML, CSS, and JS Framework</a> classes are included for your use.</h5>
<h5 class="note">~<strong>Caution:</strong> HTML tags can break your Channels layout. Setting you height and width inline will help. An example is below.</h5>
<br/>
<h5 class="note"><code>
&#x3C;img style=&#x22;width: 100%; height: 100%&#x22; src=&#x22;http://channelcentral.me/resources/images/orange.gif&#x22;/&#x3E;
</code></h5>

<hr/>

<h3>Upload Maintenance</h3>

<div class="input-group">
    <div class="input-group-addon">Remove Queue Item by ID</div>
      <input class="form-control" type="input" name="hostDeleteItem" /><br />
    </div>

<div class="input-group">
    <div class="input-group-addon">Clear Currently Playing</div>
      <input class="checkbox" class="" type="checkbox" name="hostClearCurrent" value="yes" />
</div>

<div class="input-group">
    <div class="input-group-addon">Clear Upcoming Queue</div>
      <input class="checkbox" class="" type="checkbox" name="hostClearQueueInput" value="yes" />
</div>

<div class="input-group">
    <div class="input-group-addon">Clear Past Uploads</div>
      <input class="checkbox" class="" type="checkbox" name="hostClearPastUploads" value="yes" />
</div>

<hr/>

<h3>Current Queue</h3>
<h5 class="note">~Ordered by start time, not by ID</h5>

  <div id="currentQueue">
  <?php 
  include 'ajax/current-queue.php';
    ?>
  </div>

<!-- <div class="reloadQueue btn btn-danger">Refresh</div> -->
  
<hr/>

<h3>Scheduled to Play</h3>

  <div id="timedQueue">
  <?php 
  include 'ajax/timed-queue.php';
    ?>
  </div>

<!-- <div class="reloadQueue btn btn-danger">Refresh</div> -->

<hr/>

<input type="hidden" name="slug" value="<?php echo $slug; ?>">

</div>
</form>
</div>