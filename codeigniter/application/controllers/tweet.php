<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tweet extends CI_Controller
{
    public function tweet_pagination($type = NULL)
    {
        $this->load->model('model_tweets');
        $data['num_tweets'] = $this->model_tweets->num_tweets();
        $data['latest_tweets'] = $this->model_tweets->get_tweets();
        $this->load->view('tweets_top');
        $this->load->view('tweets', $data);
    }
    
    public function tweet_validation() {
        $this->load->library('form_validation');
        $this->load->model('model_tweets');

        $this->form_validation->set_rules('tweet','Tweet','required|trim|max_length[140]');
        if ($this->form_validation->run()) {
            $tweet_data = array(
                'user_info_id' => $this->session->userdata('user_id'),
                'tweets' => $this->input->post('tweet'),
            );
            $tweet_data = $this->security->xss_clean($tweet_data); // <- Right place??
            $this->model_tweets->add_tweet($tweet_data);
        }
        $this->tweet_pagination();
    }
    
    public function get_tweets($offset)
    {
        $this->load->model('model_tweets');
        $data['latest_tweets']=$this->model_tweets->get_tweets($offset);
        $this->load->view('get_tweets', $data);
    }
}