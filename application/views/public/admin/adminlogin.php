    <?php if ($this->session->flashdata('wrong_password')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('wrong_password').'</p>'; ?>
    <?php endif; ?>
    <?php if ($this->session->flashdata('wrong_username')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('wrong_username').'</p>'; ?>
    <?php endif; ?>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="panel-heading">
                    <h4 class="text-center"> Sign In to <strong class="text-custom">Admin</strong></h4>
                </div>


                <div class="p-20">
                    <div class="row">
                    <form class="form-horizontal m-t-20" action="<?php echo base_url()?>admin/login" method="POST">
                        <div class="form-group ">
                            <div class="col-md-7">
                                <input class="form-control" type="text" required="" placeholder="Username" name="username">
                            </div>
                            <div class="col-md-5"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7">
                                <input class="form-control" type="password" required="" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-5"></div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-md-4">
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Log In
                                </button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-md-7">
                                <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot
                                    your password?</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a>
                    </p>

                </div>
            </div>
            
        </div>
        
        

        
    	<script>
            var resizefunc = [];
        </script>