<?php $this->load->view('Admin/common/sidebar');
error_reporting(0);?>

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
            <?php echo form_open_multipart('Admin/renumaration1'); ?>
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
                                <option value="1">Evaluation</option>
                                <option value="2">Question paper & Scheme</option>
                            </select>
                        </div>
                        <div class="group-form col-md-2">
                            <br /><button type="submit" name="search"
                                class="btn btn-sm btn-primary col-md-12">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row mt-2">
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center" border="1" id="dataTableExample2">
                        <thead>
                            <tr>
                                <th style="width: 5%;">S.L</th>
                                <th style="width: 10%;">Faculty</th>
                                <th style="width: 10%;">Subject</th>
                                <th style="width: 10%;">Roll</th>
                                <th style="width: 15%;">Mode Of Exam</th>
                                <th style="width: 10%;">Rate per script</th>
                                <th style="width: 10%;">Total No. of scripts valued</th>
                                <th style="width: 15%;">Amount</th>
                                <th style="width: 15%;">Account no</th>
                                <th style="width: 15%;">Signiture</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;$tot=0;
                            foreach($remuneration->result() as $row)
                        {$i++; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->subject." ".$row->sub_code; ?></td>
                                <td><?php echo $row->rolename; ?></td>
                                <td><?php echo $row->modeOfExam; ?></td>
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
                                <td><?php echo "QP : 1";}
                        if($row->scheme!=""){$sch=($row->rate*1);
                             echo "<br/> Scheam : 1"; ?></td>
                                <?php } $totfis = $qp + $sch;}?>
                                <td><?php echo number_format($totfis,2);?> Rs</td>
                                <td><?php echo $row->bankacc; ?></td>
                            <td>-</td>
                            </tr>
                            <?php $tot+=$totfis; } ?>
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
                    $('#facultylist option').remove();
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
    <script type="text/javascript">
    function exportTableToExcel(tableID, filename = '') {
        alert('hi');
        $('.exelhead').css('display', 'block');
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById('basicinfo');
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableHTML+tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
        $('.exelhead').css('display', 'none');
    }
    </script>

    <?php $this->load->view('Admin/common/footer');?>