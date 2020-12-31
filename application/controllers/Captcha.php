<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Captcha extends CI_Controller {
    
    public function createCaptcha(){
        $option = array(
            'img_path' => './captcha',
            'img_url' => base_url('captcha'),
            'img_width' => '150',
            'img_height' => '30',
            'expiration' => 7200  
        );
        
        $cap = createCaptcha($option);
        $image = $cap['image'];
        
        $this->session->set_userdata('captcha_word',$cap['word']); 
        return $image;
    }
    
    public function checkCaptcha(){
        if ($this->input->post('captcha') == $this->session->userdata('captcha_word'))
        {
            return true;
        } else {
            $this->form_validation->set_message('checkCaptcha','Captcha is Wrong');
            return false;
        }
    }
    
}