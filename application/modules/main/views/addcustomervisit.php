<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer visit report</title>
</head>

<body>



    <div class="app-main__inner">
        <!-- Subcontent section -->
        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <a href="<?= base_url('projectlist.html') ?>" class="button button-mini button-3d button-circle button-teal"><i class="icon-chevron-sign-left"></i>กลับ</a>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <div class="card-body">
                    <h2 class="" style="color:#000;text-align:center;"><u>CUSTOMER VISIT REPORT</u></h2>
                    <form action="<?= base_url('savedata.html') ?>" method="post" class="needs-validation" novalidate>

                        <div class="card-body" style="border:2px solid #000;">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Customer Name:</label>
                                        <input name="m_detail" id="m_detail" placeholder="" type="text" class="form-control" required>
                                        <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Country</label>
                                        <input name="m_customer" id="m_customer" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Business Type:</label>
                                        <input name="m_detail" id="m_detail" placeholder="" type="text" class="form-control" required>
                                        <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Date / Time:</label>
                                        <input name="m_customer" id="m_customer" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Contact Persons / Position:</label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                        <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Salee participants:</label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="">Tel No:</label>
                                        <input name="m_detail" id="m_detail" placeholder="" type="text" class="form-control" required>
                                        <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label class="">Fax No:</label>
                                        <input name="m_detail" id="m_detail" placeholder="" type="text" class="form-control" required>
                                        <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>

                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div style="font-size:16px;">1.Customer Information / Competitor Product Usage: ข้อมูลของลูกค้า สินค้าที่ลูกค้าใช้อยู่</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="cusViDetail" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Salee Products</th>
                                            <th>Q'tr(mt/year)</th>
                                            <th>Cpmpetition Products</th>
                                            <th>Q'ty(mt/year)</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>

                                    <tr id="cleartb">
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                    </tr>

                                </table>
                            </div>
                        </div><br>

                        <div style="font-size:16px;">2.Discussion : รายละเอียด หรือ บทสรุปที่คุยกับลูกค้า</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">

                                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                        <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="font-size:16px;">3.Action Plan and Follow up : สิ่งที่ต้องทำต่อ และ กำหนดติดตามงาน</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">

                                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                        <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>

                                    </div>
                                </div>
                            </div>
                        </div>


















                        <button type="submit" id="btnAdd" name="btnAdd" class="mt-2 btn btn-primary">บันทึกข้อมูล</button>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $('#cusViDetail').DataTable({
                                "columnDefs": [{
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
                                    }
                                ]
                            });
                        });



                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>
                </div>
            </div>
        </div>

    </div><!-- Subcontent section -->


</body>

</html>