<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
//        if ($this->session->userdata('status') != "login") {
        if($this->session->userdata('logged_in') !== TRUE){
            redirect(base_url("auth"));
            
        }
        $this->load->model("Pegawai_model");
        $this->load->model("Petugas_model");
        $this->load->model("Registrasi_model");
    }
    
    public function index()
	{
        $data1["pegawai1"]=$this->Pegawai_model->getJumlahPegawai();
        $data1["pegawai2"]=$this->Pegawai_model->getJumlahPegawai_Not_Akun();
        $data1["petugas1"]=$this->Petugas_model->getJumlahPetugas();
        $data1["petugas2"]=$this->Petugas_model->getJumlahPetugas_Not_Daftar();
         $data1["registrasi"]=$this->Registrasi_model->getJumlahRegistrasi();
        $this->load->view('template/index',$data1);
        }
    
}
