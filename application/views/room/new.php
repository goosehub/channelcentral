<div class="available_cnt col">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">

    <h1>This room is available!</h1>
    <h6>This room can be yours in one step.</h6>

    <hr/>

    <?php echo validation_errors(); ?>
    <?php $slug = $this->uri->segment(1); 
    $hidden = array('slug' => $slug); ?>
    <?php echo form_open_multipart(''.$slug.'/new', '', $hidden); ?>
     
    <div class="input-group">
        <div class="input-group-addon">Username</div>
            <strong class="new_room_username"><?php echo $slug; ?></strong>
    </div>
    <button class="btn btn-lg form-control" disabled="disabled"><strong>REQUIRED</strong></button>
     <div class="input-group">
         <div class="input-group-addon">Password</div>
             <input class="input-textarea form-control" type="password" size="20" id="password" name="password"/>
     </div>
     <div class="input-group">
         <div class="input-group-addon">Confirm</div>
             <input class="input-textarea form-control" type="password" size="20" id="confirm_password" name="confirm_password"/>
     </div>
    <button class="btn btn-lg form-control" disabled="disabled"><strong>OPTIONAL</strong></button>
     <div class="input-group">
       <div class="input-group-addon">Background Image</div>
       <input class="form-control" type="file" id="userfile" name="userfile" />
     </div>

     <div class="input-group">
         <div class="input-group-addon">Max Upload Length in Minutes</div>
           <input class="form-control" type="input" name="hostLengthInput" 
           value="15"/><br />
         </div>

     <div class="input-group">
         <div class="input-group-addon">Max Playlist Queue in Minutes</div>
           <input class="form-control" type="input" name="hostQueueLimitInput" 
           value="30" /><br />
         </div>

     <div class="input-group">
         <div class="input-group-addon">Current Headline Message</div>
           <input class="form-control" type="input" name="hostCurrentShowNameInput" 
           value="Welcome" /><br />
         </div>

     <div class="input-group">
         <div class="input-group-addon">Current Description</div>
           <textarea class="form-control" type="input" name="hostCurrentShowDescInput" 
           /><center>
<h1><?php echo $slug; ?></h1>

<img height="50%" width="50%" src="resources/images/black.png">
</center></textarea><br />

         </div>
<!--      <label for="email">Email (Optional, but recommended incase you forget your password):</label>
     <input class="input-textarea"
     type="email" size="20" id="email" name="email"/> -->
     <br/>
     <button class="get_started btn btn-lg btn-success" type="submit">Get Started</button>
     <a class="btn btn-lg btn-primary" href="/">Return to front page</a>
   </form>

    </div>
    <div class="col-md-3">
    </div>

</div>