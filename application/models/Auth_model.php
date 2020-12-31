<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

class Auth_model extends CI_Model {
    
    var $API = "";
    
     function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->API = "http://localhost/simpus/webservice/ref_pusk.php";

    }
    
    
    function auth_login1 ($table,$where) {
        return $this->db->get_where($table,$where);
    }
    
    function auth_login($username,$password){
    $this->db->where('user_name',$username);
    $this->db->where('passwd',$password);
    $this->db->where('is_aktif',true);
    $result = $this->db->get('petugas',1);
    return $result;
//        $hasil=$this->db->query("select *
//            from petugas pet
//            join pegawai peg on (pet.petugas_id=peg.petugas_id)
//            where --pet.petugas_id=2473
//            (case when peg.expired is null then true else CURRENT_DATE <= peg.expired END)
//            and pet.is_aktif
//            and pet.user_name='$username'
//            and pet.passwd='$password'");
//        return $hasil; 
  }
    
    function getPuskesmas(){
        $kode_pusk = json_decode($this->curl->simple_get($this->API . '/pusk'));
        return $kode_pusk;
        
    }
}