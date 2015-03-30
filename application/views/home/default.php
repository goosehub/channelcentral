<div class="row head">
	<div class="col-md-6">
		<h1 class="main-title">Channel Central</h1>
	</div>
	<div class="col-md-6">
		<?php if(isset($username)) { ?>
			<p>You are logged in as <strong><?php echo $username; ?></strong></p>
	    <a class="btn btn-primary" href="<?php echo $username; ?>">Go to your Channel</a>
	    <a class="btn btn-info" href="<?php echo $username; ?>/host">Go to your Host Center</a>
			<a class="btn btn-danger" href="<?php echo $username; ?>/logout">Logout</a>
		<?php } ?>
	</div>
</div>

<hr/>

<div class="row">

	<div class="col-md-3">
	</div>
	<div class="col-md-6">

		<p class="lead">
			Watch youtube with friends in real-time. 
		</p>
		<p class="lead">
			No sign-up to participate.
		</p>
		<p class="lead">
			Free to create your own room.
		</p>

	    <h2>Start Your Own Channel</h2>
		<div class="row">
		    <div class="col-sm-3">
		    </div>
		    <div class="col-sm-6">
			    <?php echo validation_errors(); ?>
			    <?php echo form_open('home/do_search'); ?>
			    <input class="search form-control" type="search" name="search" placeholder="Search"></input>
		    </div>
		    <div class="col-sm-3">
		    </div>
	    </div>

	    <h2>Active Channels</h2>

	    <?php if (empty($active_channels)) { ?>
	    	<p class="lead">Currently no active channels</p>
	    <?php } ?>
		<?php foreach ($active_channels as $channel) { ?>
			<a class="channel-list_item btn btn-default btn-lg" href="<?php echo $channel->slug; ?>">
			<strong><?php echo $channel->slug; ?></strong></a>
		<?php } ?>

		<h2>Empty Channels</h2>

		<a class="channel-list_item btn btn-success" href="random">
		<strong>random</strong></a>

		<?php foreach ($empty_channels as $channel) { ?>

		<a class="channel-list_item btn btn-default" href="<?php echo $channel->slug; ?>">
		<strong><?php echo $channel->slug; ?></strong></a>

		<?php } ?>

		<hr/>

		<p>This is an open source project on <a target="_blank" href="https://github.com/goosehub/channelcentral">GitHub</a></p>

	</div>
	<div class="col-md-3">
	</div>

</div>