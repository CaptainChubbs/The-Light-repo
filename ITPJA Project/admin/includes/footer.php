

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ],
                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
                    });



                    // Bar Chart 
                    var ctx = document.getElementById("bar-chart");
                    var myPieChart = new Chart(ctx, {

                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        labels: ["Gauteng", "Kwazulu-Natal", "Eastern Cape", "Northern Cape", "Western Cape", "Limpopo", "Mpumalanga", "North West", "Free State"],
                        datasets: [{
                        label: "Nurses Per Province",
                        data: [ <?php $Gauteng; ?> , 15.58, 11.25, 8.32 , 10.12, 9.54, 7.61, 8.32, 7.61],
                        backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                        }],
                    },
                    });

                    // Pie Chart Example
                    var ctx = document.getElementById("pie-chart");
                    var myPieChart = new Chart(ctx, {
                    //The type of chart to create. In this case, a pie chart.
                    type: 'pie',

                    //The data for the nurse dataset
                    data: {
                        labels: ["Wellness", "At-Home Care", "Wound Care", "Elderly Care"],
                        datasets: [{
                        data: [12.21, 15.58, 11.25, 8.32],
                        backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
                        }],
                    },
                    });





                    


                </script>
            </footer>