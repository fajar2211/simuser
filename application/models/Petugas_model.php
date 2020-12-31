<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

class Petugas_model extends CI_Model {
    
    function getAllPetugas() {
//        $query=$this->db->get_where('petugas',array('is_aktif'=>'true'));
//        return $query->result_array();
        $this->db->select('*');
        $this->db->from('petugas a');
        $this->db->join('jenis_petugas_ref b','a.jenis_petugas_id=b.jenis_petugas_id');
        $this->db->where(array('a.is_aktif'=>'true'));
        $query=$this->db->get();
         return $query->result_array(); 
    }
    
    function getJumlahPetugas(){
        $hasil=$this->db->get_where('petugas',array('is_aktif'=>'true'));
        if($hasil->num_rows()>0)
        {
        return $hasil->num_rows();
        }
        else
        {
            return 0;
        }
    }
    
    function getPetugas_Not_Daftar() {
//        $query=$this->db->get_where('petugas',array('is_aktif'=>'true'));
//        return $query->result_array();
        $hasil=$this->db->query("SELECT * FROM petugas a, jenis_petugas_ref c WHERE a.is_aktif=true and a.jenis_petugas_id not in ('0','20','100') and a.jenis_petugas_id=c.jenis_petugas_id and NOT EXISTS 
                (SELECT * FROM pegawai b where a.user_name=b.user_name and b.puskesmas='JT')");
         return $hasil->result_array(); 
    }
    
    function getPetugas_Not_Akun_Id($_id) {
//        return $this->db->get('pegawai')->result_array();
//        $this->db->query('');
        $id = intval($_id);
        $hasil = $this->db->query("SELECT * FROM petugas a WHERE NOT EXISTS (SELECT * FROM pegawai b where a.user_name=b.user_name) AND petugas_id = '$id'");
        return $hasil->row_array();
    }
    
    function getJumlahPetugas_Not_Daftar(){
        $hasil=$this->db->query("SELECT * FROM petugas a WHERE is_aktif=true and jenis_petugas_id not in ('0','20','100') and NOT EXISTS 
                (SELECT * FROM pegawai b where a.user_name=b.user_name and b.puskesmas='JT')");
        if($hasil->num_rows()>0)
        {
        return $hasil->num_rows();
        }
        else
        {
            return 0;
        }
    }
    
    function getJenisPetugas(){
        return $this->db->get('jenis_petugas_ref')->result_array();
    }
    
    public function getJenisPetugas_Id($jenis_petugas_id){
        return $this->db->get_where('jenis_petugas_ref',["jenis_petugas_id" => $jenis_petugas_id])->row();
    }
    
    function getPuskesmas(){
//        $this->db->select('*');
//         $this->db->from('pegawai');
//         $this->db->join('profil_puskesmas','pegawai.puskesmas=profil_puskesmas.nm');
//         $query=$this->db->get();
//         return $query->result(); 
        return $this->db->get('profil_puskesmas')->result();
    }
    
    function edit_petugas_non($petugas_id) {
        $post = $this->input->post();
        
        $status = null;
        
        if (!empty($post)) {
            $data = new stdClass();
            $data->is_aktif=$post['is_aktif'];
            $this->db->update('petugas', $data, array('petugas_id' => $post['petugas_id']));
        }
        
        return $status;
    }
    
}