<?php

class Regime extends CI_Model
{
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
            $regime = new Regime();
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
            $plat_regime = new Regime();
            $plat_regime->id = $row["id"];
            $plat_regime->id_plat = $row["id_plat"];
            $plat_regime->id_regime = $row["id_regime"];
            $plat_regime->designation_plat = $row["designation_plat"];
            $plat_regime->designation_regime = $row["designation_regime"];
            $resultats[] = $plat_regime;
        }
        return $resultats;
    }

    public function inserer_plat_regime($id_regime, $id_plat){
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
            $plat_regime = new Regime();
            $plat_regime->id = $row["id"];
            $plat_regime->id_plat = $row["id_plat"];
            $plat_regime->id_regime = $row["id_regime"];
            $plat_regime->designation_plat = $row["designation_plat"];
            $plat_regime->designation_regime = $row["designation_regime"];
            $resultats[] = $plat_regime;
        }
        return $resultats;
    }
}