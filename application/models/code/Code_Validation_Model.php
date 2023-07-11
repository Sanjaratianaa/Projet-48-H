<?php

	class Code_Validation_Model extends CI_Model{

		public static $table = 'code_validation';
        public static $primarykey = 'id';

		public $id;
        public $id_code_demande;
        public $id_administrateur;
        public $date_validation;

		public function insert($id_code_demande,$id_administrateur,$date_validation) {
			if($id_code_demande == 0 || $id_administrateur == 0) throw new Exception("Code_demande ou Administrateur null!");
			
			$data = [
				'id_code_demande' => $id_code_demande,
				'id_administrateur' => $id_administrateur,
				'date_validation' => $date_validation
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

	}

?>