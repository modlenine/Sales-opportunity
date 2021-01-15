<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("main/main_model", "main");
    }









    // View Zone View Zone View Zone
    // View Zone View Zone View Zone
    // View Zone View Zone View Zone
    // Function call page
    public function index()
    {
        checkSession();

        $data = array(
            "title" => "Index page"
        );
        getHead();
        getContent("index", $data);
        getFooter();
    }


    public function projectlist_page()
    {
        checkSession();

        $data = array(
            "title" => "หน้าแสดงรายการโปรเจค | Sales Opportunity Program"
        );
        getHead();
        getContent("projectlist", $data);
        getFooter();
    }

    public function addproject_page()
    {
        checkSession();
        $data = array(
            "title" => "Add page",
            "year1" => getYear1(),
            "year2" => getYear2(),
            "year3" => getYear3(),
        );
        getHead();
        getContent("addproject", $data);
        getFooter();
    }

    public function viewfulldata($procode)
    {
        checkSession();
        $data = array(
            "title" => "View full page",
            "procode" => getFulldata($procode)->m_procode,
            "detail" => getFulldata($procode)->m_detail,
            "customer" => getFulldata($procode)->m_customer,
            "progroup" => getFulldata($procode)->m_productgroup,
            "datetime" => conDateTimeFromDb(getFulldata($procode)->m_datetime_create),
            "nameuser" => getFulldata($procode)->m_user_name,
            "ecodeuser" => getFulldata($procode)->m_owner,
            "distance" => getFulldata($procode)->m_distance,

            "product" => getFulldata($procode)->ms_productname,

        );
        getHead();
        getContent("viewfulldata", $data);
        getFooter();
    }

    public function test()
    {
        getYear1("SOP2012001");
    }

    public function editproject($procode)
    {
        checkSession();
        $data = array(
            "title" => "Edit page",
            "procode" => getFulldata($procode)->m_procode,
            "year1" => getYear1af($procode),
            "year2" => getYear2af($procode),
            "year3" => getYear3af($procode),
            "m_detail" => getFulldata($procode)->m_detail,
            "m_customer" => getFulldata($procode)->m_customer,
            "m_owner" => getFulldata($procode)->m_owner,
            "m_productgroup" => getFulldata($procode)->m_productgroup,
            "m_distance" => getFulldata($procode)->m_distance,

            "ms_productname" => getFulldata($procode)->ms_productname,
            "ms_productuse" => getFulldata($procode)->ms_productuse,
            "ms_percensuccess" => getFulldata($procode)->ms_percensuccess,
            "ms_ideaprice" => getFulldata($procode)->ms_ideaprice,
            "subprocode" => getFulldata($procode)->ms_procode,
            "ms_jobstatus" => getFulldata($procode)->ms_jobstatus,
            "ms_jobtype" => getFulldata($procode)->ms_jobtype,
        );

        getHead();
        getContent("editproject", $data);
        getFooter();
    }



    public function addnewjob($procode)
    {
        checkSession();
        $data = array(
            "title" => "Edit page",
            "procode" => getFulldata($procode)->m_procode,
            "year1" => getYear1af($procode),
            "year2" => getYear2af($procode),
            "year3" => getYear3af($procode),
            "m_detail" => getFulldata($procode)->m_detail,
            "m_customer" => getFulldata($procode)->m_customer,
            "m_owner" => getFulldata($procode)->m_owner,
            "m_productgroup" => getFulldata($procode)->m_productgroup,
            "m_distance" => getFulldata($procode)->m_distance,

            "ms_productname" => getFulldata($procode)->ms_productname,
            "ms_productuse" => getFulldata($procode)->ms_productuse,
            "ms_percensuccess" => getFulldata($procode)->ms_percensuccess,
            "ms_ideaprice" => getFulldata($procode)->ms_ideaprice,
            "subprocode" => getFulldata($procode)->ms_procode,
            "ms_jobstatus" => getFulldata($procode)->ms_jobstatus,
            "ms_jobtype" => getFulldata($procode)->ms_jobtype,

        );

        getHead();
        getContent("addnewjob", $data);
        getFooter();
    }



    public function usersetting()
    {
        checkSession();
        $data = array(
            "title" => "User setting page",
        );

        getHead();
        getContent("usersetting", $data);
        getFooter();
    }


    public function report()
    {
        $data = array(
            "title" => "Opportunity Report page",
        );

        getHead();
        getContent("report", $data);
        getFooter();
    }
    // Function call page
    // View Zone View Zone View Zone
    // View Zone View Zone View Zone
    // View Zone View Zone View Zone















    // Query Zone Query Zone Query Zone
    // Query Zone Query Zone Query Zone
    // Query Zone Query Zone Query Zone

    // Load Zone Load Zone Load Zone
    // Load Zone Load Zone Load Zone
    // Load project list to projectlist.html
    public function projectlist()
    {
        checkSession();
        $this->main->projectlist();
    }

    public function reportlist()
    {
        checkSession();

        $data['rs_report'] = $this->main->reportlist();

        $this->load->view("report_result", $data);
    }

    public function reportlistDate()
    {
        checkSession();

        $data['rs_report'] = $this->main->reportlistDate();

        $this->load->view("report_result", $data);
    }
    // Load Zone Load Zone Load Zone
    // Load Zone Load Zone Load Zone


    // Save Zone Save Zone Save Zone
    // Save Zone Save Zone Save Zone

    //Save data to database
    public function savedata()
    {
        checkSession();
        if ($this->main->savedata() == true) {
            header("refresh:0; url=" . base_url('projectlist.html'));
        } else {
            echo "<script>";
            echo "alert('บันทึกข้อมูลไม่สำเร็จ')";
            echo "</script>";
            exit;
        }
    }
    //Save data to database


    //Save Edit data to database
    public function savedataEdit($procode, $subprocode)
    {
        checkSession();
        if ($this->main->savedataEdit($procode, $subprocode) == true) {
            header("refresh:0; url=" . base_url('viewfulldata.html/') . $procode);
        } else {
            echo "<script>";
            echo "alert('บันทึกข้อมูลไม่สำเร็จ')";
            echo "</script>";
            exit;
        }
    }
    //Save Edit data to database


    //Save new job to database
    public function savenewjob($procode, $subprocode)
    {
        checkSession();
        if ($this->main->savenewjob($procode, $subprocode) == true) {
            header("refresh:0; url=" . base_url('viewfulldata.html/') . $procode);
        } else {
            echo "<script>";
            echo "alert('บันทึกข้อมูลไม่สำเร็จ')";
            echo "</script>";
            exit;
        }
    }
    //Save new job to database


    // Save Comment
    public function saveComment()
    {
        checkSession();
        $this->main->saveComment();
    }
    // Save Comment

    // Save Zone Save Zone Save Zone
    // Save Zone Save Zone Save Zone


    // Query Zone Query Zone Query Zone
    // Query Zone Query Zone Query Zone
    // Query Zone Query Zone Query Zone






















    // Customers Zone Customers Zone Customers Zone
    // Customers Zone Customers Zone Customers Zone
    // Customers Zone Customers Zone Customers Zone
    public function customerslist()
    {
        $data = array(
            "title" => "Customer Visit report list"
        );

        getHead();
        getContent("customerslist", $data);
        getFooter();
    }

    // get Customers list to datatable
    public function getcustomerlist()
    {
        $this->main->getCustomerlist();
    }
    // get Customers list to datatable

    public function addcustomervisit()
    {
        $data = array(
            "title" => "Customer visit report"
        );

        getHead();
        getContent("addcustomervisit", $data);
        getFooter();
    }

    public function savedata_customervisit()
    {
        checkSession();

        if ($this->main->savedata_customervisit() == true) {
            header("refresh:0; url=".base_url('cusvisit_list.html'));
        } else {
            echo "<script>";
            echo "alert('บันทึกข้อมูลไม่สำเร็จ')";
            echo "</script>";
            exit;
        }
    }


    public function savedata_customervisitEdit($cno)
    {
        checkSession();

        if ($this->main->savedata_customervisitEdit($cno) == true) {
            header("refresh:0; url=".base_url('cusvisit_list.html'));
        } else {
            echo "<script>";
            echo "alert('บันทึกข้อมูลไม่สำเร็จ')";
            echo "</script>";
            exit;
        }
    }


    public function viewfullCusvisit($cusformno)
    {
        $data = array(
            "title" => "หน้าแสดงข้อมูลรายการ Customer Visit Report",
            "cno" => $cusformno,
            "csvr_cusname" => gCusVFull($cusformno)->csvr_cusname,
            "csvr_country" => gCusVFull($cusformno)->csvr_country,
            "csvr_business" => gCusVFull($cusformno)->csvr_business,
            "csvr_datetime" => conDateTimeFromDb(gCusVFull($cusformno)->csvr_datetime),
            "csvr_contact" => gCusVFull($cusformno)->csvr_contact,
            "csvr_salee" => gCusVFull($cusformno)->csvr_salee,
            "csvr_tel" => gCusVFull($cusformno)->csvr_tel,
            "csvr_fax" => gCusVFull($cusformno)->csvr_fax,
            "csvr_email" => gCusVFull($cusformno)->csvr_email,
            "csvr_discussion" => gCusVFull($cusformno)->csvr_discussion,
            "csvr_action" => gCusVFull($cusformno)->csvr_action,


        );
        getHead();
        getContent("viewFullCusvisit" , $data);
        getFooter();
    }


    public function editCusvisit($cusformno)
    {
        $data = array(
            "title" => "หน้าแสดง การแก้ไข ข้อมูลรายการ Customer Visit Report",
            "cno" => $cusformno,
            "csvr_cusname" => gCusVFull($cusformno)->csvr_cusname,
            "csvr_country" => gCusVFull($cusformno)->csvr_country,
            "csvr_business" => gCusVFull($cusformno)->csvr_business,
            "csvr_datetime" => conDateTimeFromDb(gCusVFull($cusformno)->csvr_datetime),
            "csvr_contact" => gCusVFull($cusformno)->csvr_contact,
            "csvr_salee" => gCusVFull($cusformno)->csvr_salee,
            "csvr_tel" => gCusVFull($cusformno)->csvr_tel,
            "csvr_fax" => gCusVFull($cusformno)->csvr_fax,
            "csvr_email" => gCusVFull($cusformno)->csvr_email,
            "csvr_discussion" => gCusVFull($cusformno)->csvr_discussion,
            "csvr_action" => gCusVFull($cusformno)->csvr_action,


        );
        getHead();
        getContent("editCusvisit" , $data);
        getFooter();
    }

    public function deleteCusinform()
    {
        $rowid = "";
        $rowid = $this->input->post("rowid");

        $this->db->where("csvrs_autoid" , $rowid);
        $this->db->delete("sop_customervisit_sub");

        echo "delete success";

    }





    // Customers Zone Customers Zone Customers Zone
    // Customers Zone Customers Zone Customers Zone
    // Customers Zone Customers Zone Customers Zone


    public function uploadpage()
    {
        $data = array(
            "title" => "Upload page"
        );

        getHead();
        getContent("upload", $data);
        getFooter();
    }

    public function douploadfile()
    {
        $this->main->douploadfile();
    }


    public function testcode()
    {
        $dc = date_create("2020-01-01");
        $dateCon = date_format($dc, "Y");
        for ($i = 1; $i <= 3; $i++) {
            echo $i . " " . $dateCon . "<br>";

            $dateCon++;
        }
    }
    public function map()
    {
        $this->load->view("map");
    }
}
/* End of file Controllername.php */
