<?php $this->load->view('Faculty/common/sidebar');
$row = $profile->result();
$notifi = $notification->result();
 ?>
   <div class="page-content container-fluid">
          <div class="footer">
            <div class="d-flex justify-content-between">
                 <h2 class="text-left" style="font-weight: 600">PROFILE</h2><a href="#" class="align-left"><i class="fa fa-power-off fa-2x"></i></a>
            </div>
            <p class="text-left" style="color: red;">Notification <marquee direction="left"><?php echo $notifi[0]->msg; ?>
            </marquee>
        </p>
        </div>
</div>
<!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-2 col-6">
                        <img src="<?php echo $row[0]->fimage;?>" class="img-rounded profile-img img-fluid" alt="img" />
                </div>
                <div class="col-md-10 ">
                <div class="offset-md-11"><a href="<?php echo base_url('Admin/facultyUpdate/').$row[0]->fid; ?>"" class="btn btn-info btn-sm">Update</a></div>
                    <div class="table-responsive mt-2 desctop-view">
                        <table class="table table-bordered table-striped" id="">
                            <tbody>
                                <tr>
                                    <th>Id Number: <?php echo $row[0]->faculty_id;?></th>
                                    <th>Name: <?php echo $row[0]->name;?></th>
                                </tr>
                                <tr>
                                <th>Mobile Number: <?php echo $row[0]->mobile;?></th>
                                    <th>Email: <?php echo $row[0]->email;?></th>
                                </tr>
                                <tr>
                                    <th colspan="2">Address: <?php echo $row[0]->address;?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-3 desctop-view">
                        <h5>Bank Details</h5>
                        <table class="table table-bordered table-striped" id="">
                            <tbody>
                                <tr>
                                    <th>Bank Name: <?php echo $row[0]->bankname;?></th>
                                    <th>Branch Name: <?php echo $row[0]->bankbranch;?></th>
                                </tr>
                                <tr>
                                    <th>Account Number: <?php echo $row[0]->bankacc;?></th>
                                    <th>IFSC Code: <?php echo $row[0]->bankifsc;?></th>
                                </tr>
                            </tbody>
                        </table>
                     </div>
            <!-- mobile view -->
            <div class="table-responsive mt-2 ">
                        <table class="mobile-view" id="profile-table">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                   <td><?php echo $row[0]->me_f_name." ".$row[0]->me_l_name;?></td>
                                   <th>Email:</th>
                                   <td><?php echo $row[0]->email;?></td>
                                </tr>
                                <tr>
                                    <th>Mobile Number:</th>
                                   <td><?php echo $row[0]->mob;?></td>
                                   <th>City:</th>
                                   <td><?php echo $row[0]->city;?></td>
                                </tr>
                                <tr>
                                   <th>Address</th>
                                   <td colspan="3"><?php echo $row[0]->address;?></td>
                                </tr>
                                <tr>
                                    <th>Bank Name:</th>
                                   <td><?php echo $row[0]->bank;?></td>
                                   <th>Branch Name:</th>
                                   <td><?php echo $row[0]->b_branch;?></td>
                                </tr>
                                <tr>
                                   <th>Acc No:</th>
                                   <td><?php echo $row[0]->acc;?></td>
                                   <th>IFSC code:</th>
                                   <td><?php echo $row[0]->ifsc;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
             <!-- mobile view -->
             <div class="table-responsive mt-3">
                <h5>Documents</h5></br>
                <div class="row ">
                    <div class="col-md-4 p-4" style="background-color:#efefef;">
                        <h6 class="text-center">Adhar Card<h6>
                        <img src="<?php echo $row[0]->adhar;?>" class="img-rounded document-img img-fluid" alt="img">
                    </div>   
                    <div class="col-md-4 p-4" style="background-color:#efefef;">
                        <h6 class="text-center">Bank Passbook<h6>
                        <img src="<?php echo $row[0]->bank_doc;?>" class="img-rounded document-img img-fluid" alt="img">
                    </div>   
                    <div class="col-md-4 p-4" style="background-color:#efefef;">
                        <h6 class="text-center">Pan Card<h6>
                        <img src="<?php echo $row[0]->pan;?>" class="img-rounded document-img img-fluid" alt="img">
                    </div>  
                </div>
                </div>
            
                <div class="table-responsive mt-3">
                    <h5>Login Information</h5>
                    <table class="table table-bordered table-striped desctop-view" id="">
                        <tbody>
                            <tr>
                            <th>Username : <?php echo $row[0]->username;?></th>
                             <th> Password : <?php echo $row[0]->password;?></th>
                            </tr>  
                        </tbody>
                    </table>

                    <table class="mobile-view" id="profile-table">
                        <tbody>
                            <tr>
                                <th>Username:</th>
                               <td><?php echo $row[0]->username;?></td>
                            </tr>
                            <tr>
                                <th>Password:</th>
                                <td><?php echo $row[0]->password;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
         </div>
     </div>
    </main>
  <!-- page-content" -->
  <?php $this->load->view('Admin/common/footer'); ?>
