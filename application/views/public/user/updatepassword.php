<?php 
$id = $this->uri->segment(4);
$loginCredential = $this->uri->segment(3);
//$id = $this->uri->segment(3); 
?>
<h1 class="text-center text-info">Hello Please Change Your Password Here</h1>
<hr>
<div class="container">
	<h1 class="text-center text-danger">Forget Password!!</h1>
	<form action="<?php echo base_url(); ?>users/updatepassword" method="post">
		<div class="row">
			<div class="col-xl-2">
				<label for="exampleInputEmail1">Password:</label>
			</div>
			<div class="col-xl-6">
				<div class="form-group">
    				<input type="password" class="form-control"  name="password"  placeholder="Password" value="<?php echo set_value('email'); ?>">
  				</div>	
			</div>
			<div class="col-xl-4">
				<div><?php echo form_error('email', '<div class="error" style="color:white;">', '</div>'); ?></div> 
			</div>




			<div class="col-xl-2">
				<label for="exampleInputEmail1">Confirm Password:</label>
			</div>
			<div class="col-xl-6">
				<div class="form-group">
    				<input type="password" class="form-control"  name="confirm_password"  placeholder="Confirm Password" value="<?php echo set_value('email'); ?>">
    				<input type="hidden" name = "loginid" value="<?php echo $loginCredential; ?>">
    				<input type="hidden" name = "id" value="<?php echo $id; ?>">
  				</div>	
			</div>
			<div class="col-xl-4">
				<div><?php echo form_error('email', '<div class="error" style="color:white;">', '</div>'); ?></div>
			</div>
			<div class="col-xl-4">
				<input type="submit" class="btn btn-info" name="submit" value="Update Password" style="margin-top: 15px;">
			</div>
		</div>
	</form>
</div>	




<div class="col-xl-6">
				
			</div>





				<div class="offset-xl-5 col-xl-4 offset-xl-3">
  				
			</div>	