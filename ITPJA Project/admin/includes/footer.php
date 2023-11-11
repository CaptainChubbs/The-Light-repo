<?php  
require_once __DIR__ ."/../functions/charts_calc.php";
?>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                    <script src="./js/index.js"></script>


                    <script>
                                            // Datatable
                    new DataTable('#inquiries-Data', {
                    scrollX: true,
                    scrollY: true,
                    responsive: false,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                        paginate: {
                            first: "First",
                            last: "Last",
                            next: "Next",
                            previous: "Prev"
                        },
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        infoEmpty: "Showing 0 to 0 of 0 entries",
                        lengthMenu: "Show _MENU_ entries",
                        emptyTable: "No Records Found",
                        infoFiltered: "(filtered from _MAX_ total entries)",
                        zeroRecords: "No matching records found"
                    }
                    });

                    tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });



                    window.onload = function() {
                    var barChart = new CanvasJS.Chart("nurse-distribution", {
                        animationEnabled: true,
                        theme: "light2",
                        title:{
                            text: "Nurses Per Province"
                        },
                        axisY: {
                            title: "Number"
                        },
                        data: [{
                            type: "column",
                            yValueFormatString: "#",
                            dataPoints: <?php echo json_encode($nurse_data, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    barChart.render();
                    
                    var pieChart = new CanvasJS.Chart("eventTypes", {
                        animationEnabled: true,
                        title: {
                            text: "Types of Events being Booked"
                        },

                        data: [{
                            type: "pie",
                            yValueFormatString: "#,##0.00\"%\"",
                            indexLabel: "{label} ({y})",
                            dataPoints: <?php echo json_encode($events_data, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    pieChart.render();

                    }



                    


                </script>
            </footer>