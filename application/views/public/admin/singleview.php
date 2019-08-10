        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('public/admin/leftbar'); ?>
            <!-- Left Sidebar End -->
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
                                    <li class="breadcrumb-item active">Abstract</li>
                                </ol>

                            </div>
                        </div>
                        <?php foreach ($absttractData as $row): ?>
                          <div class="row">
                            <div class="col-md-8 col-sm-12 card-box">
                                <div class="row">
                                <div class="col-md-3 col-sm-6"><strong>Title:-</strong></div>
                                <div class="col-md-9 col-sm-6"><?php echo $row->title; ?></div>
                                <hr>
                                <div class="col-md-3 col-sm-6"><strong>Abstract Category:-</strong></div>
                                <div class="col-md-9 col-sm-6"><?php echo $row->category; ?></div>
                                <hr>
                                <div class="col-md-3 col-sm-6"><strong>Abstract Type:-</strong></div>
                                <div class="col-md-9 col-sm-6"><?php echo $row->type; ?></div>
                                <hr>
                                <div class="col-md-3 col-sm-6"><strong>Authors:-</strong></div>
                                <div class="col-md-9 col-sm-6"><?php echo $row->authors; ?></div>
                                <hr>
                                <div class="col-md-3 col-sm-6"><strong>Created on:-</strong></div>
                                <div class="col-md-9 col-sm-6"><?php echo $row->date; ?></div>
                                </div>
                            </div>
                        </div>
                            <hr>
                        
                            
                        <div class="row">
                            <div class="col-lg-8 col-sm-12">
                                <ul class="nav nav-tabs navtab-bg nav-justified">
                                    <li class="nav-item">
                                        <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Background
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                            Method
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Result
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Conclusion
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="home1">
                                        <p><?php echo $row->background;?></p>
                                    </div>
                                    <div class="tab-pane active" id="profile1">
                                        <p><?php echo $row->method;?></p>
                                    </div>
                                    <div class="tab-pane" id="messages1">
                                        <p><?php echo $row->result;?></p>
                                    </div>
                                    <div class="tab-pane" id="settings1">
                                        <p><?php echo $row->conclusion;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                             <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 header-title">Image Uploaded</h4>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <img src="<?php echo base_url(); ?>upload/<?php echo $userName; ?>/<?php echo $row->imageupload; ?>" alt="image"
                                                         class="img-fluid rounded" width="200"/>
                                                    <p class="m-t-15 m-b-0">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php endforeach; ?>


                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- End content -->

            </div>
        </div>
        <!-- END wrapper -->
        <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69506598-1', 'auto');
          ga('send', 'pageview');
        </script>