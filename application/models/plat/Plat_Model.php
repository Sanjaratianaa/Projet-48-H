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