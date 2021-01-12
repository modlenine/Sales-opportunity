<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("main/main_model" , "main");
    }
    


    // Function call page
    public function index()
    {
        checkSession();

        $data = array(
            "title" => "Index page"
        );
        getHead();
        getContent("index" , $data);
        getFooter();
    }


    public function projectlist_page()
    {
        checkSession();

        $data = array(
            "title" => "หน้าแสดงรายการโปรเจค | Sales Opportunity Program"
        );
        getHead();
        getContent("projectlist" , $data);
        getFooter();
    }

    public function addproject_page()
    {
        $data = array(
            "title" => "Add page",
            "year1" => getYear1(),
            "year2" => getYear2(),
            "year3" => getYear3(),
        );
        getHead();
        getContent("addproject" , $data);
        getFooter();
    }

    public function viewfulldata($procode)
    {
        $data = array(
            "title" => "View full page",
            "procode" => getFulldata($procode)->m_procode,
            "detail" => getFulldata($procode)->m_detail,
            "customer" => getFulldata($procode)->m_customer,
            "progroup" => getFulldata($procode)->m_productgroup,
            "datetime" => conDateTimeFromDb(getFulldata($procode)->m_datetime_create),
            "nameuser" => getFulldata($procode)->m_user_name,
            "ecodeuser" => getFulldata($procode)->m_user_ecode,
            "distance" => getFulldata($procode)->m_distance,

            "product" => getFulldata($procode)->ms_productname,
            
        );
        getHead();
        getContent("viewfulldata",$data);
        getFooter();
    }

    public function test()
    {
        getYear1("SOP2012001");
    }

    public function editproject($procode)
    {
        

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
        getContent("editproject" , $data);
        getFooter();
    }




    public function addnewjob($procode)
    {
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
        getContent("addnewjob" , $data);
        getFooter();
    }





    public function usersetting()
    {
        $data = array(
            "title" => "User setting page",
        );

        getHead();
        getContent("usersetting" , $data);
        getFooter();
    }
      // Function call page






    // Load project list to projectlist.html
   public function projectlist()
   {
       $this->main->projectlist();
   }



    //Save data to database
    public function savedata()
    {
        if($this->main->savedata() == true)
        {
            header("refresh:0; url=".base_url('projectlist.html'));
            
        }else{
            echo "<script>";
            echo "alert('บันทึกข้อมูลไม่สำเร็จ')";
            echo "</script>";
            exit;
        }
        
    }
    //Save data to database



    //Save data to database
    public function savedataEdit($procode,$subprocode)
    {
        if($this->main->savedataEdit($procode,$subprocode) == true)
        {
            header("refresh:0; url=".base_url('viewfulldata.html/').$procode);
            
        }else{
            echo "<script>";
            echo "alert('บันทึกข้อมูลไม่สำเร็จ')";
            echo "</script>";
            exit;
        }
        
    }
    //Save data to database




    //Save data to database
    public function savenewjob($procode,$subprocode)
    {
        if($this->main->savenewjob($procode,$subprocode) == true)
        {
            header("refresh:0; url=".base_url('viewfulldata.html/').$procode);
            
        }else{
            echo "<script>";
            echo "alert('บันทึกข้อมูลไม่สำเร็จ')";
            echo "</script>";
            exit;
        }
        
    }
    //Save data to database


    





    // Save Comment

    public function saveComment()
    {
        $this->main->saveComment(); 
    }

    // Save Comment






}
/* End of file Controllername.php */

?>
