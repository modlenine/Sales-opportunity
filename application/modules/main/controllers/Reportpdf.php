<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportpdf extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        date_default_timezone_set("Asia/Bangkok");
        require_once('TCPDF/tcpdf.php');
    }
    

    public function index($cno)
    {
        checkSession();
        $data = array(
            "cvno" => $cno,
            "csvr_cusname" => gCusVFull($cno)->csvr_cusname,
            "csvr_country" => gCusVFull($cno)->csvr_country,
            "csvr_business" => gCusVFull($cno)->csvr_business,
            "csvr_datetime" => conDateTimeFromDb(gCusVFull($cno)->csvr_datetime),
            "csvr_contact" => gCusVFull($cno)->csvr_contact,
            "csvr_salee" => gCusVFull($cno)->csvr_salee,
            "csvr_tel" => gCusVFull($cno)->csvr_tel,
            "csvr_fax" => gCusVFull($cno)->csvr_fax,
            "csvr_email" => gCusVFull($cno)->csvr_email,
            "csvr_discussion" => gCusVFull($cno)->csvr_discussion,
            "csvr_action" => gCusVFull($cno)->csvr_action,
        );

        getContent("reports/report_customer" , $data);

    }







}
/* End of file Controllername.php */





?>