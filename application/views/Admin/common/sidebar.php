<?php $this->load->view('Admin/common/link'); 
date_default_timezone_set("Asia/Kolkata");
?>


<div id="side" class="page-wrapper chiller-theme toggled">

  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
 
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        
        <a href="#" class="text-center"><img src="<?php echo base_url('assets/images/logo.jpeg');?>" class="img-fluid" width="100"/>
        <h5 class="text-center">Admin</h5></a>
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
            <a href="<?php echo base_url('Admin/Dashboard');;?>">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
    
          <!-- <li>
          <a href="<?php echo base_url('admin/item_master');?>" id="valid">
              <i class="fa fa-power-off"></i>
              <span>Item Master</span>
            </a>
          </li> -->
         
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fas fa-users"></i>
              <span>Faculty</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                <a href="<?php echo base_url('Admin/insertFaculty');?>"  id="valid">Add</a>
                </li>
                 <li>
                 <a href="<?php echo base_url('Admin/facultyView');?>" id="valid">View</a>
                </li>
              </ul>
            </div>
          </li>
          </li>
          <li>
            <a href="<?php echo base_url('Admin/viewPaperEvaluvation');?>">
            <i class="fas fa-code-branch"></i>
              <span>Faculty Work</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('Admin/renumaration');?>" id="valid1">
            <i class="fas fa-wallet"></i>
              <span>Remunration</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('Admin/notification');?>" id="valid1">
            <i class="fas fa-bell"></i>
              <span>Notification</span>
            </a>
          </li>
           <li>
            <a href="<?php echo base_url('Admin/report');?>" id="valid1">
            <i class="far fa-file-alt"></i>
              <span>Report</span>
            </a>
          </li>
           <li>
            <a href="<?php echo base_url('Admin/logout');?>">
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