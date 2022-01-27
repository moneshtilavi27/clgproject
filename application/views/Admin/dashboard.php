<?php $this->load->view('Admin/common/sidebar'); ?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">DASHBOARD</h2><a href="#" class="align-left"><i
                    class="fa fa-power-off fa-2x"></i></a>
        </div>
    </div>



    <!-- sidebar-wrapper  -->
    <main class="page-content1">
        <div class="container-fluid">
            <div class="row">
                <div class="count_stortcut bg-success">
                    <div class="row">
                        <div class="col-md-3 ">
                            <h3 class="m-2">07</h3>
                        </div>
                        <div class="col-md-3 offset-4">
                            <i class="fas fa-teacher fa-3x m-2"></i>
                        </div>
                    </div>
                    <div class="header_msg text-center">TOTAL FACULTY</div>
                </div>

                <div class="count_stortcut bg-info">
                    <div class="row">
                        <div class="col-md-3 ">
                            <h3 class="m-2">05</h3>
                        </div>
                        <div class="col-md-3 offset-4">
                            <i class="fas fa-user-graduate fa-3x m-2"></i>
                        </div>
                    </div>
                    <div class="header_msg text-center">ENUMARATIONS REQUEST</div>
                </div>
                <div class="count_stortcut bg-warning">
                    <div class="row">
                        <div class="col-md-4 ">
                            <h3 class="m-2">03</h3>
                        </div>
                        <div class="col-md-3 offset-4">
                            <i class="fas fa-teacher fa-3x m-2"></i>
                        </div>
                    </div>
                    <div class="header_msg text-center">SCRIPTS</div>
                </div>
                <div class="count_stortcut bg-danger">
                    <div class="row">
                        <div class="col-md-3 ">
                            <h3 class="m-2">20</h3>
                        </div>
                        <div class="col-md-3 offset-4">
                            <i class="fas fa-teacher fa-3x m-2"></i>
                        </div>
                    </div>
                    <div class="header_msg text-center">QP SETS</div>
                </div>
            </div>
        </div>
        <!-- <div class="container-fluid mt-2">
            <div class="row">
                <div class="card col-md-3 m-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center m-1">
                            <i class="fas fa-chalkboard-teacher fa-4x"></i>
                        </div>
                        <h5 class="text-center">ITEM MASTER</h5>
                        <div class="d-flex justify-content-center">
                            <a href=""
                                class="view btn btn-sm custom-btn col-md-6 ">View</a>
                        </div>
                    </div>
                </div>-->

              

       
        <div class="container-fluid">
            <div class="row">
                <img src="<?php echo base_url('assets/images/kls.jpg');?>" class="img-fluid" />
            </div>
        </div>
    </main>
    <!-- page-content" -->
    <?php $this->load->view('Admin/common/footer'); ?>