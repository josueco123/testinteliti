<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MedicalHistory extends CI_Controller {

    public function __construct()
  	{
      parent::__construct();
	  $this->load->model('MedicalHistory_Model');
      $this->load->library(array('session','form_validation'));
      $this->load->helper('url');
      
      if (!$this->session->userdata('isLogged')) {
        redirect(base_url());
    }
  	}

    private function loadMedicalHistoryView($viewName, $data = null)
    {
        $this->load->view('layouts/header');
        if($data != null)
            $this->load->view($viewName, $data);
        else
            $this->load->view($viewName);

        $this->load->view('layouts/footer');
    }

    public function index(){
        
        $this->loadMedicalHistoryView('MedicalHistoriesView');
    }

    public function createHistory(){
        
        $this->loadMedicalHistoryView('CreateHistoriesView');
    }

    public function saveHistory(){

        $history = array(
			'name' => $this->input->post('name'),
			'birthday' => $this->input->post('date'),
			'sex' => $this->input->post('sex'),
			'height' => $this->input->post('height'),
			'weight' => $this->input->post('weight')
		);

            $response = $this->MedicalHistory_Model->createMedicalHistory($history);

            if($response > 0)
                $this->session->set_flashdata("success","Historia Médica agreado correctamente."); 
            else
                $this->session->set_flashdata("error","Ups, ocurrió un error tratanto de guardar esta Historia"); 
                
            $url = base_url().'medicalhistory';
            redirect($url);
    }

    public function getHistories()
    { 
        $medicalHistories = $this->MedicalHistory_Model->getMedicalHistories();
        echo json_encode($medicalHistories);
    }

    public function deleteHistory($idHistory)
    {
        $response = $this->MedicalHistory_Model->deleteMedicalHistory($idHistory);

		if ($response > 0)
			echo json_encode(array("status_code" => 200, "mensaje" => "Historia Médica elimindo con exito"));
		else
			echo json_encode(array("status_code" => 401, "mensaje" => "Ups, ocurrió un error tratanto de eliminar este Historia Médica"));
    }

    private function calculateAge($birthday)
    {
        $date = new DateTime($birthday);
        $today = new DateTime();
        $age = $today->diff($date);
        return $age->y;
    }

    private function calculateFibonacci($n)
    {
        $fibonacci  = [0,1];
     
      for($i = 2; $i <= $n; $i++)
        {
            $fibonacci[$i] = $fibonacci[$i-1] + $fibonacci[$i-2];
        }
        return $fibonacci;
    }

    private function calculateMinClose($age){

        $fibonacci = $this->calculateFibonacci(100);

        for($i = 0; $i < count($fibonacci); $i++)
        {
            if($fibonacci[$i] >= $age){
                return $fibonacci[$i-1];
            }
        }
    }

    private function calculateKm($birthday)
    {
        $date = new DateTime($birthday);
        $number = substr($date->format("Y"), 2);
        return round(sqrt($number), 2);
    }

    public function showMedicalHistory($idHistory)
    {
        $medicalHistory = $this->MedicalHistory_Model->getMedicalHistoryById($idHistory)[0];
        $age = $this->calculateAge($medicalHistory->birthday);

        if($age < 18)
        $data['x'] = $this->calculateMinClose($age);
        else
        $data['km'] = $this->calculateKm($medicalHistory->birthday);

        $data['age'] = $age;
        $data['history'] = $medicalHistory;

        
        $this->loadMedicalHistoryView('showHistoryView', $data);
    }


}
	