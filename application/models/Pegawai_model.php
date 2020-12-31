<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
//        $this->db1 = $this->load->database('puskjt', true);
//        $this->db2 = $this->load->database('puskjt', true);
//        $this->db3 = $this->load->database('puskjt', true);
//        
//        ini_set('max_execute_time')
//        set_time_limit($seconds)
    }

    function getAllPegawai() {
//        return $this->db->get('pegawai')->result_array();
//        $this->db->query('');
        $query = $this->db->get_where('pegawai', array('puskesmas' => 'JT'));
        return $query->result_array();
    }

    function getJumlahPegawai() {
        $hasil = $this->db->get_where('pegawai', array('puskesmas' => 'JT'));
        if ($hasil->num_rows() > 0) {
            return $hasil->num_rows();
        } else {
            return 0;
        }
    }

    /**
     *
     * @var CI_DB_query_builder
     */
//    var $db;

    function getPegawai_Not_Akun() {
//        return $this->db->get('pegawai')->result_array();
//        $this->db->query('');
        $hasil = $this->db->query("SELECT * FROM pegawai a WHERE a.puskesmas='JT' and NOT EXISTS (SELECT * FROM petugas b where a.user_name=b.user_name)");
        return $hasil->result_array();
    }

    function getPegawai_Not_Akun_Id($_id) {
//        return $this->db->get('pegawai')->result_array();
//        $this->db->query('');
        $id = intval($_id);
        $hasil = $this->db->query("SELECT * FROM pegawai a WHERE a.puskesmas='JT' and NOT EXISTS (SELECT * FROM petugas b where a.user_name=b.user_name) AND pegawai_id = '$id'");
        return $hasil->row_array();
    }

    function getJumlahPegawai_Not_Akun() {
//        $hasil=$this->db->query("SELECT * FROM pegawai a WHERE a.puskesmas NOT in (SELECT distinct puskesmas FROM petugas)");
//        $hasil=$this->db->query("SELECT * FROM pegawai WHERE user_name NOT in (SELECT distinct user_name FROM petugas) AND puskesmas IN ('JT')");
        $hasil = $this->db->query("SELECT * FROM pegawai a WHERE a.puskesmas='JT' and NOT EXISTS (SELECT * FROM petugas b where a.user_name=b.user_name)");
        if ($hasil->num_rows() > 0) {
            return $hasil->num_rows();
        } else {
            return 0;
        }
    }

    function edit_pegawai_non($pegawai_id) {
        $post = $this->input->post();
        
        $status = null;

        if (!empty($post)) {
            $this->db->trans_begin();
            
            $getpegawai = $this->db->where(array('pegawai_id' => $post['pegawai_id']))->get('pegawai');
            $datapegawai = empty($getpegawai) ? new stdClass() : $getpegawai->row();
            
            $data = new stdClass();
//        $data->petugas_id = $post['petugas_id'];
            $data->petugas_nama = $datapegawai->nama; //ambil data dari pegawai
            $data->user_name = $post['user_name'];
            $data->passwd = md5($post['passwd']);
            $data->jenis_petugas_id = $post['jenis_petugas_id'];
            $data->petugas_alamat = $post['petugas_alamat'];
            $data->petugas_no_telp = $datapegawai->telp; //ambil data dari pegawai
            $data->hak_akses_id = $post['hak_akses_id'];
            $this->db->insert('petugas', $data);
            
//            $datapegawai = new stdClass();
            $datapegawai->petugas_id = $this->db->insert_id();
//            $datapegawai->telp = $post['telp'];
            $datapegawai->jabatan = $post['jabatan'];
            $datapegawai->profesi = $post['profesi'];
            $datapegawai->user_name = $post['user_name']; //ambil data dari petugas yg sudah diinsertkan
            $datapegawai->tgl_mulai_aktif = $post['start_date'];
            $datapegawai->expired = $post['end_date'];
            $this->db->update('pegawai', $datapegawai, array('pegawai_id' => $post['pegawai_id']));
            
            $this->db->trans_commit();
            $status=$this->db->trans_status();
        }
        
        return $status;
    }
    
    

}
