<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Utilisateur_Model' , 'utilisateur');
		$this->load->model('Profil_Model' , 'profil');
	}

	public function index(){
		$this->load->view("Login");
	}

	public function connexion(){
        $utilisateur = new Utilisateur_Model();
        $data = [
            'nom' => 'Rakoto Jean',
            'mail' => 'jean@gmail.com',
            'mot_de_passe' => '1234',
            'id_profil' => 1
		];
		
		$utilisateur->insert($data);
		return "";
	}

	public function testValidation() {
		$utilisateur = new Utilisateur_Model();
        $data = [
            'mail' => 'jean@gmail.com',
            'mot_de_passe' => '1234',
            'id_profil' => 1
		];
		
		$result = $utilisateur->validateConnexion($data);
		print_r($result);
	}

}

?>