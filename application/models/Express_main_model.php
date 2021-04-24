<?php

class Express_main_model extends CI_Model{
        
    /**
     * save_user
     * The purpose of this function is to save the user details into the database
     *
     * @param  mixed $user_data
     * @return void
     * @author Avinash Kumar <p4avinashkumar@gmail.com> on 24th April 2021
     */
    public function save_user($user_data){
        $this->db->insert('users', $user_data);
    }
    
    /**
     * is_user_authenticated
     * The purpose of this function is get the user details from the database
     *
     * @param  mixed $email
     * @return void
     * @author Avinash Kumar <p4avinashkumar@gmail.com> on 24th April 2021
     */
    public function is_user_authenticated($email){
        return $this->db->select('user_id,password')
        ->where('email', $email)
        ->get('users')->row_array();
    }
}