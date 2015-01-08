<div class="row head">
	<div class="col-md-6">
		<h1 class="main-title">Channel Central - BETA</h1>
	</div>
	<div class="col-md-6">
	    <?php echo validation_errors(); ?>
	    <?php echo form_open('home/do_search'); ?>
	    <div class="input-group">
			<div class="input-group-addon">Find a room, or start your own</div>
			<input class="search form-control" type="search" name="search"></input>
		</div>
		</fonm>
	</div>
</div>

	<?php if(isset($username)) { ?>
		<p>You are logged in as <strong><?php echo $username; ?></strong></p>
		<a class="btn btn-primary" href="<?php echo $username; ?>/host">Go to your host page</a>
		<a class="btn btn-danger" href="<?php echo $username; ?>/logout">Logout</a>
	<?php } ?>

<!-- 	<a class="btn btn-primary" href="<?=base_url()?>esfores">
	For those of you coming from esfores.com, meet me here</a> -->

</div>

<div class="row columns">

<!-- Channel List -->

  <div class="col-sm-4 channel-list">
  <h2>Channel Listing</h2>
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
  	<a href="<?php echo $upload->slug; ?>">
  	<button class="btn btn-default playby"><strong>
	  	<?php echo $upload->slug; ?>
  	</strong></button></a></h4>
  	<hr/>

  	<?php $i = $i + 1;
  	if ($i == 10) break;
  	endforeach ?>
  </div>

<!-- Info Panel -->

  <div class="col-sm-4 info-panel">
  	<h2>What is Channel Central?</h2>
  	<p class="lead">Channel Central is a place for groups to share video and audio.
  	There is no sign-up needed to browse, and starting a channel only requires a password.</p>
    <hr/>
    <p class="lead">This is an open source project. 
    If you are the least bit famiiar with Graphic Design, CSS, Javascript, Ajax, PHP, or MySQL, please get involved.</p>
    <hr/>
    <p class="lead">The project is on <a href="">GitHub</a></p>
    <hr/>
    <p class="lead">goosepostbox@gmail.com</p>
    <hr/>
    <p class="lead">goosetube on skype</p>
  </div>

</div>