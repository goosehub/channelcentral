<h1><?php echo $test; ?></h1>
<h1>This room is free</h1>
<h2>This room can be yours with one click.</h2>
    <?php echo validation_errors(); ?>
    <?php $slug = $this->uri->segment(1); 
    $hidden = array('slug' => $slug); ?>
    <?php //$slug = $this->uri->uri_string(); ?>
    <?php echo form_open(''.$slug.'/new', '', $hidden); ?>

     <h4>Your username will be <?php echo $slug; ?></h4>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <label for="confirm_password">Confirm:</label>
     <input class="input-textarea"
     type="password" size="20" id="confirm_password" name="confirm_password"/>
     <br/>
<!--      <label for="email">Email (Optional):</label>
     <input class="input-textarea"
     type="email" size="20" id="email" name="email"/> -->
     <br/>
     <input type="submit" value="Get Started"/>
   </form>