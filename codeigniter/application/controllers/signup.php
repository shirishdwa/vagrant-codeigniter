<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller
{
    private $validation_rules = array(

        array(
            'field' => 'user_name', 'label' => 'Name',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'mail_address', 'label' => 'Mail address',
            'rules' => 'required|trim|valid_email|is_unique[user_info.mail_address]'
        ),
        array(
            'field' => 'password', 'label' => 'Password',
            'rules' => 'required|min_length[6]|md5|trim'
        ),
        array(
            'field' => 'password_confirm', 'label' => 'Re-entered Password',
            'rules' => 'required|matches[password]|trim'
        )

    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_users');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="error_msg">', '</p>');
    }

    public function signup_validation()
    {
        $this->form_validation->set_rules($this->validation_rules);
        $this->form_validation->set_message('is_unique', 'That email address already exists.');

        if ( $this->form_validation->run() ) {
            $user_name = $this->input->post('user_name');
            $mail_address = $this->input->post('mail_address');
            $user_data = array(
                'user_name' => $user_name,
                'mail_address' => $mail_address,
                'password' => $this->input->post('password'),
            );
            if ($this->model_users->add_user($user_data)) {
                echo "Account added";
                $this->model_users->can_log_in($user_name, $mail_address);
                $loggedin_user = array(
                    'user_id' => $this->model_users->loggedin_user['id'],
                    'user_name' => $user_name,
                    'email' => $mail_address,
                    'is_logged_in' => 1,
                );
                $this->session->set_userdata($loggedin_user);
                redirect('tweet/tweet_pagination');
            }

        } else {
            //Relaod the page if there are any errors in the inputs provided
            $this->load->view('sign_up_page'); 
        }
    }
}