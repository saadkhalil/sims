<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer extends CI_Controller {

	
	public function __construct(){

			parent::__construct();
			$this->load->model('Model_dealer','CMODEL');
			$this->defaultview='admin/dealer/';
			$this->title='Dealer';

		}


	public function index()
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data']=$this->CMODEL->get_dealer_data();
		$data['get_workshop_data']=$this->CMODEL->get_workshop_data();
		$data['get_devices_data']=$this->CMODEL->get_devices_data();
		$data['get_dealershipgroup_data']=$this->CMODEL->get_dealershipgroup_data();
		$data['get_territory_data']=$this->CMODEL->get_territory_data();
		$data['get_region_data']=$this->CMODEL->get_region_data();
		$data['get_city_data']=$this->CMODEL->get_city_data();
		$data['get_tools_data']=$this->CMODEL->get_tools_data();
		$data['get_miscellaneous_data']=$this->CMODEL->get_miscellaneous_data();

		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function edit($id)
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data_row']=$this->CMODEL->get_dealer_where_id($id);
		$data['get_workshop_data']=$this->CMODEL->get_workshop_data();
		$dealer_workshop_data=$this->CMODEL->dealer_workshop_data($id);
		$workshoparr=array();
		foreach ($dealer_workshop_data as $workshop) {
				$workshoparr[]=$workshop['WORKSHOP_ID'];
		}
		$data['workshoparr']=$workshoparr;
		$dealer_devices_data=$this->CMODEL->dealer_devices_data($id);
		$devicesarr=array();
		foreach ($dealer_devices_data as $device) {
				$devicesarr[]=$device['DEVICES_ID'];
		}
		$data['devicesarr']=$devicesarr;
		$dealer_special_data=$this->CMODEL->dealer_special_data($id);
		$specialsarr=array();
		foreach ($dealer_special_data as $special) {
				$specialsarr[]=$special['SPECIAL_ID'];
		}
		$data['specialsarr']=$specialsarr;
		$dealer_misc_data=$this->CMODEL->dealer_misc_data($id);
		$miscsarr=array();
		foreach ($dealer_misc_data as $misc) {
				$miscsarr[]=$misc['MISC_ID'];
		}
		$data['miscsarr']=$miscsarr;
	
		$data['get_devices_data']=$this->CMODEL->get_devices_data();
		$data['get_dealershipgroup_data']=$this->CMODEL->get_dealershipgroup_data();
		$data['get_territory_data']=$this->CMODEL->get_territory_data();
		$data['get_region_data']=$this->CMODEL->get_region_data();
		$data['get_city_data']=$this->CMODEL->get_city_data();
		$data['get_tools_data']=$this->CMODEL->get_tools_data();
		$data['get_miscellaneous_data']=$this->CMODEL->get_miscellaneous_data();
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function detail($id)
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_data_row']=$this->CMODEL->get_dealer_where_id($id);
		$data['detail_workshop_data']=$this->CMODEL->detail_workshop_data();
		$data['detail_devices_data']=$this->CMODEL->detail_devices_data();
		$data['get_dealershipgroup_data']=$this->CMODEL->get_dealershipgroup_data();
		$data['get_territory_data']=$this->CMODEL->get_territory_data();
		$data['get_region_data']=$this->CMODEL->get_region_data();
		$data['get_city_data']=$this->CMODEL->get_city_data();
		$data['detail_tools_data']=$this->CMODEL->detail_tools_data();

		$data['detail_miscellaneous_data']=$this->CMODEL->detail_miscellaneous_data();

		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function submitadd()
	{


		$this->form_validation->set_rules('USERNAME', 'User Name', 'required|max_length[20] |is_unique[USERS.USER_NAME]');
		$this->form_validation->set_rules('EMAIL', 'Email Address', 'required|max_length[30]|is_unique[USERS.EMAIL]');
		$this->form_validation->set_rules('NAME', 'Full Name', 'required|max_length[40]');
		$this->form_validation->set_rules('PASSWORD', 'Password', 'required|max_length[7]');
		$this->form_validation->set_rules('TERRITORY_ID', 'Territory', 'required');
		$this->form_validation->set_rules('REGION_ID', 'Region', 'required');
		$this->form_validation->set_rules('STATUS', 'Status', 'required');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();		
			$insertres=$this->CMODEL->insertdealer($post);
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
		$this->form_validation->set_rules('USERNAME', 'User Name', 'required|max_length[40]');
		$this->form_validation->set_rules('EMAIL', 'Email Address', 'required|max_length[30]');
		$this->form_validation->set_rules('NAME', 'Full Name', 'required|max_length[40]');
		$this->form_validation->set_rules('PASSWORD', 'Password', 'required|max_length[7]');
		$this->form_validation->set_rules('TERRITORY_ID', 'Territory', 'required');
		$this->form_validation->set_rules('REGION_ID', 'Region', 'required');
		$this->form_validation->set_rules('STATUS', 'Status', 'required');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }
        else{
			$post=$this->input->post();
			$updateres=$this->CMODEL->updatedealer($post);
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
			$deleterole=$this->CMODEL->deletedealer($post);	
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
		$result=$this->CMODEL->filtersearchdealer($post);
		echo json_encode($result->result_array());
	}
	
	
}
