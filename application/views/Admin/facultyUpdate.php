<?php $this->load->view('Admin/common/sidebar');
$row = $profile->result(); ?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">FACULTY UPDATE</h2><a href="#" class="align-left"><i
                    class="fa fa-power-off fa-2x"></i></a>
        </div>
    </div>

    <!-- sidebar-wrapper  -->
    <main class="page-content1">
        <div class="container-fluid">
            <?php echo form_open_multipart('Admin/FacultyUpdate'); ?>
            <div class="row mt-3">
                <div class="col-md-2 col-6">
                    <img id="profimg" src="<?php echo $row[0]->fimage; ?>"
                        class="img-rounded profile-img img-fluid pointer border border-1 " alt="img"
                        onclick="image_select('#profile_upload');" title="Upload Image" />
                    <input id="profile_upload" type="file" name="profile" style="display:none;"
                        onchange="Filevalidation(this,'#profimg');" />
                    <h5 class="text-center">Upload</h5>
                </div>
                <div class="col-md-10 ">
                    <div class="row mt-2">
                        <div class="group-form col-md-5">
                            <label class="form_label" for="company_name">ID Number* </label>
                            <input class="form-control form-control-sm" readonly type="text" value="<?php echo $row[0]->faculty_id; ?>"/>
                        </div>

                        <div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Name* </label>
                            <input class="form-control form-control-sm" type="text" value="<?php echo $row[0]->name; ?>"
                                name="me_f_name" />
                            <input class="form-control form-control-sm" type="hidden"
                                value="<?php echo $row[0]->fid; ?>" name="me_id" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="group-form col-md-5">
                            <label class="form_label" for="mobile">Mobile Number * </label>
                            <input class="form-control form-control-sm" maxlength="10"
                                onkeypress="return isNumberKey(event)" id="mobile"
                                value="<?php echo $row[0]->mobile; ?>" type="text" name="mob" />
                        </div>
                        <div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Email </label>
                            <input class="form-control form-control-sm" type="email"
                                value="<?php echo $row[0]->email; ?>" name="email" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="group-form col-md-11">
                            <label class="form_label" for="company_name">Address</label>
                            <textarea class="form-control form-control-sm" rows="4" name="address"
                                placeholder=""><?php echo $row[0]->address; ?></textarea>
                        </div>
                    </div>
                    <hr />
                    <h5 class="text-left">Bank Details</h5>
                    <div class="row mt-2">

                        <div class="group-form col-md-3">
                            <label class="form_label" for="company_name">Bank Name* </label>
                            <input class="form-control form-control-sm" value="<?php echo $row[0]->bankname; ?>"
                                type="text" name="bank" />
                        </div>

                        <div class="group-form col-md-3">
                            <label class="form_label" for="lastname">Branch Name * </label>
                            <input class="form-control form-control-sm" id="lastname"
                                value="<?php echo $row[0]->bankbranch; ?>" type="text" name="b_branch" />
                        </div>
                        <div class="group-form col-md-3">
                            <label class="form_label" for="mobile">Account Number * </label>
                            <input class="form-control form-control-sm" onkeypress="return isNumberKey(event)"
                                id="mobile" value="<?php echo $row[0]->bankacc; ?>" type="text" name="acc" />
                        </div>
                        <div class="group-form col-md-3">
                            <label class="form_label" for="company_name">IFSC Code</label>
                            <input class="form-control form-control-sm" type="text"
                                value="<?php echo $row[0]->bankifsc; ?>" name="ifsc" />
                        </div>
                    </div>
                    <hr /><br />
                    <h5 class="text-left">Documents</h5>
                    <div class="row ">
                        <div class="col-md-4 p-4" style="background-color:#efefef;">
                            <h6 class="text-center">Adhar Card<h6>
                                    <img id="adhar" src="<?php echo $row[0]->adhar; ?>"
                                        class="img-rounded document-img img-fluid" alt="img"
                                        onclick="image_select('#adhar_upload');" title="Upload Adhar Card">
                                    <input id="adhar_upload" type="file" class="form-control form-control-sm"
                                        type="text" name="adhar" onchange="Filevalidation(this,'#adhar');"
                                        style="display: none;" />

                        </div>
                        <div class="col-md-4 p-4" style="background-color:#efefef;">
                            <h6 class="text-center">Bank Passbook<h6>
                                    <img id="bank_doc" src="<?php echo $row[0]->bank_doc; ?>"
                                        class="img-rounded document-img img-fluid" alt="img"
                                        onclick="image_select('#doc_upload');" title="Upload Bank Document Card">
                                    <input id="doc_upload" type="file" class="form-control form-control-sm" type="text"
                                        name="bank_doc" onchange="Filevalidation(this,'#bank_doc');"
                                        style="display: none;" />
                        </div>
                        <div class="col-md-4 p-4" style="background-color:#efefef;">
                            <h6 class="text-center">Pan Card<h6>
                                    <img id="pancard" src="<?php echo $row[0]->pan; ?>"
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
                            <input class="form-control form-control-sm" value="<?php echo $row[0]->username; ?>"
                                type="text" name="username" readonly />
                        </div>

                        <div class="group-form col-md-3">
                            <label class="form_label" for="lastname">Password * </label>
                            <input class="form-control form-control-sm" value="<?php echo $row[0]->password; ?>"
                                id="lastname" type="text" name="password" />
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="group-form-btn col-md-3">
                            <button type="submit" name="me_update" class="btn btn-sm btn-info col-md-12">UPDATE</button>
                        </div>

                        <div class="group-form-btn col-md-3">
                            <button class="btn btn-sm btn-danger col-md-12">CANCEL</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
    </main>
    <!-- page-content" -->

    <script>
    $(document).ready(function() {
        let route = $('#route').val();
        $('#city').val(route);
    });
    </script>
    <?php $this->load->view('Admin/common/footer'); ?>