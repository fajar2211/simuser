<?php

class Petugas extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
//                if ($this->session->userdata('status') != "login") {
                if($this->session->userdata('logged_in') !== TRUE){
                redirect(base_url("auth"));           
                }
                $this->load->model("Petugas_model");
	}
    
    public function index()
	{
        // load view admin/dashboard.php
            $data["petugas"]=$this->Petugas_model->getAllPetugas();
            $this->load->view("petugas",$data);
            //return true;
	}
    
    public function non_daftar()
	{
        // load view admin/dashboard.php
            $data["petugas_non"]=$this->Petugas_model->getPetugas_Not_Daftar();
            $this->load->view("petugas_non_daftar",$data);
            //return true;
	}
        
    public function edit_petugas($petugas_id = null)
	{
            $petugas_non = $this->Petugas_model;
            $data["petugas_non"]=$this->Petugas_model->getPetugas_Not_Akun_Id($petugas_id);
            $data["jenis_petugas"]=$this->Petugas_model->getJenisPetugas();
//            $data["puskesmas"]=$this->Petugas_model->getPuskesmas();
//            var_dump($data); exit;
            $data["status"]=$petugas_non->edit_petugas_non($petugas_id);
            $this->load->view("edit_petugas",$data);
	}

}