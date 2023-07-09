<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('Form_helper');
		$this->load->model('Utilisateur_Model' , 'utilisateur');
		$this->load->model('Profil_Model' , 'profil');
	}

	public function index(){
		$this->load->view("Registration");
	}

	// public function validate($rules) {
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules($rules);

    //     if ($this->form_validation->run()) {
    //         return true; // Validation passed
    //     } else {
    //         return false; // Validation failed
    //     }
    // }

	// public function connexion(){
	// 	$utilisateur = new Utilisateur_Model();

	// 		$data = [
	// 			'nom' => 'Rakoto Jean',
	// 			'mail' => 'jean@gmail.com',
	// 			'mot_de_passe' => '1234',
	// 			'id_profil' => 1
	// 		];
			
	// 		$utilisateur->insert($data);

	// 	return "";

	// }

}

?>