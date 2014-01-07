<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller
{
    public function index()
    {
        $this->load->view('login_page');
    }
	
    public function reg()
    {
	   $this->load->view('registration');
    }

    public function login_validation()
    {
	   $this->load->library('form_validation');
       
       $this->form_validation->set_rules('mail_address','Mail_address','required|trim|xcc_clean|callback_validate_email');	
       $this->form_validation->set_rules('password','Password','required|md5|trim');
       
       if ($this->form_validation->run())
       {
           $data = array(
               'email' => $this->input->post('mail_address'),
               'is_logged_in' => 1         
           ); 
           $this->session->set_userdata($data);
           $this->load->view('tweets'); 
       }
       else
       {
           $this->load->view('login_page'); 
       }
    }
    
    public function validate_email()
    {
        $this->load->model('model_users');
        
        if ($this->model_users->can_log_in())
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('validate_email','Incorrect email address or password');
            return false;
        }
    }
    
    public function reg_validation()
    {
       $this->load->library('form_validation');
       
       $this->form_validation->set_rules('user_name','User_name','required|trim|xcc_clean');	
       $this->form_validation->set_rules('mail_address','Mail_address','required|trim|xcc_clean');	
       $this->form_validation->set_rules('password','Password','required|md5|trim');
       
       if ($this->form_validation->run())
       {
/*           $data = array(
               'email' => $this->input->post('mail_address'),
               'is_logged_in' => 1         
           ); 
           $this->session->set_userdata($data); */
           echo "Account added";
           echo('<a href="main/index">Go back to sign in page</a>');
       }
       else
       {
           redirect('main/reg'); 
       }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('main/index');
    }
}