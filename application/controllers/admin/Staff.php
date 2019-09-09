<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	
	public function __construct(){

			parent::__construct();
			$this->load->model('Model_staff','CMODEL');
			$this->load->model('Model_dealer','DMODEL');
			$this->defaultview='admin/staff/';
			$this->title='Staff';

		}


	public function index()
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_dealers_data']=$this->DMODEL->get_dealer_data();
		if($this->session->userdata('USER_ROLE')=='Admin'){ 

		$data['get_data']=$this->CMODEL->get_staff_data();
		}else{
		$data['get_data']=$this->CMODEL->get_staff_data_whereid($this->session->userdata('USER_SESSION_ID'));

		}
		$data['get_dealershipgroup_data']=$this->DMODEL->get_dealershipgroup_data();
		$data['get_territory_data']=$this->DMODEL->get_territory_data();
		$data['get_region_data']=$this->DMODEL->get_region_data();
		$data['get_city_data']=$this->DMODEL->get_city_data();
		$data['get_education_data']=$this->CMODEL->get_education_data();
		$data['get_skills_data']=$this->CMODEL->get_skills_data();
		$data['get_training_data']=$this->CMODEL->get_training_data();
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function edit($id)
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data_row']=$this->CMODEL->get_staff_where_id($id);
		$data['staff_training']=$this->CMODEL->get_staff_training_data($id);
		if($this->session->userdata('USER_ROLE')=='Admin'){ 
			$data['get_dealers_data']=$this->CMODEL->get_dealers_data();
		}
		$data['get_education_data']=$this->CMODEL->get_education_data();
		$data['get_skills_data']=$this->CMODEL->get_skills_data();
		$staffskills=$this->CMODEL->get_staff_skills_data($id);
		$data['get_staff_employment_track']=$this->CMODEL->get_emp_track_data($id);
		$data['get_training_data']=$this->CMODEL->get_training_data();
		
		$stfskillarr=array();
		foreach($staffskills as $sskill){
			$stfskillarr[]=$sskill['SKILL_ID'];
		}
		$data['stfskillarr']=$stfskillarr;
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function detail($id)
	{

		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data_row']=$this->CMODEL->get_staff_where_id($id);
		$data['detail_staff_training_data']=$this->CMODEL->detail_staff_training_data($id);
		if($this->session->userdata('USER_ROLE')=='Admin'){ 
			$data['get_dealers_data']=$this->CMODEL->get_dealers_data();
		}
		$data['get_education_data']=$this->CMODEL->get_education_data();
		$data['detail_skills_data']=$this->CMODEL->detail_skills_data();
		
		$staffskills=$this->CMODEL->get_staff_skills_data($id);
		$data['get_staff_employment_track']=$this->CMODEL->get_emp_track_data($id);
		$data['get_training_data']=$this->CMODEL->get_training_data();
		
		$stfskillarr=array();
		foreach($staffskills as $sskill){
			$stfskillarr[]=$sskill['SKILL_ID'];
		}
		$data['stfskillarr']=$stfskillarr;
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function submitadd()
	{	

		if($this->session->userdata('USER_ROLE')=='Admin'){ 
			$this->form_validation->set_rules('DEALER_ID', 'Dealer Name', 'required');
		}
		$this->form_validation->set_rules('NAME', 'Staff Name', 'required|max_length[20]');
		$this->form_validation->set_rules('AGE', 'Age', 'numeric|max_length[2]');
		$this->form_validation->set_rules('SALARY', 'Salary', 'numeric');
		$this->form_validation->set_rules('EXP', 'Experience', 'numeric');
		$this->form_validation->set_rules('COMMISSION[]', 'Commission', 'numeric');
		$this->form_validation->set_rules('CONTACT', 'Contact Number', 'required|max_length[20]');
		$this->form_validation->set_rules('DESIGNATION', 'Desgination', 'required|max_length[50]');
		$this->form_validation->set_rules('NIC', 'NIC No', 'required|max_length[20] |is_unique[STAFF.NIC]');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{

			$post=$this->input->post();

			$insertres=$this->CMODEL->insertstaff($post);
			if($insertres == 1){

				echo 'added';
			}
			else{
				echo 'failed';
			}
    	}
	}
	public function submitedit()
	{
		$this->form_validation->set_rules('NAME', 'Staff Name', 'required|max_length[20]');
		if($this->session->userdata('USER_ROLE')=='Admin'){ 
			$this->form_validation->set_rules('DEALER_ID', 'Dealer Name', 'required');
		}
		$this->form_validation->set_rules('AGE', 'Age', 'max_length[2]');
		$this->form_validation->set_rules('EXP', 'Experience', 'max_length[2]');
		$this->form_validation->set_rules('CONTACT', 'Contact Number', 'required|max_length[20]');
		$this->form_validation->set_rules('DESIGNATION', 'Desgination', 'required|max_length[50]');
		$this->form_validation->set_rules('NIC', 'NIC No', 'required|max_length[20]');
        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$updateres=$this->CMODEL->updatestaff($post);
			if($updateres == 1){

				echo 'updated';
			}
			else{
				echo 'failed';
			}
		}	
	}

	public function submitdel()
	{
			$post=$this->input->post();
			$deleterole=$this->CMODEL->deletestaff($post);	
			if($deleterole==1){
				echo 'deleted';
			}
			else{
				echo 'failed';
			}
	}
	public function filter()
	{
		$post=$this->input->post();
		$result=$this->CMODEL->filtersearchstaff($post);
		echo json_encode($result->result_array());
	}
	
	
}
