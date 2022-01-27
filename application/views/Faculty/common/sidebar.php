<?php $this->load->view('Faculty/common/link');
date_default_timezone_set("Asia/Kolkata");
$profData = $profile->result();

?>


<div id="side" class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#" class="text-center"><img src="<?php echo $profData[0]->fimage;?>" class="img-fluid" width="100"/>
                <h5 class="text-center">FACULTY</h5></a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span style="color:#fff">MENU</span>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Faculty/');;?>">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Faculty/Profile');;?>">
                        <i class="fas fa-user-circle"></i>
                            <span>profile</span>
                        </a>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fas fa-paste"></i>
                            <span>Paper Evalution</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo base_url('Faculty/addPaperEvaluvation');?>" id="valid">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Faculty/viewPaperEvaluvation');?>" id="valid">View</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fas fa-sticky-note"></i>
                            <span>Question Paper Set</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo base_url('Faculty/workdone');?>" id="valid">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Faculty/workdone');?>" id="valid">View</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-id-card"></i>
                            <span>Schema</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo base_url('Faculty/workdone');?>" id="valid">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Faculty/workdone');?>" id="valid">View</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Faculty/report');?>" id="valid1">
                            <i class="far fa-file-alt"></i>
                            <span>Report</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Faculty/logout');?>">
                            <i class="fa fa-power-off"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->

    </nav>

    <script>
    if (screen.width < 600) {
        $('#side').removeClass("toggled");
        // download complicated script
        // swap in full-source images for low-source ones
    }
    </script>