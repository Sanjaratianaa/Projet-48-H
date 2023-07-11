<?php

	class Intensite_Physique_Model extends CI_Model{

		public static $table = 'intensite_physique';
        public static $primarykey = 'id';

		public $id;
		public $designation;
		public $inferieur;

		public function insert($designation, $inferieur) {
			if($designation == "" ) throw new Exception("La designation de l'intensite physique ?");
			if($inferieur <= 0 ) throw new Exception("Il ne doit pas etre negatif!");
			
			$data = [
				'designation' => $designation,
				'inferieur' => $inferieur
			];

			try {
				$this->db->insert(self::$table, $data);
			} catch (Exception $exception) {
				throw $exception;
			}

		}

		public function lister_tout() {
			$requete = $this->db->get(self::$table);
			$resultats = array();
			$resultats_table = $requete->result_array();
			foreach($resultats_table as $row) {
				$intensite_physique = new Intensite_Physique_Model();
				$intensite_physique->id = $row["id"];
				$intensite_physique->designation = $row["designation"];
				$intensite_physique->inferieur = $row["inferieur"];
				$resultats[] = $intensite_physique;
			}
			return $resultats;
		}

		// Mbola tsy mety
		// public function obtenir_par_frequence($frequence_hebdomadaire) {
		// 	$this->db->where('inferieur <=', $frequence_hebdomadaire);
		// 	$this->db->order_by('id', 'DESC');
		// 	$this->db->limit(1);
			
		// 	$query = $this->db->get(self::$table);
			
		// 	echo $this->db->last_query();
		// 	if ($query->num_rows() > 0) {
		// 		return $query->result();
		// 	}
		// 	return false;
		// }

		public function obtenir_par_frequence($frequence_hebdomadaire) {
			$tout = $this->lister_tout();
			print_r($tout);
			foreach($tout as $ligne) {
				if($frequence_hebdomadaire <= $ligne->inferieur) {
					return $ligne->id;
				}
			}
			return false;
		}

	}

?>