<?php

	class Profil_Model extends CI_Model{

		public static $table = 'profil';
        public static $primarykey = 'id_profil';

		public $id_profil;
		public $nom;

		public function getProfil($data) {
			$this->db->where($data);
			$query = $this->db->get(self::$table);
			return $query->row();
		}	
	}

?>