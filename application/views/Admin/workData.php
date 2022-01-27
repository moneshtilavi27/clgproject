
<table class="table table-bordered table-striped" id="dataTableExample2">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Exam Type</th>
                        <th>Subject</th>
                        <th>Subject Code</th>
                        <th>Script Given</th>
                        <th>Script Rate</th>
                        <th>Script Evaluated</th>
                        <!-- <th>Total Amount</th>
                        <th>Comment</th>
                        <th>Status</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                    foreach ($evaluvation->result() as $row)
                { ?>
                    <tr>
                        <td><?php echo $row->fid;?></td>
                        <td><?php echo $row->modeOfExam;?></td>
                        <td><?php echo $row->subject;?></td>
                        <td><?php echo $row->given_script;?></td>
                        <td><?php echo $row->evaluvated_script;?></td>
                        <td><?php echo $row->add_comment;?></td>
                        <td>
                            <?php if(0==0){?>
                            <a href='<?php echo base_url('Admin/approveWork/').$row->fid; ?>'
                                class='btn-sm btn-success' title='Approval'><i class="fas fa-check"></i></a>
                            <a href='<?php echo base_url('Admin/rejectWork/').$row->fid; ?>' class='btn-sm btn-danger'
                                title='Reject'><i class="fas fa-times"></i></a>
                            <?php } else{ echo "<h5>Approved</h5>";}?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

<!-- page-content" -->
<?php $this->load->view('Admin/common/footer'); ?>