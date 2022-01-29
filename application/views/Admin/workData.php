
<table class="table table-bordered table-striped" id="dataTableExample2">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Exam Type</th>
                        <th>Course</th>
                        <th>Role</th>
                        <th>Total Work</th>
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
                        <td><?php echo $row->department;?></td>
                        <td><?php echo $row->year;?></td>
                        <td><?php echo $row->modeOfExam;?></td>
                        <td><?php echo $row->subject."<br/>( ".$row->sub_code.")";?></td>
                        <td><?php echo $row->rolename;?></td>
                        <?php if($row->rolename=="Evaluation"){?>
                        <td><?php echo $row->evaluvated_script;
                                 $totfis = $row->rate * $row->evaluvated_script;?>
                        </td>
                        <?php }elseif($row->rolename=="Question Paper Set And Scheme"){
                            if($row->question_paper!=""){ $qp=($row->rate*1);?>
                        <td><?php echo "QP Rate : 1 <br/>";}
                        if($row->scheme!=""){$sch=($row->rate*1);
                             echo "\n Scheam Rate : 1"; ?></td>
                        <?php } $totfis = $qp + $sch;}?>
                        <td><?php echo $row->add_comment;?></td>
                        <td>
                            <?php if(0==0){?>
                            <a href='<?php echo base_url('Admin/approveWork/').$row->wid; ?>'
                                class='btn-sm btn-success' title='Approval'><i class="fas fa-check"></i></a>
                            <a href='<?php echo base_url('Admin/rejectWork/').$row->wid; ?>' class='btn-sm btn-danger'
                                title='Reject'><i class="fas fa-times"></i></a>
                            <?php } else{ echo "<h5>Approved</h5>";}?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

<!-- page-content" -->
<?php $this->load->view('Admin/common/footer'); ?>