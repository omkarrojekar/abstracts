
<div>

        <!--Email Sent to the email ID-->
        <?php if ($this->session->flashdata('email_sent')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('email_sent').'</p>'; ?>
        <?php endif; ?>

        <!--Details not stroed  to the database -->
        <?php if ($this->session->flashdata('not_send')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('not_send').'</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('verification_complete')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('verification_complete').'</p>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('verification_incomplete')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('verification_incomplete').'</p>'; ?>
        <?php endif; ?>

</div>
<h2 class="text-center">Registration</h2>
<hr>
<div class=" shadow-lg m-2">
   <form action="<?php echo base_url(); ?>users/register" class="form-horizontal" role="form" style="padding: 30px;" method="POST">
                <div class="row">


                    <!--First Name-->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="fname" class="form-control" placeholder="First Name" type="text" value="<?php echo set_value('fname'); ?>">
                        </div> <!-- form-group// -->
                    </div>


                    <!--Last Name-->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="lname" class="form-control" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="col-md-6 col-sm-12"><?php echo form_error('fname', '<div class="error" style="color:red;">', '</div>'); ?></div>
                    <div class="col-md-6 col-sm-12"><?php echo form_error('lname', '<div class="error" style="color:red;">', '</div>'); ?></div>


                    <!--Email Address-->
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Email address" type="text" value="<?php echo set_value('email'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="col-md-12 col-sm-12"><?php echo form_error('email', '<div class="error" style="color:red;">', '</div>'); ?></div>

                    <!--Contact Number-->
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input name="contact" class="form-control" placeholder="Contact Number" type="text" value="<?php echo set_value('contact'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-8 col-sm-12"><?php echo form_error('contact', '<div class="error" style="color:red;">', '</div>'); ?></div>


                    <!--Age-->
                    <div class="offset-md-2 col-md-4 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Age </span>
                            </div>
                            <input name="age" class="form-control" placeholder="Age" type="text" value="<?php echo set_value('age'); ?>">
                        </div> <!-- form-group// -->
                    </div>                  


                    <!--Gender-->
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> Gender </span>
                            </div>
                                <select class="form-control" name="gender">
                                    <option value="na">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-4 col-sm-12"><?php echo form_error('age', '<div class="error" style="color:red;">', '</div>'); ?></div>
                    <div class="col-md-4 col-sm-12"><?php echo form_error('gender', '<div class="error" style="color:red;">', '</div>'); ?></div>
                    

                    <!--Address Line 1-->
                    <div class="offset-md-2 col-md-8 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                            </div>
                            <input name="address1" class="form-control" placeholder="Address Line 1" type="text" value="<?php echo set_value('address1'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-8 col-sm-12"><?php echo form_error('address1', '<div class="error" style="color:red;">', '</div>'); ?></div>


                    <!--Address Line 2-->
                    <div class="offset-md-2 col-md-8 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                            </div>
                            <input name="address2" class="form-control" placeholder="Address Line 2" type="text" value="<?php echo set_value('address2'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-8 col-sm-12"></div>
        
                    <!--City-->
                    <div class="offset-md-2 col-md-4 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-city"></i> </span>
                            </div>
                            <input name="city" class="form-control" placeholder="City" type="text" value="<?php echo set_value('city'); ?>">
                        </div> <!-- form-group// -->
                    </div>


                    <!--State-->
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="state" class="form-control" placeholder="State" type="text" value="<?php echo set_value('state'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-4 col-sm-12"><?php echo form_error('city', '<div class="error" style="color:red;">', '</div>'); ?></div>
                    <div class="col-md-4 col-sm-12"><?php echo form_error('state', '<div class="error" style="color:red;">', '</div>'); ?></div>


                    <!--Country-->
                    <div class="offset-md-2 col-md-4 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                            </div>
                            <input name="country" class="form-control" placeholder="Country" type="text" value="<?php echo set_value('country'); ?>">
                        </div> <!-- form-group// -->
                    </div>


                    <!--Zipcode-->
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="zipcode" class="form-control" placeholder="Zipcode" type="text" value="<?php echo set_value('zipcode'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-4 col-sm-12"><?php echo form_error('country', '<div class="error" style="color:red;">', '</div>'); ?></div>
                    <div class="col-md-4 col-sm-12"><?php echo form_error('zipcode', '<div class="error" style="color:red;">', '</div>'); ?></div>
                    <!--Institute/Hospital-->
                    <div class="offset-md-2 col-md-8 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-clinic-medical"></i> </span>
                            </div>
                            <input name="institute" class="form-control" placeholder="Institute/Hospital" type="text" value="<?php echo set_value('institute'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-8 col-sm-12"><?php echo form_error('institute', '<div class="error" style="color:red;">', '</div>'); ?></div>


                    <!--Designation-->
                    <div class="offset-md-2 col-md-8 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-user-md"></i> </span>
                            </div>
                            <input name="designation" class="form-control" placeholder="Designation" type="text" value="<?php echo set_value('designation'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-8 col-sm-12"><?php echo form_error('designation', '<div class="error" style="color:red;">', '</div>'); ?></div>



                    <!--Speciality-->
                    <div class="offset-md-2 col-md-8 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input name="speciality" class="form-control" placeholder="Speciality" type="text" value="<?php echo set_value('speciality'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-8 col-sm-12"><?php echo form_error('speciality', '<div class="error" style="color:red;">', '</div>'); ?></div>


                    <!--Username-->
                    <div class="offset-md-2 col-md-8 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-user-lock"></i> </span>
                            </div>
                            <input name="username" class="form-control" placeholder="Username" type="text" value="<?php echo set_value('username'); ?>">
                        </div> <!-- form-group// -->
                    </div>
                    <div class="offset-md-2 col-md-8 col-sm-12"><?php echo form_error('username', '<div class="error" style="color:red;">', '</div>'); ?></div>


                    <!--Password-->
                    <div class="offset-md-2 col-md-4 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" class="form-control" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>">
                        </div> <!-- form-group// -->
                    </div>

                    <!--Confirm Password-->
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="confirmpassword" class="form-control" placeholder="Confirm Password" type="password" value="<?php echo set_value('confirmpassword'); ?>">
                        </div> <!-- form-group// -->
                    </div>
      
                    <div class="offset-md-2 col-md-4 col-sm-12"><?php echo form_error('password', '<div class="error" style="color:red;">', '</div>'); ?></div>
                    <div class="col-md-4 col-sm-12"><?php echo form_error('confirmpassword', '<div class="error" style="color:red;">', '</div>'); ?></div>

                    <div class="offset-md-4 col-md-4 offset-md-4 offset-sm-1 col-sm-10 offset-sm-1">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
                
            </form> <!-- /form -->   
</div>


