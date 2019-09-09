<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer_reports extends CI_Controller {


	public function __construct(){

			parent::__construct();
			$this->load->model('Model_jobcard','CMODEL');
			$this->load->model('Model_staff','DMODEL');
			$this->load->model('Model_admin','AMODEL');
			$this->load->model('Model_region','RMODEL');
			$this->load->model('Model_territory','TMODEL');
			$this->load->model('Model_customerdetails','DETAILMODEL');
			$this->load->model('Model_vehicles','VEHICLEMODEL');
			$this->load->model('Model_dealership_group','DGMODEL');
			$this->defaultview='admin/dealer_reports/';
			$this->title='Reports';

		}


	public function index()
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_login_data']=$this->AMODEL->dealer_where_sess_id($this->session->userdata('USER_SESSION_ID'));

		$data['get_dealership_group_data']=$this->DGMODEL->get_dealership_group_data();
		$data['get_region_data']=$this->RMODEL->get_region_data();

		foreach($data['get_region_data'] as $regions) {
			foreach($data['get_dealership_group_data'] as $dealership){
				$count = $this->DGMODEL->get_dealership_count_by_region($regions['ID'],$dealership['ID']);
				$data['get_dealership_count_by_region'][$regions['TITLE']][]=$count;
			}
		}
		foreach($data['get_dealership_group_data'] as $dealership){
				$count = $this->DGMODEL->get_dealership_count_by_national($dealership['ID']);
				$data['get_dealership_count_by_national'][]=$count;
			}
		
		$data['get_staff_data']=$this->CMODEL->get_staff_data();
		$data['get_dealers_data']=$this->DMODEL->get_dealers_data();
		$data['get_cities_data']=$this->CMODEL->get_cities_data();
		$data['get_models_data']=$this->CMODEL->get_models_data();
		$data['get_colors_data']=$this->CMODEL->get_colors_data();
		$data['get_services_data']=$this->CMODEL->get_services_data();
		$data['get_territory_data']=$this->TMODEL->get_territory_data();
		$data['get_others_services_row']=$this->CMODEL->get_others_services_data();
		$data['get_others_accessories_row']=$this->CMODEL->get_others_accessories_row();
		$data['get_accessories_data']=$this->CMODEL->get_accessories_data();
		$lastjobref=$this->CMODEL->get_last_job_ref_id();
		if($lastjobref->num_rows() > 0){
			$data['get_job_ref_id']=$lastjobref->row()->ID+1;
		}else{
			$data['get_job_ref_id']=1;
		}
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function filter()
	{
		$post=$this->input->post();
		
		$dealerdetail = $this->AMODEL->dealer_where_sess_id($this->session->userdata('USER_SESSION_ID'));
		$post['DEALER_ID']=$dealerdetail->ID;
		$result = $this->CMODEL->filterdealermonthlybusiness1($post);
		echo json_encode($result->result_array());
		
	}
	public function filter1()
	{
		$post=$this->input->post();
		$rs = array();
		$dealerdetail = $this->AMODEL->dealer_where_sess_id($this->session->userdata('USER_SESSION_ID'));
		$post['DEALER_ID']=$dealerdetail->ID;

		$post['JOB_STATUS']='Open';
		$post['PAYMENT_STATUS']='Not Done';
		$rs['Open']['Not_done']= $this->CMODEL->filterdealermonthlybusiness2($post);

		$post['JOB_STATUS']='Closed';
		$post['PAYMENT_STATUS']='Not Done';
		$rs['Closed']['Not_done']= $this->CMODEL->filterdealermonthlybusiness2($post);

		$post['JOB_STATUS']='Open';
		$post['PAYMENT_STATUS']='Done - Cash';
		$rs['Open']['Done_cash']= $this->CMODEL->filterdealermonthlybusiness2($post);
		$post['JOB_STATUS']='Closed';
		$post['PAYMENT_STATUS']='Done - Cash';
		$rs['Closed']['Done_cash'] = $this->CMODEL->filterdealermonthlybusiness2($post);

		$post['JOB_STATUS']='Open';
		$post['PAYMENT_STATUS']='Credit';
		$rs['Open']['Credit']= $this->CMODEL->filterdealermonthlybusiness2($post);
		$post['JOB_STATUS']='Closed';
		$post['PAYMENT_STATUS']='Credit';
		$rs['Closed']['Credit'] = $this->CMODEL->filterdealermonthlybusiness2($post);
		
		echo json_encode($rs);
		
	}
	
}
