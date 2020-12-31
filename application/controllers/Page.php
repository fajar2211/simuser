<?php
class Page extends CI_Controller{
  public function __construct(){
    parent::__construct();
    //--tambahan sementara
//    $this->load->model("Product_model");
    //--
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('auth');
    }
  }
 
  public function index(){
      if($this->session->userdata('jabatan_id')==='0'){
        redirect('home');
      }else{
          echo "Access Denied";
      }
 
  }
 
  public function atasan(){
    if($this->session->userdata('jabatan_id')==='101' || $this->session->userdata('jabatan_id')==='102'){
      redirect('home');
    }else{
        echo "Access Denied";
    }
  }
// 
  public function user (){
    if($this->session->userdata('jabatan_id')===NULL){
      redirect('home');
    }else{
        echo "Access Denied";
    }
  }
 
}