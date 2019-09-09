<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends CI_Controller {


	
	public function __construct(){
			parent::__construct();
			$this->load->model('Model_user_role','CMODEL');
			$this->defaultview='admin/user_role/';
			$this->title='User Role';


		}


	public function index()
	{
		
			if(!empty($this->session->userdata('USER_ROLE')) && $this->session->userdata('USER_ROLE')=='Admin'){
				$viewname=$this->input->post('viewname');
				$data['Title']=$this->title;
				$data['get_data']=$this->CMODEL->get_user_role_data();
				$this->load->view($this->defaultview.$viewname,$data);
			}
			else{
				return false;
			}
	
	}
	public function edit($id)
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data_row']=$this->CMODEL->get_user_role_data_where_id($id);
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function submitadd()
	{

		$this->form_validation->set_rules('TITLE', 'Title Name', 'required|max_length[20]');

        if($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$insertres=$this->CMODEL->insertrole($post);
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
		$this->form_validation->set_rules('TITLE', 'Title Name', 'required|max_length[20]');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$updateres=$this->CMODEL->updaterole($post);
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
			$deleterole=$this->CMODEL->deleterole($post);	
			if($deleterole==1){
				echo 'deleted';
			}
			else{
				echo 'failed';
			}
		# code...
	}
	
	
}
