<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_customerdetails extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='CUSTOMER_DETAILS';
	    }
		
		function get_customer_details_data($id){
			$this->db->select('CUSTOMER_DETAILS.*');
			$this->db->where('USERS.REMEMBER_TOKEN',$id);
			$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=CUSTOMER_DETAILS.DEALER_ID','LEFT');
			$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
			$query = $this->db->get($this->tablename);
			return $query->result_array();
		}
		function get_cities_data(){
					$this->db->where('STATUS',1);
			$query = $this->db->get('CITY');
			return $query->result_array();
		}
		
		function get_customer_details_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get($this->tablename);
			
			return $query->row();
		}
		function insertcustomerdetails($data){
				
				// $data['PURCHASE_DATE']=date('d-M-y', strtotime($data['PURCHASE_DATE']));
				$data['STATUS']=1;
				$data['CREATED_AT']=date('d-M-y');
				$this->db->insert($this->tablename, $data);
				return true;

		}
		function updatecustomerdetails($data){
			
			$recorddata=array('NAME' => strtoupper($data['NAME']),'ADDRESS' => strtoupper($data['ADDRESS']),'CONTACT' => $data['CONTACT'],'CITY_ID' => $data['CITY_ID'],'NIC' => $data['NIC'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['ID']);
			$this->db->update($this->tablename, $recorddata);
			return true;

		}
		function deletecustomerdetails($data){

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

		function checknicforcustomer($nic){

				$this->db->select('CUSTOMER_DETAILS.*');
				$this->db->where('NIC',$nic);
				$this->db->where('USERS.REMEMBER_TOKEN',$this->session->userdata('USER_SESSION_ID'));
				$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=CUSTOMER_DETAILS.DEALER_ID');
				$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID');
				$query=$this->db->get('CUSTOMER_DETAILS');
				return $query;
		}


	}?>
