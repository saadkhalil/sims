<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_dealership_group extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='DEALERSHIP_GROUP';
	    }
		
		function get_dealership_group_data(){
			$this->db->order_by('ID','ASC');
			$query = $this->db->get($this->tablename);
			return $query->result_array();
		}
		function get_dealership_group_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get($this->tablename);
			return $query->row();
		}
		function insertdealershipgroup($data){
			
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
		function updatedealershipgroup($data){
			
			$recorddata=array('TITLE' => $data['TITLE'],'DESCRIPTION' => $data['DESCRIPTION'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['ID']);
			$this->db->update($this->tablename, $recorddata);
			return true;

		}
		function deletedealershipgroup($data){

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
		function get_count_dealership_where_dealerid($did){

			$this->db->where('ID',$did);
			$query = $this->db->get('DEALER_DETAILS');
			return $query->num_rows();

		}
		function get_dealership_count_by_region($RID,$DGID){
			$this->db->join('DEALER_DETAILS','DEALER_DETAILS.REGION_ID=REGIONS.ID','LEFT');
			$this->db->where('DEALER_DETAILS.DEALERSHIP_GROUP_ID',$DGID);
			$this->db->where('DEALER_DETAILS.REGION_ID',$RID);
			$query = $this->db->get('REGIONS');
			return $query->num_rows();
		}
		function get_dealership_count_by_national($DGID){
			$this->db->where('DEALER_DETAILS.DEALERSHIP_GROUP_ID',$DGID);
			$query = $this->db->get('DEALER_DETAILS');
			return $query->num_rows();
		}



	}?>
