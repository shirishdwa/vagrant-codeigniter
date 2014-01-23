<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller
{
    public function signup_validation()
    {
        $this->load->model('model_users');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name','Name','required|trim');	
        $this->form_validation->set_rules('mail_address','Mail address','required|trim|valid_email|is_unique[user_info.mail_address]');	
        $this->form_validation->set_rules('password','Password','required|min_length[6]|md5|trim');
        $this->form_validation->set_message('is_unique','That email address already exists.');
        
        if ($this->form_validation->run()) {
            $user_name = $this->input->post('user_name');
            $mail_address = $this->input->post('mail_address');
            $data = array(
                'user_name' => $user_name,
                'mail_address' => $mail_address,
                'password' => $this->input->post('password'),
            );
            if ($this->model_users->add_user($data)) {
                echo "Account added";
                $this->model_users->can_log_in($user_name, $mail_address);
                $data1 = array(
                    'user_id' => $this->model_users->loggedin_user['id'],
                    'user_name' => $user_name,
                    'email' => $mail_address,
                    'is_logged_in' => 1,
                );
                $this->session->set_userdata($data1);
                redirect('tweet/tweet_pagination');
                 
            }
        } else {
            $this->load->view('sign_up_page'); 
        }
    }
}