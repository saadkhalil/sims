<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_dealer extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='DEALER_DETAILS';
	        $this->load->helper('string');
	    }
		
		function get_dealer_data(){
			$this->db->select('DEALER_DETAILS.*,USERS.EMAIL,USERS.USER_NAME,USERS.VIEW_PASSWORD');
			$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
			$query = $this->db->get($this->tablename);
			return $query->result_array();
		}
		function get_workshop_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('WORKSHOP');
			return $query->result_array();
		}
		function detail_devices_data(){
			$this->db->select('DEVICES.TITLE,DEALER_DEVICES.*');
			$this->db->where('DEVICES.STATUS',1);
			$this->db->join('DEVICES','DEVICES.ID=DEALER_DEVICES.DEVICES_ID');
			$query = $this->db->get('DEALER_DEVICES');
			return $query->result_array();
		}
		function get_devices_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('DEVICES');
			return $query->result_array();
		}
		function detail_workshop_data(){
			$this->db->select('WORKSHOP.TITLE,DEALER_WORKSHOP.*');
			$this->db->where('WORKSHOP.STATUS',1);
			$this->db->join('WORKSHOP','WORKSHOP.ID=DEALER_WORKSHOP.WORKSHOP_ID');
			$query = $this->db->get('DEALER_WORKSHOP');
			return $query->result_array();
		}
		function get_dealershipgroup_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('DEALERSHIP_GROUP');
			return $query->result_array();
		}
		function get_territory_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('TERRITORY');
			return $query->result_array();
		}
		function get_region_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('REGIONS');
			return $query->result_array();
		}
		function get_city_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('CITY');
			return $query->result_array();
		}
		function get_tools_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('SPECIALTOOLS');
			return $query->result_array();
		}
		function detail_tools_data(){
			$this->db->select('SPECIALTOOLS.TITLE,DEALER_SPECIAL.*');
			$this->db->where('SPECIALTOOLS.STATUS',1);
			$this->db->join('SPECIALTOOLS','SPECIALTOOLS.ID=DEALER_SPECIAL.SPECIAL_ID');
			$query = $this->db->get('DEALER_SPECIAL');
			return $query->result_array();
		
		}
		function get_miscellaneous_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('MISCELLANEOUSTOOLS');
			return $query->result_array();
		}
		function detail_miscellaneous_data(){
			$this->db->select('MISCELLANEOUSTOOLS.TITLE,DEALER_MISC.*');
			$this->db->where('MISCELLANEOUSTOOLS.STATUS',1);
			$this->db->join('MISCELLANEOUSTOOLS','MISCELLANEOUSTOOLS.ID=DEALER_MISC.MISC_ID');
			$query = $this->db->get('DEALER_MISC');
			return $query->result_array();
		}
		function get_dealer_where_id($id){
			$this->db->select('DEALER_DETAILS.*,USERS.USER_NAME,USERS.EMAIL,USERS.STATUS,USERS.VIEW_PASSWORD');
			$this->db->where('DEALER_DETAILS.ID',$id);
			$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
			$query = $this->db->get($this->tablename);
			return $query->row();
		}
		function dealer_workshop_data($id){
		
			$this->db->where('DEALER_ID',$id);
			$query = $this->db->get('DEALER_WORKSHOP');
			return $query->result_array();
		}
		function dealer_devices_data($id){
			
			$this->db->where('DEALER_ID',$id);
			$query = $this->db->get('DEALER_DEVICES');
			return $query->result_array();
		}
		function dealer_special_data($id){
		
			$this->db->where('DEALER_ID',$id);
			$query = $this->db->get('DEALER_SPECIAL');
			return $query->result_array();
		}
		function dealer_misc_data($id){
		
			$this->db->where('DEALER_ID',$id);
			$query = $this->db->get('DEALER_MISC');
			return $query->result_array();
		}
		
		function insertdealer($data){

				$udata['USER_NAME']=$data['USERNAME'];
				$udata['EMAIL']=$data['EMAIL'];
				$udata['VIEW_PASSWORD']=$data['PASSWORD'];
				$udata['PASSWORD']=strtoupper(md5($data['PASSWORD']));
				$udata['STATUS']=$data['STATUS'];
				$udata['CREATED_AT']=date('d-M-y');
				$udata['USER_ROLE_ID']=2;
				$udata['REMEMBER_TOKEN']=random_string('alnum', 16);
				$this->db->insert('USERS', $udata);
				$lastuserid=last_insert_id('USERS');

				$dudata['USER_ID']=$lastuserid;
				$dudata['NAME']=$data['NAME'];
				$dudata['REGION_ID']=$data['REGION_ID'];
				$dudata['TERRITORY_ID']=$data['TERRITORY_ID'];
				$dudata['REGION_ID']=$data['REGION_ID'];
				$dudata['CITY_ID']=$data['CITY_ID'];
				$dudata['WORKSHOP_LENGTH']=$data['WORKSHOP_LENGTH'];
				$dudata['WORKSHOP_BREADTH']=$data['WORKSHOP_BREADTH'];
				$dudata['LIFTS']=$data['LIFTS'];
				$dudata['PITS']=$data['PITS'];
				$dudata['DEALERSHIP_GROUP_ID']=$data['DEALERSHIP_GROUP'];
				$dudata['CATEGORY_TYPE']=$data['CATEGORY_TYPE'];
				$dudata['SAP_CODE']=$data['SAP_CODE'];
				$dudata['ADDRESS']=$data['ADDRESS'];
				$dudata['PHONE']=$data['PHONE'];
				$dudata['MOBILE']=$data['MOBILE'];
				$dudata['COMMENCEMENT_DATE']=date('d-M-y', strtotime($data['COMMENCEMENT_DATE']));
				$dudata['O_NAME']=$data['O_NAME'];
				$dudata['O_FATHER']=$data['O_FATHER'];
				$dudata['O_AGE']=$data['O_AGE'];
				$dudata['WORKSHOP_OWNER']=$data['WORKSHOP_OWNER'];
				$dudata['O_NIC']=$data['O_NIC'];
				$dudata['O_MOBILE']=$data['O_MOBILE'];
				$dudata['O_NXT_KIN']=$data['O_NXT_KIN'];
				$dudata['O_NTN']=$data['O_NTN'];
				$dudata['O_BANK']=$data['O_BANK'];
				$dudata['O_BRANCH']=$data['O_BRANCH'];
				$dudata['O_ACCNO']=$data['O_ACCNO'];
				$dudata['MON_SER_IN']=$data['MON_SER_IN'];
				$dudata['IN_PART_INVEST']=$data['IN_PART_INVEST'];
				$dudata['MON_COM_PART']=$data['MON_COM_PART'];
				$dudata['SIGN_LENGTH']=$data['SIGN_LENGTH'];
				$dudata['SIGN_BREADTH']=$data['SIGN_BREADTH'];
				$dudata['CREATED_AT']=date('d-M-y');
				$this->db->insert('DEALER_DETAILS', $dudata);
				$lastdealerid=last_insert_id('DEALER_DETAILS');

				if(!empty($data['WORKSHOP'])){
					for($i=0; $i<count($data['WORKSHOP']); $i++){

						$this->db->insert('DEALER_WORKSHOP',array('DEALER_ID'=>$lastdealerid,'WORKSHOP_ID'=>$data['WORKSHOP'][$i],'CREATED_AT'=>date('d-M-y')));

					}
				}
				else{
					$this->db->insert('DEALER_WORKSHOP',array('DEALER_ID'=>$lastdealerid,'CREATED_AT'=>date('d-M-y')));
				}	

				if(!empty($data['DEVICES'])){
					for($i=0; $i<count($data['DEVICES']); $i++){

						$this->db->insert('DEALER_DEVICES',array('DEALER_ID'=>$lastdealerid,'DEVICES_ID'=>$data['DEVICES'][$i],'CREATED_AT'=>date('d-M-y')));

					}
				}
				else{
					$this->db->insert('DEALER_DEVICES',array('DEALER_ID'=>$lastdealerid,'CREATED_AT'=>date('d-M-y')));
				}	

				if(!empty($data['SPECIALTOOLS'])){
					for($i=0; $i<count($data['SPECIALTOOLS']); $i++){

						$this->db->insert('DEALER_SPECIAL',array('DEALER_ID'=>$lastdealerid,'SPECIAL_ID'=>$data['SPECIALTOOLS'][$i],'CREATED_AT'=>date('d-M-y')));

					}
				}
				else{
					$this->db->insert('DEALER_SPECIAL',array('DEALER_ID'=>$lastdealerid,'CREATED_AT'=>date('d-M-y')));
				}	

				if(!empty($data['MISC'])){
					for($i=0; $i<count($data['MISC']); $i++){

						$this->db->insert('DEALER_MISC',array('DEALER_ID'=>$lastdealerid,'MISC_ID'=>$data['MISC'][$i],'CREATED_AT'=>date('d-M-y')));

					}
				}
				else{
					$this->db->insert('DEALER_MISC',array('DEALER_ID'=>$lastdealerid,'CREATED_AT'=>date('d-M-y')));
				}	
				return true;

		}
		function updatedealer($data){
			
				$udata['USER_NAME']=$data['USERNAME'];
				$udata['EMAIL']=$data['EMAIL'];
				if(!empty($data['PASSWORD'])){
				$udata['VIEW_PASSWORD']=$data['PASSWORD'];
				$udata['PASSWORD']=strtoupper(md5($data['PASSWORD']));
				}
				$udata['STATUS']=$data['STATUS'];
				$udata['UPDATED_AT']=date('d-M-y');
				// $udata['REMEMBER_TOKEN']=random_string('alnum', 16);
				$this->db->where('ID', $data['USER_ID']);
				$this->db->update('USERS', $udata);

				$dudata['NAME']=$data['NAME'];
				$dudata['REGION_ID']=$data['REGION_ID'];
				$dudata['TERRITORY_ID']=$data['TERRITORY_ID'];
				$dudata['REGION_ID']=$data['REGION_ID'];
				$dudata['CITY_ID']=$data['CITY_ID'];
				$dudata['WORKSHOP_LENGTH']=$data['WORKSHOP_LENGTH'];
				$dudata['WORKSHOP_BREADTH']=$data['WORKSHOP_BREADTH'];
				$dudata['LIFTS']=$data['LIFTS'];
				$dudata['PITS']=$data['PITS'];
				$dudata['DEALERSHIP_GROUP_ID']=$data['DEALERSHIP_GROUP'];
				$dudata['CATEGORY_TYPE']=$data['CATEGORY_TYPE'];
				$dudata['SAP_CODE']=$data['SAP_CODE'];
				$dudata['ADDRESS']=$data['ADDRESS'];
				$dudata['PHONE']=$data['PHONE'];
				$dudata['MOBILE']=$data['MOBILE'];
				$dudata['COMMENCEMENT_DATE']=date('d-M-y', strtotime($data['COMMENCEMENT_DATE']));
				$dudata['O_NAME']=$data['O_NAME'];
				$dudata['O_FATHER']=$data['O_FATHER'];
				$dudata['O_AGE']=$data['O_AGE'];
				$dudata['WORKSHOP_OWNER']=$data['WORKSHOP_OWNER'];
				$dudata['O_NIC']=$data['O_NIC'];
				$dudata['O_MOBILE']=$data['O_MOBILE'];
				$dudata['O_NXT_KIN']=$data['O_NXT_KIN'];
				$dudata['O_NTN']=$data['O_NTN'];
				$dudata['O_BANK']=$data['O_BANK'];
				$dudata['O_BRANCH']=$data['O_BRANCH'];
				$dudata['O_ACCNO']=$data['O_ACCNO'];
				$dudata['MON_SER_IN']=$data['MON_SER_IN'];
				$dudata['IN_PART_INVEST']=$data['IN_PART_INVEST'];
				$dudata['MON_COM_PART']=$data['MON_COM_PART'];
				$dudata['SIGN_LENGTH']=$data['SIGN_LENGTH'];
				$dudata['SIGN_BREADTH']=$data['SIGN_BREADTH'];
				$dudata['UPDATED_AT']=date('d-M-y');
				$this->db->where('ID', $data['DEALER_ID']);
				$this->db->update('DEALER_DETAILS', $dudata);


				$this->db->where('DEALER_ID',$data['DEALER_ID']);
				$this->db->delete('DEALER_WORKSHOP');
				if(!empty($data['WORKSHOP'])){
					for($i=0; $i<count($data['WORKSHOP']); $i++){

						$this->db->insert('DEALER_WORKSHOP',array('DEALER_ID'=>$data['DEALER_ID'],'WORKSHOP_ID'=>$data['WORKSHOP'][$i],'CREATED_AT'=>date('d-M-y')));

					}
				}
				else{
					$this->db->insert('DEALER_WORKSHOP',array('DEALER_ID'=>$data['DEALER_ID'],'CREATED_AT'=>date('d-M-y')));
				}	

				$this->db->where('DEALER_ID',$data['DEALER_ID']);
				$this->db->delete('DEALER_DEVICES');
				if(!empty($data['DEVICES'])){
					for($i=0; $i<count($data['DEVICES']); $i++){

						$this->db->insert('DEALER_DEVICES',array('DEALER_ID'=>$data['DEALER_ID'],'DEVICES_ID'=>$data['DEVICES'][$i],'CREATED_AT'=>date('d-M-y')));

					}
				}
				else{
					$this->db->insert('DEALER_DEVICES',array('DEALER_ID'=>$data['DEALER_ID'],'CREATED_AT'=>date('d-M-y')));
				}	
				$this->db->where('DEALER_ID',$data['DEALER_ID']);
				$this->db->delete('DEALER_SPECIAL');
				if(!empty($data['SPECIALTOOLS'])){
					for($i=0; $i<count($data['SPECIALTOOLS']); $i++){

						$this->db->insert('DEALER_SPECIAL',array('DEALER_ID'=>$data['DEALER_ID'],'SPECIAL_ID'=>$data['SPECIALTOOLS'][$i],'CREATED_AT'=>date('d-M-y')));

					}
				}
				else{
					$this->db->insert('DEALER_SPECIAL',array('DEALER_ID'=>$data['DEALER_ID'],'CREATED_AT'=>date('d-M-y')));
				}	
				$this->db->where('DEALER_ID',$data['DEALER_ID']);
				$this->db->delete('DEALER_MISC');
				if(!empty($data['MISC'])){
					for($i=0; $i<count($data['MISC']); $i++){

						$this->db->insert('DEALER_MISC',array('DEALER_ID'=>$data['DEALER_ID'],'MISC_ID'=>$data['MISC'][$i],'CREATED_AT'=>date('d-M-y')));

					}
				}
				else{
					$this->db->insert('DEALER_MISC',array('DEALER_ID'=>$data['DEALER_ID'],'CREATED_AT'=>date('d-M-y')));
				}	
			
			return true;

		}
		function deletedealer($data){

			$ID=$data['id'];
			
			$this->db->where('ID',$ID);
			$query = $this->db->get($this->tablename);
			if($query->num_rows()>0){
				$this->db->where('ID',$ID);
				$this->db->delete($this->tablename);

				$this->db->where('DEALER_ID',$ID);
				$this->db->delete('DEALER_DEVICES');

				$this->db->where('DEALER_ID',$ID);
				$this->db->delete('DEALER_SPECIAL');

				$this->db->where('DEALER_ID',$ID);
				$this->db->delete('DEALER_MISC');

				$this->db->where('DEALER_ID',$ID);
				$this->db->delete('DEALER_WORKSHOP');

				$this->db->where('DEALER_ID',$ID);
				$staffs=$this->db->get('STAFF')->result_array();
				if(count($staffs)){
					$starr=array();
					foreach ($staffs as $staff) {
						$starr[]=$staff['ID'];

					}
					
					$this->db->where_not_in('STAFF_ID', $starr);
					$this->db->delete('STAFF_EMPLOYMENT_TRACK');
					$this->db->where_not_in('STAFF_ID', $starr);
					$this->db->delete('STAFF_SKILLS');
					$this->db->where_not_in('STAFF_ID', $starr);
					$this->db->delete('STAFF_TRAINING');
				}
				$this->db->where('DEALER_ID',$ID);
				$this->db->delete('STAFF');

				return true;
			}
			else{
				return false;
			}

		}
		function filtersearchdealer($data){
				$this->db->select('DEALER_DETAILS.*,CITY.TITLE AS CITY,USERS.STATUS,USERS.USER_NAME');
				$this->db->from('DEALER_DETAILS');
				$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
				$this->db->join('CITY','CITY.ID=DEALER_DETAILS.CITY_ID','LEFT');
				
				if(!empty($data['DEALER'])){
                    $this->db->where('DEALER_DETAILS.ID ',$data['DEALER']);
				}
				if(!empty($data['REGION'])){
					$this->db->where('DEALER_DETAILS.REGION_ID',$data['REGION']);
				}
				if(!empty($data['CITY'])){
					$this->db->where('DEALER_DETAILS.CITY_ID',$data['CITY']);
				}
                if (!empty($data['TERRITORY'])) {
                    $this->db->where('DEALER_DETAILS.TERRITORY_ID',$data['TERRITORY']);
                }
                if (!empty($data['DEALERSHIP'])) {
                    $this->db->where('DEALER_DETAILS.DEALERSHIP_GROUP_ID',$data['DEALERSHIP']);
                }
				$result = $this->db->get();
			return $result;

		}


	}?>
