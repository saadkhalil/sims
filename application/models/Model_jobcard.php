<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_jobcard extends CI_Model {

 	private $tablename;

	    function __construct() {
	        parent::__construct();
	        $this->tablename='JOB_CARD';
	    }

		function get_job_card_where_id($id){
			 $this->db->select('JOB_CARD.*,VISIT_TYPE.SERVICE_NAME AS VISIT_TYPE');
			 $this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_CARD.VISIT_TYPE_ID','LEFT');
			 $this->db->where('JOB_CARD.ID',$id);
			 $query = $this->db->get($this->tablename);
			return $query;
		}
		function get_customer_vehicle_where_id($vid){
			 $this->db->select('CUSTOMER_VEHICLES.*,CUSTOMER_DETAILS.NAME,CUSTOMER_DETAILS.CONTACT,CUSTOMER_DETAILS.NIC,CUSTOMER_DETAILS.ADDRESS,CITY.TITLE AS CITY,MODEL.TITLE AS MODEL,COLOR.TITLE AS COLOR');
			 $this->db->where('CUSTOMER_VEHICLES.ID',$vid);
			 $this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=CUSTOMER_VEHICLES.CUSTOMER_ID','LEFT');
			 $this->db->join('CITY','CITY.ID=CUSTOMER_DETAILS.CITY_ID','LEFT');
			 $this->db->join('MODEL','MODEL.ID=CUSTOMER_VEHICLES.MODEL_ID','LEFT');
			 $this->db->join('COLOR','COLOR.ID=CUSTOMER_VEHICLES.COLOR_ID','LEFT');
			 $query = $this->db->get('CUSTOMER_VEHICLES');
			return $query->row();
		}
		function get_staff_data(){

			 $this->db->select('STAFF.*,EDUCATION.TITLE AS EDUCATION');
			 $this->db->where('STAFF.STATUS',1);
			 $this->db->join('EDUCATION','EDUCATION.ID=STAFF.EDUCATION_ID','left');
			 $this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=STAFF.DEALER_ID','left');
			 $this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','left');
			 $this->db->where('USERS.REMEMBER_TOKEN',$this->session->userdata('USER_SESSION_ID'));
			 $query = $this->db->get('STAFF');
			return $query->result_array();
		}
		function get_login_data(){

			 $this->db->where('REMEMBER_TOKEN',$this->session->userdata('USER_SESSION_ID'));
			 $query=$this->db->get('USERS');
			return $query->row();
		}
		function get_last_jobid(){

			$this->db->where('REMEMBER_TOKEN',$this->session->userdata('USER_SESSION_ID'));
       		$query=$this->db->get('USERS');
			return $query->row();
		}

		function get_cities_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('CITY');
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
		function get_services_data(){
			$this->db->where('STATUS',1);
			$this->db->where('TITLE !=','Others');
			$query = $this->db->get('SERVICES');
			return $query->result_array();
		}
		function get_others_services_data(){
			$this->db->select('ID');
			$this->db->where('TITLE','Others');
			$query = $this->db->get('SERVICES');
			return $query->row();
		}
		function get_others_accessories_row(){
			$this->db->select('ID');
			$this->db->where('TITLE','Others');
			$query = $this->db->get('ACCESSORIES');
			return $query->row();
		}
		function get_accessories_data(){
			$this->db->where('STATUS',1);
			$this->db->where('TITLE !=','Others');
			$query = $this->db->get('ACCESSORIES');
			return $query->result_array();
		}
		function get_last_job_ref_id(){

			$this->db->order_by('ID','DESC');
			$this->db->limit(1);
			$query = $this->db->get($this->tablename);
			return $query;
		}
		function get_visit_types_data(){
			$this->db->order_by('ID','ASC');
			$query = $this->db->get('VISIT_TYPE');
			return $query->result_array();
		}
		function get_job_staff_where_id($jid){
			$this->db->select('STAFF_ID');
			$this->db->where('JOB_ID',$jid);
			$query = $this->db->get('JOB_STAFF_ASSIGNED');
			return $query->result_array();
		}
		function get_job_services_where_id($jid){
			$this->db->select('SERVICE_ID');
			$this->db->where('JOB_ID',$jid);
			$query = $this->db->get('JOB_SERVICES');
			return $query->result_array();
		}
		function get_jaccessories($jid){
			$this->db->select('ACCESSORIES_ID,ACCESSORIES_NAME,ACCESSORIES_CHARGES');
			$this->db->where('JOB_ID',$jid);
			$query = $this->db->get('JOB_ACCESSORIES');
			return $query->result_array();
		}
		function get_job_accessories_where_id($jid){
			$this->db->select('ACCESSORIES_ID');
			$this->db->where('JOB_ID',$jid);
			$query = $this->db->get('JOB_ACCESSORIES');
			return $query->result_array();
		}
		function get_jservice($jid){
			$this->db->select('SERVICE_ID,SERVICE_NAME,SERVICE_CHARGES');
			$this->db->where('JOB_ID',$jid);
			$query = $this->db->get('JOB_SERVICES');
			return $query->result_array();
		}
		function get_education_data(){
			$this->db->where('STATUS',1);
			$query = $this->db->get('EDUCATION');
			return $query->result_array();
		}
		function get_staff_where_id($id){
			$this->db->where('ID',$id);
			$query = $this->db->get($this->tablename);
			return $query->row();
		}
		function searchjobcard($data){

				if(!empty($data['CHASSISNO'])){
					$this->db->select('CUSTOMER_VEHICLES.*,CITY.TITLE AS CITY,MODEL.TITLE AS MODEL,COLOR.TITLE AS COLOR,CUSTOMER_DETAILS.NAME,CUSTOMER_DETAILS.NIC,CUSTOMER_DETAILS.CONTACT,CUSTOMER_DETAILS.CITY_ID,CUSTOMER_DETAILS.ADDRESS,CUSTOMER_VEHICLES.PURCHASE_DATE');
					$this->db->where('USERS.REMEMBER_TOKEN',$this->session->userdata('USER_SESSION_ID'));
					$this->db->where('CUSTOMER_VEHICLES.CHASSIS_NO',strtoupper($data['CHASSISNO']));
					$this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=CUSTOMER_VEHICLES.CUSTOMER_ID','LEFT');
					$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=CUSTOMER_DETAILS.DEALER_ID','LEFT');
					$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
					$this->db->join('CITY','CITY.ID=CUSTOMER_DETAILS.CITY_ID','LEFT');

					$this->db->join('CITY','CITY.ID=CUSTOMER_DETAILS.CITY_ID','LEFT');
					$this->db->join('MODEL','MODEL.ID=CUSTOMER_VEHICLES.MODEL_ID','LEFT');
					$this->db->join('COLOR','COLOR.ID=CUSTOMER_VEHICLES.COLOR_ID','LEFT');
					$query=$this->db->get('CUSTOMER_VEHICLES');
				}
				else if(!empty($data['REGISTRATIONNO'])){
					$this->db->select('CUSTOMER_VEHICLES.*,CITY.TITLE AS CITY,MODEL.TITLE AS MODEL,COLOR.TITLE AS COLOR,CUSTOMER_DETAILS.NAME,CUSTOMER_DETAILS.NIC,CUSTOMER_DETAILS.CONTACT,CUSTOMER_DETAILS.CITY_ID,CUSTOMER_DETAILS.ADDRESS,CUSTOMER_VEHICLES.PURCHASE_DATE');
					$this->db->where('CUSTOMER_VEHICLES.REGISTRATION_NO',strtoupper($data['REGISTRATIONNO']));
					$this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=CUSTOMER_VEHICLES.CUSTOMER_ID','LEFT');
					$this->db->join('CITY','CITY.ID=CUSTOMER_DETAILS.CITY_ID','LEFT');
					$this->db->join('MODEL','MODEL.ID=CUSTOMER_VEHICLES.MODEL_ID','LEFT');
					$this->db->join('COLOR','COLOR.ID=CUSTOMER_VEHICLES.COLOR_ID','LEFT');
					$query=$this->db->get('CUSTOMER_VEHICLES');
				}

				return $query;

		}

		function updatejobcard($data){


			$JOBID=$data['JOB_ID'];
			$recorddata=array('KM_READING' => $data['KM_READING'],'VISIT_TYPE_ID' => $data['VISIT_TYPE_ID'],'TOTAL' => $data['GRAND_TOTAL'],'DISCOUNT' => $data['DISCOUNT'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $JOBID);
			$this->db->update('JOB_CARD', $recorddata);

			$this->db->where('ID',$data['JOB_VISIT_ID']);
			$this->db->delete('JOB_VISIT');

			$vdata['CUSTOMER_VEHICLE_ID']=$data['CUSTOMER_VEHICLE_ID'];
			$vdata['VISIT_TYPE_ID']=$data['VISIT_TYPE_ID'];
			$vdata['CREATED_AT']=date('d-M-y');
			$this->db->insert('JOB_VISIT', $vdata);


			$this->db->where('JOB_ID',$JOBID);
			$this->db->delete('JOB_STAFF_ASSIGNED');

			foreach($data['STAFF_ASSIGNED'] as $staff){

		            $result = $this->db->insert('JOB_STAFF_ASSIGNED',array('STAFF_ID' => $staff, 'JOB_ID' => $JOBID,'CREATED_AT'=>date('d-M-y')));
		        }
		    if(count($data['SERVICE_NAME'])>0){
		    	$this->db->where('JOB_ID',$JOBID);
				$this->db->delete('JOB_SERVICES');
			for($i=0; $i<count($data['SERVICE_NAME']); $i++) {

		        	if(!empty($data['SERVICE_NAME'][$i]) &&  !empty($data['SERVICE_CHARGES'][$i])){


		        		$result = $this->db->insert('JOB_SERVICES',array('SERVICE_ID' => $data['SERVICE_ID'][$i],'SERVICE_NAME' => $data['SERVICE_NAME'][$i], 'SERVICE_CHARGES' => $data['SERVICE_CHARGES'][$i], 'JOB_ID' => $JOBID,'CREATED_AT'=>date('d-M-y')));

		        	}

		        }
		     }
		    if(count($data['ACCESSORIES_NAME'])>0){
		    	$this->db->where('JOB_ID',$JOBID);
				$this->db->delete('JOB_ACCESSORIES');

			for($i=0; $i<=count($data['ACCESSORIES_NAME']); $i++) {

		        	if(!empty($data['ACCESSORIES_NAME'][$i]) &&  !empty($data['ACCESSORIES_CHARGES'][$i])){


		        		$result = $this->db->insert('JOB_ACCESSORIES',array('ACCESSORIES_ID' => $data['ACCESSORIES_ID'][$i],'ACCESSORIES_NAME' => $data['ACCESSORIES_NAME'][$i],'ACCESSORIES_CHARGES' => $data['ACCESSORIES_CHARGES'][$i], 'JOB_ID' => $JOBID,'CREATED_AT'=>date('d-M-y')));

		        	}

		        }
		     }
			return true;

		}
		function updatecustomerdetails($data){

			$recorddata=array('NAME' => strtoupper($data['NAME']),'ADDRESS' => strtoupper($data['ADDRESS']),'CONTACT' => $data['CONTACT'],'CITY_ID' => $data['CITY_ID'],'NIC' => $data['NIC'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['ID']);
			$this->db->update('CUSTOMER_DETAILS', $recorddata);
			$this->db->where('ID', $data['VEHICLE_ID']);
			$this->db->update('CUSTOMER_VEHICLES', array("REGISTRATION_NO"=>$data['REGISTRATIONNO']));
			return true;

		}
		function updatestaff($data){

			$recorddata=array('NAME' => $data['NAME'],'CONTACT' => $data['CONTACT'],'DESIGNATION' => $data['DESIGNATION'],'EDUCATION_ID' => $data['EDUCATION_ID'],'NIC' => $data['NIC'],'STATUS' => $data['STATUS'],'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['ID']);
			$this->db->update($this->tablename, $recorddata);
			return true;

		}


		function checkvisittouser($data){
			$this->db->select('JOB_VISIT.VISIT_TYPE_ID,VISIT_TYPE.SERVICE_NAME,VISIT_TYPE.AVAILABLE');
			$this->db->where('JOB_VISIT.CUSTOMER_VEHICLE_ID',$data['custvehid']);
			$this->db->where('VISIT_TYPE.AVAILABLE',1);
			$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_VISIT.VISIT_TYPE_ID','LEFT');
			$this->db->order_by('VISIT_TYPE.ID','ASC');
			$query = $this->db->get('JOB_VISIT');
			  return $query;
		}

		function checkvisittouserupdate($data){ //for update jobcard to check visit type


			$this->db->select('JOB_VISIT.VISIT_TYPE_ID,VISIT_TYPE.SERVICE_NAME,VISIT_TYPE.AVAILABLE');
			$this->db->where('JOB_VISIT.CUSTOMER_VEHICLE_ID',$data['custvehid']);
			$this->db->where('VISIT_TYPE.AVAILABLE',1);
			$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_VISIT.VISIT_TYPE_ID','LEFT');
			$this->db->order_by('VISIT_TYPE.ID','ASC');
			$query = $this->db->get('JOB_VISIT');
			  return $query;
		}
		function get_lastvisittype($data){ //for update jobcard to check visit type

			$this->db->select('JOB_VISIT.*');
			$this->db->where('JOB_VISIT.CUSTOMER_VEHICLE_ID',$data['custvehid']);
			$this->db->where('JOB_VISIT.VISIT_TYPE_ID',$data['cusvisittype']);
			$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_VISIT.VISIT_TYPE_ID','LEFT');
			$query = $this->db->get('JOB_VISIT');
			  return $query;
		}
		function get_job_visit_type($data){ //for update jobcard to check visit type

			$this->db->select('JOB_VISIT.*');
			$this->db->where('JOB_VISIT.CUSTOMER_VEHICLE_ID',$data->CUSTOMER_VEHICLE_ID);
			$this->db->where('JOB_VISIT.VISIT_TYPE_ID',$data->VISIT_TYPE_ID);
			$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_VISIT.VISIT_TYPE_ID','LEFT');
			$query = $this->db->get('JOB_VISIT');

			$row=$query->row();
			  return $row;
		}

		function insertjobcard($data){



				$jdata['CUSTOMER_ID']=$data['CUSTOMER_ID'];
				$jdata['CUSTOMER_VEHICLE_ID']=$data['CUSTOMER_VEHICLE_ID'];
				$jdata['DEALER_ID']=$data['DEALER_ID'];
				$jdata['DISCOUNT']=$data['DISCOUNT'];
				$jdata['KM_READING']=$data['KM_READING'];
				$jdata['REF_NUMBER']=$data['REF_NUMBER'];
				$jdata['VISIT_TYPE_ID']=$data['VISIT_TYPE_ID'];
				$jdata['TOTAL_SERVICES']=$data['TOTAL_SERVICES'];
				$jdata['TOTAL_ACCESSORIES']=$data['TOTAL_ACCESSORIES'];
				$jdata['OPENING_DATE']=date('d-M-y',strtotime($data['OPENING_DATE']));
				$jdata['TOTAL']=$data['GRAND_TOTAL'];
				$jdata['STATUS']=1;
				$jdata['JOB_STATUS']='Open';
				$jdata['PAYMENT_STATUS']='Not Done';
				$jdata['CREATED_AT']=date('d-M-y');
				$this->db->insert($this->tablename, $jdata);
				$lastjobid=last_insert_id($this->tablename);


				$vdata['CUSTOMER_VEHICLE_ID']=$data['CUSTOMER_VEHICLE_ID'];
				$vdata['VISIT_TYPE_ID']=$jdata['VISIT_TYPE_ID'];
				$vdata['CREATED_AT']=$jdata['CREATED_AT'];
				$this->db->insert('JOB_VISIT', $vdata);
				foreach($data['STAFF_ASSIGNED'] as $staff){

		            $result = $this->db->insert('JOB_STAFF_ASSIGNED',array('STAFF_ID' => $staff, 'JOB_ID' => $lastjobid,'CREATED_AT'=>$jdata['CREATED_AT']));
		        }

			  	for($i=0; $i<count($data['SERVICECHECKBOX']); $i++) {

		        	// if(!empty($data['SERVICE_NAME'][$i]) &&  !empty($data['SERVICE_CHARGES'][$i])){
//

		        		$result = $this->db->insert('JOB_SERVICES',array('SERVICE_ID' => $data['SERVICECHECKBOX'][$i],'SERVICE_NAME' => $data['SERVICE_NAME'][$i], 'SERVICE_CHARGES' => $data['SERVICE_CHARGES'][$i], 'JOB_ID' => $lastjobid,'CREATED_AT'=>$jdata['CREATED_AT']));

		        	// }

		        }

				for($i=0; $i<=count($data['ACCESSORIES_NAME']); $i++) {

		        	if(!empty($data['ACCESSORIES_NAME'][$i]) &&  !empty($data['ACCESSORIES_CHARGES'][$i])){


		        		$result = $this->db->insert('JOB_ACCESSORIES',array('ACCESSORIES_ID' => $data['ACCESSORIES_ID'][$i],'ACCESSORIES_NAME' => $data['ACCESSORIES_NAME'][$i],'ACCESSORIES_CHARGES' => $data['ACCESSORIES_CHARGES'][$i], 'JOB_ID' => $lastjobid,'CREATED_AT'=>$jdata['CREATED_AT']));

		        	}

		        }

				return true;
		}

		function filtersearchjobcard($data){

				$datefrom=date("d-M-y", strtotime($data['JOB_OPENING_DATE_FROM']));
				$dateto=date("d-M-y", strtotime($data['JOB_OPENING_DATE_TO']));
				$this->db->select('JOB_CARD.*,VISIT_TYPE.SERVICE_NAME,CUSTOMER_DETAILS.NAME');
				$this->db->from('JOB_CARD');
				$this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=JOB_CARD.CUSTOMER_ID','LEFT');
				$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_CARD.VISIT_TYPE_ID','LEFT');
				$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=JOB_CARD.DEALER_ID','LEFT');
				$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');

				if(!empty($data['JOB_OPENING_DATE_FROM'])){
					$this->db->where('OPENING_DATE <=',$dateto);
				}
				if(!empty($data['JOB_OPENING_DATE_TO'])){
                    $this->db->where('OPENING_DATE >=',$datefrom);
				}
				if(!empty($data['JOB_REF_NUMBER'])){
					$this->db->where('REF_NUMBER',$data['JOB_REF_NUMBER']);
				}
				if(!empty($data['CUSTOMER_NAME'])){
					$this->db->where('CUSTOMER_DETAILS.NAME',$data['CUSTOMER_NAME']);
				}
                if(!empty($data['JOB_STATUS'])){
					$this->db->where('JOB_STATUS',$data['JOB_STATUS']);
				}
                if(!empty($data['JOB_PAYMENT'])){
					$this->db->where('PAYMENT_STATUS',$data['JOB_PAYMENT']);
				}

				$this->db->where('JOB_CARD.DEALER_ID',$data['DEALER_ID']);
				$result = $this->db->get();

			return $result;

		}
		function getcurrentjobcard(){

			$this->db->select('JOB_CARD.*,VISIT_TYPE.SERVICE_NAME,CUSTOMER_DETAILS.NAME');
				$this->db->from('JOB_CARD');
				$this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=JOB_CARD.CUSTOMER_ID','LEFT');
				$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_CARD.VISIT_TYPE_ID','LEFT');
				$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=JOB_CARD.DEALER_ID','LEFT');
				$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
				$this->db->where('USERS.REMEMBER_TOKEN',$this->session->userdata('USER_SESSION_ID'));
				$this->db->where('JOB_CARD.OPENING_DATE >=',date('d-M-y'));
				$result = $this->db->get();


			return $result->result_array();
		}

        function filtersearchjobcardadmin($data){

				$datefrom=date("d-M-y", strtotime($data['JOB_OPENING_DATE_FROM']));
				$dateto=date("d-M-y", strtotime($data['JOB_OPENING_DATE_TO']));
				$this->db->select('JOB_CARD.*,VISIT_TYPE.SERVICE_NAME,CUSTOMER_DETAILS.NAME');
				$this->db->from('JOB_CARD');
				$this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=JOB_CARD.CUSTOMER_ID','LEFT');
				$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_CARD.VISIT_TYPE_ID','LEFT');
				$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=JOB_CARD.DEALER_ID','LEFT');
				$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
				// $this->db->where('USERS.REMEMBER_TOKEN',$this->session->userdata('USER_SESSION_ID'));
				if(!empty($data['JOB_OPENING_DATE_FROM'])){
					$this->db->where('OPENING_DATE <=',$dateto);
				}
				if(!empty($data['JOB_OPENING_DATE_TO'])){
                    $this->db->where('OPENING_DATE >=',$datefrom);
				}
				if(!empty($data['JOB_REF_NUMBER'])){
					$this->db->where('REF_NUMBER',$data['JOB_REF_NUMBER']);
				}
				if(!empty($data['CUSTOMER_NAME'])){
					$this->db->where('CUSTOMER_DETAILS.NAME',$data['CUSTOMER_NAME']);
				}
                if(!empty($data['JOB_STATUS'])){
					$this->db->where('JOB_STATUS',$data['JOB_STATUS']);
				}
                if(!empty($data['JOB_PAYMENT'])){
					$this->db->where('PAYMENT_STATUS',$data['JOB_PAYMENT']);
				}

				// $this->db->where('JOB_CARD.DEALER_ID',$data['DEALER_ID']);
				$result = $this->db->get();
                // print_r($this->db->last_query());
                // die();
			return $result;

		}

        function filtersearchjobcardsummaryadmin($data){

				$datefrom=date("d-M-y", strtotime($data['JOB_OPENING_DATE_FROM']));
				$dateto=date("d-M-y", strtotime($data['JOB_OPENING_DATE_TO']));
				$this->db->select('COUNT(*) as JOB_CARD,DEALER_DETAILS.NAME,DEALER_DETAILS.ID');
				$this->db->from('JOB_CARD');
				$this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=JOB_CARD.CUSTOMER_ID','LEFT');
				$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_CARD.VISIT_TYPE_ID','LEFT');
				$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=JOB_CARD.DEALER_ID','LEFT');
				$this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
				if(!empty($data['JOB_OPENING_DATE_FROM'])){
					$this->db->where('OPENING_DATE <=',$dateto);
				}
				if(!empty($data['JOB_OPENING_DATE_TO'])){
                    $this->db->where('OPENING_DATE >=',$datefrom);
				}
				if(!empty($data['JOB_REF_NUMBER'])){
					$this->db->where('REF_NUMBER',$data['JOB_REF_NUMBER']);
				}
				if(!empty($data['CUSTOMER_NAME'])){
					$this->db->where('CUSTOMER_DETAILS.NAME',$data['CUSTOMER_NAME']);
				}
                if (!empty($data['REGION_ID'])) {
                    $this->db->where('DEALER_DETAILS.REGION_ID',$data['REGION_ID']);
                }
                if (!empty($data['TERRITORY_ID'])) {
                    $this->db->where('DEALER_DETAILS.TERRITORY_ID',$data['TERRITORY_ID']);
                }
                $this->db->group_by('JOB_CARD.DEALER_ID');
                $this->db->group_by('DEALER_DETAILS.NAME');
                $this->db->group_by('DEALER_DETAILS.ID');
				$result = $this->db->get();
                // print_r($this->db->last_query());
                // die();
			return $result;

		}

        function filtersearchfreeservicesummaryadmin($data){
				$datefrom=date("d-M-y", strtotime($data['CLOSING_DATE_FROM']));
				$dateto=date("d-M-y", strtotime($data['CLOSING_DATE_TO']));
				$this->db->select('COUNT(JOB_CARD.ID) as TOTALCARDS,"DEALER_DETAILS"."NAME", "DEALER_DETAILS"."ID",CITY.TITLE,DEALER_DETAILS.O_NTN');
				$this->db->from('JOB_CARD');
				$this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=JOB_CARD.CUSTOMER_ID','LEFT');
				$this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_CARD.VISIT_TYPE_ID','LEFT');
				$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=JOB_CARD.DEALER_ID','LEFT');
                $this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
				$this->db->join('CITY','CITY.ID=DEALER_DETAILS.CITY_ID','LEFT');
				if(!empty($data['CLOSING_DATE_FROM'])){
					$this->db->where('OPENING_DATE <=',$dateto);
				}
				if(!empty($data['CLOSING_DATE_TO'])){
                    $this->db->where('OPENING_DATE >=',$datefrom);
				}
                if (!empty($data['REGION_ID'])) {
                    $this->db->where('DEALER_DETAILS.REGION_ID',$data['REGION_ID']);
                }
                if (!empty($data['TERRITORY_ID'])) {
                    $this->db->where('DEALER_DETAILS.TERRITORY_ID',$data['TERRITORY_ID']);
                }
                if (!empty($data['DEALERSHIP_ID'])) {
                    $this->db->where('DEALER_DETAILS.DEALERSHIP_GROUP_ID',$data['DEALERSHIP_ID']);
                }
                $this->db->group_by('JOB_CARD.DEALER_ID');
                $this->db->group_by('DEALER_DETAILS.NAME');
                $this->db->group_by('DEALER_DETAILS.ID');
                $this->db->group_by('CITY.TITLE');
                $this->db->group_by('DEALER_DETAILS.O_NTN');
				$result = $this->db->get();
			return $result;

		}

        function filtersearchfreeservicedetailadmin($data){

            $datefrom=date("d-M-y", strtotime($data['DATE_FROM']));
            $dateto=date("d-M-y", strtotime($data['DATE_TO']));

            $this->db->select('CUSTOMER_VEHICLES.*,VISIT_TYPE.SERVICE_NAME,JOB_CARD.OPENING_DATE,MODEL.TITLE AS MODEL');

            $this->db->from('JOB_CARD');

            $this->db->join('VISIT_TYPE','VISIT_TYPE.ID=JOB_CARD.VISIT_TYPE_ID');
             $this->db->join('CUSTOMER_DETAILS','CUSTOMER_DETAILS.ID=JOB_CARD.CUSTOMER_ID');

            $this->db->join('CUSTOMER_VEHICLES','JOB_CARD.CUSTOMER_VEHICLE_ID=CUSTOMER_VEHICLES.ID');

            $this->db->join('MODEL','MODEL.ID=CUSTOMER_VEHICLES.MODEL_ID');

            if(!empty($data['DATE_TO'])){
                $this->db->where('JOB_CARD.OPENING_DATE <=',$dateto);
            }
            if(!empty($data['DATE_FROM'])){
                $this->db->where('JOB_CARD.OPENING_DATE >=',$datefrom);
            }
            if(!empty($data['JOB_STATUS'])){
                $this->db->where('JOB_CARD.JOB_STATUS',$data['JOB_STATUS']);
            }
            if(!empty($data['DEALER_ID'])){
                $this->db->where('JOB_CARD.DEALER_ID',$data['DEALER_ID']);
            }
            $result = $this->db->get();



        return $result;

		}
		function filterdealerbusinesssummaryadmin($data){


				$datefrom=date("d-M-y", strtotime($data['CLOSING_DATE_FROM']));
				$dateto=date("d-M-y", strtotime($data['CLOSING_DATE_TO']));
				$this->db->select("JOB_CARD.ID");

	            $this->db->from('JOB_CARD');
	            $this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=JOB_CARD.DEALER_ID','LEFT');

	            if(!empty($data['CLOSING_DATE_TO'])){
	                $this->db->where('JOB_CARD.OPENING_DATE <=',$dateto);
	            }
	            if(!empty($data['CLOSING_DATE_FROM'])){
	                $this->db->where('JOB_CARD.OPENING_DATE >=',$datefrom);
	            }
	            if(!empty($data['DEALERSHIP_ID'])){
	                $this->db->where('DEALER_DETAILS.DEALERSHIP_GROUP_ID',$data['DEALERSHIP_ID']);

	 			 }
	            if(!empty($data['TERRITORY_ID'])){
	                $this->db->where('DEALER_DETAILS.TERRITORY_ID',$data['TERRITORY_ID']);

	 			 }
	            if(!empty($data['REGION_ID'])){
	                $this->db->where('DEALER_DETAILS.REGION_ID',$data['REGION_ID']);

	 			 }

	            $result = $this->db->get();


        return $result;

		}

		function getfilterresultbyjobid($id){

			$this->db->select("JOB_CARD.DEALER_ID,JOB_CARD.TOTAL_ACCESSORIES,DEALER_DETAILS.NAME,USERS.USER_NAME");
            $this->db->from('JOB_CARD');
            $this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=JOB_CARD.DEALER_ID','LEFT');
            $this->db->join('USERS','USERS.ID=DEALER_DETAILS.USER_ID','LEFT');
            $this->db->where('JOB_CARD.ID',$id);
            $res= $this->db->get();
            $result=$res->row();


        	return $result;

		}


		function closejobcardsubmit($data)
		{

			$recorddata=array('TOTAL_SERVICES' => $data['TOTAL_SERVICES'],'TOTAL_ACCESSORIES' => $data['TOTAL_ACCESSORIES'],'DISCOUNT' => $data['DISCOUNT'],'TOTAL' => $data['TOTAL'],'PAYMENT_STATUS' => $data['PAYMENT_STATUS'],'JOB_STATUS' => 'Closed','NEXT_VISIT_DATE' => date('d-M-Y',strtotime($data['NEXT_VISIT_DATE'])),'UPDATED_AT'=>date('d-M-y'));
			$this->db->where('ID', $data['id']);
			$this->db->update($this->tablename, $recorddata);

			return true;

		}
		function getjobservice($jid)
		{

			$this->db->select('COUNT(*) AS TOTALSERVICES,SUM(SERVICE_CHARGES) AS TOTALLABOUR');
			$this->db->where('JOB_ID',$jid);
			$query = $this->db->get('JOB_SERVICES');

			  return $query->row();

		}
		function getoilsale($jid)
		{

			$this->db->select('SUM(JOB_ACCESSORIES.ACCESSORIES_CHARGES) AS TOTALOIL');
			$this->db->join('ACCESSORIES','ACCESSORIES.ID=JOB_ACCESSORIES.ACCESSORIES_ID','LEFT');
			$this->db->where('JOB_ID',$jid);
			$this->db->where('ACCESSORIES.ID',41);
			$query = $this->db->get('JOB_ACCESSORIES');

			  return $query->row();

		}
		function getjobaccessories($jid)
		{

			$this->db->select('COUNT(*) AS TOTALACCESSORIES,SUM(ACCESSORIES_CHARGES) AS TOTALPARTS');
			$this->db->where('JOB_ID',$jid);
			$query = $this->db->get('JOB_ACCESSORIES');

			  return $query->row();

		}

        function filterdealermonthlybusiness1($data){

				$datefrom=date("m-Y", strtotime($data['FROM']));
				$dateto=date("m-Y", strtotime($data['TO']));
				$this->db->select("to_char(JOB_CARD.OPENING_DATE,'Mon-yyyy') as month_year, SUM(JOB_CARD.TOTAL_SERVICES) as TOTAL_SERVICES, SUM(JOB_CARD.TOTAL_ACCESSORIES) as TOTAL_PARTS, SUM(JOB_CARD.DISCOUNT) as TOTAL_DISCOUNT, SUM(JOB_CARD.TOTAL) as GRAND_TOTAL");
	            $this->db->from('JOB_CARD');
	            if(!empty($data['TO'])){
	                $this->db->where("to_char(JOB_CARD.OPENING_DATE,'mm-yyyy') <=",$dateto);
	            }
	            if(!empty($data['FROM'])){
	                $this->db->where("to_char(JOB_CARD.OPENING_DATE,'mm-yyyy') >=",$datefrom);
	            }
	            if(!empty($data['JOB_STATUS'])){
					$this->db->where('JOB_STATUS',$data['JOB_STATUS']);
				}
                if(!empty($data['JOB_PAYMENT'])){
					$this->db->where('PAYMENT_STATUS',$data['JOB_PAYMENT']);
				}
				$this->db->where('JOB_CARD.DEALER_ID',$data['DEALER_ID']);
				$this->db->group_by("to_char(JOB_CARD.OPENING_DATE,'Mon-yyyy')");
	            $result = $this->db->get();

        	return $result;

		}

		function filterdealermonthlybusiness2($data){
			
				$datefrom=date("m-Y", strtotime($data['FROM']));
				$dateto=date("m-Y", strtotime($data['TO']));
				$this->db->select("JOB_STATUS,COUNT(*) as ccount");
	            $this->db->from('JOB_CARD');
	            if(!empty($data['TO'])){
	                $this->db->where("to_char(JOB_CARD.OPENING_DATE,'mm-yyyy') <=",$dateto);
	            }
	            if(!empty($data['FROM'])){
	                $this->db->where("to_char(JOB_CARD.OPENING_DATE,'mm-yyyy') >=",$datefrom);
	            }
	            if(!empty($data['JOB_STATUS'])){
					$this->db->where('JOB_STATUS',$data['JOB_STATUS']);
				}
                if(!empty($data['JOB_PAYMENT'])){
					$this->db->where('PAYMENT_STATUS',$data['JOB_PAYMENT']);
				}
				$this->db->where('JOB_CARD.DEALER_ID',$data['DEALER_ID']);
				$this->db->group_by("JOB_STATUS");
	            $result = $this->db->get();
	            $res=$result->row();
	            if(empty($res)){
	            	$res['JOB_STATUS']=$data['JOB_STATUS'];
	            	$res['CCOUNT']=0;
	            }
	            
        return $res;

		}



	}?>
