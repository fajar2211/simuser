<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sah extends CI_Controller {
    public function __construct() {
        parent::__construct();
//        if ($this->session->userdata('status') != "login") {
        if($this->session->userdata('logged_in') !== TRUE){
            redirect(base_url("auth"));
            
        }
        $this->load->model("Sah_model");
        $this->load->model("Registrasi_model");
        $this->load->library('encrypt');   
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0',false);
        header('Pragma: no-cache');
    }
    
    public function index()
	{
        $data["sahatasan"]=$this->Sah_model->getSahAtasan();
        $this->load->view('sah',$data);
        }
    
    public function atasan($jenis_mohon_id = null){
        $sahatasan = $this->Sah_model;
        $data["sah"] = $sahatasan->getSahAtasan_byMohon($jenis_mohon_id);
//       var_dump($data); exit;
        $this->load->view("sahatasan",$data);
            
    }

    public function simpanSahAtasan(){
        $sahatasan1 = $this->Sah_model;
        $sahatasan1->simpanSahAtasan1(); // update tabel petugas_mohon_trans
        $this->sendMailAdmin(); // email ke admin setelah disetujui atasan
        $this->sendMailUserTerimaAtasan(); // email ke user setelah disetujui atasan
        redirect("sah");
            
    }
    
    public function simpanSahAtasanTolak(){
        $sahatasan1 = $this->Sah_model;
        $sahatasan1->simpanSahAtasan1(); // update tabel petugas_mohon_trans
        $this->sendMailAdmin(); // email ke admin setelah ditolak atasan
        $this->sendMailUserTolak(); // email ke user setelah ditolak atasan/admin 
        redirect("sah");
            
    }
    
    public function simpanSahAdmin(){ 
        $post = $this->input->post();
        $jenis_mohon_reg=substr($post['jenis_mohon_id'],0,5);
//        var_dump($jenis_mohon_reg);exit;
        
        $sahatasan1 = $this->Sah_model;  
        $sahatasan1->simpanSahAdmin1(); // update tabel petugas_mohon_trans
        
        if($jenis_mohon_reg=='PU-01') {
            $statusReg = $sahatasan1->simpanReg(); // insert tabel pegawai dan petugas
            if (!$statusReg){
                die('Gagal Simpan Registrasi');
            }
            $this->sendMailUserSelesai(); // email ke user setelah disetujui admin 
        } elseif ($jenis_mohon_reg=='PU-03') {
            $statusNon = $sahatasan1->simpanNon(); // update tabel pegawai dan petugas   
            if (!$statusNon){
                die('Gagal Simpan Penonaktifan');
            }
            $this->sendMailUserSelesaiNon(); // email ke user setelah disetujui admin
        }
        
//        $this->sendMailUserSelesai(); // email ke user setelah disetujui admin 
        redirect("sah");            
    }
    
    public function simpanSahAdminTolak(){
        $sahatasan1 = $this->Sah_model;
        $sahatasan1->simpanSahAdmin1(); // update tabel petugas_mohon_trans
        $this->sendMailUserTolak(); // email ke user setelah ditolak atasan/admin 
        redirect("sah");            
    }
    
    public function sendMailAdmin(){
        $this->load->library('mailer');
//        $email_penerima = $this->input->post('email_penerima');
//        $subjek = $this->input->post('subjek');
//        $pesan = $this->input->post('pesan');
//        $attachment = $_FILES['attachment'];
        $isian_email = $this->Sah_model->getAdminSah();
            foreach ($isian_email as $row) { 
                $email_penerima = $row->email;        
                $subjek = 'Pengesahan Permohonan';
                $pesan = '';
                $pesan .= 'Yth. Bp/Ibu '.$row->nama.',<br/>';
            }
        $isian_email1 = $this->Registrasi_model->getMohonTerbaru();
                foreach ($isian_email1 as $row) { 
                $pesan .= '<br/>';
                if ($row->flag_sah_atasan == 'S') {
                $pesan .= 'Berikut permintaan persetujuan '.$row->jenis_mohon_trans.', dengan detail user :'.'<br/>';
                } elseif ($row->flag_sah_atasan == 'T') {
                $pesan .= 'Berikut pemberitahuan '.$row->jenis_mohon_trans.', dengan detail user :'.'<br/>';    
                }
                $pesan .= '<br/>';
                $pesan .= '<table>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nomor Permohonan</td>'.': '.$row->jenis_mohon_id.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nama</td>'.': '.$row->nama.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIP</td>'.': '.$row->nip.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIK</td>'.': '.$row->nik.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>ID JSS</td>'.': '.$row->jss_akun.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Alamat</td>'.': '.$row->alamat.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Telp.</td>'.': '.$row->telp.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Email</td>'.': '.$row->email.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Jabatan</td>'.': '.$row->jabatan.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Profesi</td>'.': '.$row->profesi.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Puskesmas</td>'.': '.$row->nama_puskesmas.'<br/>';
                $pesan .= '</tr>';
                
            if ($row->flag_sah_atasan == 'S') {
                $pesan .= '<tr>';
                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' sudah disetujui oleh Atasan'.'<br/>';
                $pesan .= '</tr>';
            } elseif ($row->flag_sah_atasan == 'T') {
                $pesan .= '<tr>';
                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' ditolak oleh Atasan'.'<br/>';
                $pesan .= '</tr>';    
            }
                
                $pesan .= '</table>';
                $pesan .= '<br/>';
                $pesan .= 'Demikian terima kasih.'.'<br/>';
                $pesan .= '<br/>';
                $pesan .= 'Hormat kami,'.'<br/>';
                $pesan .= 'Seksi Surveilans dan Sistem Informasi Kesehatan'.'<br/>';
                $pesan .= 'Bidang Pencegahan dan Penanggulangan Penyakit'.'<br/>';
                $pesan .= 'Dinas Kesehatan Kota Yogyakarta'.'<br/>';
//                $pesan .= 'Jl. Kenari 56 Yogyakarta'.'<br/>';
//                $pesan .= 'Kode Pos : 55165;  Telp.: (0274)515868'.'<br/>';
            } 
        $content = $this->load->view('isi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
          'email_penerima'=>$email_penerima,
          'subjek'=>$subjek,
          'content'=>$content
//          'attachment'=>$attachment
        );
        if(empty($attachment['name'])){ // Jika tanpa attachment
            $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
                }else{ // Jika dengan attachment
            $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
                }
                
//        echo "<b>".$send['status']."</b><br />";
//        echo $send['message'];
//        echo "<br /><a href='".base_url("registrasi")."'>Kembali ke Form</a>";
    }
    
    public function sendMailUserSelesai(){
        $this->load->library('mailer');
//        $email_penerima = $this->input->post('email_penerima');
//        $subjek = $this->input->post('subjek');
//        $pesan = $this->input->post('pesan');
//        $attachment = $_FILES['attachment'];
        $id = $this->input->post('jenis_mohon_id');
        $isian_email = $this->Sah_model->getPegawaiPetugas($id);
            foreach ($isian_email as $row) { 
                $email_penerima = $row->email;        
                $subjek = $row->jenis_mohon_trans;
                $pesan = '';
                $pesan .= 'Yth. Bp/Ibu '.$row->nama.',<br/>';
//            }
//        $isian_email1 = $this->Registrasi_model->getMohonTerbaru();
//                foreach ($isian_email1 as $row) { 
                $pesan .= '<br/>';
                $pesan .= 'Berikut '.$row->jenis_mohon_trans.', dengan detail user :'.'<br/>';
                $pesan .= '<br/>';
                $pesan .= '<table>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nomor Permohonan</td>'.': '.$row->jenis_mohon_id.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nama</td>'.': '.$row->nama.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIP</td>'.': '.$row->nip.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIK</td>'.': '.$row->nik.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>ID JSS</td>'.': '.$row->jss_akun.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Alamat</td>'.': '.$row->alamat.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Telp.</td>'.': '.$row->telp.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Email</td>'.': '.$row->email.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Jabatan</td>'.': '.$row->jabatan.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Profesi</td>'.': '.$row->profesi.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Puskesmas</td>'.': '.$row->nama_puskesmas.'<br/>';
                $pesan .= '</tr>';
                
//            if ($row->flag_sah_admin == 'S') {
                $pesan .= '<tr>';
                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' sudah disetujui oleh Admin User'.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Username</td>'. ': '.$row->user_name.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
//                $pesan .= '<td>Password</td>'.': '.$row->encrypt->decode->passwd.'<br/>';
                $pesan .= '<td style="display:none;" hidden>Password</td>'.': '.$encrypt= $row->passwd.'<br/>';
                $pesan .= '<td>Password</td>'.': '.$this->encrypt->decode($encrypt).'<br/>';
                $pesan .= '</tr>';
                $pesan .= '</table>';
                $pesan .= '<br/>';
                $pesan .= 'Silakan melakukan login aplikasi Simpus dan lakukan perubahan password. Demikian terima kasih.'.'<br/>';
                
//            } elseif ($row->flag_sah_admin == 'T') {
//                $pesan .= '<tr>';
//                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' ditolak oleh Admin User'.'<br/>';
//                $pesan .= '</tr>';
//                $pesan .= '</table>';
//                $pesan .= '<br/>';
//                $pesan .= 'Demikian terima kasih.'.'<br/>';
//            }

                $pesan .= '<br/>';
                $pesan .= 'Hormat kami,'.'<br/>';
                $pesan .= 'Seksi Surveilans dan Sistem Informasi Kesehatan'.'<br/>';
                $pesan .= 'Bidang Pencegahan dan Penanggulangan Penyakit'.'<br/>';
                $pesan .= 'Dinas Kesehatan Kota Yogyakarta'.'<br/>';
//                $pesan .= 'Jl. Kenari 56 Yogyakarta'.'<br/>';
//                $pesan .= 'Kode Pos : 55165;  Telp.: (0274)515868'.'<br/>';
            } 
        $content = $this->load->view('isi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
          'email_penerima'=>$email_penerima,
          'subjek'=>$subjek,
          'content'=>$content
//          'attachment'=>$attachment
        );
        if(empty($attachment['name'])){ // Jika tanpa attachment
            $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
                }else{ // Jika dengan attachment
            $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
                }
                
//        echo "<b>".$send['status']."</b><br />";
//        echo $send['message'];
//        echo "<br /><a href='".base_url("registrasi")."'>Kembali ke Form</a>";
    }
    
    public function sendMailUserSelesaiNon(){
        $this->load->library('mailer');
//        $email_penerima = $this->input->post('email_penerima');
//        $subjek = $this->input->post('subjek');
//        $pesan = $this->input->post('pesan');
//        $attachment = $_FILES['attachment'];
        $id = $this->input->post('jenis_mohon_id');
        $isian_email = $this->Sah_model->getPegawaiPetugas($id);
            foreach ($isian_email as $row) { 
                $email_penerima = $row->email;        
                $subjek = $row->jenis_mohon_trans;
                $pesan = '';
                $pesan .= 'Yth. Bp/Ibu '.$row->nama.',<br/>';
//            }
//        $isian_email1 = $this->Registrasi_model->getMohonTerbaru();
//                foreach ($isian_email1 as $row) { 
                $pesan .= '<br/>';
                $pesan .= 'Berikut '.$row->jenis_mohon_trans.', dengan detail user :'.'<br/>';
                $pesan .= '<br/>';
                $pesan .= '<table>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nomor Permohonan</td>'.': '.$row->jenis_mohon_id.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nama</td>'.': '.$row->nama.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIP</td>'.': '.$row->nip.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIK</td>'.': '.$row->nik.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>ID JSS</td>'.': '.$row->jss_akun.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Alamat</td>'.': '.$row->alamat.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Telp.</td>'.': '.$row->telp.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Email</td>'.': '.$row->email.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Jabatan</td>'.': '.$row->jabatan.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Profesi</td>'.': '.$row->profesi.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Puskesmas</td>'.': '.$row->nama_puskesmas.'<br/>';
                $pesan .= '</tr>';
                
//            if ($row->flag_sah_admin == 'S') {
                $pesan .= '<tr>';
                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' sudah disetujui oleh Admin User'.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '</table>';
                $pesan .= '<br/>';
                $pesan .= 'Terima kasih telah menggunakan aplikasi Simpus.'.'<br/>';
                
//            } elseif ($row->flag_sah_admin == 'T') {
//                $pesan .= '<tr>';
//                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' ditolak oleh Admin User'.'<br/>';
//                $pesan .= '</tr>';
//                $pesan .= '</table>';
//                $pesan .= '<br/>';
//                $pesan .= 'Demikian terima kasih.'.'<br/>';
//            }

                $pesan .= '<br/>';
                $pesan .= 'Hormat kami,'.'<br/>';
                $pesan .= 'Seksi Surveilans dan Sistem Informasi Kesehatan'.'<br/>';
                $pesan .= 'Bidang Pencegahan dan Penanggulangan Penyakit'.'<br/>';
                $pesan .= 'Dinas Kesehatan Kota Yogyakarta'.'<br/>';
//                $pesan .= 'Jl. Kenari 56 Yogyakarta'.'<br/>';
//                $pesan .= 'Kode Pos : 55165;  Telp.: (0274)515868'.'<br/>';
            } 
        $content = $this->load->view('isi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
          'email_penerima'=>$email_penerima,
          'subjek'=>$subjek,
          'content'=>$content
//          'attachment'=>$attachment
        );
        if(empty($attachment['name'])){ // Jika tanpa attachment
            $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
                }else{ // Jika dengan attachment
            $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
                }
                
//        echo "<b>".$send['status']."</b><br />";
//        echo $send['message'];
//        echo "<br /><a href='".base_url("registrasi")."'>Kembali ke Form</a>";
    }
    
    public function sendMailUserTerimaAtasan(){
        $this->load->library('mailer');
//        $email_penerima = $this->input->post('email_penerima');
//        $subjek = $this->input->post('subjek');
//        $pesan = $this->input->post('pesan');
//        $attachment = $_FILES['attachment'];
        $id = $this->input->post('jenis_mohon_id');
        $isian_email = $this->Sah_model->getPegawaiPetugasTerima($id);
            foreach ($isian_email as $row) { 
                $email_penerima = $row->email;        
                $subjek = $row->jenis_mohon_trans;
                $pesan = '';
                $pesan .= 'Yth. Bp/Ibu '.$row->nama.',<br/>';
//            }
//        $isian_email1 = $this->Registrasi_model->getMohonTerbaru();
//                foreach ($isian_email1 as $row) { 
                $pesan .= '<br/>';
                $pesan .= 'Berikut '.$row->jenis_mohon_trans.', dengan detail user :'.'<br/>';
                $pesan .= '<br/>';
                $pesan .= '<table>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nomor Permohonan</td>'.': '.$row->jenis_mohon_id.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nama</td>'.': '.$row->nama.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIP</td>'.': '.$row->nip.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIK</td>'.': '.$row->nik.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>ID JSS</td>'.': '.$row->jss_akun.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Alamat</td>'.': '.$row->alamat.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Telp.</td>'.': '.$row->telp.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Email</td>'.': '.$row->email.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Jabatan</td>'.': '.$row->jabatan.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Profesi</td>'.': '.$row->profesi.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Puskesmas</td>'.': '.$row->nama_puskesmas.'<br/>';
                $pesan .= '</tr>';
                
//            if ($row->flag_sah_admin == 'S') {
//                $pesan .= '<tr>';
//                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' sudah disetujui oleh Admin User'.'<br/>';
//                $pesan .= '</tr>';
//                $pesan .= '</tr>';
//                $pesan .= '<tr>';
//                $pesan .= '<td>Username</td>'. ': '.$row->user_name.'<br/>';
//                $pesan .= '</tr>';
//                $pesan .= '</tr>';
//                $pesan .= '<tr>';
////                $pesan .= '<td>Password</td>'.': '.$row->encrypt->decode->passwd.'<br/>';
//                $pesan .= '<td style="display:none;">Password</td>'.': '.$encrypt= $row->passwd.'<br/>';
//                $pesan .= '<td>Password</td>'.': '.$this->encrypt->decode($encrypt).'<br/>';
//                $pesan .= '</tr>';
//                $pesan .= '</table>';
//                $pesan .= '<br/>';
//                $pesan .= 'Silakan melakukan login aplikasi Simpus dan lakukan perubahan password. Demikian terima kasih.'.'<br/>';
//                
//            } elseif ($row->flag_sah_admin == 'T') {
                $pesan .= '<tr>';
                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' disetujui oleh Atasan'.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '</table>';
                $pesan .= '<br/>';
                $pesan .= 'Demikian terima kasih.'.'<br/>';

                $pesan .= '<br/>';
                $pesan .= 'Hormat kami,'.'<br/>';
                $pesan .= 'Seksi Surveilans dan Sistem Informasi Kesehatan'.'<br/>';
                $pesan .= 'Bidang Pencegahan dan Penanggulangan Penyakit'.'<br/>';
                $pesan .= 'Dinas Kesehatan Kota Yogyakarta'.'<br/>';
//                $pesan .= 'Jl. Kenari 56 Yogyakarta'.'<br/>';
//                $pesan .= 'Kode Pos : 55165;  Telp.: (0274)515868'.'<br/>';
            } 
        $content = $this->load->view('isi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
          'email_penerima'=>$email_penerima,
          'subjek'=>$subjek,
          'content'=>$content
//          'attachment'=>$attachment
        );
        if(empty($attachment['name'])){ // Jika tanpa attachment
            $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
                }else{ // Jika dengan attachment
            $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
                }
                
//        echo "<b>".$send['status']."</b><br />";
//        echo $send['message'];
//        echo "<br /><a href='".base_url("registrasi")."'>Kembali ke Form</a>";
    }
    
    public function sendMailUserTolak(){
        $this->load->library('mailer');
//        $email_penerima = $this->input->post('email_penerima');
//        $subjek = $this->input->post('subjek');
//        $pesan = $this->input->post('pesan');
//        $attachment = $_FILES['attachment'];
        $id = $this->input->post('jenis_mohon_id');
        $isian_email = $this->Sah_model->getPegawaiPetugasTolak($id);
            foreach ($isian_email as $row) { 
                $email_penerima = $row->email;        
                $subjek = $row->jenis_mohon_trans;
                $pesan = '';
                $pesan .= 'Yth. Bp/Ibu '.$row->nama.',<br/>';
//            }
//        $isian_email1 = $this->Registrasi_model->getMohonTerbaru();
//                foreach ($isian_email1 as $row) { 
                $pesan .= '<br/>';
                $pesan .= 'Berikut '.$row->jenis_mohon_trans.', dengan detail user :'.'<br/>';
                $pesan .= '<br/>';
                $pesan .= '<table>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nomor Permohonan</td>'.': '.$row->jenis_mohon_id.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Nama</td>'.': '.$row->nama.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIP</td>'.': '.$row->nip.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>NIK</td>'.': '.$row->nik.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>ID JSS</td>'.': '.$row->jss_akun.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Alamat</td>'.': '.$row->alamat.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Telp.</td>'.': '.$row->telp.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Email</td>'.': '.$row->email.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Jabatan</td>'.': '.$row->jabatan.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Profesi</td>'.': '.$row->profesi.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '<tr>';
                $pesan .= '<td>Puskesmas</td>'.': '.$row->nama_puskesmas.'<br/>';
                $pesan .= '</tr>';
                
//            if ($row->flag_sah_admin == 'S') {
//                $pesan .= '<tr>';
//                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' sudah disetujui oleh Admin User'.'<br/>';
//                $pesan .= '</tr>';
//                $pesan .= '</tr>';
//                $pesan .= '<tr>';
//                $pesan .= '<td>Username</td>'. ': '.$row->user_name.'<br/>';
//                $pesan .= '</tr>';
//                $pesan .= '</tr>';
//                $pesan .= '<tr>';
////                $pesan .= '<td>Password</td>'.': '.$row->encrypt->decode->passwd.'<br/>';
//                $pesan .= '<td style="display:none;">Password</td>'.': '.$encrypt= $row->passwd.'<br/>';
//                $pesan .= '<td>Password</td>'.': '.$this->encrypt->decode($encrypt).'<br/>';
//                $pesan .= '</tr>';
//                $pesan .= '</table>';
//                $pesan .= '<br/>';
//                $pesan .= 'Silakan melakukan login aplikasi Simpus dan lakukan perubahan password. Demikian terima kasih.'.'<br/>';
//                
//            } elseif ($row->flag_sah_admin == 'T') {
                if ($row->flag_sah_atasan == 'T') {
                $pesan .= '<tr>';
                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' ditolak oleh Atasan'.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '</table>';
                $pesan .= '<br/>';
                $pesan .= 'Demikian terima kasih.'.'<br/>';
            } elseif ($row->flag_sah_atasan == 'S' && $row->flag_sah_admin == 'T') {
                $pesan .= '<tr>';
                $pesan .= '<td>Status</td>'.': '.'Pengajuan ' . $row->jenis_mohon_trans . ' ditolak oleh Admin User'.'<br/>';
                $pesan .= '</tr>';
                $pesan .= '</table>';
                $pesan .= '<br/>';
                $pesan .= 'Demikian terima kasih.'.'<br/>';
            }

                $pesan .= '<br/>';
                $pesan .= 'Hormat kami,'.'<br/>';
                $pesan .= 'Seksi Surveilans dan Sistem Informasi Kesehatan'.'<br/>';
                $pesan .= 'Bidang Pencegahan dan Penanggulangan Penyakit'.'<br/>';
                $pesan .= 'Dinas Kesehatan Kota Yogyakarta'.'<br/>';
//                $pesan .= 'Jl. Kenari 56 Yogyakarta'.'<br/>';
//                $pesan .= 'Kode Pos : 55165;  Telp.: (0274)515868'.'<br/>';
            } 
        $content = $this->load->view('isi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
          'email_penerima'=>$email_penerima,
          'subjek'=>$subjek,
          'content'=>$content
//          'attachment'=>$attachment
        );
        if(empty($attachment['name'])){ // Jika tanpa attachment
            $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
                }else{ // Jika dengan attachment
            $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
                }
                
//        echo "<b>".$send['status']."</b><br />";
//        echo $send['message'];
//        echo "<br /><a href='".base_url("registrasi")."'>Kembali ke Form</a>";
    }
    
    public function tampil(){
        $tanggal1=$this->input->post('start_date');
        $tanggal2=$this->input->post('end_date');
        $opsi=$this->input->post('opsi');
        $nomor= ($opsi != 'jenis_mohon_id') ? '' : $this->input->post('nilai');
        $nama= ($opsi != 'nama') ? '' : $this->input->post('nilai');
        $nip= ($opsi != 'nip') ? '' : $this->input->post('nilai');
//        $status=$this->input->get('status');
        
        $data['searchsah']=$this->Sah_model->getSearchSah($tanggal1,$tanggal2,$nomor,$nama,$nip);
        $this->load->view('sah_view',$data);
        
    }
}
