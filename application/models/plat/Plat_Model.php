<?php

	class Plat_Model extends CI_Model{

		public static $table = 'plat';
        public static $primarykey = 'id';

		public $id;
		public $designation;

		public function insert($designation) {
			if($designation == "" ) throw new Exception("La designation du plat ?");
			
			$data = [
				'designation' => $designation
			];

			try {
				$this->db->insert(self::$table, $data);
			} catch (Exception $exception) {
				throw $exception;
			}

		}

    public function inserer_plat_aliment($designation, $id_aliments, $pourcentage){
        if (empty($designation) || $designation == null){
            throw new Exception("La désignation est obligatoire");
        }
        if (empty($id_aliments) || $id_aliments == null){
            throw new Exception("L'aliment est obligatoire");
        }
        if (empty($pourcentage) || $pourcentage == null){
            throw new Exception("Le pourcentage est obligatoire");
        }

        $data = [
            'designation' => $designation
        ];

        try {
            $this->db->trans_start();
            $this->db->insert(self::$table, $data);
            $id_plat = obtenir_sequence_value("plat_id_seq", $this->db);
            foreach ($id_aliments as $id_aliment){
                $plat_aliment = new Plat_Aliment_Model();
                $plat_aliment->inserer_plat_aliment_trans($id_plat, $id_aliment, $pourcentage, $this->db);
            }
            $this->db->trans_complete();
        }catch ( Exception $exception ){
            $this->db->trans_rollback();
            throw $exception;
        }
    }
		/**
		 * @author Yoann
		 * Plats et categorie et pourcentage
		 */
	
		 public function obtenir_plats_categorie($id_plat){
			$requete = $this->db->get_where('v_categorie_plat', array('id_plat' => $id_plat));
			$resultats = array();
			$results = $requete->result();
			foreach ($results as $resultat) {
				$resultats[] = $resultat;
			}
			return $resultats;
		 }

		public function lister_tout() {
			$requete = $this->db->get(self::$table);
			$resultats = array();
			$resultats_table = $requete->result_array();
			foreach($resultats_table as $row) {
                $plat = new Plat_Model();
                $plat->id = $row["id"];
                $plat->designation = $row["designation"];
				$resultats[] = $plat;
			}
			return $resultats;
		}

		public function obtenir($id_plat) {
			$this->db->where("id",$id_plat);
			$requete = $this->db->get(self::$table);
			if($requete->num_rows() > 0) {
				return $requete->row();
			}
			return false;
		}

	}

?>