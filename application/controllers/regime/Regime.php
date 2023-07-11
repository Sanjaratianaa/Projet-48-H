<?php

class Regime extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('regime/Regime_Model' , 'regime');
            $this->load->model('plat/Plat_Model' , 'plat');
        }

        public function index(){
            $this->data['regimes'] = $this->regime->lister_tout_regime();
            $this->data['titre'] = 'Liste des régimes';
            $this->data['contenu'] = 'regime/index';
            $this->load->view("template/index", $this->data);
        }

        public function insertion(){
            $this->data['titre'] = 'Ajout d\'un régime';
            $this->data['contenu'] = 'regime/insertion';
            $this->load->view("template/index", $this->data);
        }

        public function inserer(){
            $designation = $this->input->post('designation');
            $calorie = $this->input->post('calorie');
            $this->session->set_userdata('designation', $designation);
            $this->session->set_userdata('calorie', $calorie);
            $this->data['plats'] = $this->plat->lister_tout();
            $this->data['titre'] = 'Ajout d\'un plat régime';
            $this->data['contenu'] = 'regime/insertion_plat';
            $this->load->view("template/index", $this->data);
        }

        public function detail( $id ){
            $regime = $this->regime->obtenir_regime($id);
            $this->data['regimes'] = $regime;
            $this->data['titre'] = 'Le régime '.$regime->designation;
            $this->data['contenu'] = 'regime/detail';
            $this->load->view("template/index", $this->data);
        }

        public function regime_recherche(){
            if(!isset($_SESSION['utilisateur']) || !isset($_GET['objectif'])){
                redirect(site_url('accueil?error_regime'));
            }
            $objectif = $_GET['objectif'];
            $regime_o = $this->regime->obtenir_regime_approprie($_SESSION['utilisateur'], $objectif);
            $plats = $this->regime->obtenir_plats($regime_o->id);
            $plat_categories = array();
            foreach ($plats as $plat) {
                $id_plat = $plat->id;
                if(!isset($plat_categories[$id_plat])){
                    $plat_categories[$id_plat] = array();
                }
                $plat_categories[$id_plat] = $this->plat->obtenir_plats_categorie($id_plat);
            }
            $_SESSION['regime_plats'] = $plats;
            $_SESSION['regime_categories'] = $plat_categories;
            $_SESSION['regime_optimal'] = $regime_o;
            redirect(site_url('accueil'));
        }

        public function inserer_plat_regime(){
            $id_plat = $this->input->post('id_plat');
            $designation = $this->session->userdata('designation');
            $calorie = $this->session->userdata('calorie');
            try {
                if ( is_array($id_plat) ){
                    $this->regime->inserer($designation, $calorie, $id_plat);
                }else{
                    $this->regime->inserer_regime($designation, $calorie);
                }
                $this->output->set_status_header('200');
                $this->data['success'] = "Added Successfully";
                $this->session->unset_userdata('designation');
                $this->session->unset_userdata('calorie');
                echo json_encode($this->data);
            }catch (Exception $e){
                $this->output->set_status_header('400');
                $this->data['error'] = $e->getMessage();
                echo json_encode($this->data);
            }

        }
}