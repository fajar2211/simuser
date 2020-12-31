<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sah_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }
    
    public function getSahAtasan(){
        return $this->db->from('petugas_mohon_trans')
                ->join('profil_puskesmas', 'petugas_mohon_trans.kodepusk = profil_puskesmas.kode_puskesmas')
//                ->where(array('status_id' => '1'))
//                ->order_by('petugas_mohon_trans_id','DESC')
                ->get()
                ->result_array();
    }
    
    public function getSahAtasan_byMohon($jenis_mohon_id){
        return $this->db->from('petugas_mohon_trans')
                ->join('profil_puskesmas', 'petugas_mohon_trans.kodepusk = profil_puskesmas.kode_puskesmas')
                ->where(array('petugas_mohon_trans.jenis_mohon_id' => $jenis_mohon_id))
                ->get()
                ->row_array();
    }
    
    public function simpanSahAtasan1(){
        $post = $this->input->post();
        $data = new stdClass();
        $data->petugas_sah_atasan = $post['petugas_sah_atasan'];
        $data->tgl_sah_atasan = date("Y-m-d H:i:s");
        $data->flag_sah_atasan = $post['flag_sah_atasan'];
        $data->alasan_sah_atasan = $post['alasan_sah_atasan'];
        $data->status_id = $post['status_id'];
        
        $this->db->update('petugas_mohon_trans',$data, array('jenis_mohon_id' => $post['jenis_mohon_id']));
    }
    
//    public function getSahAdmin(){
//        return $this->db->from('petugas_mohon_trans')
//                ->join('profil_puskesmas', 'petugas_mohon_trans.kodepusk = profil_puskesmas.kode_puskesmas')
//                ->get()
//                ->result_array();
//    }
    
    public function simpanSahAdmin1(){
        $post = $this->input->post();
        $data = new stdClass();
        $data->petugas_sah_admin = $post['petugas_sah_admin'];
        $data->tgl_sah_admin = date("Y-m-d H:i:s");
        $data->flag_sah_admin = $post['flag_sah_admin'];
        $data->alasan_sah_admin = $post['alasan_sah_admin'];
        $data->status_id = $post['status_id'];
        
        $this->db->update('petugas_mohon_trans',$data, array('jenis_mohon_id' => $post['jenis_mohon_id']));
    }
    
    public function simpanReg() {
            $post = $this->input->post();
            $this->db->trans_begin();
            
            $gettrans = $this->db->where(array('jenis_mohon_id' => $post['jenis_mohon_id']))->get('petugas_mohon_trans');
            $datatrans = empty($gettrans) ? new stdClass() : $gettrans->row();

            $datapetugas = new stdClass();
            $datapetugas->petugas_nama = $datatrans->nama;
            $datapetugas->user_name = $datatrans->user_name;
            $datapetugas->passwd = $datatrans->passwd;
            $datapetugas->jenis_petugas_id = $datatrans->jenis_petugas_id;
            $datapetugas->petugas_alamat = $datatrans->alamat;
            $datapetugas->petugas_no_telp = $datatrans->telp;
            $datapetugas->hak_akses_id = $datatrans->hak_akses_id;
            $this->db->insert('petugas', $datapetugas);
            
            $datapegawai = new stdClass();
            $datapegawai->petugas_id = $this->db->insert_id();
//            $datapegawai->urut = $this->db->insert_id();
            $datapegawai->nama = $datatrans->nama;
            $datapegawai->nik = $datatrans->nik;
            $datapegawai->nip = $datatrans->nip;
            $datapegawai->jss_akun = $datatrans->jss_akun;
            $datapegawai->jss_user = $datatrans->jss_user;
            $datapegawai->jabatan = $datatrans->jabatan;
            $datapegawai->profesi = $datatrans->profesi;
            $datapegawai->email = $datatrans->email;
            $datapegawai->telp = $datatrans->telp;
            $datapegawai->user_name = $datatrans->user_name;
            $datapegawai->kodepusk = $datatrans->kodepusk;
            $datapegawai->tgl_mulai_aktif = $datatrans->tgl_mulai_aktif;
            $datapegawai->expired = $datatrans->tgl_expired;
            $this->db->insert('pegawai', $datapegawai);

            $this->db->trans_complete();
            return $this->db->trans_status();

        }
        
    public function simpanNon() {
            $post = $this->input->post();
//            $id = $this->session->userdata('petugas_id');
            $this->db->trans_begin();
            
//            $gettrans = $this->db->where(array('jenis_mohon_id' => $post['jenis_mohon_id']))->get('petugas_mohon_trans');
            $gettrans = $this->db->from('petugas_mohon_trans')
                    ->join('pegawai', 'petugas_mohon_trans.jss_akun=pegawai.jss_akun')
                    ->join('petugas', 'petugas.petugas_id=pegawai.petugas_id')
                    ->where(array('petugas_mohon_trans.jenis_mohon_id'=>$post['jenis_mohon_id']))
                    ->get();
//                    ->result();
            $datatrans = empty($gettrans) ? new stdClass() : $gettrans->row();

            $datapetugas = new stdClass();
            $datapetugas->is_aktif=false;
            $this->db->update('petugas', $datapetugas, array('petugas_id' => $datatrans->petugas_id));
//            $this->db->update('petugas', $datapetugas);
            
            $datapegawai = new stdClass();
            $datapegawai->is_aktif=false;
            $datapegawai->edit_dt=date("Y-m-d H:i:s");
            $this->db->update('pegawai', $datapegawai, array('jss_akun' => $datatrans->jss_akun));
//            $this->db->update('pegawai', $datapegawai);

            $this->db->trans_complete();
            return $this->db->trans_status();

        }
        
    
    public function getAdminSah(){ // untuk sendmail admin setelah setuju atasan
        return $this->db->from('petugas')
                ->join('pegawai', 'petugas.petugas_id=pegawai.petugas_id')
                ->where('jabatan_id=0')
                ->get()
                ->result();
    }

    public function getPegawaiPetugas($id){ // untuk sendmail user setelah setuju atasan dan admin user
        return $this->db->from('petugas_mohon_trans')
                ->join('pegawai', 'petugas_mohon_trans.jss_akun=pegawai.jss_akun')
                ->join('petugas', 'petugas.petugas_id=pegawai.petugas_id')
                ->join('profil_puskesmas', 'profil_puskesmas.kode_puskesmas=petugas_mohon_trans.kodepusk')
                ->where('petugas_mohon_trans.nik=pegawai.nik')
                ->where('petugas_mohon_trans.status_id=3')
                ->where(array('petugas_mohon_trans.jenis_mohon_id'=>$id))
                ->get()
                ->result();
    }
    
    public function getPegawaiPetugasTolak($id){ // untuk sendmail user setelah tolak atasan dan admin user
        return $this->db->from('petugas_mohon_trans')
                ->join('profil_puskesmas', 'profil_puskesmas.kode_puskesmas=petugas_mohon_trans.kodepusk')
                ->where('petugas_mohon_trans.status_id=4')
                ->where(array('petugas_mohon_trans.jenis_mohon_id'=>$id))
                ->get()
                ->result();
    }
    
    public function getPegawaiPetugasTerima($id){ // untuk sendmail user setelah setuju atasan
        return $this->db->from('petugas_mohon_trans')
                ->join('profil_puskesmas', 'profil_puskesmas.kode_puskesmas=petugas_mohon_trans.kodepusk')
                ->where('petugas_mohon_trans.status_id=2')
                ->where(array('petugas_mohon_trans.jenis_mohon_id'=>$id))
                ->get()
                ->result();
    }
    
    public function getSearchSah($tanggal1,$tanggal2,$nomor,$nama,$nip){
        return $this->db->from('petugas_mohon_trans')
//        echo $this->db->from('petugas_mohon_trans')
                ->join('profil_puskesmas', 'profil_puskesmas.kode_puskesmas=petugas_mohon_trans.kodepusk')
                ->where(empty($tanggal1) ? array() : array('tgl_mohon >='=>$tanggal1))
                ->where(empty($tanggal2) ? array() : array('tgl_mohon <='=>$tanggal2))
                ->where(empty($nomor) ? array() : array('jenis_mohon_id like'=>"%{$nomor}%"))
                ->where(empty($nama) ? array() : array('nama like'=>"%{$nama}%"))
                ->where(empty($nip) ? array() : array('nip like'=>"%{$nip}%"))
//                ->or_where(array('status_id'=>$status))
//                ->get_compiled_select(); exit;
                ->get()
                ->result_array();
    }

}