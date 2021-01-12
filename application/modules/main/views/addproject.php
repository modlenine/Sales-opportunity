<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add project</title>
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
                <div class="card-body" style="border:2px solid #1265A8;">
                    <h2 class="" style="color:#1265A8;"><u>เพิ่มรายการโปรเจคใหม่</u></h2>
                    <form action="<?= base_url('savedata.html') ?>" method="post" class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">รายละเอียดงาน</label>
                                    <input name="m_detail" id="m_detail" placeholder="กรุณาระบุรายละเอียดงาน" type="text" class="form-control" required>
                                    <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>
                                
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">ลูกค้า</label>
                                    <input name="m_customer" id="m_customer" placeholder="กรุณาระบุชื่อลูกค้า" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ผู้รับผิดชอบ</label>
                                    <input name="m_owner" id="m_owner" type="text" class="form-control" value="<?= getUser()->ecode ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">กลุ่มสินค้า</label>
                                    <select class="form-control" id="m_productgroup" name="m_productgroup" required>
                                        <option value="">กรุณาเลือกกลุ่มสินค้า</option>
                                        <?= getProductGroup() ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกกลุ่มสินค้า</div>
                         
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ชื่อสินค้า</label>
                                    <input name="m_productname" id="m_productname" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">หลักบอกระยะทาง</label>
                                    <select class="form-control" id="m_distance" name="m_distance" required>
                                        <option value="">กรุณาเลือกหลักบอกระยะทาง</option>
                                        <?= getDistance() ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกหลักบอกระยะทาง</div>
                       
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">ปริมาณที่จะใช้ต่อปี (ตัน)</label>
                                    <input name="m_productuse" id="m_productuse" type="text" class="form-control" required>
                                    <div class="invalid-feedback">กรุณาระบุปริมาณที่จะใช้ต่อปี (ตัน)</div>
                                    <div id="notify_m_productuse"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">เปอร์เซ็นที่คาดว่าจะสำเร็จ</label>
                                    <select class="form-control" id="m_percensuccess" name="m_percensuccess" required>
                                        <option value="">กรุณาระบุเปอร์เซ็นที่คาดว่าจะสำเร็จ</option>
                                        <?= getSuccess() ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกเปอร์เซ็นที่คาดว่าจะสำเร็จ</div>
                      
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Idea price (บาท/กิโลกรัม)</label>
                                    <input name="m_ideaprice" id="m_ideaprice" type="text" class="form-control">
                                    <div id="notify_m_ideaprice"></div>
                                </div>
                            </div>
                        </div><br><br>


                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ประมาณการยอดการใช้ ปี {year1} (ตัน)</label>
                                    <input hidden type="text" name="m_forcastuseYear[]" id="m_forcastuseYear" value="{year1}">
                                    <input id="m_forcastuse1" name="m_forcastuse[]" type="text" class="form-control" required>
                                    <div class="invalid-feedback">กรุณาระบุประมาณการยอดการใช้ ปี {year1} (ตัน)</div>
                                    <div id="notify_m_forcastuse1"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ประมาณการรายได้ ปี {year1} (พัน-บาท)</label>
                                    <input id="m_forcastmoney1" name="m_forcastmoney[]" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ประมาณการยอดการใช้ ปี {year2} (ตัน)</label>
                                    <input hidden type="text" name="m_forcastuseYear[]" id="m_forcastuseYear" value="{year2}">
                                    <input id="m_forcastuse2" name="m_forcastuse[]" type="text" class="form-control" required>
                                    <div class="invalid-feedback">กรุณาระบุประมาณการยอดการใช้ ปี {year2} (ตัน)</div>
                                    <div id="notify_m_forcastuse2"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ประมาณการรายได้ ปี {year2} (พัน-บาท)</label>
                                    <input id="m_forcastmoney2" name="m_forcastmoney[]" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ประมาณการยอดการใช้ ปี {year3} (ตัน)</label>
                                    <input hidden type="text" name="m_forcastuseYear[]" id="m_forcastuseYear" value="{year3}">
                                    <input id="m_forcastuse3" name="m_forcastuse[]" type="text" class="form-control" required>
                                    <div class="invalid-feedback">กรุณาระบุประมาณการยอดการใช้ ปี {year3} (ตัน)</div>
                                    <div id="notify_m_forcastuse3"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ประมาณการรายได้ ปี {year3} (พัน-บาท)</label>
                                    <input id="m_forcastmoney3" name="m_forcastmoney[]" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">สถานะของงาน</label>
                                    <select class="form-control" id="m_jobstatus" name="m_jobstatus" required>
                                        <option value="">กรุณาระบุสถานะของงาน</option>
                                        <?= getJobstatus() ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาระบุสถานะของงาน</div>
           
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ประเภทของงาน</label>
                                    <select class="form-control" id="m_jobtype" name="m_jobtype" required>
                                        <option value="">กรุณาระบุประเภทของงาน</option>
                                        <?= getWorktype() ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาระบุประเภทของงาน</div>
                   
                                </div>
                            </div>
                        </div>


                        <button type="submit" id="btnAdd" name="btnAdd" class="mt-2 btn btn-primary">บันทึกข้อมูล</button>
                    </form>
                    <script>
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