<div class="row head">
	<div class="col-md-6">
		<h1 class="main-title">Channel Central - BETA</h1>
	</div>
	<div class="col-md-6">
		</div>
		</fonm>
	</div>
</div>

	<?php if(isset($username)) { ?>
		<p>You are logged in as <strong><?php echo $username; ?></strong></p>
    <a class="btn btn-primary" href="<?php echo $username; ?>">Go to your Channel</a>
    <a class="btn btn-info" href="<?php echo $username; ?>/host">Go to your Host Center</a>
		<a class="btn btn-danger" href="<?php echo $username; ?>/logout">Logout</a>
	<?php } ?>

</div>

<div class="row columns">

<!-- Channel List -->

  <div class="col-sm-4 channel-list">
  <h2>Channel Listing</h2>
      <?php echo validation_errors(); ?>
      <?php echo form_open('home/do_search'); ?>
      <h4>Find a Channel, or Start Your Own</h4>
      <input class="search form-control" type="search" name="search"></input>

  	<?php $i = 0;
  	foreach ($channels as $channel): ?>

  	<a class="channel-list_item btn btn-default" href="<?php echo $channel->slug; ?>">
  	<strong><?php echo $channel->slug; ?></strong></a>

  	<?php $i = $i + 1;
  	if ($i == 1000) break;
  	endforeach ?>
  </div>

<!-- Recent Uploads -->

  <div class="col-sm-4 recent-uploads">
  <h2>Recent Uploads</h2>
  	<?php $i = 0;
  	foreach ($recent_uploads as $upload):
// If youtube, load youtube
        if ($upload->youtube != '') { ?>
          <iframe id="youtubeFrame" 
          src="//www.youtube.com/embed/<?php echo $upload->youtube ?>?autoplay=0" 
          frameborder="0" allowfullscreen></iframe><br/>
<!-- Else load audio and image -->
        <?php } else { ?>
<!-- Image load -->
          <img class="image-cover" src="upload/images/<?php echo $upload->image ?>
          ">
<!-- Audio load -->
          <audio controls id="audioPlayer">
          <source src="../upload/audio/<?php echo $upload->audio ?>
          " type="audio/mpeg">
            Your browser does not support this audio.
          </audio><br/>
        <?php } ?>
	<h4>This was played on 
  	<a class="btn btn-default playby" href="<?php echo $upload->slug; ?>">
  	<strong>
	  	<?php echo $upload->slug; ?> | <?php echo $upload->viewers; ?> Viewers
  	</strong></a></h4>
  	<hr/>

  	<?php $i = $i + 1;
  	if ($i == 10) break;
  	endforeach ?>
  </div>

<!-- Info Panel -->

  <div class="col-sm-4 info-panel">
  	<h2>What is Channel Central?</h2>

    <button class="btn btn-primary">Monkey</button>

  	<p class="lead">Channel Central is a place for groups to share video and audio.
  	There is no sign-up needed to browse, and starting a channel only requires a password.</p>
    <hr/>
    <p class="lead">This website is in Open Beta 
    If you come across any error messages, strange behavoir, or have features you'd like to see added, please contact me.</p>
    <hr/>
    <p class="lead">This is an open source project. 
    If you are the least bit famiiar with Graphic Design, CSS, Javascript, PHP, or MySQL, please get involved.</p>
    <hr/>
    <p class="lead">The project is on <a href="https://github.com/goosehub/channelcentral">GitHub</a></p>
    <hr/>
    <p class="lead">
    <!-- <a href="mailto:goosepostbox@gmail.com"> -->
    goosepostbox@gmail.com
    <!-- </a> -->
    </p>
    <hr/>
    <p class="lead">goosetube on skype</p>
  </div>

</div>