<?php
class loginfn{
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



function loginfn()
{
    $obj = new loginfn();
    return $obj->gci();
}


function checkSession()
{
    loginfn()->load->model("login/login_model" , "login");
    loginfn()->login->call_login();
}

function linkImg($img)
{
    if ($img != "") {
        $linkimg = $img;
    } else {
        $linkimg = "defualt.jpg";
    }
    $link = "http://intranet.saleecolour.com/intsys/usermanagement/uploads/$linkimg";
    return $link;
}

function getUser()
{
    loginfn()->load->model("login/login_model", "login");
    return loginfn()->login->getuser();
}



function checkVerifyUser($ecode)
{
    $sql = loginfn()->db->query("SELECT ecode from member_new where ecode = '$ecode' ");
    if($sql->num_rows() == 0){
        return false;
    }else{
        return true;
    }
}


function getDeptname()
{
    loginfn()->load->model("login/login_model", "login");
    $sql = loginfn()->login->db2()->query('SELECT
	Dept,
	DeptCode,
	(
	CASE
			
			WHEN Dept = "PLANNING" THEN
			"PLANNING & CS" 
			WHEN Dept = "EXPORT" THEN
			"PURCHASE & EXPORT" 
			WHEN Dept = "PURCHASE" THEN
			"PURCHASE & EXPORT" 
			WHEN Dept = "AC" THEN
			"ACCOUNT & FINANCE" ELSE Dept 
		END 
		) AS Deptname 
	FROM
		member 
	WHERE
		DeptCode IS NOT NULL 
GROUP BY
	DeptCode ASC');

    $output ='';
    foreach($sql->result() as $rss){
        $output .='
            <option value="'.$rss->DeptCode.'">'.$rss->Deptname.'</option>
        ';
    }
    echo $output;
}


function getPosi()
{
    loginfn()->load->model("login/login_model", "login");
    $sql = loginfn()->login->db2()->query("SELECT posiname , thisrank From posirank where thisrank < 105 and thisrank != 0 order by thisrank asc");

    $output = '';
    foreach($sql->result() as $rs){
        $output .= '
        <option value="'.$rs->thisrank.'">'.$rs->posiname.'</option>
        ';
    }
    echo $output;
}


function convertPosi($posinum)
{
    $posiname='';
    if($posinum == 15){
        $posiname="Staff";
    }else if($posinum == 35){
        $posiname="Group leader";
    }else if($posinum == 45){
        $posiname="Foreman";
    }else if($posinum == 55){
        $posiname="Supervisor";
    }else if($posinum == 65){
        $posiname="Asst manager";
    }else if($posinum == 75){
        $posiname="Manager";
    }else if($posinum == 85){
        $posiname="Director";
    }else if($posinum == 95){
        $posiname="Manager director";
    }
    echo $posiname;
}



?>