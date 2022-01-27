<?php $this->load->view('Admin/common/sidebar'); ?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
            <h2 class="text-left" style="font-weight: 600">FACULTY WORK</h2><a href="#" class="align-left"><i
                    class="fa fa-power-off fa-2x"></i></a>
        </div>
    </div>
</div>

<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="group-form col-md-2">
                <label class="form_label" for="company_name">Department </label>
                <select class="form-control form-control-sm" name="department" onchange="getFilteredData();" id="department">
                    <option>Select</option>
                    <option>MCA</option>
                    <option>MBA</option>
                </select>
            </div>
            <div class="group-form col-md-2">
                <label class="form_label" for="company_name">Year </label>
                <select class="form-control form-control-sm" name="year" onchange="getFilteredData();" id="year">
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
                <label class="form_label" for="company_name">Mode Of Exam </label>
                <select class="form-control form-control-sm" onchange="getFilteredData();" name="modeOfExam" id="modeOfExam">
                    <option>Select</option>
                    <option>Regular</option>
                    <option>Makeup</option>
                    <option>Fastrack</option>
                    <option>Lab-Ragular</option>
                    <option>Lab-Fastrack</option>
                </select>
            </div>
            <div class="group-form col-md-2">
                <label class="form_label" for="company_name">Role </label>
                <select class="form-control form-control-sm" onchange="getFilteredData();" name="role" id="role">
                <option dissabled>Choose Option</option>
                    <option value="1">Evaluation</option>
                    <option value="2">Question Paper Set And Scheme</option>
                </select>
            </div>
        </div>
        <hr/>
        <!-- table -->
        <div class="table-responsive12" id="fetchData">
        </div>
        <!-- table -->
    </div>
</main>

<script>
$(document).ready(function() {
    getFilteredData();
});

    function getFilteredData()
    {
        var depart = $('#department').val();
        var year = $('#year').val();
        var modeOfExam = $('#modeOfExam').val();
        var role = $('#role').val();
        $.ajax({
            url: "<?php echo base_url('Admin/workData'); ?>",
            type: "post",
            data: {
                depart : depart,    
                year : year,
                modeOfExam : modeOfExam,
                role: role
            },
            success: function(data) {
                console.log(data);
                //$('#fetchData').load("<?php echo base_url('Admin/workData');?>");
                $('#fetchData').html(data);
            }
        });
    }
</script>