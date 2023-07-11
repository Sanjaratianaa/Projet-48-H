<?php

class Code extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('code/Code_Validation_Model' , 'code_validation');
        $this->load->model('code/Code_Demande_Model' , 'code_demande');
        $this->load->model('code/Code_Argent_Model', 'code_argent');
    }

    public function index(){
        $this->data['code_demandes'] = $this->code_argent->lister_code_demande();
        $this->data['titre'] = "Liste des codes de validation";
        $this->data['contenu'] = "code_validation/index";
        $this->load->view('template/index', $this->data);
    }

    public function validation( $id_demande ){
        if (empty($id_demande)){
            redirect('code/Code');
        }
        $admin = $this->session->get_userdata('administrateur');
        try {
            $this->code_validation->insert($id_demande, $admin->id, @date('Y-m-d H:i:s', time()));
        }catch (Exception $e){
            redirect(base_url('code/Code')."?error");
        }
    }
}