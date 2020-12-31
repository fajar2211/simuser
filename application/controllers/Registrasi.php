<?php

class Registrasi extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
//                if ($this->session->userdata('status') != "login") {
//                redirect(base_url("auth"));           
//                }
                $this->load->model("Registrasi_model");
                $this->load->model("Petugas_model");
                $this->load->library('form_validation');
                
	}
    
    public function index()
	{   
//            $registrasi = $this->Registrasi_model;
            $data["jenis_petugas"]=$this->Petugas_model->getJenisPetugas();
            $data["nomor"]=$this->Registrasi_model->getNomorBaru();
            $data["puskesmas"]=$this->Registrasi_model->getPuskesmas();
//            $registrasi->addRegistrasi();
//            $data["status"]=$registrasi->add_registrasi1();            
            $this->load->view('registrasi',$data);            
	}
        
//    public function cekNIK(){
//        $registrasi = $this->Registrasi_model;
//        $registrasi->cekNIK1();
////        $post = $this->input->post();
////        $this->nik = $post["nik"];
////        $this->form_validation->set_rules('nik','NIK', 'trim|required|numeric|min_length[16]|max_length[17]|is_unique[pegawai.nik]');
////                if ($this->form_validation->run() == FALSE)
////                    {
////                    $this->session->set_flashdata('gagal', 'NIK sudah terdaftar');
//////                    redirect('registrasi');
////                    } else {
////                    $this->session->set_flashdata('sukses', 'NIK belum ada, silakan lanjutkan permohonan');    
////                    }
//        redirect('registrasi');
//    }    
    
    public function add_registrasi(){
            $this->form_validation->set_rules('nik','NIK','trim|required|numeric|exact_length[16]|is_unique[pegawai.nik]');
//            $this->form_validation->set_rules('nip','NIP', 'trim|required|numeric|min_length[18]|max_length[19]|is_unique[pegawai.nip]');
//            $this->form_validation->set_rules('username','Username', 'trim|required|min_length[8]|max_length[9]|is_unique[pegawai.user_name]');
//            $this->form_validation->set_rules('jssakun','JSS Akun', 'trim|required|is_unique[pegawai.jss_akun]');
//            $this->form_validation->set_rules('jssuser','JSS User', 'trim|required|is_unique[pegawai.jss_user]');
                if ($this->form_validation->run()==FALSE)
                    {
                    $this->session->set_flashdata('gagal', 'NIK sudah terdaftar');
                    redirect('registrasi');
                    } else {
            $registrasi = $this->Registrasi_model;
            $data["nomor"]=$this->Registrasi_model->getNomorBaru();
            $registrasi->addRegistrasi();
            $registrasi->generateNomorBaru();
            $this->sendMail();
            $this->sendMailAtasan();
            redirect('home',$data,'refresh');
            }
    }
    
    public function sendMail(){
        $this->load->library('mailer');
//        $email_penerima = $this->input->post('email_penerima');
//        $subjek = $this->input->post('subjek');
//        $pesan = $this->input->post('pesan');
//        $attachment = $_FILES['attachment'];
        $isian_email = $this->Registrasi_model->getMohonTerbaru();
            foreach ($isian_email as $row) { 
                $email_penerima = $row->email;        
                $subjek = $row->jenis_mohon_trans;
                $pesan = '';
                $pesan .= 'Yth. Bp/Ibu '.$row->nama.',<br/>';
                $pesan .= '<br/>';
                $pesan .= $row->jenis_mohon_trans.' pada aplikasi Simpus, berikut detail permohonan :'.'<br/>';
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
    
    public function sendMailAtasan(){
        $this->load->library('mailer');
//        $email_penerima = $this->input->post('email_penerima');
//        $subjek = $this->input->post('subjek');
//        $pesan = $this->input->post('pesan');
//        $attachment = $_FILES['attachment'];
        $isian_email = $this->Registrasi_model->getAtasanSah();
            foreach ($isian_email as $row) { 
                $email_penerima = $row->email;        
                $subjek = 'Pengesahan Permohonan';
                $pesan = '';
                $pesan .= 'Yth. Bp/Ibu '.$row->nama.',<br/>';
            }
        $isian_email1 = $this->Registrasi_model->getMohonTerbaru();
                foreach ($isian_email1 as $row) { 
                $pesan .= '<br/>';
                $pesan .= 'Berikut permintaan persetujuan '.$row->jenis_mohon_trans.', dengan detail user :'.'<br/>';
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

   
            

}