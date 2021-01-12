<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new job</title>
</head>

<body>



    <div class="app-main__inner">
        <!-- Subcontent section -->
        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <a href="<?= base_url('viewfulldata.html/').getFulldata($procode)->m_procode ?>" class="button button-mini button-3d button-circle button-teal"><i class="icon-chevron-sign-left"></i>กลับ</a>
            </div>
        </div><br>

        <div class="row">

            <div class="col-md-12 bg-white p-3">
                <div class="card-body" style="border:2px solid #59BA41;">
                    <h2 class="" style="color:#59BA41;"><u>เพิ่มงานใหม่ ภายใต้โปรเจค : {procode}</u></h2>
                    <form action="<?= base_url('savenewjob.html/').getFulldata($procode)->m_procode."/".getFulldata($procode)->ms_procode ?>" method="post" class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">รายละเอียดงาน</label>
                                    <input name="nm_detail" id="nm_detail" placeholder="กรุณาระบุรายละเอียดงาน" type="text" class="form-control" required value="{m_detail}">
                                    <div class="invalid-feedback">กรุณาระบุรายละเอียดงาน</div>
                                
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">ลูกค้า</label>
                                    <input name="nm_customer" id="nm_customer" placeholder="กรุณาระบุชื่อลูกค้า" type="text" class="form-control" value="{m_customer}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ผู้รับผิดชอบ</label>
                                    <input name="nm_owner" id="nm_owner" type="text" class="form-control" value="{m_owner}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">กลุ่มสินค้า</label>
                                    <select class="form-control" id="nm_productgroup" name="nm_productgroup" required>
                                        <option value="{m_productgroup}">{m_productgroup}</option>
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
                                    <input name="nm_productname" id="nm_productname" type="text" class="form-control" value="{ms_productname}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">หลักบอกระยะทาง</label>
                                    <select class="form-control" id="nm_distance" name="nm_distance" required>
                                        <option value="{m_distance}">{m_distance}%</option>
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
                                    <input name="nm_productuse" id="nm_productuse" type="text" class="form-control" required value="{ms_productuse}">
                                    <div class="invalid-feedback">กรุณาระบุปริมาณที่จะใช้ต่อปี (ตัน)</div>
                                    <div id="nnotify_m_productuse"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">เปอร์เซ็นที่คาดว่าจะสำเร็จ</label>
                                    <select class="form-control" id="nm_percensuccess" name="nm_percensuccess" required>
                                        <option value="{ms_percensuccess}">{ms_percensuccess}%</option>
                                        <?= getSuccess() ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกเปอร์เซ็นที่คาดว่าจะสำเร็จ</div>
                                    <div id="nnotify_m_percensuccess"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Idea price (บาท/กิโลกรัม)</label>
                                    <input name="nm_ideaprice" id="nm_ideaprice" type="text" class="form-control" value="{ms_ideaprice}">
                                    <div id="nnotify_m_ideaprice"></div>
                                </div>
                            </div>
                        </div><br><br>


<?php
$output ='';
$i = 1;
        foreach(forcast($subprocode)->result() as $rsFor){
            $output .= '
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="">ประมาณการยอดการใช้ ปี '.$rsFor->f_year.' (ตัน)</label>
                            <input hidden type="text" name="nm_forcastuseYear[]" id="nm_forcastuseYear" value="'.$rsFor->f_year.'">
                            <input id="nm_forcastuse'.$i.'" name="nm_forcastuse[]" type="text" class="form-control" required value="'.$rsFor->f_use.'">
                            <div class="invalid-feedback">กรุณาระบุประมาณการยอดการใช้ ปี '.$rsFor->f_year.' (ตัน)</div>
                            <div id="nnotify_m_forcastuse'.$i.'"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="">ประมาณการรายได้ ปี '.$rsFor->f_year.' (พัน-บาท)</label>
                            <input id="nm_forcastmoney'.$i.'" name="nm_forcastmoney[]" type="text" class="form-control" readonly value="'.$rsFor->f_money.'">
                        </div>
                    </div>
                </div>
            ';
            $i++;
        }
        echo $output;
?>



                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">สถานะของงาน</label>
                                    <select class="form-control" id="nm_jobstatus" name="nm_jobstatus" required>
                                        <option value="">กรุณาเลือกสถานะของงาน</option>
                                        <?= getJobstatus() ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาระบุสถานะของงาน</div>
           
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">ประเภทของงาน</label>
                                    <select class="form-control" id="nm_jobtype" name="nm_jobtype" required>
                                        <option value="{ms_jobtype}">{ms_jobtype}</option>
                                        <?= getWorktype() ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาระบุประเภทของงาน</div>
                   
                                </div>
                            </div>
                        </div>


                        <button type="submit" id="btnAddNewJob" name="btnAddNewJob" class="mt-2 btn btn-primary">บันทึกงานใหม่</button>
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