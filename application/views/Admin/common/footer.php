<script>
$(document).ready(function() {
    "use strict"; // Start of use strict
    $("#dataTableExample2").DataTable({
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        buttons: [
            // {
            //         extend: 'copy',
            //         className: 'btn-sm btn-warning'
            //     },
            // {
            //     extend: 'csv',
            //     title: 'ExampleFile',
            //     className: 'btn-sm btn-success'
            // },
            {
                extend: 'excel',
                title: 'ExampleFile',
                className: 'btn-sm btn-success'
            },
            {
                extend: 'pdf',
                title: 'ExampleFile',
                className: 'btn-sm btn-secondary'
            },
            {
                extend: 'print',
                className: 'btn-sm btn-info'
            }
        ]
    });

});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>",
        "lengthMenu": [
            [-1, 10],
            ["All", 10]
        ],
        buttons: []
    });

});
</script>

<!-- footer -->
<div id="sticky-footer" class="container-fluid">
    <div class="wthree-copyright m-3">
        <p class="text-center" style="font-weight:600"> © 2020 </a></p>
    </div>
</div>

<!-- / footer -->
</div>
<!--main content end-->

</body>

</html>