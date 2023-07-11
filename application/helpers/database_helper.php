<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if ( ! function_exists('obtenir_sequence_value'))
	{
		function obtenir_sequence_value( $seq_name, $db){
			$query = "select currval(%s)";
			$query = sprintf($query, $db->escape($seq_name));
			$query = $db->query($query);
			$result = $query->result_array();
			return $result[0]["currval"];
		}
	}
?>
