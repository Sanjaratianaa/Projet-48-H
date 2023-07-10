<?php

	class Aliment_Model extends CI_Model{

		public static $table = 'v_categorie_aliment';
        public static $primarykey = 'id';

		public $id;
		public $id_categorie_aliment;
		public $designation_categorie;
		public $designation_aliment;

		public function insert($id_categorie_aliment,$designation) {
			if($designation == "" ) throw new Exception("La designation de l\'aliment ?");
			
			$data = [
				'id_categorie_aliment' => $id_categorie_aliment,
				'designation' => $designation
			];

			try {
				$this->db->insert("aliment", $data);
			} catch (Exception $exception) {
				throw $exception;
			}

		}

		public function lister_tout_categorie() {
			$requete = $this->db->get("categorie_aliment");
			$resultats = array();
			$resultats_table = $requete->result_array();
			foreach($resultats_table as $row) {
				$resultats[] = $row;
			}
			return $resultats;
		}

		public function lister($id_categorie) {
			$this->db->where('id_categorie_aliment',$id_categorie);
			$requete = $this->db->get(self::$table);
			$resultats = array();
			$resultats_table = $requete->result_array();
			foreach($resultats_table as $row) {
				$alimentModel = new Aliment_Model();
				$alimentModel->id = $row["id"];
				$alimentModel->id_categorie_aliment = $row["id_categorie_aliment"];
				$alimentModel->designation_categorie = $row["designation_categorie"];
				$alimentModel->designation_aliment = $row["designation_aliment"];
				$resultats[] = $alimentModel;
			}
			return $resultats;
		}

		public function obtenir($id_aliment) {
			$this->db->where("id",$id_aliment);
			$requete = $this->db->get(self::$table);
			if($requete->num_rows() > 0) {
				return $requete->row();
			}
			return false;
		}

	}

?>