<?php

	class Administrateur_Model extends CI_Model{

		public static $table = 'administrateur';
        public static $primarykey = 'id';

		public $id;
		public $nom;
		public $prenom;
		public $mail;
		public $mot_de_passe;

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