<?php

class Regime_Model extends CI_Model
{

    public function __construct() {
        parent::__construct();
        $this->load->model('authentification/Utilisateur_Model','utilisateur');
        $this->load->model('authentification/Profil_Model','profil');
    }

    public static $table = 'regime';

    public $id;
    public $designation;
    public $id_regime;
    public $id_plat;
    public $designation_plat;
    public $designation_regime;

    public function lister_tout_regime(){
        $requete = $this->db->get(self::$table);
        $resultats = array();
        $resultats_table = $requete->result_array();
        foreach($resultats_table as $row) {
            $regime = new Regime_Model();
            $regime->id = $row["id"];
            $regime->designation = $row["designation"];
            $resultats[] = $regime;
        }
        return $resultats;
    }

    public function lister_tout_plat_regime(){
        $requete = $this->db->get('v_plat_regime');
        $resultats = array();
        $resultats_table = $requete->result_array();
        foreach($resultats_table as $row) {
            $plat_regime = new Regime_Model();
            $plat_regime->id = $row["id"];
            $plat_regime->id_plat = $row["id_plat"];
            $plat_regime->id_regime = $row["id_regime"];
            $plat_regime->designation_plat = $row["designation_plat"];
            $plat_regime->designation_regime = $row["designation_regime"];
            $resultats[] = $plat_regime;
        }
        return $resultats;
    }

    public function inserer_plat_regime($id_regime, $id_plat)
    {
        if (empty($id_regime) || $id_regime == null){
            throw new Exception("Le régime est obligatoire");
        }

        if (empty($id_plat) || $id_plat == null){
            throw new Exception("Le plat est obligatoire");
        }

        $data = [
            'id_regime' => $id_regime,
            'id_plat' => $id_plat
        ];

        try {
            $this->db->insert('plat_regime', $data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function inserer_regime($designation){
        $data = [
            'designation' => $designation
        ];

        try {
            $this->db->insert(self::$table, $data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
    public function obtenir_regime($id){
        $this->db->where("id",$id);
        $requete = $this->db->get(self::$table);
        if($requete->num_rows() > 0) {
            return $requete->row();
        }
        return false;
    }

    public function lister($id_regime){
        $this->db->where("id_regime", $id_regime);
        $requete = $this->db->get("v_plat_regime");
        $resultats = array();
        $resultat_table = $requete->result_array();
        foreach ($resultat_table as $row){
            $plat_regime = new Regime_Model();
            $plat_regime->id = $row["id"];
            $plat_regime->id_plat = $row["id_plat"];
            $plat_regime->id_regime = $row["id_regime"];
            $plat_regime->designation_plat = $row["designation_plat"];
            $plat_regime->designation_regime = $row["designation_regime"];
            $resultats[] = $plat_regime;
        }
        return $resultats;
    }

    public function inserer($designation, $id_plats){
        if (empty($designation) || $designation == null){
            throw new Exception("La désignation est obligatoire");
        }

        $id_regime = "select nextval('regime_id_seq')";
        $data = [
            'designation' => $designation
        ];

        try {
            $this->db->trans_start();
            $this->db->insert(self::$table, $data);
            foreach ($id_plats as $id_plat){
                $plat_regime = new Regime_Model();
                $plat_regime->inserer_plat_regime($id_regime, $id_plat);
            }
            $this->db->trans_complete();
        }catch ( Exception $exception ){
            $this->db->trans_rollback();
            throw $exception;
        }
    }
}