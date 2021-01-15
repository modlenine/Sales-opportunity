

// Function Comma
function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
// Function Comma





// Function save comment to database

function saveComment() {
    $.ajax({
        url: "/intsys/sop/savecomment.html",
        method: "POST",
        data: $('#saveComment').serialize(),
        success: function (data) {
            console.log(data);
            window.location.reload();
        }
    });
}
// Function save comment to database




// Function save project to database
function saveProject() {
    $.ajax({
        url: "/intsys/sop/savedata.html",
        method: "POST",
        data: $('#saveProjectForm').serialize(),
        beforeSend: function () {

        },
        success: function (data) {
            console.log(data);
            window.location.reload();
        }
    });
}



// Report Zone Report Zone Report Zone
// Report Zone Report Zone Report Zone
// Report Zone Report Zone Report Zone
function load_report() {

    $.ajax({
        url: "/intsys/sop/main/reportlist/",
        method: "POST",
        data: {

        },
        beforeSend: function () {
            $('#showreport').html('<div class="text-center"><div class="spinner-border" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function (data) {
            $('#showreport').html(data);

            $('#report thead th').each(function () {
                var title = $(this).text();
                $(this).html(title + ' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
            });

            var tt = $('#report').DataTable({
                "columnDefs": [{
                    "searching": false,
                    "orderable": false,
                    "targets": "_all"
                }
                ],
                "order": [
                    [1, 'desc']
                ],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    messageTop: '',
                    title: 'Opportunity Report'
                },
                {
                    extend: 'print',
                    messageTop: '',
                    title: 'Opportunity Report'
                }
                ]
            });



            tt.on('order.dt search.dt', function () {
                tt.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            tt.columns().every(function () {
                var table = this;
                $('input', this.header()).on('keyup change', function () {
                    if (table.search() !== this.value) {
                        table.search(this.value).draw();
                    }
                });
            });

        }

    });

}



function load_reportDate(date_start, date_end) {

    $.ajax({
        url: "/intsys/sop/main/reportlistDate",
        method: "POST",
        data: {
            date_start: date_start,
            date_end: date_end
        },
        beforeSend: function () {
            $('#showreport').html('<div class="text-center"><div class="spinner-border" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function (data) {
            $('#showreport').html(data);
            console.log(data);

            $('#report thead th').each(function () {
                var title = $(this).text();
                $(this).html(title + ' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
            });

            var tt = $('#report').DataTable({
                "columnDefs": [{
                    "searching": false,
                    "orderable": false,
                    "targets": "_all"
                }],
                "order": [
                    [1, 'desc']
                ],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    messageTop: '',
                    title: 'Opportunity Report'
                },
                {
                    extend: 'print',
                    messageTop: '',
                    title: 'Opportunity Report'
                }
                ]
            });



            tt.on('order.dt search.dt', function () {
                tt.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            tt.columns().every(function () {
                var table = this;
                $('input', this.header()).on('keyup change', function () {
                    if (table.search() !== this.value) {
                        table.search(this.value).draw();
                    }
                });
            });

        }

    });

}
// Report Zone Report Zone Report Zone
// Report Zone Report Zone Report Zone
// Report Zone Report Zone Report Zone





// Customer Zone  Customer Zone  Customer Zone 
// Customer Zone  Customer Zone  Customer Zone 
// Customer Zone  Customer Zone  Customer Zone 

function deleteCusinform(rowid)
{
    $.ajax({
        url:"/intsys/sop/main/deleteCusinform",
        method:"post",
        data:{
            rowid: rowid
        },
        success:function(data){
            console.log();
            window.location.reload();
        }
    });
}


// Customer Zone  Customer Zone  Customer Zone 
// Customer Zone  Customer Zone  Customer Zone 
// Customer Zone  Customer Zone  Customer Zone 