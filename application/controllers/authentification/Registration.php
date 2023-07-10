<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('authentification/Utilisateur_Model' , 'utilisateur');
		$this->load->model('authentification/Profil_Model' , 'profil');
	}

	public function index(){
		$this->load->view("Registration");
	}

	public function validation_MotDePasse($password, $confirmation) {
        if($password == $confirmation)
		{
			return true;
		}
		return false;
    }

	public function inscription(){
		$utilisateur = new Utilisateur_Model();

		$nom = "Anjaratiana";
		$prenoms = "Layah";
		$mail = "layah@gmail.com";
		$mot_de_passe = "1234";
		$confirmation = "1234";
		$date_naissance = "10-10-2000";
			
		if($this->validation_MotDePasse($mot_de_passe, $confirmation))
		{
			if($utilisateur->Validate_Email($mail))
			{
				$utilisateur->insert($nom, $prenoms, $mail, $mot_de_passe, $date_naissance);
			}
		}
		
		return "";

	}

}

?>