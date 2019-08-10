<div class="container-fluid">
	<div class="container">
  		<?php if ($this->session->flashdata('no_such_email')): ?>
    	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('no_such_email').'</p>'; ?>
  		<?php endif; ?>


		<?php if ($this->session->flashdata('user_not_exist')): ?>
    	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_not_exist').'</p>'; ?>
  		<?php endif; ?>


		<?php if ($this->session->flashdata('not_registered')): ?>
    	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_registered').'</p>'; ?>
  		<?php endif; ?>



  		<?php if ($this->session->flashdata('password_change_success')): ?>
    	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('password_change_success').'</p>'; ?>
  		<?php endif; ?>


  		<?php if ($this->session->flashdata('password_change_failed')): ?>
    	<?php echo '<p class="alert alert-warning">'.$this->session->flashdata('password_change_failed').'</p>'; ?>
  		<?php endif; ?>


  		<?php if ($this->session->flashdata('forget_pass_email_sent')): ?>
    	<?php echo '<p class="alert alert-warning">'.$this->session->flashdata('forget_pass_email_sent').'</p>'; ?>
  		<?php endif; ?>
  		
	</div>
	<h1 class="text-center text-danger">Forget Password!!</h1>
	<form action="<?php echo base_url(); ?>users/forgot_password" method="post">
		<div class="row">
      <div class="col-xl-2">
        <label for="exampleInputEmail1">Email address:</label>
      </div>
			<div class="col-xl-6">
				<div class="form-group">
    				<input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" style="width: 50%;" value="<?php echo set_value('email'); ?>">
  				</div>	
			</div>
			<div class="col-xl-4">
				<div><?php echo form_error('email', '<div class="error" style="color:white;">', '</div>'); ?></div>
			</div>
      

        <div class="col-xl-2">
            <label for="username">Username:</label>
        </div>
				<div class="col-xl-6">
				<div class="form-group">
    				<input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Username" style="width: 50%;" value="<?php echo set_value('username'); ?>">
  				</div>	
			</div>
			<div class="col-xl-4">
				<div><?php echo form_error('username', '<div class="error" style="color:white;">', '</div>'); ?></div>
			</div>
		</div>
		<div class="col-xl-6"><input type="submit" value="Send Link" class="btn btn-info"></div>
	</form>
</div>	