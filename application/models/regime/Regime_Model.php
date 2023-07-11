<?php

class Regime_Model extends CI_Model
{

    public function __construct() {
        parent::__construct();
        $this->load->model('authentification/Utilisateur_Model','utilisateur');
        $this->load->model('authentification/Profil_Model','profil');
        $this->load->model('activite/Activite_Model', 'activite');
    }

    public static $table = 'regime';

    public $id;
    public $designation;
    public $calorie_moyenne;
    public $id_regime;
    public $id_plat;
    public $designation_plat;
    public $designation_regime;

    public function lister_tout_regime(){
        $requete = $this->db->get(self::$table);
        $resultats = array();
        $resultats_table = $requete->result();
        foreach($resultats_table as $row) {
            /*$regime = new Regime_Model();
            $regime->id = $row["id"];
            $regime->designation = $row["designation"];
            $regime->calorie_moyenne = $row["calorie_moyenne"];*/
            $resultats[] = $row;
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
            $plat_regime->calorie_moyenne = $row["calorie_moyenne"];
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

    public function inserer_regime($designation, $calorie_moyenne){
        $data = [
            'designation' => $designation,
            'calorie_moyenne' => $calorie_moyenne
        ];

        try {
            $this->db->insert(self::$table, $data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * regime approprie
     */

     public function obtenir_regime_approprie($utilisateur, $objectif){
        $activites = $this->utilisateur->lister_activites_approprie($utilisateur);
        $calorie_necessaire = $this->utilisateur->obtenir_calorie_journaliere($utilisateur, $objectif);
        $regimes = $this->lister_tout_regime();
        $moyenne_activite = $this->activite->moyenne_calorique($activites);
        $val = $regimes[0];
        $val_calorie = 99999;
        foreach ($regimes as $regime) {
            $delta_calorie = abs($calorie_necessaire - ($regime->calorie_moyenne + $moyenne_activite));
            if($delta_calorie < $val_calorie){
                $val_calorie = $delta_calorie;
                $val = $regime;
            }
        }
        return $val;
     }

     /**
      * @author Yoann
      * Retourne les plats du regime
      */
     public function obtenir_plats($id_regime){
        $sql = "select plat.* from plat join plat_regime pr on plat.id = pr.id_plat where id_regime = %s";
        $sql = sprintf( $sql, $this->db->escape($id_regime));
        $query = $this->db->query($sql);
        $return = $query->result();
        $results = array();
        foreach ($return as $row) {
            $results[] = $row;
        }
        return $results;
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
            $plat_regime->calorie_moyenne = $row["calorie_moyenne"];
            $plat_regime->designation_plat = $row["designation_plat"];
            $plat_regime->designation_regime = $row["designation_regime"];
            $resultats[] = $plat_regime;
        }
        return $resultats;
    }

    public function inserer($designation, $calorie_moyenne, $id_plats){
        if (empty($designation) || $designation == null){
            throw new Exception("La désignation est obligatoire");
        }

        $data = [
            'designation' => $designation,
            'calorie_moyenne' => $calorie_moyenne
        ];

        try {
            $this->db->trans_start();
            $this->db->insert(self::$table, $data);
            $id_regime = obtenir_sequence_value("regime_id_seq", $this->db);
            foreach ($id_plats as $id_plat){
                $plat_regime = new Regime_Model();
                $plat_regime->inserer_plat_regime_trans($id_regime, $id_plat, $this->db);
            }
            $this->db->trans_complete();
        }catch ( Exception $exception ){
            $this->db->trans_rollback();
            throw $exception;
        }
    }

    public function inserer_plat_regime_trans($id_regime, $id_plat, $db){
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
            $db->insert('plat_regime', $data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}