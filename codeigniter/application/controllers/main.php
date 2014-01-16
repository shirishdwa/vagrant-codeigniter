<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        $this->load->view('login_page');
    }
	
    public function sign_up()
    {
	   $this->load->view('sign_up_page');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('main/index');
    }
}