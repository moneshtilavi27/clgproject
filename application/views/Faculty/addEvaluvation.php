<?php $this->load->view('Faculty/common/sidebar');
$notifi = $notification->result();
?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">ADD PAPER EVALUATION WORK</h2><a href="#"
                class="align-left"><i class="fa fa-power-off fa-2x"></i></a>
        </div>
        <p class="text-left" style="color: red;">Notification <marquee direction="left"><?php echo $notifi[0]->msg; ?>
            </marquee>
        </p>
    </div>

    <!-- sidebar-wrapper  -->
    <main class="page-content1">
        <div class="container-fluid">
            <?php if(validation_errors()){?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button id="alertclose" type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo validation_errors(); ?>
            </div><?php }?>
            <?php echo form_open_multipart('Faculty/addPaperEvaluvation'); ?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="row mt-2">
                        <div class="group-form col-md-3">
                            <label class="form_label" for="company_name">Department </label>
                            <select class="form-control form-control-sm" name="department" onchange="getFilteredData();"
                                id="department">
                                <option>Select</option>
                                <option>MCA</option>
                                <option>MBA</option>
                            </select>
                        </div>
                        <div class="group-form col-md-3">
                            <label class="form_label" for="company_name">Year </label>
                            <select class="form-control form-control-sm" name="year" onchange="getFilteredData();"
                                id="year">
                                <option>Select</option>
                                <?php
                    for($i=19; $i<50; $i++)
                    {
                        $j = $i-1;?>
                                <option value='<?php echo "20".$j;?>'><?php echo "20".$j." - 20".$i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="group-form col-md-3">
                            <label class="form_label" for="company_name">Mode Of Exam </label>
                            <select class="form-control form-control-sm" onchange="getFilteredData();" name="modeOfExam"
                                id="modeOfExam">
                                <option>Select</option>
                                <option>Regular</option>
                                <option>Makeup</option>
                                <option>Fastrack</option>
                                <option>Lab-Ragular</option>
                                <option>Lab-Fastrack</option>
                            </select>
                        </div>

                        <div class="group-form col-md-3">
                            <label class="form_label" for="company_name">Role</label>
                            <select class="form-control form-control-sm" onchange="changeUI(this)" name="role">
                                <option dissabled>Choose Option</option>
                                <option value="1">Evaluation</option>
                                <option value="2">Question Paper Set And Scheme</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="group-form col-md-4">
                            <label class="form_label" for="company_name">Semister* </label>
                            <select class="form-control form-control-sm" id="semister" type="text" name="sem">
                                <option value="">Select</option>
                                <?php
                            foreach ($semister->result() as $row){?>
                                <option value="<?php echo $row->sem; ?>"><?php echo $row->sem."th Sem"; ?></option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="group-form col-md-4">
                            <label class="form_label" for="company_name">Couse* </label>
                            <select class="form-control form-control-sm" id="subject" type="text" name="subject">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="group-form col-md-4">
                            <label class="form_label" for="company_name">Course Code* </label>
                            <input class="form-control form-control-sm" id="subjectCode" type="text" name="subjectCode"
                                readonly />
                        </div>
                    </div>
                    <div>
                        <div id="questionpaper" style="display: none;">
                            <div class="row mt-2">
                                <div class="group-form col-md-4">
                                    <label class="form_label" for="mobile"> Date* </label>
                                    <input class="form-control form-control-sm" type="date" name="scriptdate" />
                                </div>


                                <div class="group-form col-md-4">
                                    <label class="form_label" for="mobile">Question Paper </label>
                                    <input type="file" id="myFile" name="qp" class="form-control form-control-sm">


                                </div>
                                <div class="group-form col-md-4">
                                    <label class="form_label" for="mobile">Scheme </label>
                                    <input type="file" id="myFile" name="scheme" class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>

                        <div id="evaluvation" style="display: none;">
                            <div class="row mt-2">
                                <div class="group-form col-md-4">
                                    <label class="form_label" for="mobile"> Date* </label>
                                    <input class="form-control form-control-sm" type="date" name="scriptdate" />
                                </div>
                                <div class="group-form col-md-4">
                                    <label class="form_label" for="mobile">Given Script </label>
                                    <input class="form-control form-control-sm" type="text" name="givenscript" />

                                </div>
                                <div class="group-form col-md-4">
                                    <label class="form_label" for="mobile">Evaluvated script </label>
                                    <input class="form-control form-control-sm" type="text" name="evaluvatedscript" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="group-form col-md-12">
                            <label class="form_label" for="company_name">Add Comment</label>
                            <textarea class="form-control form-control-sm" placeholder="note......." rows="2"
                                name="comment" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="group-form-btn col-md-4">
                            <button onclick="return verify(this);" type="button"
                                class="btn btn-sm btn-success col-md-12" name="workAdd">SUBMIT</button>
                        </div>

                        <div class="group-form-btn col-md-4">
                            <button class="btn btn-sm btn-danger col-md-12">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </main>


    <script>
    $(document).ready(function() {
        // create select option using ajax
        $('#semister').change(function() {
            var cmddata = this.value;
            $.ajax({
                url: "<?php echo base_url('Faculty/getSubjects'); ?>",
                type: "post",
                data: {
                    lid: cmddata
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#subject option').remove();
                    var id = document.getElementById("subject");
                    var option = document.createElement("option");
                    option.text = "Select";
                    id.add(option);
                    for (var i = 0; i < data.length; i++) {
                        var option = document.createElement("option");
                        option.value = data[i].sub_id;
                        option.text = data[i].subject;
                        id.add(option);
                    }
                }
            });
        });

        $('#subject').change(function() {
            var cmddata = this.value;
            $.ajax({
                url: "<?php echo base_url('Faculty/getSubjectsCode'); ?>",
                type: "post",
                data: {
                    lid: cmddata
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data[0]);
                    $('#subjectCode').val(data[0].sub_code);
                }
            });
        });
    });
    </script>