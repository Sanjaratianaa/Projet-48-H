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
			$resultats_table = $requete->result_object();
			foreach($resultats_table as $row) {
				$resultats[] = $row;
			}
			return $resultats;
		}

		public function obtenir_par_frequence($frequence_hebdomadaire) {
			$this->db->where('');
		}

	}

?>