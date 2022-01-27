<?php $this->load->view('Faculty/common/sidebar');
$notifi = $notification->result(); ?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">PAPER EVALUATED</h2><a href="#" class="align-left"><i
                    class="fa fa-power-off fa-2x"></i></a>
        </div>
        <p class="text-left" style="color: red;">Notification <marquee direction="left"><?php echo $notifi[0]->msg; ?>
            </marquee>
        </p>
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
                        <th>Exam Type</th>
                        <th>Subject</th>
                        <th>Subject Code</th>
                        <th>Script Given</th>
                        <th>Script Rate</th>
                        <th>Script Evaluated</th>
                        <th>Total Amount</th>
                        <th>Comment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                    foreach ($evaluvation->result() as $row)
                { ?>
                    <tr>
                        <td><?php echo $row->fid;?></td>
                        <td><?php echo $row->typeExam;?></td>
                        <td><?php echo $row->subject;?></td>
                        <td><?php echo $row->subcode;?></td>
                        <td><?php echo $row->scriptGiven;?></td>
                        <td><?php echo $row->rate;?> Rs</td>
                        <td><?php echo $row->scriptEvalved;?></td>
                        <td><?php echo $row->rate*$row->scriptEvalved;?> Rs</td>
                        <td><?php echo $row->comment;?></td>
                        <td>
                            <?php if($row->status==0){ echo "<h5>Pending</h5>";}else{ echo "<h5>Approved</h5>";};?>
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