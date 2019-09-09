<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {


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
			$this->defaultview='admin/reports/';
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
		$result=$this->CMODEL->filtersearchjobcardadmin($post);
		echo json_encode($result->result_array());
	}
	public function filterjobcardsummary()
	{
		$post=$this->input->post();
		$result=$this->CMODEL->filtersearchjobcardsummaryadmin($post);
		echo json_encode($result->result_array());
	}
	public function filterfreeservicesummary()
	{
		$post=$this->input->post();
		$result=$this->CMODEL->filtersearchfreeservicesummaryadmin($post);
		echo json_encode($result->result_array());
	}

	public function filterfreeservicedetail()
	{
		$post=$this->input->post();
		$result=$this->CMODEL->filtersearchfreeservicedetailadmin($post);
		echo json_encode($result->result_array());
	}
	public function filterdealerbusinesssummary()
	{
		$post=$this->input->post();
		$result=$this->CMODEL->filterdealerbusinesssummaryadmin($post);
		
		$jobidresult=$result->result_array();


		$jobser=array();
		foreach($jobidresult as $filres) {


			$dealerdetail=$this->CMODEL->getfilterresultbyjobid($filres['ID']);
			
			$jobser[$dealerdetail->NAME]['TOTALPARTSSALE']=$dealerdetail->TOTAL_ACCESSORIES;
			$jobser[$dealerdetail->NAME]['CODE']=$dealerdetail->USER_NAME;
			$jobser[$dealerdetail->NAME]['SERVICES']=$this->CMODEL->getjobservice($filres['ID']);
			$jobser[$dealerdetail->NAME]['SERVICES']=$this->CMODEL->getjobservice($filres['ID']);
			$jobser[$dealerdetail->NAME]['OILSALE']=$this->CMODEL->getoilsale($filres['ID']);

			$jobser[$dealerdetail->NAME]['ACCESSORIES']=$this->CMODEL->getjobaccessories($filres['ID']);
			
		
		}
	
		echo json_encode($jobser);
	}


}
