		<!-- MAIN CONTENT -->
				<div id="content">

					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
							<h1 class="page-title txt-color-blueDark">
								<i class="fa fa-fw fa-edit"></i> 
									Users
								<span>> 
									<?php echo $Title ?>
								</span>
								<span>> 
									Add <?php echo $Title ?> 
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
					
	
					<!-- widget div-->
					<div>
	
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
	
						</div>
						<!-- end widget edit box -->
	
						<!-- widget content -->
						<div class="widget-body no-padding">
	
							<form class="smart-form" id="add-form"  action="<?php echo base_url()?>admin/staff/submit" >
							
								<header>
									Add <?php echo $Title?>
								</header>
	
								<fieldset>
									<?php  if($this->session->userdata('USER_ROLE')=='Admin'){ ?> 
									<div class="row">
										<section class="col col-10">
											<label class="input"> Dealer Name :
											<select class="form-control js-example-basic-multiple" name="DEALER_ID" >
												<option value="">&nbsp;Please Select</option>
											  <?php   foreach($get_dealers_data as $dealers){ ?>
											 	 <option value="<?php echo $dealers['ID']?>">    <?php echo $dealers['USER_NAME'].'  - '.$dealers['NAME']?></option>
											  <?php } ?>

											</select>
											</label>
										</section>
									</div>
								<?php } ?>
									<div class="row">
										<section class="col col-5">
											
											<label class="input"> Staff Name :
												<input type="text" class="form-control" placeholder="Enter Staff Name" style="text-transform: uppercase;" name="NAME">
											</label>
										</section>
										<section class="col col-5">
											
											<label class="input"> Status :
												<select class="form-control" style="text-transform: uppercase;" name="STATUS" >
													 <option value="1">Active</option>
													 <option value="0">In-Active</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-5">
											<label class="input"> Education :
												<select class="form-control" style="text-transform: uppercase;" name="EDUCATION_ID" >
													<option value="">Please Select</option>
													<?php foreach($get_education_data as $education){ ?>
													  <option value="<?php echo $education['ID']?>"> <?php echo $education['TITLE']?></option>
													<?php } ?>
												</select>
										</section>

										<section class="col col-5">
											
											<label class="input"> NIC :
												<input type="text" class="form-control nic"  name="NIC" style="text-transform: uppercase;" placeholder="Enter NIC No">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-5">
											
											<label class="input"> Designation :
												<select name="DESIGNATION"  style="text-transform: uppercase;"  class="form-control">
                                                            <option value="">Please Select</option>
                                                            <option value="Technician">Technician</option>
                                                            <option value="Helper">Helper</option>
                                                            <option value="Service Advisor">Service Advisor</option>
                                                            <option value="Parts Staff">Parts Staff</option>
                                                            <option value="Sales Staff">Sales Staff</option>
                                                            <option value="Administrative Staff">Administrative Staff</option>
                                                        </select>
											</label>
										</section>

										<section class="col col-5">
											
											<label class="input"> Contact Number :
												<input type="text" class="form-control phone" style="text-transform: uppercase;"   placeholder="Enter Contact Number" name="CONTACT">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-5">
											
											<label class="input"> Age(in years) :
												<input type="text"  style="text-transform: uppercase;"  class="form-control" placeholder="Enter Age" name="AGE">
											</label>
										</section>

										<section class="col col-5">
											
											<label class="input"> DOB :
												<input type="text" style="text-transform: uppercase;"  autocomplete="off" class="form-control datepicker"  placeholder="Enter Date of Birth" name="DOB">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-5">
											
											<label class="input"> Exerience(in years) :
												<input type="text"  style="text-transform: uppercase;"   class="form-control" placeholder="Enter Experience" name="EXP">
											</label>
										</section>

										<section class="col col-5">
											
											<label class="input"> Remarks :
												<textarea class="form-control" style="text-transform: uppercase;"  name="REMARKS"  rows="5" placeholder="   Enter Remarks"></textarea>
											</label>
										</section>
									</div>

									<h5>
									Training & Skills
									</h5>
								<br>
									<div class="row">
										<section class="col col-12">
											
											<label class="label">Trainings Accomplished : </label>
													<?php foreach($get_training_data as $training){ ?>
													<div class="col-md-12">
														
														<label class="checkbox">
															<input type="checkbox" style="text-transform: uppercase;"  data-id="<?php echo $training['ID']?>" value="<?php echo $training['ID']?>"  name="TRAINING[]" >
															<i></i><?php echo $training['TITLE']?></label>
														
													</div>
													<div id="trainingdetailspanel-<?php echo $training['ID']?>" style="display: none;" >
													<div class="row">
													<section class="col col-3">
													<label class="label">Start Date: 
																<input type="text" style="text-transform: uppercase;"  class="form-control datepicker" autocomplete="off" name="START_DATE[]">
																</label>
															</section>
													<section class="col col-3">
													<label class="label">End Date: 
																<input type="text"  style="text-transform: uppercase;" class="form-control datepicker" autocomplete="off" name="END_DATE[]">
													</label>
													</section>
													<section class="col col-4">
													<label class="label">Certificate Issued: 
														<select class="form-control"  data-id="<?php echo $training['ID'];?>" style="text-transform: uppercase;"  name="CERTIFICATE_ISSUE[]">
															<option value="0">No</option>
															<option value="1">Yes</option>
														</select>
													</label>
													</section>
													<section class="col col-2" id="showcertificatenumber-<?php echo $training['ID'];?>" style="display: none;">
													<label class="label">Certificate No: 
														<input type="text" name="CERTIFICATE_NO[]" class="form-control">
													</label>
													</section>
													</div>
													</div>
													<?php }  ?>
										</section>
									</div>
									<div class="row">
										<section class="col col-12">
											<label class="label">Skills : </label>
													<div class="inline-group">
														<?php foreach($get_skills_data as $skill){ ?>
														<label class="checkbox">
															<input type="checkbox"  style="text-transform: uppercase;" value="<?php echo $skill['ID']?>" name="SKILLS[]" >
															<i></i><?php echo $skill['TITLE']?></label>
														<?php }  ?>
													</div>
										</section>
									</div>
									<h5>
									Employment Track (Start with Recent first)
									</h5>
								<br>

									<div class="row">
										<section class="col col-6">
											<label class="input"> Workshop/Dealership
												<input type="text" style="text-transform: uppercase;"  name="WORKSHOP[]" placeholder="Enter Workshop/Dealership">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-2">
											<label class="input">Start Date
												<input type="text"  style="text-transform: uppercase;" name="FROM_DATE[]" placeholder="Select Start Date" autocomplete="off"  class="datepicker">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">End Date
												<input type="text"  style="text-transform: uppercase;" name="TO_DATE[]" placeholder="Select End Date" autocomplete="off"  class="datepicker">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">Salary
												<input type="text"  style="text-transform: uppercase;" name="SALARY[]" placeholder="Enter Salary">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">Commission
												<input type="text"  style="text-transform: uppercase;" name="COMMISSION[]" placeholder="Enter Commission">
											</label>
										</section>
										<section class="col col-2">
											<div class="inline-group">
												<label class="checkbox"><input type="checkbox" name="CONTRACT[]" style="text-transform: uppercase;"  value="1"><i></i>Contract</label>
												
											</div>
										</section>
									</div>
									<div id="rowtrackpanel"></div>
									<div class="row">
										<section class="col col-3">
											<button type="button" style="height: 34px;width: 86px;" class="btn btn-danger" id="addtrackrow">
										+ Add Rows
									</button>

										</section>
									</div>
								</fieldset>
								<footer>
									<input type="submit"  class="btn btn-primary" value="Submit">
									<button type="button" class="btn btn-default" onclick="LoadAjaxScreen('staff','view_staff')">
										Back
									</button>
								</footer>
							</form>
	
						</div>
						<!-- end widget content -->
	
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
				