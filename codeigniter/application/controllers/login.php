<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function login_validation()
    {
        $this->load->model('model_users');        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mail_address','Mail_address','required|trim|xcc_clean|callback_validate_email');	
        $this->form_validation->set_rules('password','Password','required|md5|trim');
        $this->form_validation->set_message('validate_email','Incorrect email address or password');
        if ($this->form_validation->run()) {
            $data = array(
                'user_id' => $this->model_users->loggedin_user['id'],
                'user_name' => $this->model_users->loggedin_user['name'],
                'email' => $this->input->post('mail_address'),
                'is_logged_in' => 1         
            );
            $this->session->set_userdata($data);
            redirect('tweet/tweet_pagination');
        }
        else
        {
            $this->load->view('login_page'); 
        }
    }
    
    public function validate_email()
    {
        $this->load->model('model_users');
        $mailad = $this->input->post('mail_address');
        $pwd = $this->input->post('password');
        if ($this->model_users->can_log_in($mailad, $pwd))
            return true;
        else
            return false;
    }
}