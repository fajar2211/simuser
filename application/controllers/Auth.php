<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

class Auth extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('Auth_model');
//        $this->load->library('form_validation');
    }
    
    function index() {
        if($this->session->userdata('logged_in') == TRUE){
            redirect('home');
        }else
            if($this->input->post('submit')) {     
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captcha_word');
            if($inputCaptcha === $sessCaptcha){
                $data['msg'] = '<div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Captcha code matched.
                </div>';
            }else{
                 $data['msg'] = '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Failed!</strong> Captcha does not match, please try again.
                </div>  ';
            }
        }
    // Captcha configuration
        $config = array(
            'img_path'      => './upload/captcha/',
            'img_url'       => base_url().'upload/captcha/',
//            'font_path'     => BASH_PATH.'system/fonts/texb.ttf',
            'img_width'     => 120,
            'img_height'    => 38,
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size'     => 25,
            'colors'        => array(
                'background' => array(171, 194, 177),
                'border' => array(10, 51, 11),
                'text' => array(0, 0, 0),
                'grid' => array(185, 234, 237)
            )
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captcha_word');
        $this->session->set_userdata('captcha_word', $captcha['word']);
        // Pass captcha image to view
        $data['captcha'] = $captcha['image'];
        
        $data['puskesmas']=$this->Auth_model->getPuskesmas();
        $this->load->view('auth',$data);
    
    }
    
    function cek_login1() {
            $this->form_validation->set_rules('user_name','Username','required');
            $this->form_validation->set_rules('passwd','Password','required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('auth');
            } else {
                $user_name = $this->input->post('user_name');
                $passwd = $this->input->post('passwd');
                $where = array (
    //                'petugas_nama' => $petugas_nama,
                    'user_name' => $user_name,
                    'passwd' => MD5($passwd)    
                );

                $cek = $this->Auth_model->auth_login("petugas", $where)->num_rows();
                if ($cek > 0) {
                    $data_session = array(
    //                    'petugas_nama' => $petugas_nama,
                        'nama' => $user_name,
                        'status' => "login"

                    );
                    $this->session->set_userdata($data_session);
                    redirect("home");

                } else {
                    $this->session->set_flashdata('pesan', '<br>Username atau Password salah.');
                    redirect(base_url("auth"));
                }

            }   
    }
    
    public function cek_login(){
//    if (strtolower($this->input->post('captcha_real')) == strtolower($this->input->post('captcha')))
        if ($this->input->post('captcha') == $this->session->userdata('captcha_word'))
            {
            $username = $this->input->post('user_name',TRUE);
            $password = md5($this->input->post('passwd',TRUE));                              
            $validate1 = $this->Auth_model->auth_login($username,$password);
            if($validate1->num_rows() > 0){
                $data               = $validate1->row_array();
                $name               = $data['petugas_nama'];
                $username           = $data['user_name'];
                $password             = $data['passwd'];
                $jabatan_id   = $data['jabatan_id'];
                $petugas_id   = $data['petugas_id'];
                $sesdata            = array(
        //            'username'                  => $username,
                    'nama'              => $name,
                    'jabatan_id'      => $jabatan_id,
                    'petugas_id'        => $petugas_id,
                    'logged_in'             => TRUE
                );
                $this->session->set_userdata($sesdata);
//                redirect('home');
                // access login for admin
                if($jabatan_id === '0'){
                    redirect('page');

                // access login for atasan
                }elseif($jabatan_id === '101' || $jabatan_id === '102'){
                    redirect('page/atasan');
        //      
                // access login for user
                }else{
                    redirect('page/user');
                }
            }else{
                echo $this->session->set_flashdata('msg','Username atau Password Salah');
                redirect('auth');
            }
          } else {
              echo $this->session->set_flashdata('msg','Captcha is Wrong');
              redirect('auth');
          }

      }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
    
    public function refreshCaptcha(){
        // Captcha configuration
         $config = array(
            'img_path'      => './upload/captcha/',
            'img_url'       => base_url().'upload/captcha/',
//            'font_path'     => BASH_PATH.'system/fonts/texb.ttf',
            'img_width'     => 120,
            'img_height'    => 38,
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size'     => 25,
            'colors'        => array(
                'background' => array(171, 194, 177 ),
                'border' => array(10, 51, 115),
                'text' => array(0, 0, 0),
                'grid' => array(185, 234, 237)
            )
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captcha_word');
//        $this->session->set_userdata('captchaCode',$captcha['word']);
        $this->session->set_userdata('captcha_word',$captcha['word']);
        // Display captcha image
        echo $captcha['image'];
    }
}

