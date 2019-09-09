		<!-- MAIN CONTENT -->
				<div id="content">

					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
							<h1 class="page-title txt-color-blueDark">
								<i class="fa fa-lg fa-fw fa-home "></i>
									Home
								<span>>
									<?php echo $Title ?>
								</span>
								<span>>
									Create <?php echo $Title ?>
								</span>
							</h1>
						</div>

					</div>



					<!-- widget grid -->
					<section id="widget-grid" class="">

						<!-- START ROW -->
						<div class="row">

							<!-- NEW COL START -->
							<article class="col-sm-12 col-md-12 col-lg-12">

								<!-- Widget ID (each widget will need unique ID)-->
								<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
									<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

									data-widget-colorbutton="false"
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true"
									data-widget-sortable="false"

									-->



										<!-- widget edit box -->
										<div class="jarviswidget-editbox">
											<!-- This area used as dropdown edit box -->

										</div>
										<!-- end widget edit box -->
					<div>
										<!-- widget content -->
									<div class="widget-body no-padding">

										<form class="smart-form" id="search-form"  action="<?php echo base_url()?>admin/job_card/search" >

												<header>
													Create <?php echo $Title?>
												</header>

												
												<fieldset>
													<div class="row" >
													
															<section class="col col-5">
															<div class="inline-group">
																
															<label class="radio">
																		<input type="radio" class="searchby" value="chassisno" name="Searchby" checked="" >
																		<i></i>CHASSIS NO</label>
															<label class="radio">
																		<input type="radio" class="searchby" value="registrationno" name="Searchby" >
																		<i></i>REGISTRATION NO</label>
															</div>
														</section>

													</div>

													<div >
														<div class="row" >
															<section class="col col-5" id="chassisnopanel">

																<label class="input"> Chassis No :
																	<input type="text" placeholder="Enter Chassis No" name="CHASSISNO" style="text-transform: uppercase;">
																</label>

															</section>

														</div>
														<div class="row" id="searchbypanel" style="display: none;">
															<section class="col col-5" id="registrationnopanel">

																<label class="input"> Registration No :
																	<input type="text" placeholder="Enter Registration No" name="REGISTRATIONNO" style="text-transform: uppercase;">
																</label>

															</section>

														</div>
														<div class="row" >
															<footer>

																<input type="submit"  class="btn btn-primary btn-small" value="Search">
															</footer>
														</div>
													</div>
												</fieldset>
											</form>


											<!-- view customer details -->
											<div class="col-12 col-sm-12">
												<table class="table table-bordered table-hover" id="show_cust_table" style="display: none;">

								                    <tbody>
								                        <tr>
								                            <td width="40%"><i class="fa fa-user fa-xs"></i> <b>CUSTOMER DETAILS</b></td>
								                        </tr>
								                          <tr>
								                            <td width="200px"><b>Chassis No</b></td>
								                            <td width="200px" class="text-Bold" id="resp_chassis_no"></td>
								                            <td width="200px"><b>Engine No</b></td>
								                            <td width="200px" class="text-Bold" id="resp_engine_no"></td>
								                        </tr>
								                        <tr>
								                            <td><b>Registration No</b></td>
								                            <td class="text-Bold" id="resp_regd_no"></td>
								                            <td><b>Model &amp; Colour</b></td>
								                            <td class="text-Bold" id="resp_model_colour"></td>
								                            <td style="display: none;" id="resp_cust_color_val"></td>
								                            <td style="display: none;" id="resp_cust_model_val"></td>
								                        </tr>
								                        <tr>
								                            <td><b>Customer Name</b></td>
								                            <td class="text-Bold" id="resp_cust_name"></td>
								                            <td><b>Address</b></td>
								                            <td class="text-Bold" id="resp_cust_address"></td>
								                        </tr>
								                        <tr>
								                            <td><b>Contact No</b></td>
								                            <td class="text-Bold" id="resp_cust_contact"></td>
								                            <td><b>N.I.C No</b></td>
								                            <td class="text-Bold" id="resp_cust_nic"></td>
								                        </tr>
								                        <tr>
								                            <td><b>City</b></td>
								                            <td class="text-Bold" id="resp_cust_city">
								                            <td style="display: none;" id="resp_cust_city_val"></td>
								                            <td style="display: none;" id="resp_cust_id"></td>
								                            <td style="display: none;" id="resp_cust_vehicle_id"></td>
								                            </td>
								                            <td><b>Purchase Date</b></td>
								                            <td class="text-Bold" id="resp_cust_purch_dt"></td>
								                        </tr>
								                        <tr>
								                        	<td colspan="4">



								                                <div class="btn-group">
								                                  <input type="button" class="btn btn-primary" name="btn_next_1" value=" Next to do ">
								                                  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
								                                  <ul class="dropdown-menu">
								                                    <li><a href="javascript:void(0);" id="edit_cust_anchor">Edit Customer Information</a></li>
								                                    <li><a href="javascript:void(0);" id="create_jc_anchor">Create Job Card</a></li>
								                                    <li class="divider"></li>
								                                    <li><a href="javascript:void(0);" onclick="LoadAjaxScreen('job_card','add_job_card')">No! Search another customer</a></li>
								                                  </ul>
								                                </div>
								                            </td>
								                        </tr>
								                    </tbody>
								                </table>
								       	    </div>
								       	    <!-- view customer details -->
								       	    <!-- add customer details -->
											<div class="col-12 col-sm-12">
												<form class="smart-form" id="add-cust-form" action="<?php echo base_url()?>admin/job_card/allsubmit" method="post" >
													<table class="table table-bordered table-hover" id="add_cust_table" style="display: none;">
									                    <tbody>
									                        <tr>
									                            <td width="40%"><i class="fa fa-user fa-xs"></i> <b>Customer Details</b></td>
									                        </tr>
									                          <tr>
									                            <td width="40%"><b>Chassis No</b></td>
									                            <td width="40%" class="text-Bold"><input type="text"  class="form-control" placeholder="Enter Chassis No" name="CHASSIS_NO" style="text-transform: uppercase;">
									                            </td>
									                            <td width="40%"><b>Engine No</b></td>
									                            <td width="40%" class="text-Bold"><input type="text" class="form-control" placeholder="Enter Engine No" name="ENGINE_NO" style="text-transform: uppercase;"></td>
									                        </tr>
									                        <tr>
									                            <td><b>Registration No</b></td>
									                            <td class="text-Bold"><input type="text" class="form-control" placeholder="Registration No"  name="REGISTRATION_NO" style="text-transform: uppercase;"></td>
									                            <td><b>Model &amp; Colour</b></td>
									                            <td class="text-Bold">
									                            	<select name="MODEL_ID"  class="form-control">
	                                    							<option value="" >Model</option>
	                                    							<?php foreach($get_models_data as $model){ ?>
									                            	<option value="<?php echo $model['ID']?>" ><?php echo $model['TITLE']?></option>
									                            	<?php }  ?>
	                                    							</select>
									                            	<select  class="form-control"  name="COLOR_ID" >
									                            	<option value="">Color</option>
									                            	<?php foreach($get_colors_data as $color){ ?>
									                            	<option value="<?php echo $color['ID']?>"><?php echo $color['TITLE']?></option>
									                            	<?php }  ?>
									                            	</select>
									                            </td>
									                        </tr>
									                        <tr>
									                            <td><b>Customer Name</b></td>
									                            <td class="text-Bold" ><input type="text" class="form-control" placeholder="Enter Customer Name" name="NAME" ></td>
									                            <td><b>Address</b></td>
									                            <td class="text-Bold" >
									                            <textarea class="form-control" rows="3"  placeholder=" Enter Address" name="ADDRESS"></textarea>
									                            </td>
									                        </tr>
									                        <tr>
									                            <td><b>Contact No</b></td>
									                            <td class="text-Bold"><input type="text"  class="form-control phone" placeholder="Enter Contact No" name="CONTACT"></td>
									                            <td><b>N.I.C No</b></td>
									                            <td class="text-Bold" ><input type="text"  class="form-control nic" placeholder="Enter NIC No" name="NIC"></td>
									                        </tr>
									                        <tr>
									                            <td><b>City</b></td>
									                            <td class="text-Bold" >
									                            	<select class="form-control js-example-basic-multiple" style="width: 335px;" name="CITY_ID"><option value="">Please select</option>
									                            		<?php
									                            	foreach($get_cities_data as $cities){
									                            		?><option value="<?php echo $cities['ID']?>"><?php echo $cities['TITLE']?></option>
									                            	<?php } ?>
									                            	</select>

									                            </td>
									                            <td><b>Purchase Date</b></td>
									                            <td class="text-Bold"><input type="text"  placeholder="Select Purchase date" name="PURCHASE_DATE" autocomplete="off" class="datepicker"></td>
									                        </tr>
									                        <tr>
									                        	<td colspan="4" align="center">
									                            	<input type="submit"  class="btn btn-primary btn-sm" value="Save Customer Info">
									                                &nbsp;&nbsp;&nbsp;
									                                <button type="button" class="btn btn-default btn-sm " id="cancel_add_save" >No Thanks</button>
									                            </td>
									                        </tr>
									                    </tbody>
									                </table>
									              </form>
								       	    </div>
								       	    <!-- add customer details -->
								       	     <!-- edit customer details -->
											<div class="col-12 col-sm-12">
												<form class="smart-form" id="edit-form" action="<?php echo base_url()?>admin/job_card/updatecustomer" method="post" >
													<table class="table table-bordered table-hover" id="edit_cust_table" style="display: none;">
														<input type="hidden"  id="edit_cust_id" name="ID">
														<input type="hidden"  id="edit_vehicle_id" name="VEHICLE_ID">
									                    <tbody>
									                        <tr>
									                            <td width="40%"><i class="fa fa-user fa-xs"></i> <b>Customer Details</b></td>
									                        </tr>
									                          <tr>
									                            <td width="40%"><b>Chassis No</b></td>
									                            <td width="40%" class="text-Bold"><input type="text" id="edit_chassis_no" class="form-control" readonly="">
									                            </td>
									                            <td width="40%"><b>Engine No</b></td>
									                            <td width="40%" class="text-Bold"><input type="text" class="form-control"  id="edit_engine_no"  readonly=""></td>
									                        </tr>
									                        <tr>
									                            <td><b>Registration No</b></td>
									                            <td class="text-Bold"><input type="text" class="form-control" id="edit_registration_no" name="REGISTRATIONNO" ></td>
									                            <td><b>Model &amp; Colour</b></td>
									                            <td class="text-Bold">
									                            	<select name="MODEL_ID" id="edit_model_no" class="form-control">
	                                    							<option value="" disabled="">Model</option>
	                                    							<?php foreach($get_models_data as $model){ ?>
									                            	<option value="<?php echo $model['ID']?>" disabled="disabled"><?php echo $model['TITLE']?></option>
									                            	<?php }  ?>
	                                    							</select>
									                            	<select  class="form-control" id="edit_color_no" name="COLOR_ID" >
									                            	<option value="" disabled="">Color</option>
									                            	<?php foreach($get_colors_data as $color){ ?>
									                            	<option value="<?php echo $color['ID']?>" disabled="disabled"><?php echo $color['TITLE']?></option>
									                            	<?php }  ?>
									                            	</select>
									                            </td>
									                        </tr>
									                        <tr>
									                            <td><b>Customer Name</b></td>
									                            <td class="text-Bold" ><input type="text" class="form-control" id="edit_cust_name" style="text-transform: uppercase;" name="NAME"></td>
									                            <td><b>Address</b></td>
									                            <td class="text-Bold" >
									                            <textarea class="form-control" rows="3" id="edit_cust_address" name="ADDRESS"></textarea>
									                            </td>
									                        </tr>
									                        <tr>
									                            <td><b>Contact No</b></td>
									                            <td class="text-Bold"><input type="text"  class="form-control phone"  id="edit_contact_no"  name="CONTACT"></td>
									                            <td><b>N.I.C No</b></td>
									                            <td class="text-Bold" ><input type="text" id="edit_nic_no"  class="form-control nic" name="NIC"></td>
									                        </tr>
									                        <tr>
									                            <td><b>City</b></td>
									                            <td class="text-Bold" >
									                            	<select class="form-control" id="edit_city" name="CITY_ID"><option value="">Please select</option>
									                            		<?php
									                            	foreach($get_cities_data as $cities){
									                            		?><option value="<?php echo $cities['ID']?>"><?php echo $cities['TITLE']?></option>
									                            	<?php } ?>
									                            	</select>

									                            </td>
									                            <td><b>Purchase Date</b></td>
									                            <td class="text-Bold"><input type="text" id="edit_cust_purch_dt"  name="PURCHASE_DATE" disabled=""></td>
									                        </tr>
									                        <tr>
									                        	<td colspan="4" align="center">
									                            	<input type="submit"  class="btn btn-primary btn-sm" value="Save Customer Info">
									                                &nbsp;&nbsp;&nbsp;
									                                <button type="button" class="btn btn-default btn-sm " id="cancel_save_action">No Thanks</button>
									                            </td>
									                        </tr>
									                    </tbody>
									                </table>
									              </form>
								       	    </div>
								       	    <!-- edit customer details -->
								       	    <!--  add new job -->
								        <form action="<?php echo base_url()?>admin/job_card/submit" id="add-form" method="POST">
											<div class="col-12 col-sm-12" style="display: none;" id="jobcardtypepanel">
												<div class="panel-group smart-accordion-default" id="accordion-2">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-1"> <i class="fa fa-fw fa-plus-circle txt-color-blue"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> JOB CARD</a></h4>
														</div>
														<div id="collapseOne-1" class="panel-collapse collapse in">
															<div class="panel-body">
																	<table class="table table-bordered table-hover" id="add_job_table" style="display: none;">

										                    <tbody>
										                        <tr>
										                            <td width="40%"><i class="fa fa-user fa-xs"></i> <b>Job Card</b></td>
										                        </tr>
										                          <tr>
										                            <td width="40%"><b>Job Status</b></td>
										                            <td width="40%" class="text-Bold">OPEN</td>
										                            <td width="40%"><b>Job Opening Date</b></td>
										                            <td width="40%" class="text-Bold"><?php echo  date('D , d-M-Y  h:i:s') ?>
										                            	<input type="hidden" name="OPENING_DATE" value="<?php echo  date('d-M-Y  h.i.s') ?>">
										                            </td>
										                        </tr>
										                        <tr>
										                            <td><b>KM Reading</b></td>
										                            <td class="text-Bold"><input type="text" class="form-control" id="KM_READING" style="width: 80px;" name="KM_READING"></td>
										                            <td><b>Job Ref Number</b></td>
										                            <td class="text-Bold">
										                            	<input type="text" class="form-control" id="REF_NUMBER" style="width: 100px;" value="<?php echo $get_job_ref_id?>" name="REF_NUMBER" readonly="" >
										                            </td>
										                        </tr>
										                        <tr>
										                            <td><b>Visit type</b></td>
										                            <td class="text-Bold" ><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="check_visit" data-target="#myModal">
																	Select
																	</button> <span id="showselectedvisitradio"> </span></td>
																	<input type="hidden" id="visit_type_id" name="VISIT_TYPE_ID">
										                            <td><b>Dealership</b></td>
										                            <td class="text-Bold" ><?php echo ucfirst($get_login_data->USER_NAME)?></td>
										                            <input type="hidden" name="DEALER_ID" value="<?php echo $get_login_data->ID?>">

										                            <input type="hidden" name="CUSTOMER_ID" id="customer_id">
										                            <input type="hidden" name="CUSTOMER_VEHICLE_ID" id="vehicle_id">
										                        </tr>
										                        <tr>
										                            <td><b>Staff Assigned</b></td>
										                            <td class="text-Bold"><select class="js-example-basic-multiple" name="STAFF_ASSIGNED[]" style="width: 290px;" multiple="multiple" placeholder="Please select" >
										                            	<?php foreach($get_staff_data as $staff){ ?>
																	  <option value="<?php echo $staff['ID']?>"><?php echo $staff['NAME']?></option>
																	<?php }  ?>
																	</select></td>
										                        </tr>
										                    </tbody>
										                </table>
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-blue"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Services </a></h4>
														</div>
														<div id="collapseTwo-1" class="panel-collapse collapse">
															<div class="panel-body">
																<table class="table table-hover">
												                    <thead>
												                    	<tr>
												                        	<th style="width:5%">SR</th>
												                            <th style="width:65%">Services</th>
												                            <th style="width:10%">Charges</th>
												                            <th style="width:20%">&nbsp;</th>
												                        </tr>
												                    </thead>
												                    <tbody>
												                    	<?php
												                    		$i=1;
												                    	foreach($get_services_data as $service){ ?>
												                          <tr>
												                        	<td><?php echo $i?></td>
												                            <td>
												                           <input type="hidden" name="SERVICE_ID[]" id="service_id_<?php echo $service['ID']?>">
												                           <input type="hidden" name="SERVICE_NAME[]" id="service_name_<?php echo $service['ID']?>">
												                           <label class="checkbox">
																		<input type="checkbox" value="<?php echo $service['ID']?>" data-title="<?php echo $service['TITLE'];?>" data-charges="<?php echo $service['CHARGES'];?>" name="SERVICECHECKBOX[]" >
																		<i></i><?php echo $service['TITLE']?></label></td>
												                            <td><input type="text"  name="SERVICE_CHARGES[]"  data-id="<?php echo $service['ID']?>"  data-title="<?php echo $service['TITLE']?>" class="form-control" style="width:95%;text-align:right;" value="<?php echo $service['CHARGES']?>"></td>
												                            <td>&nbsp;</td>
												                      	  </tr>
												                      	<?php $i++;
												                      	 	}  ?>
												                          <tr>
												                            <td><?php echo $i?></td>
												                            <td>
												                            <input type="hidden" name="SERVICE_ID[]" value="<?php echo $get_others_services_row->ID?>">
												                            <input type="text" name="SERVICE_NAME[]"  class="form-control input-small" style="width:95%" placeholder="Example: Tuning..."></td>
												                            <td><input type="text"name="SERVICE_CHARGES[]" data-id="0"  class="form-control" style="width:95%;text-align:right;"></td>
												                            <td>&nbsp;</td>
												                          </tr>
												                          <tr>
												                            <td><?php echo $i+1?></td>
												                            <td>
												                            <input type="hidden" name="SERVICE_ID[]" value="<?php echo $get_others_services_row->ID?>">
												                            <input type="text" name="SERVICE_NAME[]" data-id="0"  class="form-control" style="width:95%" placeholder="Example: Washing..."></td>
												                            <td><input type="text" name="SERVICE_CHARGES[]" data-id="0" class="form-control input-small" style="width:95%;text-align:right;"></td>
												                            <td>&nbsp;</td>
												                          </tr>
												                          <tr>
												                            <td><?php echo $i+2?></td>
												                            <td>
												                            <input type="hidden" name="SERVICE_ID[]" value="<?php echo $get_others_services_row->ID?>">
												                            <input type="text" name="SERVICE_NAME[]" class="form-control" style="width:95%"></td>
												                            <td><input type="text"  name="SERVICE_CHARGES[]" class="form-control input-small" style="width:95%;text-align:right;"></td>
												                            <td>&nbsp;</td>
												                          </tr>
												                          <tr>
												                            <td><?php echo $i+3?></td>
												                            <td>
												                            <input type="hidden" name="SERVICE_ID[]" value="<?php echo $get_others_services_row->ID?>">
												                            <input type="text" name="SERVICE_NAME[]"  class="form-control" style="width:95%"></td>
												                            <td><input type="text"  name="SERVICE_CHARGES[]"  class="form-control" style="width:95%;text-align:right;"></td>
												                            <td>&nbsp;</td>
												                   		  </tr>
												                    </tbody>
												                </table>
															</div>
														</div>
													</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseThree-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-blue"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Parts & Accessories</a></h4>
		</div>
		<div id="collapseThree-1" class="panel-collapse collapse">
			<div class="panel-body">
				<table class="table table-hover">
                    <thead>
                    	<tr>
                        	<th style="width:5%">SR</th>
                            <th style="width:65%">Parts</th>
                            <th style="width:10%">Charges</th>
                            <th style="width:20%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		$i=1;
                    	foreach($get_accessories_data as $accessories){ ?>
                          <tr>
                        	<td><?php echo $i?></td>
                            <td>
                             <input type="hidden" name="ACCESSORIES_ID[]"  id="acc_id_<?php echo $accessories['ID']?>" >
                            <input type="hidden" name="ACCESSORIES_NAME[]" id="acc_name_<?php echo $accessories['ID']?>">
                           <?php echo $accessories['TITLE']?></td>
                            <td><input type="text"  name="ACCESSORIES_CHARGES[]"
                            	 data-id="<?php echo $accessories['ID']?>" data-title="<?php echo $accessories['TITLE']?>" class="form-control" style="width:95%;text-align:right;" value="<?php echo $accessories['CHARGES']?>"></td>
                            <td>&nbsp;</td>
                      	  </tr>
                      	<?php $i++;
                      	 	}  ?>
                          <tr>
                            <td><?php echo $i?></td>
                            <td>
                            <input type="hidden" name="ACCESSORIES_ID[]" value="<?php echo $get_others_accessories_row->ID?>">
                            <input type="text" name="ACCESSORIES_NAME[]"  class="form-control input-small" style="width:95%" placeholder="Example: Engine Oil..."></td>
                            <td><input type="text" name="ACCESSORIES_CHARGES[]"  class="form-control" style="width:95%;text-align:right;"></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><?php echo $i+1?></td>
                            <td>
                             <input type="hidden" name="ACCESSORIES_ID[]" value="<?php echo $get_others_accessories_row->ID?>">
                            <input type="text" name="ACCESSORIES_NAME[]" class="form-control" style="width:95%" placeholder="Example: Air Filter..."></td>
                            <td><input type="text"  name="ACCESSORIES_CHARGES[]" class="form-control input-small" style="width:95%;text-align:right;"></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><?php echo $i+2?></td>
                            <td>
                             <input type="hidden" name="ACCESSORIES_ID[]" value="<?php echo $get_others_accessories_row->ID?>">
                            <input type="text" name="ACCESSORIES_NAME[]" class="form-control" style="width:95%"></td>
                            <td><input type="text" name="ACCESSORIES_CHARGES[]" class="form-control input-small" style="width:95%;text-align:right;"></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><?php echo $i+3?></td>
                            <td>
                             <input type="hidden" name="ACCESSORIES_ID[]" value="<?php echo $get_others_accessories_row->ID?>">
                            <input type="text" name="ACCESSORIES_NAME[]"  class="form-control" style="width:95%"></td>
                            <td><input type="text"  name="ACCESSORIES_CHARGES[]"  class="form-control" style="width:95%;text-align:right;"></td>
                            <td>&nbsp;</td>
                   		  </tr>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseFour-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-blue"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Total & Discount</a></h4>
														</div>
														<div id="collapseFour-1" class="panel-collapse collapse">
															<div class="panel-body">
															<table class="table table-hover">
												                    <thead>
												                    	<tr>
												                        	<th style="width:5%">SR</th>
												                            <th style="width:65%">Description</th>
												                            <th style="width:10%">Charges</th>
												                            <th style="width:20%">&nbsp;</th>
												                        </tr>
												                    </thead>
												                    <tbody>

												                          <tr>
												                            <td>1</td>
												                            <td>Sub Total - Services</td>
												                            <td><input type="text" name="TOTAL_SERVICES" id="total_services" value="0" class="form-control" readonly=""   style="width:95%;text-align:right;"></td>
												                            <td>&nbsp;</td>
												                          </tr>
												                          <tr>
												                            <td>2</td>
												                            <td>Sub Total - Parts</td>
												                            <td><input type="text" name="TOTAL_ACCESSORIES" class="form-control" id="total_accessories" readonly="" value="0" style="width:95%;text-align:right;"></td>
												                            <td>&nbsp;</td>
												                          </tr>
												                          <tr>
												                            <td>3</td>
												                            <td>Discount</td>
												                            <td><input type="text" min="0" name="DISCOUNT"id="discount_change"  value="0" class="form-control" style="width:95%;text-align:right;"></td>
												                            <td>&nbsp;</td>
												                          </tr>
												                          <tr>
												                            <td>4</td>
												                            <td>Grand Total</td>
												                            <td><input type="text" id="grand_total" name="GRAND_TOTAL" class="form-control" style="width:95%;text-align:right;" readonly="" value="0">

												                            </td>
												                            <td>&nbsp;</td>
												                   		  </tr>
												                          <tr>
												                            <td colspan="4" align="center">
												                            	<input type="submit"  value="Save Job Card" class="btn btn-primary btn-small">
												                                &nbsp;&nbsp;&nbsp;
												                                <button type="button" id="jobreset" class="btn btn-default btn-small">Reset</button>
												                            </td>
												                   		  </tr>

												                    </tbody>
												                </table>
															</div>
														</div>
													</div>
												</div>
								       	    </div>
								       	</form>
								       	    <!-- add new job-->

								       	    <!-- Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;
														</button>
														<h4 class="modal-title" id="myModalLabel">Select Purpose of Visit</h4>
													</div>
													<div class="modal-body">
													<div class="smart-form">
														<div class="row">
															<div class="col-md-12" id="showvisitexist">
															</div>
														</div>
													</div>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">
															Cancel
														</button>
														<button type="button" id="visit_radio_submit" class="btn btn-primary" data-dismiss="modal">
															Confirm
														</button>
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->


									</div>
									<!-- end widget content -->



										<br> &nbsp;
</div>
									<!-- end widget div -->

								</div>
								<!-- end widget -->

							</article>
							<!-- END COL -->

						</div>

						<!-- END ROW -->



					</section>
					<!-- end widget grid -->


				</div>
				<!-- END MAIN CONTENT -->
				<script type="text/javascript">
					 $("#edit_cust_name").keypress(function(event){
				        var inputValue = event.which;

				        // allow letters and whitespaces only.
				        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
				            event.preventDefault(); 
				        }
				    }) 
					 
					 $("input[type='checkbox'][name^='SERVICECHECKBOX']").click(function(){
		   				var id=$(this).val();
		   				var servicename=$(this).data('title');
		   				var charges=$(this).data('charges');
		   				$('#service_name_'+id).val(servicename);
		   				var ser=$('#service_name_'+id).val();
		   				


					});
					
				</script>
