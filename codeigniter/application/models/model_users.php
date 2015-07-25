<?php
    class Model_users extends CI_Model
    {
        public function can_log_in($mail_address, $password)
        {
            global $loggedin_user;
            $this->db->where('mail_address', $mail_address);
            $this->db->where('password', md5($password));
            $query = $this->db->get('user_info');
            if ($query->num_rows == 1) {
                foreach ($query->result() as $row) {
                    $this->loggedin_user = array(
                        'id' => $row->user_info_id,
                        'name' => $row->user_name,
                    );
                }
                return true;
            } else {
                return false;
            }
        }

        public function loggedin_user()
        {
            return $this->loggedin_user;
        }

        public function add_user($user_data)
        {
            $query = $this->db->insert('user_info', $user_data);
            if ($query) {
                return true;
            } else {
                return false;
            }
        }
    }
?>