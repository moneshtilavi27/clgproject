<?php $this->load->view('Admin/common/sidebar'); ?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">Notification</h2><a href="#" class="align-left"><i
                    class="fa fa-power-off fa-2x"></i></a>
        </div>
    </div>
</div>



<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if(validation_errors()){?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <button id="alertclose" type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo validation_errors(); ?>
                </div><?php }?>
                <?php echo form_open_multipart('Admin/notification'); ?>
                <div class="row">
                    <div class="group-form col-md-10">
                        <label class="form_label" for="company_name">NOTIFICATION</label>
                        <textarea class="form-control form-control-sm" rows="2" name="notification"
                            placeholder=""></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="group-form-btn col-md-3">
                        <button onclick="return verify(this);" type="button" class="btn btn-sm btn-info col-md-12"
                            name="facultysubmit">ADD</button>
                    </div>
                    <div class="group-form-btn col-md-3">
                        <button onclick="return verify(this);" type="button" class="btn btn-sm btn-danger col-md-12"
                            name="facultysubmit">REFRESH</button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
            <div class="col-md-12">
                <!-- table -->
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped" id="example">
                        <thead>
                            <tr>
                                <th style="width:10%;">S.L</th>
                                <th style="width:80%;">Notification</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $i=1;
                    foreach ($faculty->result() as $row)
                { ?>
                        <tr>
                            <td><?php echo $row->notiId;?></td>
                            <td><?php echo $row->msg;?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success m-1" title="view"> <i class="fa fa-save"
                                        aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-sm btn-danger m-1" title="Delete"><i class="fa fa-ban"
                                        aria-hidden="true" title="Delete"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
</main>
<!-- page-content" -->
<?php $this->load->view('Admin/common/footer');?>