<?php

	class Utilisateur_Model extends CI_Model{

		public static $table = 'utilisateur';
        public static $primarykey = 'id';

		public $id;
		public $nom;
		public $prenom;
		public $mail;
		public $mot_de_passe;
		public $date_naissance;

		public function format_date($date)
		{
			return date("Y-m-d", strtotime($date));
		}

		public function validation_MotDePasse($password, $confirmation) {
			if($password == $confirmation)
			{
				return true;
			}
			return false;
		}

		public function validation_Email($email) {
			$utilisateur = new Utilisateur_Model();
			$data = ['mail' => $email];
			$utilisateur = $utilisateur->validate($data);
			if($utilisateur != 0)
			{
				return true;
			}
			return false;
		}


		public function insert($nom,$prenoms,$mail,$mot_de_passe,$date_naissance) {

			$data = [
				'nom' => $nom,
				'prenoms' => $prenoms,
				'mail' => $mail,
				'mot_de_passe' => $mot_de_passe,
				'date_naissance' => $this->format_date($date_naissance)
			];

			try {
				$this->db->insert(self::$table, $data);
			} catch (Exception $exception) {
				throw $exception;
			}

		}

		public function Validate_Email($email) {
			$this->db->where('mail',$email);
			$requete = $this->db->get(self::$table);
			if($requete->num_rows() == 0 ) {
				return true;
			}
			return false;
		}

		public function Validation_Connexion($mail, $mot_de_passe) {
			$this->db->where('mail',$mail);
			$this->db->where('mot_de_passe',$mot_de_passe);
			$requete = $this->db->get(self::$table);
			// echo $this->db->last_query();
			if($requete->num_rows() > 0) {
				return $requete->row();
			}
			return false;
		}

		public function calcul_age($date_naissance) {
			$dob = new DateTime($date_naissance);
			$currentDate = new DateTime();
			$age = $currentDate->diff($dob)->y;
			return $age;
		}

		public function calcul_Taux_Metabolisme_Base($genre, $poids, $age, $taille) {
			$TMB = 0;
			if($genre == 1) {
				$TMB = 655 + (9.56 * $poids) + (1.85 * $taille) - (4.68 * $age);
			}else if($genre == 2) {
				$TMB = 66 + (13.75 * $poids) + (5 * $taille) - (6.75 * $age);
			}
			return $TMB;
		}

		public function obtenir_facteur_physique($profil_recent) {
			if($profil_recent->frequence_activite == 1) {
				return 1.2;
			}else if($profil_recent->frequence_activite == 5) {
				return 1.55;
			}else if($profil_recent->frequence_activite == 10) {
				return 1.725;
			}
			return false;
		}


		public function obtenir_calorie_usuel($utilisateur) {
			$profil = new Profil_Model();
			$profil_recent = $profil->obtenir($utilisateur->$id);
			$age = $this->calcul_age($utilisateur->date_naissance);

			$TMB = $this->calcul_Taux_Metabolisme_Base($profil_recent->genre, $profil_recent->poids, $age, $profil_recent->taille);
			$facteur = $this->obtenir_facteur_physique($profil_recent);

			$resultat = $TMB * $facteur;

			return $resultat;
		}

	}

?>