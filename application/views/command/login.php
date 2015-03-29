<div class="login_cnt">
<h1>Host Login</h1>
<h6>This page for the host only</h6>
  <?php echo validation_errors(); ?>
  <?php echo form_open('room/verifylogin'); ?>
    <input type="hidden" id="username" name="slug" value="<?php echo $slug; ?>"/>
    <br/>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"/>
    <br/>
    <button class="login-btn btn btn-lg btn-danger" type="submit"/>Log In</button>
    <a class="login-btn btn btn-lg btn-primary" href="../<?php echo $slug; ?>"/>Back to Channel</a>
    <a class="login-btn btn btn-lg btn-success" href="<?=base_url()?>"/>Front Page</a>
  </form>
</div>