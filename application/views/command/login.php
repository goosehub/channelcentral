<div class="form-cnt">
<h1>Host Login</h1>
<h6>This page for the host only</h6>
  <?php echo validation_errors(); ?>
  <?php echo form_open('room/verifylogin'); ?>
    <input type="hidden" id="username" name="slug" value="<?php echo $slug; ?>"/>
    <br/>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"/>
    <br/>
    <input class="login-btn btn btn-lg btn-deafault" type="submit" value="Login"/>
  </form>
</div>