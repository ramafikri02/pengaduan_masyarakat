<?php 
class M_user extends CI_Model{
	function get_data(){
		return $this->db->get('user');
	}
}