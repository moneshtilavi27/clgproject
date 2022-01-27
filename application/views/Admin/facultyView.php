<?php $this->load->view('Admin/common/sidebar'); ?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">FACULTY LIST</h2><a href="#" class="align-left"><i
                    class="fa fa-power-off fa-2x"></i></a>
        </div>
    </div>
</div>

<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container-fluid">
        <!-- table -->
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped" id="example">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                    foreach ($faculty->result() as $row)
                { ?>
                    <tr>
                        <td><?php echo $row->faculty_id;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->mobile;?></td>
                        <td><?php echo $row->email;?></td>
                        <td><?php echo $row->department;?></td>
                        <td>
                            <a href="<?php echo base_url('Admin/profile/').$row->fid; ?>" class="btn btn-sm btn-success m-1" title="view"> <i class="fa fa-eye "
                                    aria-hidden="true"></i></a>
                            <a href="<?php echo base_url('Admin/facultyUpdate/').$row->fid; ?>" class="btn btn-sm btn-info m-1" title="Update"> <i class="fas fa-edit "
                                    aria-hidden="true"></i></a>
                            <a href="#" class="btn btn-sm btn-danger m-1" title="Delete"><i class="fa fa-ban" aria-hidden="true"
                                    title="Delete"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- table -->
    </div>
</main>
<!-- page-content" -->
<?php $this->load->view('Admin/common/footer'); ?>