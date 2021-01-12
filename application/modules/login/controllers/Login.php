<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('login_model');

  }

  public function index()
  {
    if (isset($_SESSION['username']) == "") {
      $this->load->view("index");
    }else{
      header("refresh:0; url=".base_url());
    }

  }


  public function check_login(){
    $this->login_model->check_login();
  }

  public function logout(){
    $this->login_model->logout();
  }


public function verify_user()
{
  $data = array(
    "title" => "Verify page"
  );
  getContent("verify_user" , $data);
}

public function save_verify_user()
{
  if($this->login_model->save_verify_user() == true)
  {
    header("refresh:0; url=".base_url('login/check_login'));
  }else{
    echo '<script>';
    echo 'alert("ยืนยันตัวตนไม่สำเร็จกรุณาติดต่อไอที")';
    echo '</script>';
    exit;
    header("refresh:0; url=".base_url("login/logout"));
  }
}




}
