<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_details extends CI_Controller {

	
	public function __construct(){

			parent::__construct();
			$this->load->model('Model_customerdetails','CMODEL');
			$this->load->model('Model_admin');
			$this->defaultview='admin/customer_details/';
			$this->title='Customer Details';

		}


	public function index()
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data']=$this->CMODEL->get_customer_details_data($this->session->userdata('USER_SESSION_ID'));
		$data['get_cities_data']=$this->CMODEL->get_cities_data();
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function edit($id)
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data_row']=$this->CMODEL->get_customer_details_where_id($id);
		
		$data['get_cities_data']=$this->CMODEL->get_cities_data();
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function submitadd()
	{	
		$this->form_validation->set_rules('NAME', 'Customer Name', 'required|max_length[20]');
		$this->form_validation->set_rules('CITY_ID', 'City', 'required');
		$this->form_validation->set_rules('NIC', 'NIC No', 'required|max_length[20] |is_unique[CUSTOMER_DETAILS.NIC]');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$dealer_details=$this->Model_admin->dealer_where_sess_id($this->session->userdata('USER_SESSION_ID'));
			$post['DEALER_ID']=$dealer_details->ID;
			$insertres=$this->CMODEL->insertcustomerdetails($post);
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
		
		$this->form_validation->set_rules('NAME', 'Customer Name', 'required|max_length[20]');
		$this->form_validation->set_rules('CITY_ID', 'City', 'required');
        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$updateres=$this->CMODEL->updatecustomerdetails($post);
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
			$deleterole=$this->CMODEL->deletecustomerdetails($post);	
			if($deleterole==1){
				echo 'deleted';
			}
			else{
				echo 'failed';
			}
	}
	
	
}
