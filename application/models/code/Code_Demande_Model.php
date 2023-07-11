<?php

	class Code_Demande_Model extends CI_Model{

		public static $table = 'code_demande';
        public static $primarykey = 'id';

		public $id;
        public $id_utilisateur;
        public $id_code;
        public $date_demande;

		public function insert($id_utilisateur,$id_code,$date_demande) {
			if($id_utilisateur == 0 || $id_code == null) throw new Exception("Id_Utilisateur ou Code null!");
			
			$data = [
				'id_utilisateur' => $id_utilisateur,
				'id_code' => $id_code,
				'date_demande' => $date_demande
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