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
		$this->index_Utilisateur();
	}

	public function index_Utilisateur(){
		$this->load->view("Login");
	}

	public function index_Administrateur(){
		$this->load->view("Login");
	}

	public function Connexion_Utilisateur(){
        $utilisateur = new Utilisateur_Model();
		$mail = $_POST['mail'];
		$mot_de_passe = $_POST['mot_de_passe'];
		$resultat = $utilisateur->Validation_Connexion($mail, $mot_de_passe);
		if($resultat != false){
			$this->session->set_userdata("utilisateur",$resultat);
			print_r($resultat);
			//return $_SESSION['utilisateur'];
			if(isset($_SESSION['utilisateur'])){
				redirect(site_url('Accueil'));
			}
		}else redirect(site_url('authentification/login?error'));
	}

	public function Connexion_Administrateur(){
		echo "Coucouuu adminnn";
        $administrateur = new Administrateur_Model();
		$mail = $_POST['mail'];
		$mot_de_passe = $_POST['mot_de_passe'];
		$resultat = $administrateur->Validation_Connexion($mail, $mot_de_passe);
		if($resultat != false){
			$this->session->set_userdata("administrateur",$resultat);
			print_r($resultat);
			//return $_SESSION['utilisateur'];
			if(isset($_SESSION['administrateur'])){
				redirect(site_url('regime/Regime'));
			}
		}else redirect(site_url('authentification/login?error'));
	}

	public function deconnexion(){
		session_destroy();
		redirect(site_url('authentification/login?logged_out'));
	}

}

?>