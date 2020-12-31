<?php

class Pegawai extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
//                if ($this->session->userdata('status') != "login") {
                    if($this->session->userdata('logged_in') !== TRUE){
                redirect(base_url("auth"));           
                }
                $this->load->model("Pegawai_model");
                $this->load->model("Petugas_model");
                $this->load->helper('form');
	}
    
    public function index()
	{
        // load view admin/dashboard.php
            $data["pegawai"]=$this->Pegawai_model->getAllPegawai();
            $this->load->view("pegawai",$data);
            //return true;
	}
    
    public function non_akun()
	{
        // load view admin/dashboard.php
            $data["pegawai_non"]=$this->Pegawai_model->getPegawai_Not_Akun();
            $this->load->view("pegawai_non_akun",$data);
            //return true;
	}
        
    public function edit_pegawai($pegawai_id = null)
	{
        
        // load view admin/dashboard.php
//            $data["pegawai_non"]=$this->Pegawai_model->getPegawai_Not_Akun();
            $pegawai_non = $this->Pegawai_model;
            $data["pegawai_non"]=$this->Pegawai_model->getPegawai_Not_Akun_Id($pegawai_id);
            $data["jenis_petugas"]=$this->Petugas_model->getJenisPetugas();
            $data["puskesmas"]=$this->Petugas_model->getPuskesmas();
//            var_dump($data); exit;
            $data["status"]=$pegawai_non->edit_pegawai_non($pegawai_id);

            $this->load->view("edit_pegawai",$data);
            
            //return true;
	}
    
    

}