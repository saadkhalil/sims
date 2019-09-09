<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

	
	public function __construct(){

			parent::__construct();
			$this->load->model('Model_city','CMODEL');
			$this->defaultview='admin/city/';
			$this->title='City';

		}


	public function index()
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data']=$this->CMODEL->get_city_data();
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function edit($id)
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data_row']=$this->CMODEL->get_city_where_id($id);
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function submitadd()
	{
		$this->form_validation->set_rules('TITLE', 'Title Name', 'required|max_length[20]');
        $this->form_validation->set_rules('CODE', 'Code', 'required|max_length[8]');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$insertres=$this->CMODEL->insertcity($post);
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
        $this->form_validation->set_rules('CODE', 'Code', 'required|max_length[8]');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$updateres=$this->CMODEL->updatecity($post);
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
			$deleterole=$this->CMODEL->deletecity($post);	
			if($deleterole==1){
				echo 'deleted';
			}
			else{
				echo 'failed';
			}
	}
	
	
}
