<?php

class Aliment extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('aliment/Aliment_Model' , 'aliment');
    }

    public function index(){
        $this->data['aliments'] = $this->aliment->lister_tout();
        $this->load->view("aliment/index", $this->data);
    }
    public function insertion(){
        $this->data['categories'] = $this->aliment->lister_tout_categorie();
        $this->load->view("aliment/insertion", $this->data);
    }
    public function inserer(){
        $id_categorie_aliment = $this->input->post('id_categorie_aliment');
        $designation = $this->input->post('designation');
        $this->aliment->insert($id_categorie_aliment, $designation);
        redirect('aliment/Aliment');
    }

    public function detail( $id ){
        $this->data['aliment'] = $this->aliment->obtenir($id);
        $this->load->view("aliment/detail", $this->data);
    }

}