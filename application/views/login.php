<h1>Login</h1>
  <?php echo validation_errors(); ?>
  <?php echo form_open('room/verifylogin'); ?>
    <label for="slug">Username:</label>
    <input type="text" id="username" name="slug"/>
    <br/>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"/>
    <br/>
    <input type="submit" value="Login"/>
  </form>