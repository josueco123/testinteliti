<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MedicalHistory_Model extends CI_model
{
    public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);

	}

    public function createMedicalHistory($medicalHistory)
	{

        if($this->db->insert("medicalhistory", $medicalHistory)){   
			$insert_id = $this->db->insert_id();
			return $insert_id;
		  } else {
			return false;
		  }
    }

	public function getMedicalHistories()
	{
		$this->db->select('*');
		$this->db->from('medicalhistory');
		$this->db->where("medicalhistory.deleted_at IS NULL");
        
        $query = $this->db->get();
                
        return $query->result();
	}

	public function getMedicalHistoryById($idHistory)
	{
		$this->db->select('*');
		$this->db->from('medicalhistory');
		$this->db->where('history_id', $idHistory);
        
        $query = $this->db->get();
                
        return $query->result();
	}

	public function deleteMedicalHistory($idHistory)
	{
		$dateTime = date('Y-m-d h:i:s', time());
		$this->db->set('deleted_at', $dateTime); 
		$this->db->where('history_id', $idHistory);
		$this->db->update('medicalhistory'); 
		return $this->db->affected_rows();
	}

}