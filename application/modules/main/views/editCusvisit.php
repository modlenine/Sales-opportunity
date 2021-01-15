<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer visit report</title>

    <style>
        .dataTables_filter,
        .dataTables_length,
        .dataTables_info,
        .dataTables_paginate {
            display: none;
        }
    </style>
</head>

<body>



    <div class="app-main__inner">
        <!-- Subcontent section -->
        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <a href="<?= base_url('cusvisitview.html/').$cno ?>" class="button button-mini button-3d button-circle button-teal"><i class="icon-chevron-sign-left"></i>กลับ</a>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <div class="card-body">
                    <h2 class="" style="color:#FF9900;text-align:center;"><u>EDIT CUSTOMER VISIT REPORT</u></h2>

                    <form action="<?= base_url('savedata_cusEdit.html/').$cno ?>" method="post" class="needs-validation" novalidate autocomplete="off">

                        <div class="card-body" style="border:2px solid #000;">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Customer Name:</label>
                                        <input name="csvr_cusname" id="csvr_cusname" type="text" class="form-control" value="{csvr_cusname}">
                                        <div class="invalid-feedback">กรุณาระบุ Customer Name</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Country</label>
                                        <input name="csvr_country" id="csvr_country" type="text" class="form-control" value="{csvr_country}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Business Type:</label>
                                        <input name="csvr_business" id="csvr_business" type="text" class="form-control" value="{csvr_business}">
                                        <div class="invalid-feedback">กรุณาระบุ Business Type</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Date / Time:</label>
                                        <input name="csvr_datetime" id="csvr_datetime" type="text" class="form-control" value="{csvr_datetime}" readonly>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Contact Persons / Position:</label>
                                        <textarea name="csvr_contact" id="csvr_contact" cols="30" rows="3" class="form-control">{csvr_contact}</textarea>
                                        <div class="invalid-feedback">กรุณาระบุ Contact Persons / Position</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Salee participants:</label>
                                        <textarea name="csvr_salee" id="csvr_salee" cols="30" rows="3" class="form-control">{csvr_salee}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Tel No:</label>
                                        <input name="csvr_tel" id="csvr_tel" type="text" class="form-control" value="{csvr_tel}">
                                        <div class="invalid-feedback">กรุณาระบุ Tel No</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Fax No:</label>
                                        <input name="csvr_fax" id="csvr_fax" type="text" class="form-control" value="{csvr_fax}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Email:</label>
                                        <input name="csvr_email" id="csvr_email" type="text" class="form-control" value="{csvr_email}">

                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div style="font-size:16px;">1.Customer Information / Competitor Product Usage: ข้อมูลของลูกค้า สินค้าที่ลูกค้าใช้อยู่</div>
                        <div class="card-body">

                        <div class="col-md-12 form-group">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#addCusProUse"><i class="fas fa-plus-circle advAddDetail" data-toggle="tooltip" data-placement="left" title="เพิ่มข้อมูล"></i></a>
                                <!-- <i class="fas fa-trash-alt advDelDetail"></i> -->
                            </div>
                            
                            <div class="table-responsive">
                                <table id="cusViDetail" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Salee Products</th>
                                            <th>Q'ty(mt/year)</th>
                                            <th>Competition Products</th>
                                            <th>Q'ty(mt/year)</th>
                                            <th>Remark</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        foreach(getSubCus($cno)->result() as $rss){
                                        ?>
                                        <tr id="#erow_<?=$rss->csvrs_autoid?>">
                                            <td><?=$rss->csvrs_type?></td>
                                            <td><?=$rss->csvrs_saleeproduct?></td>
                                            <td><?=$rss->csvrs_qty1?></td>
                                            <td><?=$rss->csvrs_competition?></td>
                                            <td><?=$rss->csvrs_qty2?></td>
                                            <td><?=$rss->csvrs_remark?></td>
                                            <td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_detailss" id="<?=$rss->csvrs_autoid?>">Remove</button></td>
                                        </tr>
                                        <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><br>

                        <div style="font-size:16px;">2.Discussion : รายละเอียด หรือ บทสรุปที่คุยกับลูกค้า</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">

                                        <textarea name="csvr_discussion" id="csvr_discussion" cols="30" rows="5" class="form-control">{csvr_discussion}</textarea>
                                        <div class="invalid-feedback">กรุณาระบุ รายละเอียด หรือ บทสรุปที่คุยกับลูกค้า</div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="font-size:16px;">3.Action Plan and Follow up : สิ่งที่ต้องทำต่อ และ กำหนดติดตามงาน</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">

                                        <textarea name="csvr_action" id="csvr_action" cols="30" rows="5" class="form-control">{csvr_action}</textarea>
                                        <div class="invalid-feedback">กรุณาระบุ สิ่งที่ต้องทำต่อ และ กำหนดติดตามงาน</div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="btnEditCusvisit" name="btnEditCusvisit" class="mt-2 btn btn-primary">บันทึกข้อมูล</button>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $('#cusViDetailV').DataTable({
                                "columnDefs": [{
                                        targets: "_all",
                                        orderable: false
                                    }, {
                                        "width": "5%",
                                        "targets": 0
                                    },
                                    {
                                        "width": "25%",
                                        "targets": 1
                                    },
                                    {
                                        "width": "8%",
                                        "targets": 2
                                    },
                                    {
                                        "width": "25%",
                                        "targets": 3
                                    },
                                    {
                                        "width": "8%",
                                        "targets": 4
                                    },
                                    {
                                        "width": "8%",
                                        "targets": 5
                                    },
                                    {
                                        "width": "8%",
                                        "targets": 6
                                    }
                                ]
                            });


                            // assuming the controls you want to attach the plugin to
                            // have the "datepicker" class set
                            $('#csvr_datetime.datepicker').Zebra_DatePicker({
                                format: 'Y-m-d H:i'
                            });



                            // Function เพิ่มข้อมูลจาก Modal ลง Table
                            var count = 0;
                            $(document).on('click', '#btnAddCusUse', function() {
                                $('.dataTables_empty').remove();

                                var csv_type = $('#csv_type').val();
                                var csv_saleeproduct = $('#csv_saleeproduct').val();
                                var csv_qty1 = $('#csv_qty1').val();
                                var csv_competition = $('#csv_competition').val();
                                var csv_qty2 = $('#csv_qty2').val();
                                var csv_remark = $('#csv_remark').val();

                                count = count + 1;
                                output = '<tr id="row_' + count + '">';

                                output += '<td>' + csv_type + ' <input type="hidden" name="csvrs_type[]" id="csvrs_type' + count + '" class="first_name" value="' + csv_type + '" /></td>';

                                output += '<td>' + csv_saleeproduct + ' <input type="hidden" name="csvrs_saleeproduct[]" id="csvrs_saleeproduct' + count + '" value="' + csv_saleeproduct + '" /></td>';

                                output += '<td>' + csv_qty1 + ' <input type="hidden" name="csvrs_qty1[]" id="csvrs_qty1' + count + '" value="' + csv_qty1 + '" /></td>';

                                output += '<td>' + csv_competition + ' <input type="hidden" name="csvrs_competition[]" id="csvrs_competition' + count + '" value="' + csv_competition + '" /></td>';

                                output += '<td class="price">' + csv_qty2 + ' <input type="hidden" name="csvrs_qty2[]" id="csvrs_qty2' + count + '" value="' + csv_qty2 + '" /></td>';

                                output += '<td class="price">' + csv_remark + ' <input type="hidden" name="csvrs_remark[]" id="csvrs_remark' + count + '" value="' + csv_remark + '" /></td>';

                                output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="' + count + '">Remove</button></td>';
                                output += '</tr>';

                                $('#cusViDetail tbody').append(output);


                                $('#csv_type').val('');
                                $('#csv_saleeproduct').val('');
                                $('#csv_qty1').val('');
                                $('#csv_competition').val('');
                                $('#csv_qty2').val('');
                                $('#csv_remark').val('');


                            });

                            // Function เพิ่มข้อมูลจาก Modal ลง Table




                            $(document).on('click', '.remove_detailss', function() {
                                var row_id = $(this).attr("id");
                                if (confirm("คุณต้องการลบรายชื่อนี้ออกจากรายการใช่หรือไม่ ?")) {
                                    
                                    deleteCusinform(row_id);

                                } else {
                                    return false;
                                }
                            });

                            $(document).on('click', '.remove_details', function() {
                                var row_id = $(this).attr("id");
                                if (confirm("คุณต้องการลบรายชื่อนี้ออกจากรายการใช่หรือไม่ ?")) {
                                    $('#row_' + row_id + '').remove();

                                } else {
                                    return false;
                                }
                            });




                        });



                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        // (function() {
                        //     'use strict';
                        //     window.addEventListener('load', function() {
                        //         // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        //         var forms = document.getElementsByClassName('needs-validation');
                        //         // Loop over them and prevent submission
                        //         var validation = Array.prototype.filter.call(forms, function(form) {
                        //             form.addEventListener('submit', function(event) {
                        //                 if (form.checkValidity() === false) {
                        //                     event.preventDefault();
                        //                     event.stopPropagation();
                        //                 }
                        //                 form.classList.add('was-validated');
                        //             }, false);
                        //         });
                        //     }, false);
                        // })();
                    </script>
                </div>
            </div>
        </div>

    </div><!-- Subcontent section -->


</body>

</html>