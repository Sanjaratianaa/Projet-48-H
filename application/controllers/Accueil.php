<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('authentification/Utilisateur_Model' , 'utilisateur');
		$this->load->model('authentification/Administrateur_Model' , 'administrateur');
		$this->load->model('authentification/Profil_Model' , 'profil');
        $this->load->model('information/Genre_Model', 'genre');
        if(!isset($_SESSION['utilisateur'])){
			redirect(site_url('authentification/Login'));
        }
	}

	public function index()
	{
        $profile = $this->profil->est_null($_SESSION['utilisateur']->id);
        $data['genres'] = $this->genre->lister_tout();
        $data['contenu'] = 'Accueil';
        $data['profile'] = $profile;
        $data['profil'] = $this->profil->obtenir_profil($_SESSION['utilisateur']->id);
        $this->load->view('template/index', $data);
	}
}
