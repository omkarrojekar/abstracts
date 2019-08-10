<section class="page-title">
  <div class="auto-container">
      <h1 class="text-center">User Login</h1>
    </div>
</section>

<div>
    <?php if ($this->session->flashdata('user_not_exist')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_not_exist').'</p>'; ?>
    <?php endif; ?>


    <?php if ($this->session->flashdata('not_registered')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_registered').'</p>'; ?>
    <?php endif; ?>


     <?php if ($this->session->flashdata('already_loggedin')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('already_loggedin').'</p>'; ?>
    <?php endif; ?>


     <?php if ($this->session->flashdata('wrong_password')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('wrong_password').'</p>'; ?>
    <?php endif; ?>
</div>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="<?php echo base_url();?>assets/images/user.jpg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <hr>
    <form action="<?php echo base_url(); ?>users/login" method="POST">
    	<div class="row">
    		<div class="col-md-12">
    			<input type="text" id="email" class="fadeIn second" name="email" placeholder="Email">	
    		</div>
    		<div class="col-md-12 error"> <!--Error Will Be here--></div>
    		<div class="col-md-12">
    			<input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
    		</div>
    		<div class="col-md-12 error"> <!--Error Will Be here--></div>
    	</div>
      <hr>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
    	<div><a  href="<?php echo base_url(); ?>users/registration">Sign Up Here!!</a></div>
     	 <div><a  href="<?php echo base_url(); ?>users/forgotpassword">Forgot Password?</a></div>
    </div>

  </div>
</div>