<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        date_default_timezone_set("Asia/Bangkok");
    }


    // Function สำหรับ ดึงข้อมูลใส่ Data table แบบ Server side
    // List data zone
    public function projectlist()
    {

        // DB table to use
        $table = 'projectlist';
        // $table = <<<EOT
        // (
        //     select * from listdefault
        // )temp
        // EOT;

        // Table's primary key
        $primaryKey = 'm_autoid';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes

        $columns = array(
            array(
                'db' => 'm_procode', 'dt' => 0,
                'formatter' => function ($d, $row) {

                    return '<b><a href="' . base_url('viewfulldata.html/') . $d . '">' . $d . '</a></b>'; //or any other format you require
                }
            ),
            array(
                'db' => 'm_datetime_create', 'dt' => 1,
                'formatter' => function ($d, $row) {
                    return conDateFromDb($d);
                }
            ),
            array('db' => 'm_detail', 'dt' => 2),
            array('db' => 'm_customer', 'dt' => 3),
            array('db' => 'm_owner', 'dt' => 4),
            array('db' => 'm_productgroup', 'dt' => 5)
        );

        // SQL server connection information
        $sql_details = array(
            'user' => getDb()->db_username,
            'pass' => getDb()->db_password,
            'db'   => getDb()->db_databasename,
            'host' => getDb()->db_host
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        require('server-side/scripts/ssp.class.php');

        $ecode = getUser()->ecode;
        $deptcode = getUser()->DeptCode;
        // if (getUser()->ecode != "M0051" || getUser()->ecode != "M0112") {
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
        //     );
        // } else if (getUser()->posi >= 75) {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // }else{
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // }
        if ($ecode == "M1848" || $ecode == "M1809" || $ecode == "M0051" || $ecode == "M0112") {
            echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        } else if (getUser()->posi > 75) {
            echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        } else {
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
            );
        }
    }
    // Function สำหรับ ดึงข้อมูลใส่ Data table แบบ Server side





    public function savedata()
    {
        if (isset($_POST['btnAdd'])) {
            $projectno = getFormNo();
            $subprojectno = getSubFormNo();
            $userfullname = getUser()->Fname . " " . getUser()->Lname;

            $mday = date("d");
            $mmonth = date("m");
            $myear = date("Y");

            $saveMasterTable = array(
                "m_procode" => $projectno,
                "m_detail" => $this->input->post("m_detail"),
                "m_customer" => $this->input->post("m_customer"),
                "m_owner" => $this->input->post("m_owner"),
                "m_productgroup" => $this->input->post("m_productgroup"),
                "m_distance" => $this->input->post("m_distance"),

                "m_user_name" => $userfullname,
                "m_user_deptcode" => getUser()->DeptCode,
                "m_user_deptname" => getUser()->Dept,
                "m_user_ecode" => getUser()->ecode,
                "m_datetime_create" => date("Y-m-d H:i:s"),
                "m_day" => $mday,
                "m_month" => $mmonth,
                "m_year" => $myear
            );


            $saveSubMasterTable = array(
                "ms_procode" => $subprojectno,
                "ms_m_procode" => $projectno,
                "ms_productname" => $this->input->post("m_productname"),
                "ms_productuse" => $this->input->post("m_productuse"),
                "ms_percensuccess" => $this->input->post("m_percensuccess"),
                "ms_ideaprice" => $this->input->post("m_ideaprice"),
                "ms_jobstatus" => $this->input->post("m_jobstatus"),
                "ms_jobtype" => $this->input->post("m_jobtype"),
                "ms_status" => "active",

                "ms_user_name" => $userfullname,
                "ms_user_deptcode" => getUser()->DeptCode,
                "ms_user_deptname" => getUser()->Dept,
                "ms_user_ecode" => getUser()->ecode,
                "ms_user_datetime_create" => date("Y-m-d H:i:s"),
                "ms_day" => $mday,
                "ms_month" => $mmonth,
                "ms_year" => $myear
            );
            $this->db->insert("sop_submaster", $saveSubMasterTable);

            $m_forcaseuse = $this->input->post("m_forcastuse");

            foreach ($m_forcaseuse as $key => $m_forcaseuses) {

                $saveForcase = array(
                    "f_msprocode" => $subprojectno,
                    "f_procode" => $projectno,
                    "f_proyear" => $myear,
                    "f_use" => conPrice($m_forcaseuses),
                    "f_year" => $this->input->post("m_forcastuseYear")[$key],
                    "f_money" => conPrice($this->input->post("m_forcastmoney"))[$key],
                );

                $this->db->insert("sop_forcast", $saveForcase);
            }


            if ($this->db->insert("sop_master", $saveMasterTable)) {
                return true;
            } else {
                return false;
            }
        }
    }




    // Save edit data page to database
    public function savedataEdit($procode, $subprocode)
    {
        if (isset($_POST['btnEdit'])) {

            $userfullname = getUser()->Fname . " " . getUser()->Lname;

            $mday = date("d");
            $mmonth = date("m");
            $myear = date("Y");

            $saveMasterTable = array(
                "m_detail" => $this->input->post("em_detail"),
                "m_customer" => $this->input->post("em_customer"),
                "m_owner" => $this->input->post("em_owner"),
                "m_productgroup" => $this->input->post("em_productgroup"),
                "m_distance" => $this->input->post("em_distance"),

                "m_user_name" => $userfullname,
                "m_user_deptcode" => getUser()->DeptCode,
                "m_user_deptname" => getUser()->Dept,
                "m_user_ecode" => getUser()->ecode,
                "m_datetime_modify" => date("Y-m-d H:i:s"),
                "m_day" => $mday,
                "m_month" => $mmonth,
                "m_year" => $myear
            );


            // Check ว่าการแก้ไขครั้งนี้เป็นการปิด job นั้นๆหรือไม่
            $jobstatus = "";
            if ($this->input->post("em_jobstatus") == "สิ้นสุดแล้ว (สำเร็จ)") {
                $jobstatus = "success";
            } else if ($this->input->post("em_jobstatus") == "สิ้นสุดแล้ว (ล้มเหลว เพราะลูกค้า)") {
                $jobstatus = "fail";
            } else if ($this->input->post("em_jobstatus") == "สิ้นสุดแล้ว (ล้มเหลว เพราะราคาไม่ผ่าน)") {
                $jobstatus = "fail";
            } else if ($this->input->post("em_jobstatus") == "สิ้นสุดแล้ว (ล้มเหลว เพราะไม่สามารถพัฒนาสินค้านั้นได้)") {
                $jobstatus = "fail";
            } else {
                $jobstatus = "active";
            }

            $saveSubMasterTable = array(
                "ms_productname" => $this->input->post("em_productname"),
                "ms_productuse" => $this->input->post("em_productuse"),
                "ms_percensuccess" => $this->input->post("em_percensuccess"),
                "ms_ideaprice" => $this->input->post("em_ideaprice"),
                "ms_jobstatus" => $this->input->post("em_jobstatus"),
                "ms_jobtype" => $this->input->post("em_jobtype"),
                "ms_status" => $jobstatus,

                "ms_user_name" => $userfullname,
                "ms_user_deptcode" => getUser()->DeptCode,
                "ms_user_deptname" => getUser()->Dept,
                "ms_user_ecode" => getUser()->ecode,
                "ms_user_datetime_modify" => date("Y-m-d H:i:s"),
                "ms_day" => $mday,
                "ms_month" => $mmonth,
                "ms_year" => $myear
            );
            $this->db->where("ms_procode", $subprocode);
            $this->db->update("sop_submaster", $saveSubMasterTable);



            $m_forcastuse = $this->input->post("em_forcastuse");

            $this->db->where("f_msprocode", $subprocode);
            $this->db->delete("sop_forcast");
            foreach ($m_forcastuse as $key => $m_forcastuses) {
                $saveForcast = array(
                    "f_msprocode" => $subprocode,
                    "f_procode" => $procode,
                    "f_proyear" => $myear,
                    "f_use" => conPrice($m_forcastuses),
                    "f_year" => $this->input->post("em_forcastuseYear")[$key],
                    "f_money" => conPrice($this->input->post("em_forcastmoney"))[$key],
                );

                $this->db->insert("sop_forcast", $saveForcast);
            }

            $this->db->where("m_procode", $procode);
            if ($this->db->update("sop_master", $saveMasterTable)) {
                return true;
            } else {
                return false;
            }
        }
    }
    // Save edit data page to database












    // Save edit data page to database
    public function savenewjob($procode, $subprocode)
    {
        if (isset($_POST['btnAddNewJob'])) {

            $userfullname = getUser()->Fname . " " . getUser()->Lname;
            $subprojectno = getSubFormNo();

            $mday = date("d");
            $mmonth = date("m");
            $myear = date("Y");

            $saveMasterTable = array(
                "m_detail" => $this->input->post("nm_detail"),
                "m_customer" => $this->input->post("nm_customer"),
                "m_owner" => $this->input->post("nm_owner"),
                "m_productgroup" => $this->input->post("nm_productgroup"),
                "m_distance" => $this->input->post("nm_distance"),

                "m_user_name" => $userfullname,
                "m_user_deptcode" => getUser()->DeptCode,
                "m_user_deptname" => getUser()->Dept,
                "m_user_ecode" => getUser()->ecode,
                "m_datetime_modify" => date("Y-m-d H:i:s"),
                "m_day" => $mday,
                "m_month" => $mmonth,
                "m_year" => $myear
            );


            // Check ว่าการแก้ไขครั้งนี้เป็นการปิด job นั้นๆหรือไม่
            $jobstatus = "";
            if ($this->input->post("nm_jobstatus") == "สิ้นสุดแล้ว (สำเร็จ)") {
                $jobstatus = "success";
            } else if ($this->input->post("nm_jobstatus") == "สิ้นสุดแล้ว (ล้มเหลว เพราะลูกค้า)") {
                $jobstatus = "fail";
            } else if ($this->input->post("nm_jobstatus") == "สิ้นสุดแล้ว (ล้มเหลว เพราะราคาไม่ผ่าน)") {
                $jobstatus = "fail";
            } else if ($this->input->post("nm_jobstatus") == "สิ้นสุดแล้ว (ล้มเหลว เพราะไม่สามารถพัฒนาสินค้านั้นได้)") {
                $jobstatus = "fail";
            } else {
                $jobstatus = "active";
            }

            $saveSubMasterTable = array(
                "ms_procode" => $subprojectno,
                "ms_m_procode" => $procode,
                "ms_productname" => $this->input->post("nm_productname"),
                "ms_productuse" => $this->input->post("nm_productuse"),
                "ms_percensuccess" => $this->input->post("nm_percensuccess"),
                "ms_ideaprice" => $this->input->post("nm_ideaprice"),
                "ms_jobstatus" => $this->input->post("nm_jobstatus"),
                "ms_jobtype" => $this->input->post("nm_jobtype"),
                "ms_status" => $jobstatus,

                "ms_user_name" => $userfullname,
                "ms_user_deptcode" => getUser()->DeptCode,
                "ms_user_deptname" => getUser()->Dept,
                "ms_user_ecode" => getUser()->ecode,
                "ms_user_datetime_modify" => date("Y-m-d H:i:s"),
                "ms_day" => $mday,
                "ms_month" => $mmonth,
                "ms_year" => $myear
            );
            $this->db->insert("sop_submaster", $saveSubMasterTable);



            $m_forcastuse = $this->input->post("nm_forcastuse");

            foreach ($m_forcastuse as $key => $m_forcastuses) {
                $saveForcast = array(
                    "f_msprocode" => $subprojectno,
                    "f_procode" => $procode,
                    "f_proyear" => $myear,
                    "f_use" => conPrice($m_forcastuses),
                    "f_year" => $this->input->post("nm_forcastuseYear")[$key],
                    "f_money" => conPrice($this->input->post("nm_forcastmoney"))[$key],
                );

                $this->db->insert("sop_forcast", $saveForcast);
            }

            $this->db->where("m_procode", $procode);
            if ($this->db->update("sop_master", $saveMasterTable)) {
                return true;
            } else {
                return false;
            }
        }
    }
    // Save edit data page to database













    public function saveComment()
    {
        $saveComment = array(
            "trn_followdetail" => $this->input->post("trn_followdetail"),
            "trn_procode" => $this->input->post("trn_procode"),
            "trn_msid" => $this->input->post("trn_msid"),
            "trn_user_name" => getUser()->Fname . " " . getUser()->Lname,
            "trn_user_deptcode" => getUser()->DeptCode,
            "trn_user_deptname" => getUser()->Dept,
            "trn_user_ecode" => getUser()->ecode,
            "trn_user_datetime_create" => date("Y-m-d H:i:s"),
            "trn_day" => date("d"),
            "trn_month" => date("m"),
            "trn_year" => date("Y")
        );
        if ($this->db->insert("sop_transfollow", $saveComment)) {
            echo true;
        } else {
            echo false;
        }
    }



    public function viewfulldata($procode)
    {
        $query = getFulldata($procode)->row();
        return $query;
    }








    // Customers zone Customers zone Customers zone
    public function getCustomerlist()
    {
        // DB table to use
        $table = 'projectlist';
        // $table = <<<EOT
        // (
        //     select * from listdefault
        // )temp
        // EOT;

        // Table's primary key
        $primaryKey = 'm_autoid';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes

        $columns = array(
            array(
                'db' => 'm_procode', 'dt' => 0,
                'formatter' => function ($d, $row) {

                    return '<b><a href="' . base_url('viewfulldata.html/') . $d . '">' . $d . '</a></b>'; //or any other format you require
                }
            ),
            array(
                'db' => 'm_datetime_create', 'dt' => 1,
                'formatter' => function ($d, $row) {
                    return conDateTimeFromDb($d);
                }
            ),
            array('db' => 'm_detail', 'dt' => 2),
            array('db' => 'm_customer', 'dt' => 3),
            array('db' => 'm_owner', 'dt' => 4),
            array('db' => 'm_productgroup', 'dt' => 5)
        );

        // SQL server connection information
        $sql_details = array(
            'user' => getDb()->db_username,
            'pass' => getDb()->db_password,
            'db'   => getDb()->db_databasename,
            'host' => getDb()->db_host
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
            * If you just want to use the basic configuration for DataTables with PHP
            * server-side, there is no need to edit below this line.
            */
        require('server-side/scripts/ssp.class.php');

        $ecode = getUser()->ecode;
        $deptcode = getUser()->DeptCode;
        if (getUser()->ecode != "M0051" || getUser()->ecode != "M0112" || getUser()->ecode != "M1809") {
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
            );
        } else if (getUser()->posi == 75) {
            echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
            );
        }
    }



    public function douploadfile()
    {
        $message = '';
        if (isset($_POST["upload"])) {
            if ($_FILES['file1']['name']) {
                $filename = explode(".", $_FILES['file1']['name']);
                if (end($filename) == "csv") {
                    $handle = fopen($_FILES['file1']['tmp_name'], "r");

                    // Select ข้อมูล Master table 1 row มาเช็ค

                    while ($data = fgetcsv($handle)) {

                        $projectno = getFormNo();
                        $subprojectno = getSubFormNo();
                        $userfullname = getUser()->Fname . " " . getUser()->Lname;

                        $mday = date("d");
                        $mmonth = date("m");
                        $myear = date("Y");

                        $dateTimeCreate = date_create($data[0]);
                        $conDateTimeCreate = date_format($dateTimeCreate , "Y-m-d");

                        $saveMasterTable = array(
                            "m_procode" => $projectno,
                            "m_detail" => $data[1],
                            "m_customer" => $data[2],
                            "m_owner" => $data[3],
                            "m_productgroup" => $data[4],
                            "m_distance" => $data[6],

                            "m_datetime_create" => $conDateTimeCreate,
                            "m_day" => $mday,
                            "m_month" => $mmonth,
                            "m_year" => $myear
                        );
                        $this->db->insert("sop_master", $saveMasterTable);


                        $saveSubMasterTable = array(
                            "ms_procode" => $subprojectno,
                            "ms_m_procode" => $projectno,
                            "ms_productname" => $data[5],
                            "ms_productuse" => $data[7],
                            "ms_percensuccess" => $data[8],
                            "ms_ideaprice" => $data[9],
                            "ms_jobstatus" => $data[16],
                            "ms_jobtype" => $data[17],
                            "ms_status" => "active",

                            "ms_user_datetime_create" => $conDateTimeCreate,
                            "ms_day" => $mday,
                            "ms_month" => $mmonth,
                            "ms_year" => $myear
                        );
                        $this->db->insert("sop_submaster", $saveSubMasterTable);


                

                        // Import forecast

                        // year1 = 10,11
                        // year 2 = 12,13
                        // year 3 = 14,15
                        $dateProject = date_create($data[0]);
                        $getOnlyYear = date_format($dateProject, "Y");

                        $dataProject2 = date_create($data[0]);
                        $fyear = date_format($dataProject2, "Y");

                        $y =1;
                        for ($i = 1; $i <= 3; $i++) {

                            if($i == 1){
                                $use = $data[10];
                                $money = $data[11];
                            }else if($i == 2){
                                $use = $data[12];
                                $money = $data[13];
                            }else if($i == 3){
                                $use = $data[14];
                                $money = $data[15];
                            }

                            $saveForcase = array(
                                "f_msprocode" => $subprojectno,
                                "f_procode" => $projectno,
                                "f_proyear" => $fyear,
                                "f_use" => $use,
                                "f_year" => $getOnlyYear,
                                "f_money" => $money,
                            );
                            $this->db->insert("sop_forcast", $saveForcase);
                            

                            $getOnlyYear++;
                        }




                        // Import Comment
                        $saveComment = array(
                            "trn_followdetail" => $data[18],
                            "trn_procode" => $projectno,
                            "trn_msid" => $subprojectno,
                            "trn_user_datetime_create" => $conDateTimeCreate
                            
                        );
                        $this->db->insert("sop_transfollow", $saveComment);

                    }

                    fclose($handle);

                    header("refresh:5; url=" . base_url('projectlist.html'));
                } else {
                    $message = '<label class="text-danger">Please Select CSV File only</label>';
                }
            } else {
                $message = '<label class="text-danger">Please Select File</label>';
            }
        }
    }


public function reportlist()
{

        $sql = $this->db->query("SELECT
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
        sop_master
        INNER JOIN sop_submaster ON sop_submaster.ms_m_procode = sop_master.m_procode ");

        return $sql->result();
    
}


public function reportlistDate()
{
    $datestart = "";
    $dateend ="";
    $datestart = $this->input->post("date_start");
    $dateend = $this->input->post("date_end");

        $sql = $this->db->query("SELECT
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
        sop_master
        INNER JOIN sop_submaster ON sop_submaster.ms_m_procode = sop_master.m_procode
        WHERE sop_master.m_datetime_create BETWEEN '$datestart 00:00:00' AND '$dateend 00:00:00' ");

        return $sql->result();
    
}











}
/* End of file ModelName.php */
