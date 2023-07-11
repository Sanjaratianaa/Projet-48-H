<?php

	class Code_Model extends CI_Model{

		public static $table = 'code_argent';
        public static $primarykey = 'id';

		public $id;
		public $montant;

		public function insert($id,$montant) {
			if($montant <= 0 ) throw new Exception("Le montant ne doit pas etre negatif!");
			
			$data = [
				'id' => $id,
				'montant' => $montant
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

        public function lister_code_valide() {
			$requete = $this->db->get("v_code_valide");
			$resultats = array();
			$resultats_table = $requete->result_object();
			foreach($resultats_table as $row) {
				$resultats[] = $row;
			}
			return $resultats;
		}

        public function lister_code_invalide() {
			$requete = $this->db->get("v_code_invalide");
			$resultats = array();
			$resultats_table = $requete->result_object();
			foreach($resultats_table as $row) {
				$resultats[] = $row;
			}
			return $resultats;
		}

	}

?>