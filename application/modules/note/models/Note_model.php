<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Note_model extends CI_Model{

	
	function save_note($data){
		$_param = array();
		$sql = $this->db->insert('tr_note',array(
								'id_vendor'=>$data['id_vendor'],
								'value'=>$data['value'],
								'entry_stamp'=>$data['entry_stamp']
								));
		return $sql;
	}

	

}