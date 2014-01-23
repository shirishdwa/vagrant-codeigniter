<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tweet extends CI_Controller
{
    const page_limit = 10;
    public function tweet_pagination($type = NULL)
    {
        $this->load->model('model_tweets');
        $id = $this->session->userdata('user_id');
        $data['num_tweets'] = $this->model_tweets->num_tweets($id);
        $data['latest_tweets'] = $this->model_tweets->get_tweets(0, self::page_limit);
        $data['page_limit'] = self::page_limit;
        $this->load->view('tweets', $data);
    }

    public function tweet_validation() {
        log_message('error','1');
        $this->load->library('form_validation');
        $this->load->model('model_tweets');
        
        $this->form_validation->set_rules('tweet', 'Tweet', 'required|trim|max_length[140]');
        if ($this->form_validation->run()) {
            $tweet_data = array(
                'user_info_id' => $this->session->userdata('user_id'),
                'tweets' => $this->input->post('tweet'),
            );
            log_message('error','2');
        
            $tweet_data = $this->security->xss_clean($tweet_data); // <- Right place??
            $this->model_tweets->add_tweet($tweet_data);
            log_message('error','3');
        
            //return true; //<---
            echo 'true';
        } else {
            //return false;
            echo 'false';
        }
        log_message('error','4');
        
    }
    
    public function get_tweets($offset)
    {
        $this->load->model('model_tweets');
        $data['latest_tweets'] = $this->model_tweets->get_tweets($offset, self::page_limit);
        $this->load->view('get_tweets', $data);
    }
    
    public function get_latest_tweet()
    {
        $this->load->model('model_tweets');
        $data['latest_tweets'] = $this->model_tweets->get_latest_tweet();
        $this->load->view('get_tweets', $data);
    }

}