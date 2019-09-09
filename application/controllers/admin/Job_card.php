<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_card extends CI_Controller {


	public function __construct(){

			parent::__construct();
			$this->load->model('Model_jobcard','CMODEL');
			$this->load->model('Model_staff','SMODEL');
			$this->load->model('Model_admin','AMODEL');
			$this->load->model('Model_customerdetails','DETAILMODEL');
			$this->load->model('Model_vehicles','VEHICLEMODEL');
			$this->defaultview='admin/job_card/';
			$this->title='Job Card';

		}


	public function index()
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_login_data']=$this->AMODEL->dealer_where_sess_id($this->session->userdata('USER_SESSION_ID'));

		$data['get_staff_data']=$this->CMODEL->get_staff_data();
		$data['get_cities_data']=$this->CMODEL->get_cities_data();
		$data['get_models_data']=$this->CMODEL->get_models_data();
		$data['get_colors_data']=$this->CMODEL->get_colors_data();
		$data['get_services_data']=$this->CMODEL->get_services_data();
		$data['get_others_services_row']=$this->CMODEL->get_others_services_data();
		$data['get_others_accessories_row']=$this->CMODEL->get_others_accessories_row();
		$data['get_accessories_data']=$this->CMODEL->get_accessories_data();
		$data['getcurrentjobcard']=$this->CMODEL->getcurrentjobcard();
		
		$lastjobref=last_insert_id('JOB_CARD');


		if(!empty($lastjobref) && !$lastjobref==1){
			$data['get_job_ref_id']=$lastjobref+1;
		}else{
			$data['get_job_ref_id']=1;
		}

		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function edit($jobid)
	{
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_login_data']=$this->CMODEL->get_login_data();
		$jobcarddata=$this->CMODEL->get_job_card_where_id($jobid);//job card data
		$data['get_data_row']=$jobcarddata->row();
		$data['get_job_visit_type']=$this->CMODEL->get_job_visit_type($data['get_data_row']);
		
		$job_staff_data=$this->CMODEL->get_job_staff_where_id($jobid);//job staff data
		$job_staff_arr=array();
		foreach ($job_staff_data as $jstaff) {
			$job_staff_arr[]=$jstaff['STAFF_ID'];
		}
		$data['job_staff_arr']=$job_staff_arr;
		$data['job_services']=$this->CMODEL->get_jservice($jobid);//job services
		$job_servid_data=$this->CMODEL->get_job_services_where_id($jobid);//job servicesid

		if(count($job_servid_data) > 0){
		foreach ($job_servid_data as $jservice) {
			$job_ser_id_arr[]=$jservice['SERVICE_ID'];
		}
		$data['job_ser_id_arr']=$job_ser_id_arr;
		}
		else{
			$data['job_ser_id_arr']=array();
		}


		$data['job_accessories']=$this->CMODEL->get_jaccessories($jobid);//job access
		$job_accid_data=$this->CMODEL->get_job_accessories_where_id($jobid);//job accessid
		if(count($job_accid_data) > 0){
		foreach ($job_accid_data as $jaccessories) {
			$job_acc_id_arr[]=$jaccessories['ACCESSORIES_ID'];
		}
		$data['job_acc_id_arr']=$job_acc_id_arr;
		}
		else{
			$data['job_acc_id_arr']=array();
		}
		$data['get_custvehicle_row']=$this->CMODEL->get_customer_vehicle_where_id($data['get_data_row']->CUSTOMER_VEHICLE_ID);//customer details with vehicle data
		$data['get_staff_data']=$this->CMODEL->get_staff_data();
		$data['get_cities_data']=$this->CMODEL->get_cities_data();
		$data['get_models_data']=$this->CMODEL->get_models_data();
		$data['get_colors_data']=$this->CMODEL->get_colors_data();
		$data['get_services_data']=$this->CMODEL->get_services_data();
		$data['get_others_services_row']=$this->CMODEL->get_others_services_data();
		$data['get_others_accessories_row']=$this->CMODEL->get_others_accessories_row();

		$data['get_accessories_data']=$this->CMODEL->get_accessories_data();
		$this->load->view($this->defaultview.$viewname,$data);
	}
	public function search()
	{

		if(!empty($this->input->post('CHASSISNO'))){
			$this->form_validation->set_rules('CHASSISNO', 'Chassis No', 'required');
		}
		else{
		$this->form_validation->set_rules('REGISTRATIONNO', 'Registration No', 'required');
		}
        if ($this->form_validation->run() == FALSE){

        	   echo 'validationerrors';

        }
        else{
			$post=$this->input->post();
			$searchresult=$this->CMODEL->searchjobcard($post);
			if($searchresult->num_rows()>0){
				echo json_encode($searchresult->row());
			}
			else
			{
				echo 'invalid';
			}

    	}
	}

	public function submitadd()//Add Job Card
	{
		$this->form_validation->set_rules('KM_READING', 'KM Reading', 'required|numeric|max_length[5]');
		$this->form_validation->set_rules('VISIT_TYPE_ID', 'Visit Type', 'required');
		$this->form_validation->set_rules('STAFF_ASSIGNED[]', 'Staff Assigned ', 'required');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();

        }
        else{
			$post=$this->input->post();
			$insertres=$this->CMODEL->insertjobcard($post);
			if($insertres == 1){

				echo 'cardadded';
			}
			else{
				echo 'failed';
			}
		}
	}
	public function submitedit()//Edit Job Card
	{


		$this->form_validation->set_rules('KM_READING', 'KM Reading', 'required|max_length[5]');
		$this->form_validation->set_rules('VISIT_TYPE_ID', 'Visit Type', 'required');
		$this->form_validation->set_rules('STAFF_ASSIGNED[]', 'Staff Assigned ', 'required');
        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();

        }
        else{
			$post=$this->input->post();
			$updateres=$this->CMODEL->updatejobcard($post);
			if($updateres == 1){

				echo 'updated';
			}
			else{
				echo 'failed';
			}
		}
	}

	public function submitcustedit()//Edit Customer Details
	{

		$this->form_validation->set_rules('NAME', 'Customer Name', 'required|max_length[20]');
		$this->form_validation->set_rules('CITY_ID', 'City', 'required');
		$this->form_validation->set_rules('CONTACT', 'Contact No', 'required|max_length[15]');
		$this->form_validation->set_rules('NIC', 'NIC No', 'required|max_length[15]');

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
			$deleterole=$this->CMODEL->deletejobcard($post);
			if($deleterole==1){
				echo 'deleted';
			}
			else{
				echo 'failed';
			}
	}


	public function check_visit()
	{
		$post=$this->input->post();
		$checkvisit=$this->CMODEL->checkvisittouser($post);
		$visitexistres=$checkvisit->result_array();

		$visitarr=array();
			foreach ($visitexistres as $visittypeexist) {
				$visitarr[]=$visittypeexist['VISIT_TYPE_ID'];
			}

		$get_visittype_data=$this->CMODEL->get_visit_types_data();
		$html='<div class="form-group visit-type">
				<ul>';
				foreach($get_visittype_data as $visit){
				  if(!in_array($visit['ID'],$visitarr)){
					$html.='
					<li>
					<label class="radio">
						<input type="radio" name="VISIT_RADIO" data-id="'.$visit['ID'].'" value="'.$visit['SERVICE_NAME'].'">
					<i></i><b>'.$visit['SERVICE_NAME'].'</b><small> (Available)</small> </label>
					</li>';
					}else{
					$html.='
					<li>
					<label>

					<i></i><b>'.$visit['SERVICE_NAME'].'</b><small> (Already Availed)</small> </label>
					</li>';
					}

				}
					$html.='<br><br>
						</ul>
					</div>';
		echo $html;

	}
	public function check_visit_update()
	{

		$post=$this->input->post();

		$checkvisit=$this->CMODEL->checkvisittouserupdate($post);
		$custvisitdata=$this->CMODEL->get_lastvisittype($post);
		$cusvisitresult=$custvisitdata->row();
		$visitexistres=$checkvisit->result_array();

		$visitarr=array();
			foreach ($visitexistres as $visittypeexist) {
				$visitarr[]=$visittypeexist['VISIT_TYPE_ID'];
			}

		$get_visittype_data=$this->CMODEL->get_visit_types_data();
		$html='<div class="form-group visit-type">
				<ul>';
				foreach($get_visittype_data as $visit){
				  if(!in_array($visit['ID'],$visitarr) || $visit['ID']==$cusvisitresult->VISIT_TYPE_ID){
					$html.='
					<li>
					<label class="radio">
						<input type="radio" '.($visit['ID']==$cusvisitresult->VISIT_TYPE_ID ? 'checked' : '').' name="VISIT_RADIO" data-id="'.$visit['ID'].'" value="'.$visit['SERVICE_NAME'].'">
					<i></i><b>'.$visit['SERVICE_NAME'].'</b><small> (Available)</small> </label>
					</li>';
					}else{
					$html.='
					<li>
					<label>

					<i></i><b>'.$visit['SERVICE_NAME'].'</b><small> (Already Availed)</small> </label>
					</li>';
					}

				}
					$html.='<br><br>
						</ul>
					</div>';
		echo $html;

	}
	public function filter()
	{

		$post=$this->input->post();
		$result=$this->CMODEL->filtersearchjobcard($post);

		echo json_encode($result->result_array());


	}


	public function allsubmit()//Add Customer with vehicle
	{
		
		$this->form_validation->set_rules('CHASSIS_NO', 'Chassis No', 'required|min_length[7]|max_length[12]|is_unique[CUSTOMER_VEHICLES.CHASSIS_NO]');
		$this->form_validation->set_rules('ENGINE_NO', 'Engine No', 'required|min_length[7]|max_length[12]');
		$this->form_validation->set_rules('REGISTRATION_NO', 'Registration No', 'required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('MODEL_ID', 'Model No', 'required');
		$this->form_validation->set_rules('COLOR_ID', 'Color No', 'required');
		$this->form_validation->set_rules('PURCHASE_DATE', 'Purchase Date', 'required');
		$this->form_validation->set_rules('NAME', 'Customer Name', 'required|max_length[20]');
		$this->form_validation->set_rules('CONTACT', 'Contact No', 'required|max_length[15]');
		$this->form_validation->set_rules('NIC', 'NIC No', 'required|max_length[20]');

        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();

        }
        else{
        	$dealer_details=$this->AMODEL->dealer_where_sess_id($this->session->userdata('USER_SESSION_ID'));
			$cdata['DEALER_ID']=$dealer_details->ID;
			$cdata['NAME']=$this->input->post('NAME');
			$cdata['NIC']=$this->input->post('NIC');
			$cdata['CITY_ID']=$this->input->post('CITY_ID');
			$cdata['CONTACT']=$this->input->post('CONTACT');
			$cdata['ADDRESS']=strtoupper($this->input->post('ADDRESS'));
			
			$nicexist=$this->DETAILMODEL->checknicforcustomer($cdata['NIC']);
			if($nicexist->num_rows() > 0){
				
				$nrow=$nicexist->row();
				$vdata['CUSTOMER_ID']=$nrow->ID;
				$vdata['CHASSIS_NO']=strtoupper($this->input->post('CHASSIS_NO'));
				$vdata['ENGINE_NO']=strtoupper($this->input->post('ENGINE_NO'));
				$vdata['REGISTRATION_NO']=strtoupper($this->input->post('REGISTRATION_NO'));
				$vdata['MODEL_ID']=$this->input->post('MODEL_ID');
				$vdata['COLOR_ID']=$this->input->post('COLOR_ID');
				$vdata['PURCHASE_DATE']=$this->input->post('PURCHASE_DATE');
				$insertres2=$this->VEHICLEMODEL->insertcustomervehicles($vdata);
				$insertres1=1;
				
			}
			else{
			
				$insertres1=$this->DETAILMODEL->insertcustomerdetails($cdata);
				$CUSTID=last_insert_id('CUSTOMER_DETAILS');
				$vdata['CUSTOMER_ID']=$CUSTID;
				$vdata['CHASSIS_NO']=strtoupper($this->input->post('CHASSIS_NO'));
				$vdata['ENGINE_NO']=strtoupper($this->input->post('ENGINE_NO'));
				$vdata['REGISTRATION_NO']=strtoupper($this->input->post('REGISTRATION_NO'));
				$vdata['MODEL_ID']=$this->input->post('MODEL_ID');
				$vdata['COLOR_ID']=$this->input->post('COLOR_ID');
				$vdata['PURCHASE_DATE']=$this->input->post('PURCHASE_DATE');
				$insertres2=$this->VEHICLEMODEL->insertcustomervehicles($vdata);
				
			}

			
			if($insertres1 == 1 && $insertres2==1){

				echo 'added';
			}
			else{
				echo 'failed';
			}
		}
	}

	public function closedetails()
	{

		$id=$this->input->post('id');
		$jobcardrowdata=$this->CMODEL->get_job_card_where_id($id);
		$result=$jobcardrowdata->row();
		echo json_encode($result);

		# code...
	}
	public function closesubmit()
	{
		$this->form_validation->set_rules('PAYMENT_STATUS', 'Payment Status', 'required');
		$this->form_validation->set_rules('TOTAL', 'Grand Total', 'required');
		$this->form_validation->set_rules('TOTAL_ACCESSORIES', 'Sub Total - Accessories', 'required');
		$this->form_validation->set_rules('TOTAL_SERVICES', 'Sub Total - Services', 'required');
			 if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();

        }
        else{
			$post=$this->input->post();
			$closed=$this->CMODEL->closejobcardsubmit($post);
				echo 'updated';

		}
	}

	public function detail($jobid){
		$viewname=$this->input->post('viewname');
		$data['Title']=$this->title;
		$data['get_login_data']=$this->CMODEL->get_login_data();
		$jobcarddata=$this->CMODEL->get_job_card_where_id($jobid);//job card data
		$data['get_data_row']=$jobcarddata->row();
		$job_staff_data=$this->CMODEL->get_job_staff_where_id($jobid);//job staff data
		$job_staff_arr=array();
		foreach ($job_staff_data as $jstaff) {
			$job_staff_arr[]=$jstaff['STAFF_ID'];
		}
		$data['job_staff_arr']=$job_staff_arr;
		$data['job_services']=$this->CMODEL->get_jservice($jobid);//job services
		$job_servid_data=$this->CMODEL->get_job_services_where_id($jobid);//job servicesid

		if(count($job_servid_data) > 0){
		foreach ($job_servid_data as $jservice) {
			$job_ser_id_arr[]=$jservice['SERVICE_ID'];
		}
		$data['job_ser_id_arr']=$job_ser_id_arr;
		}
		else{
			$data['job_ser_id_arr']=array();
		}


		$data['job_accessories']=$this->CMODEL->get_jaccessories($jobid);//job access
		$job_accid_data=$this->CMODEL->get_job_accessories_where_id($jobid);//job accessid
		if(count($job_accid_data) > 0){
		foreach ($job_accid_data as $jaccessories) {
			$job_acc_id_arr[]=$jaccessories['ACCESSORIES_ID'];
		}
		$data['job_acc_id_arr']=$job_acc_id_arr;
		}
		else{
			$data['job_acc_id_arr']=array();
		}
		$data['get_custvehicle_row']=$this->CMODEL->get_customer_vehicle_where_id($data['get_data_row']->CUSTOMER_VEHICLE_ID);//customer details with vehicle data
		$data['get_staff_data']=$this->SMODEL->get_staff_data();
		$data['get_cities_data']=$this->CMODEL->get_cities_data();
		$data['get_models_data']=$this->CMODEL->get_models_data();
		$data['get_colors_data']=$this->CMODEL->get_colors_data();
		$data['get_services_data']=$this->CMODEL->get_services_data();
		$data['get_others_services_row']=$this->CMODEL->get_others_services_data();
		$data['get_others_accessories_row']=$this->CMODEL->get_others_accessories_row();

		$data['get_accessories_data']=$this->CMODEL->get_accessories_data();
		// echo '<pre>';
		// die(print_r($data));
		$this->load->view($this->defaultview.$viewname,$data);
	}



}
