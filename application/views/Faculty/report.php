<?php $this->load->view('Faculty/common/sidebar'); 
$notifi = $notification->result();?>
   <div class="page-content container-fluid">
          <div class="footer">
            <div class="d-flex justify-content-between">
                 <h2 class="text-left" style="font-weight: 600">Report</h2><a href="#" class="align-left"><i class="fa fa-power-off fa-2x"></i></a>
            </div>
            <p class="text-left" style="color: red;">Notification <marquee direction="left"><?php echo $notifi[0]->msg; ?>
            </marquee>
        </p>
        </div>
</div>


 <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
       <!---cart--->
       <div class="col-md-12">
                <div class="row">
                 <div class="card  col-md-2 col-10 m-3">
                    <a href="<?php echo base_url('Admin/delivary_report');?>" title="All Customer"><div class="card-body text-center"> 
                       <img class="img-fluid" width="50" src="<?php echo base_url('assets/image/report/logo.png');?>">
                    </div>
                    <div class="text-center mb-3"> 
                       <p style="font-weight: 600">  REPORT</p>
                    </div></a>
                  </div>
                
                  <!-- <div class="card col-md-2 col-10 m-3">
                    <a href="<?php echo base_url('Admin/payment_report');?>" title="All Investment Details"><div class="card-body text-center"> 
                       <img class="img-fluid" width="50" src="images/report/gold.png">
                    </div>
                    <div class="text-center mb-3">
                       <p style="font-weight: 600">SHOP DETAILS</p>
                    </div></a>
                  </div>

                  <div class="card col-md-2 col-10 m-3">
                    <a href="<?php echo base_url('Admin/collectionList');?>" title="All Investment Details"><div class="card-body text-center"> 
                       <img class="img-fluid" width="50" src="images/report/gold.png">
                    </div>
                    <div class="text-center mb-3"> 
                       <p style="font-weight: 600">PAYMENT COLLECTION</p>
                    </div></a>
                  </div> -->

              </div>
                <!---cart--->

    </div>
  </main>
  <!-- page-content" -->
  <?php $this->load->view('Faculty/common/footer');?>