<?php

class Plat_Aliment_Model extends CI_Model
{
    public static $table = 'plat_aliment';

    public $id;
    public $id_plat;
    public $id_aliment;
    public $pourcentage;

    public function lister_tout(){
        $requete = $this->db->get(self::$table);
        $resultats = array();
        $resultats_table = $requete->result_array();
        foreach($resultats_table as $row) {
            $plat_aliment = new Plat_Aliment_Model();
            $plat_aliment->id = $row["id"];
            $plat_aliment->id_plat = $row["id_plat"];
            $plat_aliment->id_aliment = $row["id_aliment"];
            $plat_aliment->pourcentage = $row["pourcentage"];
            $resultats[] = $plat_aliment;
        }
        return $resultats;
    }

    public function inserer($id_plat, $id_aliment, $pourcentage){
        $data = [
            'id_plat' => $id_plat,
            'id_aliment' => $id_aliment,
            'pourcentage' => $pourcentage
        ];

        try {
            $this->db->insert(self::$table, $data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function obtenir($id_plat_aliment){
        $this->db->where("id",$id_plat_aliment);
        $requete = $this->db->get(self::$table);
        if($requete->num_rows() > 0) {
            return $requete->row();
        }
        return false;
    }

    public function inserer_plat_aliment_trans($id_plat, $id_aliment, $pourcentage, $db){
         $data = [
            'id_plat' => $id_plat,
            'id_aliment' => $id_aliment,
            'pourcentage' => $pourcentage
        ];

        try {
            $db->insert(self::$table, $data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}