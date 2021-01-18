<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->db2 = $this->load->database('saleecolour', TRUE);
    date_default_timezone_set("Asia/Bangkok");
  }

  public function escape_string()
  {
    return mysqli_connect("192.190.2.3", "chainarong", "Admin1234", "saleecolour");
  }


  public function check_login()
  {

    $this->load->library('user_agent');
    $user = mysqli_real_escape_string($this->escape_string(), $_POST['username']);
    $pass = mysqli_real_escape_string($this->escape_string(), md5($_POST['password']));
    // If System go on Please add md5 to element name password 'md5'


    $checkuser = $this->db2->query(sprintf("SELECT * FROM member WHERE username = '%s' and password = '%s'  ", $user, $pass));

    $checkdata = $checkuser->num_rows();

    if ($checkdata == 0) {
      echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" style="font-size:15px;text-align: center;">ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง</div>');
      redirect('login');
      die();
    } else {

      if ($checkuser->row()->DeptCode == 1006 || $checkuser->row()->DeptCode == 1002 || $checkuser->row()->ecode == "M1848") {
        

        foreach ($checkuser->result_array() as $r) {
          $_SESSION['username'] = $r['username'];
          $_SESSION['password'] = $r['password'];
          $_SESSION['Fname'] = $r['Fname'];
          $_SESSION['Lname'] = $r['Lname'];
          $_SESSION['Dept'] = $r['Dept'];
          $_SESSION['ecode'] = $r['ecode'];
          $_SESSION['DeptCode'] = $r['DeptCode'];
          $_SESSION['memberemail'] = $r['memberemail'];
          $_SESSION['file_img'] = $r['file_img'];

          // insert login log
          session_write_close();
        }

      } else {
        echo "<script>";
        echo "alert('โปรแกรมนี้ใช้งานได้เฉพาะ SALES เท่านั้น')";
        echo "</script>";

        header("refresh:0; url=".base_url('login'));
        exit();
      }


      // Code Verify user
      if (checkVerifyUser($_SESSION['ecode']) == false) {
        header("refresh:0; url=" . base_url('login/verify_user/'));
      } else {
        $uri = isset($_SESSION['RedirectKe']) ? $_SESSION['RedirectKe'] : '/intsys/sop/';
        header('location:' . $uri);
        // header("refresh:0; url=" . base_url());
      }


      // Code Verify user


    }
  }



  public function call_login()
  { //*****Check Session******//
    if (isset($_SESSION['username']) == "") {
      $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
      header("refresh:0; url=" . base_url('login'));
      die();
    }
  }


  public function logout()
  {
    session_destroy();
    $this->session->unset_userdata('referrer_url');
    header("refresh:0; url=" . base_url('login'));
  }

  public function getuser()
  {
    $sessionUsername = $_SESSION['username'];
    if ($sessionUsername != "") {
      $result = $this->db2->query("SELECT * FROM member WHERE username = '$sessionUsername' ");
      return $result->row();
    } else {
      header("refresh:0; url=" . base_url('login'));
      die();
    }
  }


  public function db2()
  {
    return $this->db2;
  }




  public function save_verify_user()
  {
    if (isset($_POST['btnSaveVerify'])) {

      $verifyUser = array(
        "username" => $this->input->post("username"),
        "Fname" => $this->input->post("Fname"),
        "Lname" => $this->input->post("Lname"),
        "ecode" => $this->input->post("ecode"),
        "Dept" => $this->input->post("Deptname"),
        "DeptCode" => $this->input->post("Dept"),
        "memberemail" => $this->input->post("memberemail"),
        "posi" => $this->input->post("posi"),
        "status" => "Activated"
      );

      if ($this->db->insert("member_new", $verifyUser)) {
        return true;
      } else {
        return false;
      }
    }
  }
}
// End model
