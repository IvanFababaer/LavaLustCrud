<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {

        public function readUsers() {
            return $this->db->table('idf_users')->get_all();
        }
    
        public function createUsers($idf_last_name, $idf_first_name, $idf_email, $idf_gender, $idf_address) {
            $data = array(
                'idf_last_name' => $idf_last_name,
                'idf_first_name' => $idf_first_name,
                'idf_email' => $idf_email,
                'idf_gender' => $idf_gender,
                'idf_address' => $idf_address
            );
            return $this->db->table('idf_users')->insert($data);
        }
    
        public function updateUsers($id, $idf_last_name, $idf_first_name, $idf_email, $idf_gender, $idf_address) {
            $data = array(
                'idf_last_name' => $idf_last_name,
                'idf_first_name' => $idf_first_name,
                'idf_email' => $idf_email,
                'idf_gender' => $idf_gender,
                'idf_address' => $idf_address
            );
            return $this->db->table('idf_users')->where('id', $id)->update($data);
        }
    
        public function deleteUsers($id) {
            return $this->db->table('idf_users')->where('id', $id)->delete();
        }
    
        public function getUserById($id) {
            return $this->db->table('idf_users')->where('id', $id)->get();
        }       
    }

?>