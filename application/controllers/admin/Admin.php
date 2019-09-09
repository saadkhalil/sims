<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


		public function __construct(){
				 parent::__construct();
			// $this->load->library('image_lib');
			 $this->load->model('Model_admin');
			 $this->load->helper('captcha');

		}



	public function index()
	{	
				$vals = array(

	        'img_path'      => './static/',
	        'img_url'       => base_url().'static/',
	        'img_width'       => '150',
	        'img_height'       => 40,
	        'font_size'			=>5,
	        'word_length'		=>'8',
	        'colors' => array(
			    'background' => array(255, 255, 255),
			    'border' => array(1, 1, 1),
			    'text' => array(0, 10, 10),
			    'grid' => array(255, 255, 255)
			  ),
	        'font_path'			=> base_url().'mono.ttf'
				);
				
				$captcha=create_captcha($vals);
				$this->session->set_userdata('captcha',$captcha);
				
		 	 if($this->session->userdata('USER_SESSION_ID')){
		 	 	//
				redirect(base_url().'admin/dashboard');
			}
			else{
				$this->load->view('admin/login',$captcha);
			}



	}
	public function dashboard(){

		 if(!$this->session->userdata('USER_SESSION_ID'))
		 {
		 	 redirect('admin/login');
		 }

		$user=$this->Model_admin->get_tbl('USERS');
		$viewdata['user_details']=$this->Model_admin->admin_data_where_sess_id($this->session->userdata('USER_SESSION_ID'));
		$USERID=$viewdata['user_details']->ID;

		//current count
		$totalcurrentcount=$this->Model_admin->current_total_jobcard($USERID);
		$viewdata['totalcurrentcount']=$totalcurrentcount->num_rows();

		$opencurrentcount=$this->Model_admin->current_open_jobcard($USERID);
		$viewdata['opencurrentcount']=$opencurrentcount->num_rows();

		$closedcurrentcount=$this->Model_admin->current_closed_jobcard($USERID);
		$viewdata['closedcurrentcount']=$closedcurrentcount->num_rows();
		//current count

		//monthly count
		$totalmonthcount=$this->Model_admin->month_total_jobcard($USERID);

		$viewdata['totalmonthcount']=$totalmonthcount->num_rows();

		$openmonthcount=$this->Model_admin->month_open_jobcard($USERID);
		$viewdata['openmonthcount']=$openmonthcount->num_rows();

		$closedcopencount=$this->Model_admin->month_closed_jobcard($USERID);
		$viewdata['closedcopencount']=$closedcopencount->num_rows();
		//monthly count

		//customer count
		$totalcustomercount=$this->Model_admin->total_customer($USERID);
		$viewdata['totalcustomercount']=$totalcustomercount->num_rows();

		$currentcustomercount=$this->Model_admin->current_customer($USERID);
		$viewdata['currentcustomercount']=$currentcustomercount->num_rows();

		$monthcustomercount=$this->Model_admin->month_customer($USERID);
		$viewdata['monthcustomercount']=$monthcustomercount->num_rows();
		//customer count

		//sales
		$totalsales=$this->Model_admin->total_sales($USERID);
		$viewdata['totalsales']=$totalsales->row();

		$currentsales=$this->Model_admin->current_sales($USERID);
		$viewdata['currentsales']=$currentsales->row();

		$monthsales=$this->Model_admin->month_sales($USERID);
		$viewdata['monthsales']=$monthsales->row();

		//sales

		$montharr=array();
		for($i=1; $i<=12; $i++){
		 	$montharr[]=$this->Model_admin->get_monthly_service($i,$USERID);
			}
			$sermontarr=array();
			foreach ($montharr as $key => $value) {
				$sermontarr[]=$value[0]['MONTHSERVICE'];
			}
		$viewdata['sermontarr']=$sermontarr;


		$monthaccarr=array();
		for($i=1; $i<=12; $i++){
		 	$monthaccarr[]=$this->Model_admin->get_monthly_accessories($i,$USERID);
			}

			$accmontarr=array();
			foreach ($monthaccarr as $key => $value) {
				$accmontarr[]=$value[0]['MONTHACC'];
			}
		$viewdata['accmontarr']=$accmontarr;

		$monthjobarr=array();
		for($i=1; $i<=12; $i++){
		 	$monthjobarr[]=$this->Model_admin->get_monthly_job($i,$USERID);
			}

			$jobmontarr=array();
			foreach ($monthjobarr as $key => $value) {
				$jobmontarr[]=$value[0]['MONTHJOB'];
			}
		$viewdata['jobmontarr']=$jobmontarr;

		$viewdata['Title']="Dashboard";
		$this->LoadAdminView("admin/dashboard",$viewdata);

	}
	public function login()
	{
		$this->index();

	}

	public function logout()
	{

		  $this->session->unset_userdata('USER_SESSION_ID');
    	 $this->session->sess_destroy();
		 redirect('admin/login');

	}


	public function submit()
	{

		$this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required');
        $captcha=$this->input->post('captcha');
        if ($this->form_validation->run() == FALSE){

        	   echo validation_errors();
        	
        }

        else if($captcha != $_SESSION['captcha']['word']){

        	echo 'Incorrect Captcha ! Please try again';
        }
        else{
        	$this->session->unset_userdata('captcha');
			$post=$this->input->post();
			$authdata=$this->Model_admin->login_authentication($post);
			if($authdata==TRUE){
				echo 'success';

			}
			else{

				echo 'failed';
			}

		}
	}


}
