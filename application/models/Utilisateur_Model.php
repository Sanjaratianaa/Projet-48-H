<?php

	class Utilisateur_Model extends CI_Model{

		public static $table = 'utilisateur';
        public static $primarykey = 'id_utilisateur';

		public $id_utilisateur;
		public $nom;
		public $mail;
		public $mot_de_passe;
		public $id_profil;

		public function insert($data) {
			$this->db->insert(self::$table, $data);
		}

		public function validateConnexion($data) {
			$this->db->where($data);
			$query = $this->db->get(self::$table);
			return $query->row();
		}		

	}

?>