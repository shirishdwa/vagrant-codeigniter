<?php 
    
    class Model_tweets extends CI_Model
    {
        public function add_tweet($tweet_data)
        {
            $query = $this->db->insert('tweets', $tweet_data);
            if($query)
                return true;
            else
                return false;
        }
        
        public function num_tweets()
        {
            $query = $this->db->count_all_results('tweets');
            return $query;
        }
        
        public function get_tweets($offset=0)
        {
            $id = $this->session->userdata('user_id');
            $this->db->where('user_info_id', $id);
            $this->db->order_by("datetime_created", "desc");
            $query = $this->db->get('tweets', 10, $offset);
            return $query->result();
        }
    }
?>