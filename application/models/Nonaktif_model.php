<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nonaktif_model extends CI_Model {
    
    var $API = "";

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        
        $this->API = "http://localhost/simpus/webservice/ref_pusk.php";
    }
    
    public function getNomorBaruNonAktif(){
        $kode_pusk = json_decode($this->curl->simple_get($this->API . '/pusk'));
            foreach ($kode_pusk as $row){
                $pusk = $row->kode;
        $hasil=$this->db->query("select a.mohon_id||'-'||c.nm||'-'||to_char(now(),'YYYYMMDD')||'-'||lpad(a.no_urut_terakhir::text,5,'0') as nomor,b.jenis_mohon from petugas_mohon_nomor a,petugas_mohon_ref b,profil_puskesmas c where a.mohon_id=b.mohon_id and a.mohon_id='PU-03' and a.kode_pusk=c.kode_puskesmas and a.kode_pusk='$pusk'");
        return $hasil->result_array(); 
            }
    }
    
    public function getPegawaiPetugasNonAktif(){
        $id = $this->session->userdata('petugas_id');
        return $this->db->from('petugas')
                ->join('pegawai', 'petugas.petugas_id=pegawai.petugas_id')
                ->join('profil_puskesmas', 'profil_puskesmas.kode_puskesmas=pegawai.kodepusk')
                ->join('jenis_petugas_ref', 'jenis_petugas_ref.jenis_petugas_id=petugas.jenis_petugas_id')
                ->where(array('petugas.petugas_id'=>$id))
                ->get()
                ->result_array();
    }
    
    public function generateNomorBaruNonAktif(){
        $kode_pusk = json_decode($this->curl->simple_get($this->API . '/pusk'));
            foreach ($kode_pusk as $row){
                $pusk = $row->kode;        
        $hasil=$this->db->query("update petugas_mohon_nomor set no_urut_terakhir=no_urut_terakhir+1,tgl_akhir_generate=now() where mohon_id='PU-03' and kode_pusk='$pusk'");
        return $hasil; 
            }
    }
    
    public function addNonaktif(){
        $post = $this->input->post();
            $data = new stdClass();
//            $data->petugas_mohon_trans_id = $this->db->insert_id();
            $data->jenis_mohon_id = $post['nomor'];
            $data->jenis_mohon_trans = $post['jenis_mohon_trans'];
            $data->nama = $post['nama'];
            $data->nik = $post['nik'];
            $data->nip = $post['nip'];
            $data->jss_akun = $post['jss_akun'];
            $data->jss_user = $post['jss_user'];
            $data->profesi = $post['profesi'];
            $data->jabatan = $post['jabatan'];    
            $data->email = $post['email'];
            $data->telp = $post['telp'];
            $data->user_name = $post['user_name'];
            $data->passwd = $post['passwd']; 
            $data->tgl_mulai_aktif = $post['start_date'];
            $data->tgl_expired = $post['end_date'];
            $data->alamat = $post['alamat'];
            $data->jenis_petugas_id = $post['jenis_petugas_id'];            
            $data->hak_akses_id = $post['hak_akses_id'];
            $data->lampiran = $this->_uploadFile();
            $data->kodepusk = $post['puskesmas'];
            $data->status_id = 1;

            $this->db->insert('petugas_mohon_trans', $data);
            
    }
    
    private function _uploadFile() {
//        $data_product = new stdClass();
        $config['upload_path'] = './upload/lampiran';
        $config['allowed_types'] = 'pdf';
//        $config['file_name']            = $data_product->product_code;
        $config['overwrite'] = true;
        $config['max_size'] = 10240; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('lampiran')) {
            return $this->upload->data('file_name');
        }
        print_r($this->upload->display_errors());
//        return "default.jpg";
    }
    
}
