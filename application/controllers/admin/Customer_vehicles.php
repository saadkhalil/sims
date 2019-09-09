<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_vehicles extends CI_Controller {

	
	public function __construct(){

			parent::__construct();
			$this->load->model('Model_vehicles','CMODEL');
			$this->defaultview='admin/customer_vehicles/';
			$this->title='Customer Vehicles';

		}


	public function index($cid)
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_customer_data']=$this->CMODEL->get_customer_details_where_id($cid);
		$data['get_vehicle_data']=$this->CMODEL->get_customer_vehicle_data($cid);
		$data['get_models_data']=$this->CMODEL->get_models_data();
		$data['get_colors_data']=$this->CMODEL->get_colors_data();
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function edit($id)
	{
		$viewname=$this->input->post('viewname');

		$data['Title']=$this->title;
		$data['get_vehicle_row']=$this->CMODEL->get_customer_vehicle_where_id($id);
		$data['get_models_data']=$this->CMODEL->get_models_data();
		$data['get_colors_data']=$this->CMODEL->get_colors_data();
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function submitadd()
	{	
		
		$this->form_validation->set_rules('CHASSIS_NO', 'Chassis No', 'required|min_length[7]|max_length[12]|is_unique[CUSTOMER_VEHICLES.CHASSIS_NO]');
		$this->form_validation->set_rules('ENGINE_NO', 'Engine No', 'required|min_length[7]|max_length[12]');
		$this->form_validation->set_rules('REGISTRATION_NO', 'Registration No', 'required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('MODEL_ID', 'Model No', 'required');
		$this->form_validation->set_rules('COLOR_ID', 'Color No', 'required');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$insertres=$this->CMODEL->insertcustomervehicles($post);
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
		$this->form_validation->set_rules('CHASSIS_NO', 'Chassis No', 'required|min_length[7]|max_length[12]');
		$this->form_validation->set_rules('ENGINE_NO', 'Engine No', 'required|min_length[7]|max_length[12]');
		$this->form_validation->set_rules('REGISTRATION_NO', 'Registration No', 'required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('MODEL_ID', 'Model No', 'required');
		$this->form_validation->set_rules('COLOR_ID', 'Color No', 'required');
        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$updateres=$this->CMODEL->updatecustomervehicles($post);
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
			$deleterole=$this->CMODEL->deletecustomervehicles($post);	
			if($deleterole==1){
				echo 'deleted';
			}
			else{
				echo 'failed';
			}
	}
	
	
}
