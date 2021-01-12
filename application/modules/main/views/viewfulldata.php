<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>



</head>

<body>

    <div class="app-main__inner">
        <!-- Subcontent section -->
        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <a href="<?= base_url('projectlist.html') ?>" class="button button-mini button-circle button-3d button-teal"><i class="icon-chevron-sign-left"></i>กลับ</a>
                <a href="<?= base_url('editproject.html/') . getFulldata($procode)->m_procode . "/" . getFulldata($procode)->ms_procode ?>" class="button button-mini button-circle button-3d button-amber"><i class="icon-edit2"></i>แก้ไขข้อมูล</a>
                <a id="addNewItem" href="<?= base_url('addnewjob.html/') . getFulldata($procode)->m_procode . "/" . getFulldata($procode)->ms_procode ?>" class="button button-mini button-circle button-3d button-green"><i class="icon-line-file-add"></i>เพิ่มไอเท็มใหม่</a>
            </div>
            <input hidden type="text" name="checkSubStatus" id="checkSubStatus" value="<?=getFulldata($procode)->ms_status?>">
        </div><br>

        <div class="row bg-white p-3">
            <div class="col-md-4">
                <span style="font-size:16px;line-height:1.8;"><b>เลขที่โปรเจค : </b>{procode}</span><br>
                <span style="font-size:16px;line-height:1.8;"><b>รายละเอียดงาน : </b>{detail}</span><br>
                <span style="font-size:16px;line-height:1.8;"><b>ลูกค้า : </b>{customer}</span><br>
                <span style="font-size:16px;line-height:1.8;"><b>กลุ่มสินค้า : </b>{progroup}</span><br>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <span style="font-size:16px;line-height:1.8;"><b>วันที่ : </b>{datetime}</span><br>
                <span style="font-size:16px;line-height:1.8;"><b>ผู้รับผิดชอบ : </b>{nameuser}</span><br>
                <span style="font-size:16px;line-height:1.8;">{ecodeuser}</span><br>
                <span style="font-size:16px;line-height:1.8;"><b>หลักบอกระยะทาง : </b><span class="distanceImage">{distance}%</span></span>

            </div>
        </div>

        <div class="row bg-white p-3">
            <div class="col-md-12">
                <div class="col-md-12">
                    <?= getSubMaster($procode) ?>
                </div>
            </div>
        </div>

    </div><!-- Subcontent section -->
</body>

<script>
    var trn_followdetail = new Simditor({
        textarea: $('#trn_followdetail'),
        toolbar: false,
        //optional options
    });
</script>

</html>