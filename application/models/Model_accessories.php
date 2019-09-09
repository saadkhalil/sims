<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_accessories extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='ACCESSORIES';

	    }
		
		function get_accessories_data(){
			$query = $this->db->get($this->tablename);
			return $query->result_array();
		}
		function get_accessories_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get($this->tablename);
			return $query->row();
		}
		function insertaccessories($data){
			
			$TITLE=$data['TITLE'];
			$this->db->where('TITLE',$TITLE);
			$query = $this->db->get($this->tablename);
			if($query->num_rows()>0){
				return false;
			}
			else{
				$data['STATUS']=1;
				$data['CREATED_AT']=date('d-M-y');
				$this->db->insert($this->tablename, $data);
				return true;
			}

		}
		function updateaccessories($data){
			
			$recorddata=array('TITLE' => $data['TITLE'],'CHARGES' => $data['CHARGES'],'DESCRIPTION' => $data['DESCRIPTION'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['ID']);
			$this->db->update($this->tablename, $recorddata);
			return true;

		}
		function deleteaccessories($data){

			$ID=$data['id'];
			$this->db->where('ID',$ID);
			$query = $this->db->get($this->tablename);
			if($query->num_rows()>0){
				$this->db->where('ID',$ID);
				$this->db->delete($this->tablename);
				return true;
			}
			else{
				return false;
			}

		}


	}?>
