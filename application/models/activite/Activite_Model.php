<?php

	class Activite_Model extends CI_Model{

		public static $table = 'activite';
        public static $primarykey = 'id';

		public $id;
		public $designation;
		public $calorie_moyen;
		public $id_intensite;
		public $duree;

		public function inserer($designation, $calorie_moyen, $id_intensite, $duree) {
			if($designation == "" ) throw new Exception("La designation de l'intensite physique ?");
			if($calorie_moyen <= 0 ) throw new Exception("Le calorie_moyen ne doit pas etre negatif!");
			
			$data = [
				'designation' => $designation,
				'calorie_moyen' => $calorie_moyen,
                'id_intensite' => $id_intensite,
                'duree' => $duree
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
			$resultats_table = $requete->result;
			foreach($resultats_table as $row) {
				/*$activite = new Activite_Model();
				$activite->id = $row["id"];
				$activite->designation = $row["designation"];
				$activite->calorie_moyen = $row["calorie_moyen"];
				$activite->id_intensite = $row["id_intensite"];
				$activite->duree = $row["duree"];*/
				$resultats[] = $row;
			}
			return $resultats;
		}

        public function lister_par_intensite($id_intensite) {
            $this->db->where("id_intensite", $id_intensite);
			$requete = $this->db->get(self::$table);
			$resultats = array();
			$resultats_table = $requete->result();
			foreach($resultats_table as $row) {
				/*$activite = new Activite_Model();
				$activite->id = $row["id"];
				$activite->designation = $row["designation"];
				$activite->calorie_moyen = $row["calorie_moyen"];
				$activite->id_intensite = $row["id_intensite"];
				$activite->duree = $row["duree"];*/
				$resultats[] = $row;
			}
			return $resultats;
		}

		public function obtenir($id_activite) {
			$this->db->where("id",$id_activite);
			$requete = $this->db->get(self::$table);
			if($requete->num_rows() > 0) {
				return $requete->row();
			}
			return false;
		}

        public function liste_tout_moyenne_calorique() {
            $this->db->select('id_intensite, AVG(calorie_moyen) as moyenne_calorique');
            $this->db->group_by('id_intensite');
            $requete = $this->db->get(self::$table);
            $resultats = array();
            $resultats_table = $requete->result_object();
			foreach($resultats_table as $row) {
                $resultats[] = $row;
            }
            return $resultats;
        }

		public function moyenne_calorique($tableau_activite) {
			$total_calories = 0;
			$count = count($tableau_activite);
		
			foreach ($tableau_activite as $activite) {
				$total_calories += $activite->calorie_moyen;
			}
		
			$moyenne = ($count > 0) ? $total_calories / $count : 0;
			return $moyenne;
		}		

	}

?>