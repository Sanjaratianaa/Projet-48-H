<?php

	class Profil_Model extends CI_Model{

		public static $table = 'profil';
        public static $primarykey = 'id';

		public $id;
		public $poids;
		public $genre;
		public $taille;
		public $date_report;
		public $id_utilisateur;

		public function format_date($date)
		{
			return date("Y-m-d", strtotime($date));
		}

		public function insert($poids,$genre,$taille,$date_report,$id_utilisateur) {
			if($poids <= 0 ) throw new Exception("C\'est impossible d'avoir un poids negatif ou null, reverifie bien!");
			if($genre <= 0 ) throw new Exception("Sans genre!?");
			if($taille <= 0 ) throw new Exception("Tu n\'existes pas ? Ta taille!");
			
			$data = [
				'poids' => $poids,
				'genre' => $genre,
				'taille' => $taille,
				'date_report' => $this->format_date($date_report),
				'id_utilisateur' => $id_utilisateur
			];

			try {
				$this->db->insert(self::$table, $data);
			} catch (Exception $exception) {
				throw $exception;
			}

		}

		public function update($poids = 0, $genre = 0, $taille = 0, $date) {
			$data = array();
		
			if ($poids != 0) {
				if($poids < 0) throw new Exception("Le poids est negatif!");
				$data['poids'] = $poids;
			}
		
			if ($taille != 0) {
				if($taille < 0) throw new Exception("Le taille est negatif!");
				$data['taille'] = $taille;
			}
		
			if ($genre != 0) {
				if($genre < 0) throw new Exception("Le genre est negatif!");
				$data['genre'] = $genre;
			}
		
			$data['date_report'] = $this->format_date($date);

			try {
				$this->db->update(self::$table, $data);
			} catch (Exception $exception) {
				throw $exception;
			}
		}		

		public function lister_tout($id_utilisateur) {
			$this->db->where('id_utilisateur', $id_utilisateur);
			$requete = $this->db->get(self::$table);
			$resultats = array();
			$resultats_table = $requete->result_array();
			foreach( $resultats_table as $row ){
				$profil = new Profil_Model();
				$profil->id = $row["id"];
				$profil->poids = $row["poids"];
				$profil->genre = $row["genre"];
				$profil->taille = $row["taille"];
				$profil->date_report = $row["date_report"];
				$resultats[] = $profil;
			}

			return $resultats;

		}

		public function lister_dernier_profil($id_utilisateur) {
			$this->db->where('id_utilisateur',$id_utilisateur);
			$requete = $this->db->get(self::$table);
			if($requete->num_rows() > 0 ) {
				$dernier = $requete->$last_row();
				return $dernier;
			}
			return false;
		}

		public function si_null($id_utilisateur) {
			$this->db->where('id_utilisateur',$id_utilisateur);
			$requete = $this->db->get(self::$table);
			if($requete->num_rows() > 0 ) {
				return true;
			}
			return false;
		}

	}

?>