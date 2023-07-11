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

	}

?>