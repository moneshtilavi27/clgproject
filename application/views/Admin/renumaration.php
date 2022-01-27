<?php $this->load->view('Admin/common/sidebar');?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">ADD PAPER EVALUVATION WORK</h2><a href="#"
                class="align-left"><i class="fa fa-power-off fa-2x"></i></a>
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
            <?php echo form_open_multipart('Admin/renumaration'); ?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="row mt-2">
                        <div class="group-form col-md-2">
                            <label class="form_label" for="company_name">Department</label>
                            <select class="form-control form-control-sm" name="department" id="depart">
                                <option>Select</option>
                                <option>MCA</option>
                                <option>MBA</option>
                                <option>BE</option>
                            </select>
                        </div>
                        <div class="group-form col-md-3">
                            <label class="form_label" for="company_name">facultylist</label>
                            <select class="form-control form-control-sm" name="facultylist" id="facultylist">
                            </select>
                        </div>
                        <div class="group-form col-md-2">
                            <label class="form_label" for="company_name">Year </label>
                            <select class="form-control form-control-sm" name="year" id="year">
                                <option>Select</option>
                                <?php
                                for($i=19; $i<50; $i++)
                                {
                                    $j = $i-1;?>
                                <option value='<?php echo "20".$j;?>'><?php echo "20".$j." - 20".$i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="group-form col-md-2">
                            <label class="form_label" for="company_name">Role</label>
                            <select class="form-control form-control-sm" size="3" name="role[]" multiple>
                                <option>Evaluation</option>
                                <option>Question paper set</option>
                                <option>Scheme</option>
                            </select>
                        </div>
                        <div class="group-form col-md-2">
                            <br /><button type="submit" name="search"
                                class="btn btn-sm btn-primary col-md-12">Search</button>
                        </div>
                        <div class="group-form col-md-2">
                            <br /><button type="button" name="search"
                                class="btn btn-sm btn-warning col-md-12"><i class="fas fa-download" onclick=""></i> Download</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <?php echo form_close();
            $data = $remuneration->result()
             ?>
                <table class="table table-sm table-bordered col-md-5">
                    <tbody>
                    <tr>
                        <th style="width:40%;">Faculty Id : </th>
                        <th> <?php echo $data[0]->faculty_id; ?></th>
                    </tr>
                    <tr>
                        <th style="width:40%;">Faculty Name : </th>
                        <th> <?php echo $data[0]->name; ?></th>
                    </tr>
                    <tr>
                        <th style="width:40%;">Department : </th>
                        <th> <?php echo $data[0]->department; ?></th>
                    </tr>
                    </tbody>
                </table><hr/>
            <div class="row mt-2">
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center" id="example">
                        <thead>
                            <tr>
                                <th style="width: 5%;">S.L</th>
                                <th style="width: 10%;">Roll</th>
                                <th style="width: 15%;">Mode Of Exam</th>
                                <th style="width: 15%;">Subject</th>
                                <th style="width: 15%;">Subject code</th>
                                <th style="width: 10%;">Scripts</th>
                                <th style="width: 10%;">Insentive</th>
                                <th style="width: 15%;">Total Incentive</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;
                            foreach ($remuneration->result() as $row)
                        {$i++; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->rolename; ?></td>
                                <td><?php echo $row->modeOfExam; ?></td>
                                <td><?php echo $row->subject; ?></td>
                                <td><?php echo $row->sub_code; ?></td>
                                <td><?php echo $row->evaluvated_script; ?></td>
                                <td><?php echo $row->rate; ?></td>
                                <td><?php echo $row->evaluvated_script*$row->rate; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
    $(document).ready(function() {
        // create select option using ajax
        $('#depart').change(function() {
            var cmddata = this.value;
            $.ajax({
                url: "<?php echo base_url('Admin/getFacultyList'); ?>",
                type: "post",
                data: {
                    depart: cmddata
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#subject option').remove();
                    var id = document.getElementById("facultylist");
                    var option = document.createElement("option");
                    option.text = "Select";
                    id.add(option);
                    for (var i = 0; i < data.length; i++) {
                        var option = document.createElement("option");
                        option.value = data[i].fid;
                        option.text = data[i].name + " ( " + data[i].faculty_id + " )";
                        id.add(option);
                    }
                }
            });
        });
    });
    </script>

    <?php $this->load->view('Admin/common/footer');?>