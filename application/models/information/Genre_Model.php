<?php

	class Genre_Model extends CI_Model{

		public static $table = 'genre';
        public static $primarykey = 'id';

		public $id;
		public $designation;
	

		public function lister_tout() {
			$requete = $this->db->get('genre');
			$resultats = array();
			$resultats_table = $requete->result_array();
			foreach( $resultats_table as $row ){
				$genre = new Genre_Model();
				$genre->id = $row['id'];
				$genre->designation = $row['designation'];
				$resultats[] = $genre;
			}

			return $resultats;

		}

	}

?>