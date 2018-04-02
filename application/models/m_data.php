<?php
 /**
 * 
 */
 class M_data extends CI_Model
 {

 	function get_data()
 	{
 		return $this->db->get('biodata');
 	}
 }