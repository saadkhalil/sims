<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_visittype extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='VISIT_TYPE';
	    }
		
		function get_visittype_data(){
			$query = $this->db->get($this->tablename);
			return $query->result_array();
		}
		function get_visittype_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get($this->tablename);
			return $query->row();
		}
		function insertvisittype($data){
			
			$SERVICE_NAME=$data['SERVICE_NAME'];
			$this->db->where('SERVICE_NAME',$SERVICE_NAME);
			$query = $this->db->get($this->tablename);
			if($query->num_rows()>0){
				return false;
			}
			else{
				$data['CREATED_AT']=date('d-M-y');
				$this->db->insert($this->tablename, $data);
				return true;
			}

		}
		function updatevisittype($data){
			
			$recorddata=array('SERVICE_NAME' => $data['SERVICE_NAME'],'AVAILABLE' => $data['AVAILABLE'],'DESCRIPTION' => $data['DESCRIPTION'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['ID']);
			$this->db->update($this->tablename, $recorddata);
			return true;

		}
		function deletevisittype($data){

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
