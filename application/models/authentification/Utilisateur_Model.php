<?php

	class Utilisateur_Model extends CI_Model{

		public function __construct() {
			parent::__construct();
			$this->load->model('authentification/Profil_Model','profil');
		}

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
			$annee_recent = date('Y');
			$annee_naissance = $dob->format('Y');
			$age = $annee_recent - $annee_naissance;
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
			$profil_recent = $profil->obtenir($utilisateur->id);
			$age = $this->calcul_age($utilisateur->date_naissance);

			$TMB = $this->calcul_Taux_Metabolisme_Base($profil_recent->genre, $profil_recent->poids, $age, $profil_recent->taille);
			$facteur = $this->obtenir_facteur_physique($profil_recent);

			$resultat = $TMB * $facteur;

			return $resultat;
		}

		public function obtenir_perte_calorie($objectif) {
			$conversion = 7700;
			$resultat = abs($objectif) * $conversion;
			return $resultat;
		}

		public function obtenir_perte_necessaire($objectif) {
			if(strpos($objectif, "-") !== false) {
				if(abs($objectif) > 10) {
					return 1500;
				}
				return 1000;
			}else{
				return 500;
			}
			return false;
		}

		public function obtenir_calorie_journaliere($utilisateur, $objectif) {
			$calorie_usuel = $this->obtenir_calorie_usuel($utilisateur);
			$perte_necessaire = $this->obtenir_perte_necessaire($objectif);
			$resultat = $calorie_usuel + $perte_necessaire;
			return $resultat;
		}

		public function obtenir_imc_actuel($utilisateur) {
			$profil = new Profil_Model();
			$profil_recent = $profil->obtenir($utilisateur->id);
		
			$poids = $profil_recent->poids;
			$taille = $profil_recent->taille;
		
			$tailleEnMetre = $taille/100;
		
			$IMC = $poids / ($tailleEnMetre * $tailleEnMetre);
		
			return $IMC;
		}
		
		-- // poids_normal >> IMC entre 18,5 et 24,9
		
		public function calculer_perte_poids_imc($poids, $taille) {
			$tailleEnMetre = $taille / 100;
			$poids_cible = 24.9 * ($tailleEnMetre * $tailleEnMetre);
			$pertePoids = $poids - $poids_cible;
			return $pertePoids;
		}
		
		public function calculer_gain_poids_imc($poids, $taille) {
			$tailleEnMetre = $taille / 100;
			$poids_cible = 18.5 * ($tailleEnMetre * $tailleEnMetre);
			$gainPoids = $poids_cible - $poids;
			return $gainPoids;
		}
		
		public function atteindre_imc_ideal($utilisateur) {
			$profil = new Profil_Model();
			$profil_recent = $profil->obtenir($utilisateur->id);
		
			$poids = $profil_recent->poids;
			$taille = $profil_recent->taille;
		
			$imc_actuel = $this->obtenir_imc_actuel($utilisateur);
			if($imc_actuel < 18.5){
				return $this->calculer_gain_poids_imc($poids, $taille);
			}else if($imc_actuel > 24.9) {
				return '-'.$this->calculer_perte_poids_imc($poids, $taille);
			}
			return false;
		}

	}

?>