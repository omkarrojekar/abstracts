
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('public/admin/leftbar'); ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Admin Panel</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>

                            </div>
                        </div>


                        <div class="row">                          
                            <div class="col-lg-12 col-xl-3">
                                <div class="card-box widget-box-1 bg-white">
                                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                                    <h4 class="text-dark font-18">Users status</h4>
                                    <h2 class="text-pink text-center"><span data-plugin="counterup"><?php echo $counOfRegisteredUsers?></span></h2>
                                    <p class="text-muted">Total Registered Users: <?php echo $counOfRegisteredUsers?></p>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-3">
                                <div class="card-box widget-box-1 bg-white">
                                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                                    <h4 class="text-dark font-18">Users status</h4>
                                    <h2 class="text-success text-center"><span data-plugin="counterup"><?php echo $counOfPendingRegisterUsers?></span></h2>
                                    <p class="text-muted">Total Pending Registreation: <?php echo $counOfPendingRegisterUsers?> </p>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-3">
                                <div class="card-box widget-box-1 bg-white">
                                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                                    <h4 class="text-dark font-18">Abstract status</h4>
                                    <h2 class="text-warning text-center"><span data-plugin="counterup"><?php echo $countOfAbstracts?></span></h2>
                                    <p class="text-muted">Total Abstracts: <?php echo $countOfAbstracts?></p>
                                </div>
                            </div>
                            

                             <div class="col-lg-12 col-xl-3">
                                <div class="card-box widget-box-1 bg-white">
                                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Last 24 Hours"></i>
                                    <h4 class="text-dark font-18">Logged In Users</h4>
                                    <h2 class="text-warning text-center"><span data-plugin="counterup"><?php echo $counOfLoggedInUsers?></span></h2>
                                    <p class="text-muted">Total Users Logged In: <?php echo $counOfLoggedInUsers?></p>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">
                                <?php if ($this->session->flashdata('problem_to_load_abstract')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('problem_to_load_abstract').'</p>'; ?>
                                <?php endif; ?>    

                                 <?php if ($this->session->flashdata('no_such_abstract')): ?>
                                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('no_such_abstract').'</p>'; ?>
                                <?php endif; ?>     

                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark">
                                            Abstracts
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                            <span class="divider"></span>
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                            <span class="divider"></span>
                                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="portlet2" class="panel-collapse collapse show">
                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover mails m-0 table table-actions-bar">
                                                    <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Title</th>
                                                        <th>Type</th>
                                                        <th>Category</th>
                                                        <th>Created  By</th>
                                                        <th>Created on</th>
                                                        <th style="">Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php  $count = 1; //For Sr. Number?> 
                                                    <?php foreach ($getAllAbstract as $row): ?>
                                                    <tr>
                                                    <td><?php  echo $count;  $count = $count + 1;  ?></td>
                                                    <td><?php  echo $row->title; ?></td>
                                                    <td><?php  echo $row->type; ?></td>
                                                    <td><?php  echo $row->category; ?></td>
                                                    <td><?php  echo $row->fname." ".$row->lastname; ?></td>
                                                    <td><?php  echo $row->date; ?></td>
                                                    <td><a href="<?php echo base_url();?>admin/viewabstract/<?= ($row->id * 1250); ?>/<?= ($row->loginid * 250); ?>">
                                                        <button class="btn btn-info">
                                                        <?php 
                                                            if(($row->lastupdate == "NA") && ($row->seenByAdmin == "no"))
                                                            {
                                                                echo "New";
                                                            }
                                                            elseif(($row->lastupdate != "") && ($row->seenByAdmin == "yes"))
                                                            {
                                                                echo "View";
                                                            }
                                                            elseif(($row->lastupdate != "") && ($row->seenByAdmin == "no")) 
                                                            {
                                                                echo "Updated";   
                                                            }
                                                        ?>
                                                            
                                                        </button>
                                                        </a></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>

                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->



      