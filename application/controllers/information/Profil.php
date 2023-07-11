<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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

  public function information(){
    $data['profil'] = $this->profil->obtenir_profil($_SESSION['utilisateur']->id);
    $data['profils'] = $this->profil->obtenir_profils($_SESSION['utilisateur']->id);
    $dates = array();
    $poids = array();
    foreach ($data['profils'] as $report) {
      $dates[] = $report->date_report;
      $poids[] = $report->poids;
    }
    $data['dates'] = $dates;
    $data['poids'] = $poids;
    $data['contenu'] = 'information/Profil';
    $this->load->view('template/index', $data);
  }

	public function insertion()
	{   
        $poids = $_GET['poids'];
        $taille = $_GET['taille'];
        $genre = $_GET['genre'];
        $frequence = $_GET['frequence'];

        try{
          $this->profil->insert($poids, $genre,$taille,'now()',$_SESSION['utilisateur']->id, $frequence);
          //$this->load->view('template/index', $data);
          redirect(site_url('Accueil?success'));
        }catch(Exception $e){
          echo "error";
        }
	}
}
