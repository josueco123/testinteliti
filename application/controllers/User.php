<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
  	{
      parent::__construct();
	  $this->load->library(array('session','form_validation'));	
	  $this->load->helper(array('url','form'));
	  $this->load->model('User_Model');
	  $this->load->database('default');  
  	}
	
	private function loadUserViews($viewName)
	{
		$this->load->view('layouts/HeaderLogin');
		$this->load->view($viewName);
	}

	public function index()
	{
		if($this->session->userdata('isLogged')){
			$url = base_url().'medicalhistory';
			redirect($url);
		}else {
			$this->loadUserViews('LoginVieW');
		}
		
	}

    public function register()
    {
		$this->loadUserViews('RegisterVieW');
    }

	public function createUser()
	{
		$this->form_validation->set_rules(
			'password', 'password', 'min_length[4]|max_length[20]'
		);

		$this->form_validation->set_rules(
			'email', 'email', 'is_unique[users.email]'
		  );

		if($this->form_validation->run() == FALSE)
		{           
			 
			$this->register();
		}else {
			$newUser = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password'))
			);
	
			$response = $this->User_Model->createUser($newUser);
	
			if($response > 0){
	
				$this->setSession($response, $this->input->post('email'));		
			}else {
				$this->session->set_flashdata("error","No se pudo realizar el registro");
			}
		}
		
	}

	public function loginUser()
	{
		$user = $this->User_Model->getUserByEmail($this->input->post('email'))[0];
		$password = $this->input->post('password');
		if($user->password == sha1($password)){
			$this->setSession($user->user_id, $this->input->post('email'));
		}else {
			$this->session->set_flashdata("error","Contraseña incorrecta");
			redirect(base_url());
		}
	}

	private function setSession($id,$email)
	{
		$userdata = [ 'id' => $id, 'email' => $email, 'isLogged' => true];
		$this->session->set_userdata($userdata);
		$this->index();
	}

	public function loggOut(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
