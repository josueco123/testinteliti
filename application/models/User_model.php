<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_Model extends CI_model
{
    public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);

	}

    public function createUser($user){

        if($this->db->insert("users", $user)){   
			$insert_id = $this->db->insert_id();
			return $insert_id;
		  } else {
			return false;
		  }
    }

    public function getUserByEmail($email){
		$this->db->select('*');
		$this->db->from('users');
        $this->db->where('email', $email);
		$query = $this->db->get();
		return $query->result(); 
	}
}