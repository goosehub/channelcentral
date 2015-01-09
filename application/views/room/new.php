<div class="form-cnt">
    <h1>This room is available!</h1>
    <h6>This room can be yours in one step.</h6>

    <?php echo validation_errors(); ?>
    <?php $slug = $this->uri->segment(1); 
    $hidden = array('slug' => $slug); ?>
    <?php echo form_open(''.$slug.'/new', '', $hidden); ?>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <label for="confirm_password">Confirm:</label>
     <input class="input-textarea"
     type="password" size="20" id="confirm_password" name="confirm_password"/>
     <br/>
<!--      <label for="email">Email (Optional, but recommended incase you forget your password):</label>
     <input class="input-textarea"
     type="email" size="20" id="email" name="email"/> -->
     <br/>
     <input class="btn btn-success" type="submit" value="Get Started"/>
     <a class="btn btn-primary" href="/">Return to front page</a>
   </form>

</div>