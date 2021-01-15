<?php
class getfn{
    public $ci;
    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    public function gci()
    {
        return $this->ci;
    }

}


function getfn()
{
    $obj = new getfn();
    return $obj->gci();
}



// Template Set เป็นการกำหนดค่าให้กับ Template
// Template Set เป็นการกำหนดค่าให้กับ Template
// Template Set เป็นการกำหนดค่าให้กับ Template
// Template Set เป็นการกำหนดค่าให้กับ Template
function getHead()
{
    return getfn()->load->view("templates/head");
}

function getFooter()
{
    return getfn()->load->view("templates/footer");
}

function getContent($page , $data)
{
    return getfn()->parser->parse($page , $data);
}

function getModal()
{
    return getfn()->load->view("templates/modal");
}
// Template Set เป็นการกำหนดค่าให้กับ Template
// Template Set เป็นการกำหนดค่าให้กับ Template
// Template Set เป็นการกำหนดค่าให้กับ Template
// Template Set เป็นการกำหนดค่าให้กับ Template














// Query ข้อมูลจำพวก Group , Catagory
function getFormNo()
{
    $obj = new getfn();
    // check formno ซ้ำในระบบ
    $checkRowdata = $obj->gci()->db->query("SELECT
    m_procode FROM sop_master ORDER BY m_autoid DESC LIMIT 1 
    ");
    $result = $checkRowdata->num_rows();

    $cutYear = substr(date("Y"), 2, 2);
    $getMonth = substr(date("m"), 0, 2);
    $formno = "";
    if ($result == 0) {
        $formno = "SOP" . $cutYear . $getMonth . "001";
    } else {

        $getFormno = $checkRowdata->row()->m_procode; //อันนี้ดึงเอามาทั้งหมด CRF2003001
        $cutGetFormno = substr($getFormno, 3, 2); //อันนี้ตัดเอาเฉพาะปีจาก 2020 ตัดเหลือ 20
        $cutNo = substr($getFormno, 7, 3); //อันนี้ตัดเอามาแค่ตัวเลขจาก CRF2003001 ตัดเหลือ 001
        $cutNo++;

        if ($cutNo < 10) {
            $cutNo = "00" . $cutNo;
        } else if ($cutNo < 100) {
            $cutNo = "0" . $cutNo;
        }

        if ($cutGetFormno != $cutYear) {
            $formno = "SOP" . $cutYear . $getMonth . $cutNo;
        } else {
            $formno = "SOP" . $cutGetFormno . $getMonth . $cutNo;
        }
    }

    return $formno;
}



function getSubFormNo()
{
    $obj = new getfn();
    // check formno ซ้ำในระบบ
    $checkRowdata = $obj->gci()->db->query("SELECT
    ms_procode FROM sop_submaster ORDER BY ms_autoid DESC LIMIT 1 
    ");
    $result = $checkRowdata->num_rows();

    $cutYear = substr(date("Y"), 0, 2);
    $getMonth = substr(date("m"), 0, 2);
    $formno = "";
    if ($result == 0) {
        $formno = "SOPS" . $cutYear . $getMonth . "001";
    } else {

        $getFormno = $checkRowdata->row()->ms_procode; //อันนี้ดึงเอามาทั้งหมด CRF2003001
        $cutGetFormno = substr($getFormno, 4, 2); //อันนี้ตัดเอาเฉพาะปีจาก 2020 ตัดเหลือ 20
        $cutNo = substr($getFormno, 8, 3); //อันนี้ตัดเอามาแค่ตัวเลขจาก CRFS2003001 ตัดเหลือ 001
        $cutNo++;

        if ($cutNo < 10) {
            $cutNo = "00" . $cutNo;
        } else if ($cutNo < 100) {
            $cutNo = "0" . $cutNo;
        }

        if ($cutGetFormno != $cutYear) {
            $formno = "SOPS" . $cutYear . $getMonth . $cutNo;
        } else {
            $formno = "SOPS" . $cutGetFormno . $getMonth . $cutNo;
        }
    }

    return $formno;
}




function getCusVisitNo()
{
    $obj = new getfn();
    // check formno ซ้ำในระบบ
    $checkRowdata = $obj->gci()->db->query("SELECT
    csvr_no FROM sop_customervisit ORDER BY csvr_autoid DESC LIMIT 1 
    ");
    $result = $checkRowdata->num_rows();

    $cutYear = substr(date("Y"), 2, 2);
    $getMonth = substr(date("m"), 0, 2);
    $formno = "";
    if ($result == 0) {
        $formno = "CVR" . $cutYear . $getMonth . "001";
    } else {

        $getFormno = $checkRowdata->row()->csvr_no; //อันนี้ดึงเอามาทั้งหมด CRF2003001
        $cutGetFormno = substr($getFormno, 3, 2); //อันนี้ตัดเอาเฉพาะปีจาก 2020 ตัดเหลือ 20
        $cutNo = substr($getFormno, 7, 3); //อันนี้ตัดเอามาแค่ตัวเลขจาก CRF2003001 ตัดเหลือ 001
        $cutNo++;

        if ($cutNo < 10) {
            $cutNo = "00" . $cutNo;
        } else if ($cutNo < 100) {
            $cutNo = "0" . $cutNo;
        }

        if ($cutGetFormno != $cutYear) {
            $formno = "CVR" . $cutYear . $getMonth . $cutNo;
        } else {
            $formno = "CVR" . $cutGetFormno . $getMonth . $cutNo;
        }
    }

    return $formno;
}




function getProductGroup()
{
    $sql = getfn()->db->query("SELECT * FROM sop_productgroup ORDER BY p_groupname asc");
    $output = '';

    foreach($sql->result() as $rss){
        $output .='
        <option value="'.$rss->p_groupname.'">'.$rss->p_groupname.'</option>
        ';
    }
    echo $output;
}


function getDistance()
{
    $sql = getfn()->db->query("SELECT * FROM sop_distance ORDER BY d_number asc");
    $output = '';

    foreach($sql->result() as $rss){
        $output .='
            <option value="'.$rss->d_number.'">'.$rss->d_number.'%</option>
        ';
    }
    echo $output;
}

function getSuccess()
{
    $sql = getfn()->db->query("SELECT * from sop_success order by s_number asc");
    $output = '';

    foreach($sql->result() as $rss){
        $output .= '
            <option value="'.$rss->s_number.'">'.$rss->s_number.'%</option>
        ';
    }
    echo $output;
}

function getJobstatus()
{
    $sql = getfn()->db->query("SELECT * FROM sop_jobstatus order by j_autoid asc");
    $output = '';

    foreach($sql->result() as $rss){
        $output .= '
            <option value="'.$rss->j_statusname.'">'.$rss->j_statusname.'</option>
        ';
    }
    echo $output;
}

function getWorktype()
{
    $sql = getfn()->db->query("SELECT * from sop_worktype order by w_autoid asc");
    $output = '';

    foreach($sql->result() as $rss){
        $output .='
            <option value="'.$rss->w_typename.'">'.$rss->w_typename.'</option>
        ';
    }
    echo $output;
}


// Get year for use
function getYear1af($procode)
{
    $getdate = getFulldata($procode)->m_datetime_create;
    $date = date_create($getdate);
    $newdate = date_format($date , "Y");
    echo  $newdate;
}
function getYear2af($procode)
{
    return getYear1af($procode)+1;
}
function getYear3af($procode)
{
    return getYear1af($procode)+2;
}


function getYear1()
{
    return date("Y");
}
function getYear2()
{
    return getYear1()+1;
}
function getYear3()
{
    return getYear1()+2;
}
// Get year for use
























// Query Zone Query Zone Query Zone Query Zone Query Zone Query Zone
// Query Zone Query Zone Query Zone Query Zone Query Zone Query Zone
// Query Zone Query Zone Query Zone Query Zone Query Zone Query Zone
// Query Zone Query Zone Query Zone Query Zone Query Zone Query Zone
// Query ข้อมูลจำพวก Group , Catagory
// Query ข้อมูลสำหรับใช้กับหน้า Full data
function sqlFulldata($procode)
{
    $sql = getfn()->db->query("SELECT
    sop_master.m_autoid,
    sop_master.m_procode,
    sop_master.m_detail,
    sop_master.m_customer,
    sop_master.m_owner,
    sop_master.m_productgroup,
    sop_master.m_distance,
    sop_master.m_user_name,
    sop_master.m_user_deptcode,
    sop_master.m_user_deptname,
    sop_master.m_user_ecode,
    sop_master.m_datetime_create,
    sop_master.m_datetime_modify,
    sop_master.m_day,
    sop_master.m_month,
    sop_master.m_year,
    sop_submaster.ms_procode,
    sop_submaster.ms_productname,
    sop_submaster.ms_productuse,
    sop_submaster.ms_percensuccess,
    sop_submaster.ms_ideaprice,
    sop_submaster.ms_jobstatus,
    sop_submaster.ms_jobtype,
    sop_submaster.ms_status
    FROM
    sop_master
    INNER JOIN sop_submaster ON sop_submaster.ms_m_procode = sop_master.m_procode 
    WHERE sop_master.m_procode = '$procode'
    ORDER BY sop_master.m_autoid DESC , sop_submaster.ms_procode DESC
    ");
    return $sql;
}


function getFulldata($procode)
{
    return sqlFulldata($procode)->row();
}


function sqlSubMasterdata($procode)
{
    $sql = getfn()->db->query("SELECT
    sop_submaster.ms_autoid,
    sop_submaster.ms_procode,
    sop_submaster.ms_m_procode,
    sop_submaster.ms_productname,
    sop_submaster.ms_productuse,
    sop_submaster.ms_percensuccess,
    sop_submaster.ms_ideaprice,
    sop_submaster.ms_jobstatus,
    sop_submaster.ms_jobtype,
    sop_submaster.ms_user_name,
    sop_submaster.ms_user_deptcode,
    sop_submaster.ms_user_deptname,
    sop_submaster.ms_user_ecode,
    sop_submaster.ms_user_datetime_create,
    sop_submaster.ms_user_datetime_modify,
    sop_submaster.ms_day,
    sop_submaster.ms_month,
    sop_submaster.ms_year,
    sop_submaster.ms_status
    FROM
    sop_submaster
    where ms_m_procode = '$procode' 
    ORDER BY ms_autoid DESC
    ");
    return $sql;
}


function forcast($subprocode)
{
    $sql = getfn()->db->query("SELECT
    sop_forcast.f_autoid,
    sop_forcast.f_msprocode,
    sop_forcast.f_procode,
    sop_forcast.f_proyear,
    sop_forcast.f_year,
    sop_forcast.f_use,
    sop_forcast.f_money
    FROM
    sop_forcast
    WHERE f_msprocode = '$subprocode' ORDER BY f_year ASC ");
    return $sql;
}



function followup($trn_msid)
{
    $sql = getfn()->db->query("SELECT
    sop_transfollow.trn_autoid,
    sop_transfollow.trn_followdetail,
    sop_transfollow.trn_procode,
    sop_transfollow.trn_msid,
    sop_transfollow.trn_user_name,
    sop_transfollow.trn_user_deptcode,
    sop_transfollow.trn_user_deptname,
    sop_transfollow.trn_user_ecode,
    sop_transfollow.trn_user_datetime_create,
    sop_transfollow.trn_user_datetime_modify,
    sop_transfollow.trn_day,
    sop_transfollow.trn_month,
    sop_transfollow.trn_year
    FROM
    sop_transfollow
    WHERE trn_msid = '$trn_msid'
    ORDER BY trn_autoid DESC");
    return $sql;
}


function getDb()
{
    $sql = getfn()->db->query("SELECT
    db.db_autoid,
    db.db_username,
    db.db_password,
    db.db_databasename,
    db.db_host,
    db.db_active
    FROM
    db");

    return $sql->row();
}


function sqlCusvisitFull($cusformno)
{
    $sql = getfn()->db->query("SELECT
    sop_customervisit.csvr_autoid,
    sop_customervisit.csvr_no,
    sop_customervisit.csvr_cusname,
    sop_customervisit.csvr_country,
    sop_customervisit.csvr_business,
    sop_customervisit.csvr_datetime,
    sop_customervisit.csvr_contact,
    sop_customervisit.csvr_salee,
    sop_customervisit.csvr_tel,
    sop_customervisit.csvr_fax,
    sop_customervisit.csvr_email,
    sop_customervisit.csvr_discussion,
    sop_customervisit.csvr_action,
    sop_customervisit.csvr_salesname,
    sop_customervisit.csvr_salesecode,
    sop_customervisit.csvr_year,
    sop_customervisit.csvr_month,
    sop_customervisit.csvr_day
    FROM
    sop_customervisit
    WHERE csvr_no = '$cusformno' ");
    return $sql;
}

function getSubCus($cusformno)
{
    $sql = getfn()->db->query("SELECT
    sop_customervisit_sub.csvrs_autoid,
    sop_customervisit_sub.csvrs_cusvisitno,
    sop_customervisit_sub.csvrs_type,
    sop_customervisit_sub.csvrs_saleeproduct,
    sop_customervisit_sub.csvrs_qty1,
    sop_customervisit_sub.csvrs_competition,
    sop_customervisit_sub.csvrs_qty2,
    sop_customervisit_sub.csvrs_remark
    FROM
    sop_customervisit_sub
    WHERE csvrs_cusvisitno = '$cusformno' ");
    return $sql;
}

function gCusVFull($cusformno)
{
    return sqlCusvisitFull($cusformno)->row();
}

// Query Zone Query Zone Query Zone Query Zone Query Zone Query Zone
// Query Zone Query Zone Query Zone Query Zone Query Zone Query Zone
// Query Zone Query Zone Query Zone Query Zone Query Zone Query Zone
// Query Zone Query Zone Query Zone Query Zone Query Zone Query Zone


















function getSubMaster($procode)
{
    $output = '';
    $cardcolor = "";
    $fontcolor = "";
    foreach(sqlSubMasterdata($procode)->result() as $rs){
        if($rs->ms_status == "success"){
            $cardcolor = "#006600;";
            $fontcolor = "#fff;";
            $hidBtnAddCom = 'style="display:none;"';
        }else if($rs->ms_status == "fail"){
            $cardcolor = "#CC0000;";
            $fontcolor = "#fff;";
            $hidBtnAddCom = 'style="display:none;"';
        }else{
            $cardcolor = "#33CCFF;";
            $fontcolor = "#000;";
            $hidBtnAddCom = '';
        }
    $output .='
        <div class="card mb-3 card-border" style="border-color:'.$cardcolor.'">
        <div class="card-header" style="background-color:'.$cardcolor.'color:'.$fontcolor.'"><b>ชื่อสินค้า : </b>&nbsp;'.$rs->ms_productname.'</div>
        <div class="card-body">

            <div class="row form-group">
                <div class="col-md-6">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <span style="padding-right:10px;"><b>ปริมาณที่จะใช้ต่อปี : </b>'.$rs->ms_productuse.'&nbsp;ตัน</span>
                        </div>
                        <div class="col-md-4">
                            <span style="padding-right:10px;"><b>เปอร์เซ็นที่คาดว่าจะสำเร็จ : </b><span class="percensuccessImage">'.$rs->ms_percensuccess.'%</span></span>
                        </div>
                        <div class="col-md-4">
                            <span><b>Idea price : </b>'.$rs->ms_ideaprice.'&nbsp;บาท/กก.</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <span><b>สถานะของงาน : </b>'.$rs->ms_jobstatus.'</span>
                        </div>
                        <div class="col-md-6">
                            <span><b>ประเภทของงาน : </b>'.$rs->ms_jobtype.'</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>

            <br>

            <div class="row">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ปี ค.ศ.</th>
                        <th>ประมาณการยอดใช้ (ตัน)</th>
                        <th>ประมาณการรายได้ (พัน-บาท)</th>
                    </tr>';

        foreach(forcast($rs->ms_procode)->result() as $rss){
            $output .='
                    <tr>
                        <td>'.$rss->f_year.'</td>
                        <td class="comma_f_use">'.$rss->f_use.'</td>
                        <td class="comma_f_money">'.$rss->f_money.'</td>
                    </tr>
            ';
        }          
    $output .='           
                </table>
            </div><br>
            <h5>Action and Follow up (update)</h5>
            <a '.$hidBtnAddCom.' id="btnAddComment" href="javascript:void(0)" data-toggle="modal" data-target="#addComment" class="button button-mini button-circle button-3d button-green"
                data_subid = '.$rs->ms_procode.'
                data_masid = '.$rs->ms_m_procode.'
            ><i class="icon-chevron-sign-left"></i>Add Comment</a>
            ';

    $output .='
            <div class="row">
                <div class="col-md-12">
            ';
        
        foreach(followup($rs->ms_procode)->result() as $rsFollow){
            $output .='
            <div class="card">
                <div class="card-body p-3" style="background-color:#FFFFCC;">
                    <div class="row">
                        <div class="col-md-12">
                            '.$rsFollow->trn_followdetail.'
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center">
                        <hr>
                        '.$rsFollow->trn_user_name.'&nbsp;'.conDatetimeFromDb($rsFollow->trn_user_datetime_create).'
                        </div>
                    </div>


                </div>
            </div><br>
            ';
        }
    
                    
    $output .='
                </div>
            </div>
    ';


    $output .='        
        </div>
    </div>
        ';
    }
    echo $output;
}




// Report Zone Report Zone Report Zone
// Report Zone Report Zone Report Zone
// Report Zone Report Zone Report Zone

function getForecast($msprocode)
{
    $sql = getfn()->db->query("SELECT
    sop_forcast.f_autoid,
    sop_forcast.f_msprocode,
    sop_forcast.f_procode,
    sop_forcast.f_proyear,
    sop_forcast.f_year,
    sop_forcast.f_use,
    sop_forcast.f_money
    FROM
    sop_forcast
    WHERE sop_forcast.f_msprocode = '$msprocode' ");

    return $sql->result();
}


function getFollow($msprocode)
{
    $sql = getfn()->db->query("SELECT
    sop_transfollow.trn_autoid,
    sop_transfollow.trn_followdetail,
    sop_transfollow.trn_procode,
    sop_transfollow.trn_msid,
    sop_transfollow.trn_user_name,
    sop_transfollow.trn_user_deptcode,
    sop_transfollow.trn_user_deptname,
    sop_transfollow.trn_user_ecode,
    sop_transfollow.trn_user_datetime_create,
    sop_transfollow.trn_user_datetime_modify,
    sop_transfollow.trn_day,
    sop_transfollow.trn_month,
    sop_transfollow.trn_year
    FROM
    sop_transfollow
    WHERE trn_msid = '$msprocode' ");
    return $sql->result();
}

// Report Zone Report Zone Report Zone
// Report Zone Report Zone Report Zone
// Report Zone Report Zone Report Zone









?>