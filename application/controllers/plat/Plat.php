<?php

class Plat extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('plat/Plat_Model' , 'plat');
        $this->load->model('aliment/Aliment_Model' , 'aliment');
        $this->load->model('plat/Plat_Aliment_Model', 'plat_aliment');
    }

    public function index(){
        $this->data['plats'] = $this->plat->lister_tout();
        $this->data['titre'] = 'Liste des plats';
        $this->data['contenu'] = 'plat/index';
        $this->load->view("template/index", $this->data);
    }

    public function insertion(){
        $this->data['titre'] = 'Ajout d\'un plat';
        $this->data['contenu'] = 'plat/insertion';
        $this->load->view("template/index", $this->data);
    }

    public function inserer(){
        $designation = $this->input->post('designation');
        $this->session->set_userdata('designation', $designation);
        $this->data['aliments'] = $this->aliment->lister_tout();
        $this->data['titre'] = 'Ajout d\'un plat régime';
        $this->data['contenu'] = 'plat/insertion_aliment';
        $this->load->view("template/index", $this->data);
    }

    public function inserer_plat_aliment(){
        $id_aliment = $this->input->post('id_aliment');
        $pourcentage = $this->input->post('pourcentage');
        $designation = $this->session->userdata('designation');
        try {
            if ( is_array($id_aliment) && is_array($pourcentage) ){
                $this->plat->inserer_plat_aliment($designation, $id_aliment, $pourcentage);
            }else{
                $this->plat->inserer($designation);
            }
            $this->output->set_status_header('200');
            $this->data['success'] = "Added Successfully";
            $this->session->unset_userdata('designation');
            echo json_encode($this->data);
        }catch (Exception $e){
            $this->output->set_status_header('400');
            $this->data['error'] = $e->getMessage();
            echo json_encode($this->data);
        }

    }
}