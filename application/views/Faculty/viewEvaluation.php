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
                        <th>Year</th>
                        <th>Mode Of Exam</th>
                        <th>Course</th>
                        <th>Role</th>
                        <th>Script Rate</th>
                        <th>Total Work</th>
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
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row->year;?></td>
                        <td><?php echo $row->modeOfExam;?></td>
                        <td><?php echo $row->subject."(.".$row->sub_code.")";?></td>
                        <td><?php echo $row->rolename;?></td>
                        <?php if($row->rolename=="Evaluation"){?>
                        <td><?php echo $row->rate;?> Rs</td>
                        <?php }elseif($row->rolename=="Question Paper Set And Scheme"){?>
                        <td><?php echo "QP Rate :".$row->rate."\n Scheam Rate :".$row->rate;?> Rs</td>
                        <?php } if($row->rolename=="Evaluation"){?>
                        <td><?php echo $row->evaluvated_script;
                                 $totfis = $row->rate * $row->evaluvated_script;?>
                        </td>
                        <?php }elseif($row->rolename=="Question Paper Set And Scheme"){
                            if($row->question_paper!=""){ $qp=($row->rate*1);?>
                        <td><?php echo "QP Rate :".$qp;}
                        if($row->scheme!=""){$sch=($row->rate*1);
                             echo "\n Scheam Rate :".$sch; ?></td>
                        <?php } $totfis = $qp + $sch;}?>
                        <td><?php echo $totfis;?> Rs</td>
                        <td><?php echo $row->add_comment;?></td>
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