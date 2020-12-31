<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_model extends CI_Model {
    
    var $API = "";

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        
        $this->API = "http://localhost/simpus/webservice/ref_pusk.php";
    }
    
    public function rules_registrasi() {
        return [
            ['field' => 'nik',
                'label' => 'NIK',
                'rules' => 'trim|required|numeric|exact_length[16]|is_unique[pegawai.nik]']
        ];
    }

    public function add_registrasi1() {
        $post = $this->input->post();
//        $status = null;
//        if (!empty($post)) {
            $this->db->trans_begin();

            $datapegawai = new stdClass();
            $datapegawai->petugas_id = $this->db->insert_id();
            $datapegawai->nama = $post['nama'];
            $datapegawai->nik = $post['nik'];
            $datapegawai->nip = $post['nip'];
            $datapegawai->jss_akun = $post['id_jss'];
            $datapegawai->jss_user = $post['akun_jss'];
            $datapegawai->jabatan = $post['jabatan'];
            $datapegawai->profesi = $post['profesi'];
            $datapegawai->email = $post['email'];
            $datapegawai->telp = $post['telp'];
            $datapegawai->user_name = $post['user_name']; //ambil data dari petugas yg sudah diinsertkan
            $datapegawai->puskesmas = $post['puskesmas'];
            $datapegawai->tgl_mulai_aktif = $post['start_date'];
            $datapegawai->expired = $post['end_date'];
            $this->db->insert('pegawai', $datapegawai);

            $data = new stdClass();
//        $data->petugas_id = $post['petugas_id'];
            $data->petugas_nama = $post['petugas_nama']; //ambil data dari pegawai
            $data->user_name = $post['user_name'];
            $data->passwd = md5($post['passwd']);
            $data->jenis_petugas_id = $post['jenis_petugas_id'];
            $data->petugas_alamat = $post['petugas_alamat'];
            $data->petugas_no_telp = $post['petugas_no_telp']; //ambil data dari pegawai
            $data->hak_akses_id = $post['hak_akses_id'];
            $data->lampiran = $post['lampiran'];
            $this->db->insert('petugas', $data);
            
            

            $this->db->trans_complete();
            return $this->db->trans_status();
//            $status = $this->db->trans_status(); //trans_status();
        }
//        return $status;
//    }

    /**
     *
     * @var CI_DB_query_builder
     */
//    var $db;
    
    public function getNomorBaru(){
        $kode_pusk = json_decode($this->curl->simple_get($this->API . '/pusk'));
            foreach ($kode_pusk as $row){
                $pusk = $row->kode;
        $hasil=$this->db->query("select a.mohon_id||'-'||c.nm||'-'||to_char(now(),'YYYYMMDD')||'-'||lpad(a.no_urut_terakhir::text,5,'0') as nomor,b.jenis_mohon from petugas_mohon_nomor a,petugas_mohon_ref b,profil_puskesmas c where a.mohon_id=b.mohon_id and a.mohon_id='PU-01' and a.kode_pusk=c.kode_puskesmas and a.kode_pusk='$pusk'");
        return $hasil->result_array(); 
            }
    }
    
    public function addRegistrasi(){
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
            $data->passwd = md5($post['passwd']); 
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
    
    public function generateNomorBaru(){
    $kode_pusk = json_decode($this->curl->simple_get($this->API . '/pusk'));
            foreach ($kode_pusk as $row){
                $pusk = $row->kode;        
        $hasil=$this->db->query("update petugas_mohon_nomor set no_urut_terakhir=no_urut_terakhir+1,tgl_akhir_generate=now() where mohon_id='PU-01' and kode_pusk='$pusk'");
        return $hasil; 
            }
    }
    
    public function getMohonTerbaru(){
        return $this->db->from('petugas_mohon_trans')
                ->join('profil_puskesmas', 'petugas_mohon_trans.kodepusk = profil_puskesmas.kode_puskesmas')
                ->order_by('jenis_mohon_id','DESC')
                ->limit(1)
                ->get()
                ->result();
    }
    
    public function getAtasanSah(){
        return $this->db->from('petugas')
                ->join('pegawai', 'petugas.petugas_id=pegawai.petugas_id')
                ->where('jabatan_id=101')
                ->get()
                ->result();
    }
    
    public function getJumlahRegistrasi() {
        $hasil = $this->db->get_where('petugas_mohon_trans');
        if ($hasil->num_rows() > 0) {
            return $hasil->num_rows();
        } else {
            return 0;
        }
    }
    
//    public function cekNIK1(){
//        $nik = $this->input->post('nik');
//        $hasil = $this->db->query("select * from pegawai where nik='$nik'");
//        if ($hasil->num_rows() > 0) {
//            return $hasil->result();
//        } else {
//            return array();
//        }
//          
//    }
    
    public function getPuskesmas(){
        return $this->db->from('profil_puskesmas')
                ->where('is_pustu=false')
                ->order_by('id')
                ->get()
                ->result_array();
    }
            
 
}
