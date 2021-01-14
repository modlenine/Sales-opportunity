<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>

    <script>
        $(document).ready(function() {
            $('#customerslist thead th').each(function() {
                var title = $(this).text();
                $(this).html(title + ' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
            });

            var table = $('#customerslist').DataTable({
                "scrollX": true,
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo base_url('main/getcustomerlist'); ?>",
                order: [
                    [0, 'desc']
                ],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }],
                //  dom: 'Bfrtip',
                // "buttons": [
                //     {
                //         extend: 'copyHtml5',
                //         title: 'Report OT Online By Department on '
                //     },
                //     {
                //         extend: 'excelHtml5',
                //         autoFilter: true,
                //         title: 'Report OT Online By Department on '
                //     }
                // ]
            });

            table.columns().every(function() {
                var table = this;
                $('input', this.header()).on('keyup change', function() {
                    if (table.search() !== this.value) {
                        table.search(this.value).draw();
                    }
                });
            });
        });
    </script>

</head>

<body>

    <div class="app-main__inner">
        <!-- Subcontent section -->
        
        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <a href="<?=base_url('addcusvisit.html')?>" class="button button-circle button-3d button-blue"><i class="icon-tags"></i>เพิ่มข้อมูลใหม่</a>

                <div class="table-responsive">
                    <table id="customerslist" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="border-b">Cus visit no.</th>
                                <th class="border-b">Datetime</th>
                                <th class="border-b">Customer name</th>
                                <th class="border-b">Business Type</th>
                                <th class="border-b">Country</th>
                                <th class="border-b">Tel</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div><!-- Subcontent section -->



</body>

</html>