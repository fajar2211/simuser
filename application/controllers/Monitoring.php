<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
//        if ($this->session->userdata('status') != "login") {
        if($this->session->userdata('logged_in') !== TRUE){
            redirect(base_url("auth"));
            
        }
        $this->load->model("Monitoring_model");
    }
    
    public function mohon_default()
	{
        $data["mohon"]=$this->Monitoring_model->getMohon();
        $this->load->view('mon_mohon_default',$data);
    }
    
    public function mohon()
	{
        $data["mohon"]=$this->Monitoring_model->getMohon();
        $this->load->view('mon_mohon',$data);
    }
    
    public function search()
	{
//        $data["mohon"]=$this->Monitoring_model->getMohon();
        $keyword = $this->input->post('keyword');
        $mohon = $this->Monitoring_model->getSearch($keyword);
//        var_dump($mohon);exit;
        $hasil = $this->load->view('mon_mohon_view', array('mohon'=>$mohon), true);
//        var_dump($hasil);exit;
        $callback = array(
            'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
            );
        
        echo json_encode($callback);
        }
    
    public function status() {
//        $data["status"]=$this->Monitoring_model->getStatus();
//        $this->load->view('mon_status',$data);
        $this->load->view('mon_status');
        }   
    
    public function tampil() {
        $keyword = $this->input->post('keyword');
        $data["tampil"]=$this->Monitoring_model->getSearchStatus($keyword);
        $this->load->view('mon_status_view',$data);
//        $this->load->view('mon_status');
        }       
    
 
}
