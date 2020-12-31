<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }
    
    public function getMohon(){
    return $this->db->from('petugas_mohon_trans')
            ->join('profil_puskesmas', 'petugas_mohon_trans.kodepusk = profil_puskesmas.kode_puskesmas')
//                ->where(array('status_id' => '1'))
            ->get()
            ->result();
    }
    
    public function getSearch($keyword){
        $this->db->like('jenis_mohon_id', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->join('profil_puskesmas', 'petugas_mohon_trans.kodepusk = profil_puskesmas.kode_puskesmas');
        $result = $this->db->get('petugas_mohon_trans')->result();
        return $result;
    }
    
    public function getStatus(){
    return $this->db->from('petugas_mohon_trans')
            ->join('profil_puskesmas', 'petugas_mohon_trans.kodepusk = profil_puskesmas.kode_puskesmas')
//                ->where(array('status_id' => '1'))
            ->get()
            ->result();
    }
    
    public function getSearchStatus($keyword){
        $this->db->like('jenis_mohon_id', $keyword);
        $this->db->join('profil_puskesmas', 'petugas_mohon_trans.kodepusk = profil_puskesmas.kode_puskesmas');
        $result = $this->db->get('petugas_mohon_trans')->result();
        return $result;
    }
}