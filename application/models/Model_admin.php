<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_admin extends CI_Model {
	    function __construct() {
	        parent::__construct();
	    }

		function get_tbl($tbl){
				$query = $this->db->get($tbl);
				return $query->result_array();
			}


		function login_authentication($data)
		{

			  $USERNAME = $data['user_name'];
			  $PASSWORD = strtoupper(md5($data['password']));
			  $this->db->select('USERS.*,USER_ROLE.TITLE AS USER_ROLE');
			  $this->db->where('USERS.USER_NAME',  $USERNAME);
			  $this->db->where('USERS.STATUS', 1);
			  $this->db->join('USER_ROLE', 'USER_ROLE.ID = USERS.USER_ROLE_ID', 'left');
			  $query=$this->db->get('USERS');
				if($query->num_rows()==1){
					$rows=$query->row();
						if($rows->PASSWORD==$PASSWORD){
							$sessionid=$rows->REMEMBER_TOKEN;
		              	    $this->session->set_userdata('USER_SESSION_ID',$sessionid);
		              	    $this->session->set_userdata('USER_ROLE',$rows->USER_ROLE);


						  	  return true;
						  }
						  else{
							  return false;
						  }



				}
				else{
					return false;
				}


		}
		function admin_data_where_sess_id($sessid)
		{
			$this->db->where('REMEMBER_TOKEN', $sessid);
			$query=$this->db->get('USERS');
			if($query->num_rows()==1){
			return $query->row();
			}
			else{
				return false;
			}
		}
		function dealer_where_sess_id($sessid)
		{
			$this->db->select('DEALER_DETAILS.*,USERS.USER_NAME');
			$this->db->where('USERS.REMEMBER_TOKEN', $sessid);
			$this->db->join('DEALER_DETAILS','DEALER_DETAILS.USER_ID=USERS.ID','LEFT');
			$query=$this->db->get('USERS');
			if($query->num_rows()==1){
			return $query->row();
			}
			else{
				return false;
			}
		}
		function current_total_jobcard($id)
		{
			$this->db->where('DEALER_ID',$id);
			$this->db->where('CREATED_AT',date('d-M-Y'));
			$query=$this->db->get('JOB_CARD');
			return $query;
		}
		function current_open_jobcard($id)
		{
			$this->db->where('DEALER_ID',$id);
			$this->db->where('CREATED_AT',date('d-M-Y'));
			$this->db->where('JOB_STATUS','Open');
			$query=$this->db->get('JOB_CARD');
			return $query;
		}
		function current_closed_jobcard($id)
		{
			$this->db->where('DEALER_ID',$id);
			$this->db->where('CREATED_AT',date('d-M-Y'));
			$this->db->where('JOB_STATUS','Closed');
			$query=$this->db->get('JOB_CARD');
			return $query;
		}

		function month_total_jobcard($id)
		{
			$this->db->where('DEALER_ID',$id);
			$this->db->where("to_char(CREATED_AT, 'mm') =", date('m'));
			$query=$this->db->get('JOB_CARD');
			return $query;
		}
		function month_open_jobcard($id)
		{
			$this->db->where('DEALER_ID',$id);
			$this->db->where("to_char(CREATED_AT, 'mm') =", date('m'));
			$this->db->where('JOB_STATUS','Open');
			$query=$this->db->get('JOB_CARD');
			return $query;
		}
		function month_closed_jobcard($id)
		{
			$this->db->where('DEALER_ID',$id);
			$this->db->where("to_char(CREATED_AT, 'mm') =", date('m'));
			$this->db->where('JOB_STATUS','Closed');
			$query=$this->db->get('JOB_CARD');
			return $query;
		}
		function total_customer($id)
		{
			$this->db->select('CUSTOMER_DETAILS.*');
			$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=CUSTOMER_DETAILS.ID');
			$this->db->where('DEALER_DETAILS.USER_ID',$id);
			$query=$this->db->get('CUSTOMER_DETAILS');
			return $query;
		}
		function current_customer($id)
		{
			$this->db->select('CUSTOMER_DETAILS.*');
			$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=CUSTOMER_DETAILS.ID');
			$this->db->where('DEALER_DETAILS.USER_ID',$id);
			$this->db->where('CUSTOMER_DETAILS.CREATED_AT',date('d-M-Y'));
			$query=$this->db->get('CUSTOMER_DETAILS');
			return $query;
		}
		function month_customer($id)
		{
			$this->db->select('CUSTOMER_DETAILS.*');
			$this->db->join('DEALER_DETAILS','DEALER_DETAILS.ID=CUSTOMER_DETAILS.ID');
			$this->db->where('DEALER_DETAILS.USER_ID',$id);
			$this->db->where("to_char(CUSTOMER_DETAILS.CREATED_AT, 'mm') =", date('m'));
			$query=$this->db->get('CUSTOMER_DETAILS');
			return $query;
		}
		function total_sales($id)
		{
			$this->db->select('SUM(TOTAL) AS TOTAL');
			$this->db->where('DEALER_ID',$id);
			$query=$this->db->get('JOB_CARD');
			return $query;
		}
		function current_sales($id)
		{
			$this->db->select('SUM(TOTAL) AS TOTAL');
			$this->db->where('DEALER_ID',$id);
			$this->db->where('CREATED_AT =',date('d-M-y'));
			$query=$this->db->get('JOB_CARD');
			return $query;
		}
		function month_sales($id)
		{
			$this->db->select('SUM(TOTAL) AS TOTAL');
			$this->db->where('DEALER_ID',$id);
			$this->db->where("to_char(CREATED_AT, 'mm') =", date('m'));
			$query=$this->db->get('JOB_CARD');
			return $query;
		}
		function get_monthly_service($month,$id){

			$lengmonth=strlen($month);

			if($lengmonth==1){
					$month="0".$month;


			}
			$this->db->select('COUNT(*) AS MONTHSERVICE');
			$this->db->join('JOB_CARD','JOB_CARD.ID=JOB_SERVICES.JOB_ID','LEFT');
			$this->db->where("JOB_CARD.DEALER_ID",$id);
			$this->db->where("to_char(JOB_SERVICES.CREATED_AT, 'mm') =", $month);
			$query=$this->db->get('JOB_SERVICES');

			return $query->result_array();
		}
		function get_monthly_accessories($month,$id){

			$lengmonth=strlen($month);

			if($lengmonth==1){
					$month="0".$month;

			}
			$this->db->select('COUNT(*) AS MONTHACC');
			$this->db->where("to_char(JOB_ACCESSORIES.CREATED_AT, 'mm') =", $month);
			$this->db->where("JOB_CARD.DEALER_ID",$id);
			$this->db->join('JOB_CARD','JOB_CARD.ID=JOB_ACCESSORIES.JOB_ID','LEFT');
			$query=$this->db->get('JOB_ACCESSORIES');

			return $query->result_array();
		}
		function get_monthly_job($month,$id){

			$lengmonth=strlen($month);

			if($lengmonth==1){
					$month="0".$month;

			}
			$this->db->select('COUNT(*) AS MONTHJOB');
			$this->db->where("to_char(CREATED_AT, 'mm') =", $month);
			$this->db->where('DEALER_ID',$id);
			$query=$this->db->get('JOB_CARD');

			return $query->result_array();
		}
}
?>
