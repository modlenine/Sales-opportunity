<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>

    <script src="<?= base_url('assets/js/datatables/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/buttons.flash.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/jszip.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/vfs_fonts.js') ?>"></script>


    <link rel="stylesheet" href="<?= base_url('assets/') ?>datepicker/jquery.datetimepicker.min.css" type="text/css" />
</head>

<body>

    <div class="app-main__inner">
        <!-- Subcontent section -->

        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <h2 style="text-align:center;">Opportunity Report</h2>
                <hr>
                <input hidden type="text" name="check_reportpage" id="check_reportpage" value="<?= $this->uri->segment(1) ?>">
                <div class="row form-group">
                    <div class="col-md-12 form-inline">

                        <!-- <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                            <label for="datestart" class="mr-sm-2">วันที่เริ่ม</label>
                            <input name="datestart" id="datestart" type="text" class="form-control">
                        </div>
                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                            <label for="dateend" class="mr-sm-2">วันที่สิ้นสุด</label>
                            <input name="dateend" id="dateend" type="text" class="form-control">
                        </div> -->

                        <div class="input-daterange component-datepicker input-group">
                            <input type="text" id="report_datestart" name="report_datestart" class="form-control" placeholder="กรุณาเลือกวันที่เริ่มต้น">

                            <div class="input-group-prepend">
                                <div class="input-group-text">ถึง</div>
                            </div>
                            <input type="text" id="report_dateend" name="report_dateend" class="form-control" placeholder="กรุณาเลือกวันที่สิ้นสุด">

                        </div>

                        <button name="btn_datesearch" id="btn_datesearch" class="btn btn-primary m-1"><i class="fas fa-search"></i>&nbsp;&nbsp;ค้นหา</button>
                        <button name="btn_datereset" id="btn_datereset" class="btn btn-warning m-1"><i class="fas fa-sync"></i>&nbsp;&nbsp;รีเซ็ท</button>

                    </div>
                </div>
                <hr>
                <div id="showreport"></div>
            </div>
        </div>

    </div>
    <!-- Subcontent section -->


</body>

<script src="<?= base_url('assets/') ?>datepicker/jquery.datetimepicker.full.js"></script>
<script src="<?= base_url('assets/') ?>datepicker/jquery.datetimepicker.full.min.js"></script>
<script src="<?= base_url('assets/') ?>datepicker/jquery.datetimepicker.min.js"></script>

<script>
    $('#report_datestart').datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'Y-m-d',
        onShow: function(ct) {
            this.setOptions({
                maxDate: $('#report_dateend').val() ? $('#report_dateend').val() : false
            })
        }
    });


    $('#report_dateend').datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'Y-m-d',
        onShow: function(ct) {
            this.setOptions({
                minDate: $('#report_datestart').val() ? $('#report_datestart').val() : false
            })
        }
    });

</script>

</html>