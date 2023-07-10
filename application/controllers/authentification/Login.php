<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('authentification/Utilisateur_Model' , 'utilisateur');
		$this->load->model('authentification/Administrateur_Model' , 'administrateur');
		$this->load->model('authentification/Profil_Model' , 'profil');
	}

	public function index(){
		$this->load->view("Login");
	}

	public function index_Administrateur(){
		$this->load->view("Login");
	}

	public function Connexion_Utilisateur(){
        $utilisateur = new Utilisateur_Model();
		$mail = "layah@gmail.com";
		$mot_de_passe = "1234";
		$resultat = $utilisateur->Validation_Connexion($mail, $mot_de_passe);
		$this->session->set_userdata("utilisateur",$resultat);
		print_r($resultat);
		return "";
	}

	public function Connexion_Administrateur(){
		$mail = "";
		$mot_de_passe = "";
        $administrateur = new Administrateur_Model();
		$resultat = $administrateur->Validation_Connexion($mail, $mot_de_passe);
		$this->session->set_userdata("administrateur",$resultat);
		return "";
	}

}

?>