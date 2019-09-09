<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_services extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='SERVICES';
	    }
		
		function get_services_data(){
			$query = $this->db->get($this->tablename);
			return $query->result_array();
		}
		function get_services_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get($this->tablename);
			return $query->row();
		}
		function insertservices($data){
			
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
		function updateservices($data){
			
			$recorddata=array('TITLE' => $data['TITLE'],'DESCRIPTION' => $data['DESCRIPTION'],'CHARGES' => $data['CHARGES'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['ID']);
			$this->db->update($this->tablename, $recorddata);
			return true;

		}
		function deleteservices($data){

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
