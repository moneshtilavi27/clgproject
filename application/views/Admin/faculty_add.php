<?php $this->load->view('admin/common/sidebar'); ?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">ADD FACULTY</h2><a href="#" class="align-left"><i
                    class="fa fa-power-off fa-2x"></i></a>
        </div>
    </div>

    <!-- sidebar-wrapper  -->
    <main class="page-content1">
        <div class="container-fluid">
            <?php if(validation_errors()){?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button id="alertclose" type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo validation_errors(); ?>
            </div><?php }?>
            <?php echo form_open_multipart('Admin/insertFaculty'); ?>
            <div class="row mt-3">
                <div class="col-md-2 col-6">
                    <img id="profimg" src="<?php echo base_url('assets/image/profile.svg'); ?>"
                        class="img-rounded profile-img img-fluid pointer border border-1 " alt="img"
                        onclick="image_select('#profile_upload');" title="Upload Image" />
                    <input id="profile_upload" type="file" name="profile" style="display:none;"
                        onchange="Filevalidation(this,'#profimg');" />
                    <h5 class="text-center">Upload</h5>
                </div>
                <div class="col-md-10 ">
                    <div class="row mt-2">
                        <div class="group-form col-md-3">
                            <label class="form_label" for="company_name">Id Number* </label>
                            <input class="form-control form-control-sm" onkeypress="return isNumberKey(event)" type="text" name="facultyId" required/>
                        </div>
                    </div>
                  
                    <div class="row mt-2">
                        <div class="group-form col-md-6">
                            <label class="form_label" for="company_name">First Name* </label>
                            <input class="form-control form-control-sm" type="text" name="fname" />
                        </div>
                        <div class="group-form col-md-6">
                            <label class="form_label" for="lastname">Last Name * </label>
                            <input class="form-control form-control-sm" id="lastname" type="text" name="lname" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="group-form col-md-6">
                            <label class="form_label" for="mobile">Mobile Number * </label>
                            <input class="form-control form-control-sm" maxlength="10"
                                onkeypress="return isNumberKey(event)" id="mobile" type="text" name="mob" />
                        </div>
                        <div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Email </label>
                            <input class="form-control form-control-sm" type="email" name="email" />
                        </div>
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name">Address</label>
                        <textarea class="form-control form-control-sm" rows="4" name="address"
                            placeholder=""></textarea>
                    </div>
                <hr />
                <h5 class="text-left">Departent Details</h5>
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Department* </label>
                        <select class="form-control form-control-sm" type="text" name="department">
                            <option>MCA</option>
                            <option>MBA</option>
                            <option>Eng</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Full Time </label>
                       <input type="radio" name="worktime">
                    </div>
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Part Time </label>
                       <input type="radio" name="worktime">
                    </div>
                </div>
                <hr />
                <h5 class="text-left">Bank Details</h5>
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Bank Name* </label>
                        <input class="form-control form-control-sm" type="text" name="bank" />
                    </div>

                    <div class="group-form col-md-3">
                        <label class="form_label" for="lastname">Branch Name * </label>
                        <input class="form-control form-control-sm" id="lastname" type="text" name="b_branch" />
                    </div>
                    <div class="group-form col-md-3">
                        <label class="form_label" for="mobile">Account Number * </label>
                        <input class="form-control form-control-sm" onkeypress="return isNumberKey(event)" id="mobile"
                            type="text" name="acc" />
                    </div>
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">IFSC Code</label>
                        <input class="form-control form-control-sm" type="text" name="ifsc" />
                    </div>
                </div>
                <hr /><br />
                <h5 class="text-left">Documents</h5>
                <div class="row document">
                    <div class="col-md-4 p-4" style="background-color:#efefef;">
                        <h6 class="text-center">Adhar Card<h6>
                                <img id="adhar" src="<?php echo base_url('assets/image/aadhar.jpg'); ?>"
                                    class="img-rounded document-img img-fluid" alt="img"
                                    onclick="image_select('#adhar_upload');" title="Upload Adhar Card">
                                <input id="adhar_upload" type="file" class="form-control form-control-sm" type="text"
                                    name="adhar" onchange="Filevalidation(this,'#adhar');" style="display: none;" />
                    </div>
                    <div class="col-md-4 p-4" style="background-color:#efefef;">
                        <h6 class="text-center">Bank Passbook<h6>
                                <img id="bank_doc" src="<?php echo base_url('assets/image/passbook.jpg'); ?>"
                                    class="img-rounded document-img img-fluid" alt="img"
                                    onclick="image_select('#doc_upload');" title="Upload Document Card">
                                <input id="doc_upload" type="file" class="form-control form-control-sm" type="text"
                                    name="bank_doc" onchange="Filevalidation(this,'#bank_doc');"
                                    style="display: none;" />
                    </div>
                    <div class="col-md-4 p-4" style="background-color:#efefef;">
                        <h6 class="text-center">Pan Card<h6>
                                <img id="pancard" src="<?php echo base_url('assets/image/pan_card.jpg'); ?>"
                                    class="img-rounded document-img img-fluid" alt="img"
                                    onclick="image_select('#pan_upload');" title="Upload Pan Card">
                                <input id="pan_upload" type="file" class="form-control form-control-sm" type="text"
                                    name="pan" onchange="Filevalidation(this,'#pancard');" style="display: none;" />
                    </div>
                </div>
                <hr /></br>
                <h5 class="text-left">Login Information</h5>
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Username* </label>
                        <input class="form-control form-control-sm" type="text" name="username" />
                    </div>

                    <div class="group-form col-md-3">
                        <label class="form_label" for="lastname">Password * </label>
                        <input class="form-control form-control-sm" id="lastname" type="text" name="password" />
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="group-form-btn col-md-3">
                        <button onclick="return verify(this);" type="button" class="btn btn-sm btn-success col-md-12"
                            name="facultysubmit">SUBMIT</button>
                    </div>

                    <div class="group-form-btn col-md-3">
                        <button class="btn btn-sm btn-danger col-md-12">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </main>
    <!-- page-content" -->
    <script type="text/javascript">
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 2000);
    $(document).ready(function() {
        $('#alertclose').click(function() {
            $('.alert').fadeOut();
        });
    });
    </script>
    <?php $this->load->view('Admin/common/footer'); ?>