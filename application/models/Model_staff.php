<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_staff extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='STAFF';
	    }

		function get_staff_data(){

			$this->db->select('STAFF.*,EDUCATION.TITLE AS EDUCATION,DEALER_DETAILS.NAME AS DEALER');
			$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=STAFF.DEALER_ID','left');
			$this->db->join('EDUCATION','EDUCATION.ID=STAFF.EDUCATION_ID','left');
			$query = $this->db->get($this->tablename);
			return $query->result_array();

		}function get_staff_data_whereid($id){

			$this->db->select('STAFF.*,EDUCATION.TITLE AS EDUCATION,DEALER_DETAILS.NAME AS DEALER');
			$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=STAFF.DEALER_ID','left');
			$this->db->join('EDUCATION','EDUCATION.ID=STAFF.EDUCATION_ID','left');
			$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','left');
			$this->db->where('USERS.REMEMBER_TOKEN',$id);
			$query = $this->db->get($this->tablename);
			return $query->result_array();
		}
		function get_dealers_data(){
			$this->db->select('DEALER_DETAILS.*,REGIONS.TITLE');
			$this->db->where('USERS.STATUS',1);
			$this->db->join('USERS','DEALER_DETAILS.USER_ID=USERS.ID','LEFT');
			$this->db->join('REGIONS','REGIONS.ID=DEALER_DETAILS.REGION_ID','LEFT');
			$query = $this->db->get('DEALER_DETAILS');
			return $query->result_array();
		}
		function get_education_data(){
			$this->db->where('STATUS',1);
			$this->db->order_by('ID','ASC');
			$query = $this->db->get('EDUCATION');
			return $query->result_array();
		}
		function get_skills_data(){
			$this->db->where('STATUS',1);
			$this->db->order_by('ID','ASC');
			$query = $this->db->get('SKILLS');
			return $query->result_array();
		}
		function detail_skills_data(){
			$this->db->select('SKILLS.TITLE,STAFF_SKILLS.*');
			$this->db->where('SKILLS.STATUS',1);
			$this->db->join('SKILLS','SKILLS.ID=STAFF_SKILLS.SKILL_ID','LEFT');
			$query = $this->db->get('STAFF_SKILLS');
			return $query->result_array();
		}
		function get_training_data(){
			$this->db->where('STATUS',1);
			$this->db->order_by('ID','ASC');
			$query = $this->db->get('TRAINING');
			return $query->result_array();
		}
		function get_staff_skills_data($sid){
			$this->db->select('SKILL_ID');
			$this->db->where('STAFF_ID',$sid);
			$query = $this->db->get('STAFF_SKILLS');
			return $query->result_array();
		}
		function get_emp_track_data($sid){

			$this->db->where('STAFF_ID',$sid);
			$query = $this->db->get('STAFF_EMPLOYMENT_TRACK');
			return $query->result_array();
		}
		function get_staff_training_data($sid){

			$this->db->where('STAFF_ID',$sid);
			$query = $this->db->get('STAFF_TRAINING');
			return $query->result_array();
		}
		function detail_staff_training_data($sid){
			$this->db->select('TRAINING.TITLE,STAFF_TRAINING.*');
			$this->db->where('STAFF_TRAINING.STAFF_ID',$sid);
			$this->db->join('TRAINING','TRAINING.ID=STAFF_TRAINING.TRAINING_ID');
			$query = $this->db->get('STAFF_TRAINING');
			return $query->result_array();
		}
		function get_staff_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get($this->tablename);
			return $query->row();
		}
		function insertstaff($data){

			$data=array_change_key_case($data, CASE_UPPER); 
			if(empty($data['DEALER_ID'])){
				$SESSID=$this->session->userdata('USER_SESSION_ID');
				$this->db->where('REMEMBER_TOKEN',$SESSID);
				$userdata=$this->db->get('USERS')->row();
				$this->db->where('USER_ID',$userdata->ID);
				$dealer=$this->db->get('DEALER_DETAILS');
				$dealerrow=$dealer->row();
				$dealerid=$dealerrow->ID;

			}
			else{
				$dealerid=$data['DEALER_ID'];
			}

				$this->db->insert($this->tablename,array('DEALER_ID' => $dealerid,'NAME' => $data['NAME'],'CONTACT' => $data['CONTACT'],'DESIGNATION' => $data['DESIGNATION'],'EDUCATION_ID' => $data['EDUCATION_ID'],'NIC' => $data['NIC'],'STATUS' => $data['STATUS'],'EXPERIENCE' => $data['EXP'],'DOB' => date('d-M-y' ,strtotime($data['DOB'])),'AGE' => $data['AGE'],'REMARKS' => $data['REMARKS'],'CREATED_AT' => date('d-M-y')));
				$laststaffid=last_insert_id($this->tablename);
				if(!empty($data['TRAINING'])){
					for($i=0; $i<count($data['TRAINING']); $i++){
						if(!empty($data['START_DATE'][$i]) && !empty($data['END_DATE'][$i])){
						$this->db->insert('STAFF_TRAINING	',array('	STAFF_ID'=>$laststaffid,'TRAINING_ID'=>$data['TRAINING'][$i],'CERTIFICATE_ISSUE'=>$data['CERTIFICATE_ISSUE'][$i],'CERTIFICATE_NO'=>$data['CERTIFICATE_NO'][$i],'START_DATE'=>date('d-M-y' ,strtotime($data['START_DATE'][$i])),'DATE_TO'=>date('d-M-y' ,strtotime($data['END_DATE'][$i])),'CREATED_AT'=>date('d-M-y')));
						}
					}
				}
				else{
				$this->db->insert('STAFF_TRAINING',array('STAFF_ID'=>$laststaffid,'CREATED_AT'=>date('d-M-y')));
				}
				if(!empty($data['SKILLS'])){
				foreach($data['SKILLS'] as  $skills){
					$this->db->insert('STAFF_SKILLS',array('STAFF_ID'=>$laststaffid,'SKILL_ID'=>$skills,'CREATED_AT'=>date('d-M-y')));
					}
				}else{
					$this->db->insert('STAFF_SKILLS',array('STAFF_ID'=>$laststaffid,'CREATED_AT'=>date('d-M-y')));
				}
				if(!empty($data['WORKSHOP'])){
					for($i=0; $i<count($data['WORKSHOP']); $i++){
						if(!empty($data['FROM_DATE'][$i] && !empty($data['TO_DATE'])))
						$this->db->insert('STAFF_EMPLOYMENT_TRACK',array('STAFF_ID'=>$laststaffid,'WORKSHOP'=>$data['WORKSHOP'][$i],'FROM_DATE'=>date('d-M-y' ,strtotime($data['FROM_DATE'][$i])),'TO_DATE'=>date('d-M-y' ,strtotime($data['TO_DATE'][$i])),'SALARY'=>$data['SALARY'][$i],'IS_CONTRACT'=>$data['CONTRACT'][$i],'COMMISSION'=>$data['COMMISSION'][$i],'CREATED_AT'=>date('d-M-y')));
					}
				}
				else{
				$this->db->insert('STAFF_EMPLOYMENT_TRACK',array('STAFF_ID'=>$laststaffid,'CREATED_AT'=>date('d-M-y')));
			}

				return true;

		}
		function updatestaff($data){

			
				if(empty($data['DEALER_ID'])){

					$recorddata=array('NAME' => strtoupper($data['NAME']),'CONTACT' => $data['CONTACT'],'DESIGNATION' => strtoupper($data['DESIGNATION']),'EDUCATION_ID' => $data['EDUCATION_ID'],'NIC' => $data['NIC'],'STATUS' => $data['STATUS'],'EXPERIENCE' => $data['EXP'],'DOB' => date('d-M-y' ,strtotime($data['DOB'])),'AGE' => $data['AGE'],'REMARKS' => strtoupper($data['REMARKS']),'UPDATED_AT'=>date('d-M-y'));

			}
			else{
				$recorddata=array('DEALER_ID' => $data['DEALER_ID'],'NAME' => strtoupper($data['NAME']),'CONTACT' => $data['CONTACT'],'DESIGNATION' => strtoupper($data['DESIGNATION']),'EDUCATION_ID' => $data['EDUCATION_ID'],'NIC' => $data['NIC'],'STATUS' => $data['STATUS'],'EXPERIENCE' => $data['EXP'],'DOB' => date('d-M-y' ,strtotime($data['DOB'])),'AGE' => $data['AGE'],'REMARKS' => strtoupper($data['REMARKS']),'UPDATED_AT'=>date('d-M-y'));

			}

			$this->db->where('ID', $data['ID']);
			$this->db->update($this->tablename, $recorddata);


			$this->db->where('STAFF_ID',$data['ID']);
			$this->db->delete('STAFF_TRAINING');
			if(!empty($data['TRAINING'])){
				for($i=0; $i<count($data['TRAINING']); $i++){
					if(!empty($data['START_DATE'][$i]) && !empty($data['END_DATE'][$i])&& !empty($data['TRAINING'][$i])){

					$this->db->insert('STAFF_TRAINING',array('STAFF_ID'=>$data['ID'],'TRAINING_ID'=>$data['TRAINING'][$i],'CERTIFICATE_ISSUE'=>$data['CERTIFICATE_ISSUE'][$i],'CERTIFICATE_NO'=>$data['CERTIFICATE_NO'][$i],'START_DATE'=>date('d-M-y' ,strtotime($data['START_DATE'][$i])),'DATE_TO'=>date('d-M-y' ,strtotime($data['END_DATE'][$i])),'CREATED_AT'=>date('d-M-y')));
					}
				}
			}
			else{
				$this->db->insert('STAFF_TRAINING',array('STAFF_ID'=>$data['ID'],'CREATED_AT'=>date('d-M-y')));
			}


				$this->db->where('STAFF_ID',$data['ID']);
				$this->db->delete('STAFF_SKILLS');
			if(!empty($data['SKILLS'])){

				foreach($data['SKILLS'] as  $skills){
					$this->db->insert('STAFF_SKILLS',array('STAFF_ID'=>$data['ID'],'SKILL_ID'=>$skills,'CREATED_AT'=>date('d-M-y')));
					}
			}
			else{
					$this->db->insert('STAFF_SKILLS',array('STAFF_ID'=>$data['ID']));
			}

				$this->db->where('STAFF_ID',$data['ID']);
				$this->db->delete('STAFF_EMPLOYMENT_TRACK');
			if(!empty($data['WORKSHOP'])){
				for($i=0; $i<count($data['WORKSHOP']); $i++){
					if(!empty($data['FROM_DATE'][$i] && !empty($data['FROM_DATE']))){
					$this->db->insert('STAFF_EMPLOYMENT_TRACK	',array('STAFF_ID'=>$data['ID'],'WORKSHOP'=>$data['WORKSHOP'][$i],'FROM_DATE'=>date('d-M-y' ,strtotime($data['FROM_DATE'][$i])),'TO_DATE'=>date('d-M-y' ,strtotime($data['TO_DATE'][$i])),'SALARY'=>$data['SALARY'][$i],'IS_CONTRACT'=>$data['CONTRACT'][$i],'COMMISSION'=>$data['COMMISSION'][$i],'CREATED_AT'=>date('d-M-y')));
					}
				}
			}
			else{
				$this->db->insert('STAFF_EMPLOYMENT_TRACK	',array('STAFF_ID'=>$data['ID'],'CREATED_AT'=>date('d-M-y')));
			}
			return true;

		}
		function deletestaff($data){

			$ID=$data['id'];
			$this->db->where('ID',$ID);
			$query = $this->db->get($this->tablename);
			if($query->num_rows()>0){
				$this->db->where('ID',$ID);
				$this->db->delete($this->tablename);
				$this->db->where('STAFF_ID',$ID);
				$this->db->delete('STAFF_SKILLS');
				$this->db->where('STAFF_ID',$ID);
				$this->db->delete('STAFF_TRAINING');
				$this->db->where('STAFF_ID',$ID);
				$this->db->delete('STAFF_EMPLOYMENT_TRACK');

				return true;
			}
			else{
				return false;
			}

		}
		function filtersearchstaff($data){

				$this->db->select('STAFF.*,EDUCATION.TITLE AS EDUCATION,DEALERSHIP_GROUP.TITLE AS DEALERSHIP,TRAINING.TITLE AS TRAINING');
				$this->db->from('STAFF');
				$this->db->join('DEALER_DETAILS','STAFF.DEALER_ID=DEALER_DETAILS.ID','LEFT');
				$this->db->join('CITY','CITY.ID=DEALER_DETAILS.CITY_ID','LEFT');
				$this->db->join('EDUCATION','EDUCATION.ID=STAFF.EDUCATION_ID','LEFT');
				$this->db->join('DEALERSHIP_GROUP','DEALERSHIP_GROUP.ID=DEALER_DETAILS.DEALERSHIP_GROUP_ID','LEFT');
				$this->db->join('STAFF_TRAINING','STAFF_TRAINING.STAFF_ID=STAFF.ID','LEFT');
				$this->db->join('TRAINING','STAFF_TRAINING.TRAINING_ID=TRAINING.ID','LEFT');
				
				if(!empty($data['DEALER'])){
                    $this->db->where('STAFF.DEALER_ID ',$data['DEALER']);
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
                if (!empty($data['EDUCATION'])) {
                    $this->db->where('DEALER_DETAILS.DEALERSHIP_GROUP_ID',$data['EDUCATION']);
                }
                if (!empty($data['DESIGNATION'])) {
                    $this->db->where('STAFF.DESIGNATION',$data['DESIGNATION']);
                }
                if (!empty($data['TRAINING'])) {
                    $this->db->where('STAFF_TRAINING.TRAINING_ID',$data['TRAINING']);
                }
				$result = $this->db->get();
			return $result;

		}


	}?>
