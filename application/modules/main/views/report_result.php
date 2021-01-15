<div class="datatable-container">
    <table name="report" id="report" class="table table-striped table-bordered table-responsive" style="width:100%;">

        <thead>
            <tr>
                <th>No.</th>
                <th>Date(Month-Year)</th>
                <th>รายละเอียดของงาน</th>
                <th>ลูกค้า</th>
                <th>ผู้รับผิดชอบ</th>
                <th>กลุ่มสินค้า (Product group)</th>
                <th>ชื่อสินค้า</th>
                <th>หลักบอกระยะทาง</th>
                <th>ปริมาณที่จะใช้/ปี (ตัน)</th>
                <th>เปอร์เซ็นที่คาดว่าจะสำเร็จ</th>
                <th>Idea price (บาท/กก.)</th>

                <th>ปี(1)</th>
                <th>ประมาณการณ์ยอดใช้ปี(1)ตัน</th>
                <th>ประมาณการณ์รายได้ปี(1)บาท</th>
                <th>ปี(2)</th>
                <th>ประมาณการณ์ยอดใช้ปี(2)ตัน</th>
                <th>ประมาณการณ์รายได้ปี(2)บาท</th>
                <th>ปี(3)</th>
                <th>ประมาณการณ์ยอดใช้ปี(3)ตัน</th>
                <th>ประมาณการณ์รายได้ปี(3)บาท</th>

                <th style="width:200px;">Action and Follow up</th>
                <th>สถานะของงานพัฒนา</th>
                <th>ประเภทของงาน</th>

            </tr>
        </thead>

        <tbody>
            <?php

            foreach ($rs_report as $rs) {

                $conText_jobstatus = "";
                if ($rs->ms_jobstatus == 1) {
                    $conText_jobstatus = "กำลังดำเนินอยู่";
                } else if ($rs->ms_jobstatus == 2) {
                    $conText_jobstatus = "สิ้นสุดแล้ว";
                } else {
                    $conText_jobstatus = $rs->ms_jobstatus;
                }

                $conText_jobtype = "";
                if ($rs->ms_jobtype == 1) {
                    $conText_jobtype = "ลูกค้าใหม่/สินค้าใหม่";
                } else if ($rs->ms_jobtype == 2) {
                    $conText_jobtype = "ลูกค้าใหม่/สินค้าเก่า";
                } else if ($rs->ms_jobtype == 3) {
                    $conText_jobtype = "ลูกค้าเก่า/สินค้าใหม่";
                } else if ($rs->ms_jobtype == 4) {
                    $conText_jobtype = "ลูกค้าเก่า/สินค้าเก่า";
                } else {
                    $conText_jobtype = $rs->ms_jobtype;
                }

                
            ?>
                <tr>
                    <td></td>
                    <td><?= conDateFromDb($rs->m_datetime_create) ?></td>
                    <td><?= $rs->m_detail ?></td>
                    <td><?= $rs->m_customer ?></td>
                    <td><?= $rs->m_owner ?></td>
                    <td><?= $rs->m_productgroup ?></td>
                    <td><?= $rs->ms_productname ?></td>
                    <td><?= $rs->m_distance ?></td>
                    <td><?= $rs->ms_productuse ?></td>
                    <td><?= $rs->ms_percensuccess ?></td>
                    <td><?= $rs->ms_ideaprice ?></td>

                    <!-- Forecast Zone -->
                    <?php foreach (getForecast($rs->ms_procode) as $rss) { ?>
                        <td><b><?= $rss->f_year ?></b></td>
                        <td><?= $rss->f_use ?></td>
                        <td><?= $rss->f_money ?></td>
                    <?php }; ?>
                    <!-- Forecast Zone -->

                    <!-- Follow Zone -->
                    <td class="cuttext">
                        <?php foreach (getFollow($rs->ms_procode) as $frss) { 
                               
                        ?>
                            <?= $frss->trn_followdetail . "<br>" ?>
                        <?php }; ?>
                    </td>

                    <td><?= $conText_jobstatus ?></td>
                    <td><?= $conText_jobtype ?></td>
                </tr>

            <?php }; ?>
        </tbody>

    </table>
</div>