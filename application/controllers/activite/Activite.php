<?php

class Activite extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('activite/Activite_Model' , 'activite');
        $this->load->model('activite/Intensite_Physique_Model' , 'intensite');

    }

    public function index(){
        $this->data['intensites'] = $this->intensite->lister_tout();
        $this->data['activites'] = $this->activite->lister_tout();
        $this->data['titre'] = 'Liste des activites';
        $this->data['contenu'] = 'activite/index';
        $this->load->view("template/index_admin", $this->data);
    }

    public function insertion(){
        $this->data['intensites'] = $this->intensite->lister_tout();
        $this->data['activites'] = $this->activite->lister_tout();
        $this->data['titre'] = 'Liste des activites';
        $this->data['contenu'] = 'activite/insertion';
        $this->load->view("template/index_admin", $this->data);
    }

    public function inserer(){
        $designation = $this->input->post('designation');
        $calorie_moyen = $this->input->post('calorie-moyen');
        $intensite = $this->input->post('intensite');
        $duree = $this->input->post('duree');
        $activiteModel = new Activite_Model();
        $activiteModel->inserer($designation, $calorie_moyen, $intensite, $duree);
        $this->data['intensites'] = $this->intensite->lister_tout();
        $this->data['activites'] = $this->activite->lister_tout();
        $this->data['titre'] = 'Liste des activites';
        $this->data['contenu'] = 'activite/index';
        $this->load->view("template/index_admin", $this->data);
    }
}