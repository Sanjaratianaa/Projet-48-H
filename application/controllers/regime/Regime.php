<?php

class Regime extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('regime/Regime_Model' , 'regime');
            $this->load->model('plat/Plat_Model' , 'plat');
        }

        public function index(){
            $this->data['regimes'] = $this->regime->lister_tout_regime();
            $this->load->view("regime/index", $this->data);
        }

        public function insertion(){
            $this->load->view("regime/insertion");
        }

        public function inserer(){
            $designation = $this->input->post('designation');
            $this->session->set_userdata('designation', $designation);
            $this->data['plats'] = $this->plat->lister_tout();
            $this->load->view("regime/insertion_plat", $this->data);
        }

        public function detail( $id ){
            $this->data['regimes'] = $this->regime->lister_tout_plat_regime();
            $this->load->view("regime/detail", $this->data);
        }

        public function inserer_plat_regime(){
            $id_plat = $this->input->post('id_plat');
            $designation = $this->session->userdata('designation');
            
            try {
                if ( is_array($id_plat) ){
                    $this->regime->inserer($designation, $id_plat);
                }else{
                    $this->regime->inserer_regime($designation);
                }
                redirect('regime/Regime');
            }catch (Exception $e){
                $this->data['error'] = $e->getMessage();
                $this->load->view("regime/insertion_plat", $this->data);
            }

        }
}