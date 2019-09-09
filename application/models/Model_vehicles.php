<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_vehicles extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='CUSTOMER_VEHICLES';
	    }
		
		function get_customer_vehicle_data($cid){
					$this->db->select('CUSTOMER_VEHICLES.*,MODEL.TITLE AS MODEL,COLOR.TITLE AS COLOR');
					$this->db->join('MODEL','MODEL.ID=CUSTOMER_VEHICLES.MODEL_ID','left');
					$this->db->join('COLOR','COLOR.ID=CUSTOMER_VEHICLES.COLOR_ID','left');
					$this->db->where('CUSTOMER_ID',$cid);
			$query = $this->db->get($this->tablename);
			return $query->result_array();
		}
		function get_models_data(){
					$this->db->where('STATUS',1);
			$query = $this->db->get('MODEL');
			return $query->result_array();
		}
		function get_colors_data(){
					$this->db->where('STATUS',1);
			$query = $this->db->get('COLOR');
			return $query->result_array();
		}
		function get_customer_details_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get('CUSTOMER_DETAILS');
			return $query->row();
		}
		function get_customer_vehicle_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get($this->tablename);
			return $query->row();
		}
		function insertcustomervehicles($data){
				
				$data['PURCHASE_DATE']=date('d-M-y', strtotime($data['PURCHASE_DATE']));
				$data['STATUS']=1;
				$data['CREATED_AT']=date('d-M-y');
				$this->db->insert($this->tablename, $data);
				return true;

		}
		function updatecustomervehicles($data){
				
			$recorddata=array('CHASSIS_NO' => $data['CHASSIS_NO'],'REGISTRATION_NO' => $data['REGISTRATION_NO'],'MODEL_ID' => $data['MODEL_ID'],'COLOR_ID' => $data['COLOR_ID'],'ENGINE_NO' => $data['ENGINE_NO'],'PURCHASE_DATE' => $data['PURCHASE_DATE'],'CUSTOMER_ID' => $data['CUSTOMER_ID'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['ID']);
			$this->db->update($this->tablename, $recorddata);
			return true;

		}
		function deletecustomervehicles($data){

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
