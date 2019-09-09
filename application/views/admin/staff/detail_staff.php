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
									View <?php echo $Title ?> Detail
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
					
											<form class="smart-form" id="edit-form" action="<?php echo base_url()?>admin/staff/update" method="post" >
												<header>
													Edit <?php echo $Title ?>
												</header>
					
												<fieldset>
												<?php  if($this->session->userdata('USER_ROLE')=='Admin'){ ?> 
													<div class="row">
														<section class="col col-10">
														
															<label class="input"> Dealer Name :
															<select class="form-control js-example-basic-multiple" disabled="" name="DEALER_ID" >
																<option value="">&nbsp;Please Select</option>
															  <?php foreach($get_dealers_data as $dealers){ ?>
															 	 <option <?php echo ($dealers['ID']==$get_data_row->DEALER_ID ? 'selected="selected"' : '')?>  value="<?php echo $dealers['ID']?>">    <?php echo $dealers['NAME'].'  - '.$dealers['TITLE']?></option>
															  <?php } ?>

															</select>
															</label>
														</section>
													</div>
												<?php } ?>
													<div class="row">
														<section class="col col-5">
															<label class="input"> Staff Name :
																<input type="text" placeholder="Enter Staff Name" readonly name="NAME" value="<?php echo $get_data_row->NAME?>">
															</label>
														</section>
														<section class="col col-5">
															
															<label class="input"> Status :
																<select class="form-control" disabled="" name="STATUS" >
																	 <option <?php echo ($get_data_row->STATUS==1 ? 'selected' : '')?>  value="1">Active</option>
																	 <option <?php echo ($get_data_row->STATUS==0 ? 'selected' : '')?>  value="0">In-Active</option>
																</select>
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Education :
																<select class="form-control" disabled="" name="EDUCATION_ID" >
																	<option value="">Please Select</option>
																	<?php foreach($get_education_data as $education){ ?>
																	  <option <?php echo ($get_data_row->EDUCATION_ID==$education['ID'] ? 'selected' : '')?> value="<?php echo $education['ID']?>"> <?php echo $education['TITLE']?></option>
																	<?php } ?>
																</select>
														</section>

														<section class="col col-5">
															
															<label class="input"> NIC :
																<input type="text" readonly="" name="NIC" placeholder="Enter NIC No" value="<?php echo $get_data_row->NIC?>">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Designation :
																<input type="text" readonly="" placeholder="Enter Designation" name="DESIGNATION" value="<?php echo $get_data_row->DESIGNATION?>">
															</label>
														</section>

														<section class="col col-5">
															
															<label class="input"> Contact Number :
																<input type="text" readonly=""  placeholder="Enter Contact Number" name="CONTACT" value="<?php echo $get_data_row->CONTACT?>">
															</label>
														</section>
													</div>

											<div class="row">
												<section class="col col-5">
													
													<label class="input"> Age(in years) :
														<input type="text" readonly=""  class="form-control" placeholder="Enter Age" value="<?php echo $get_data_row->AGE?>" name="AGE">
													</label>
												</section>

												<section class="col col-5">
													
													<label class="input"> DOB :
														<input type="text" disabled="" class="form-control datepicker" value="<?php echo $get_data_row->DOB?>" placeholder="Enter Date of Birth" name="DOB">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-5">
													
													<label class="input"> Exerience(in years) :
														<input type="text" readonly="" value="<?php echo $get_data_row->EXPERIENCE?>"  class="form-control" placeholder="Enter Experience" name="EXP">
													</label>
												</section>

												<section class="col col-5">
													
													<label class="input"> Remarks :
														<textarea class="form-control" name="REMARKS" readonly=""  rows="5" placeholder="    Enter Remarks"><?php echo $get_data_row->REMARKS?></textarea>
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
													<?php if(!empty($detail_staff_training_data)){ foreach($detail_staff_training_data as $training){ ?>
													<div class="col-md-12">
														<label class="checkbox">
															<input type="checkbox" checked="" disabled="" value="<?php echo $training['ID']?>"  name="TRAINING[]" >
																	<i></i><?php echo $training['TITLE']?></label>
													</div>
													<div class="row">
													<section class="col col-4">
													<label class="label">Start Date: 
																<input type="text" readonly="" class="form-control datepicker" autocomplete="off" name="START_DATE[]" value="<?php echo $training['START_DATE']?>">
																</label>
															</section>
													<section class="col col-4">
													<label class="label">End Date: 
																<input type="text" class="form-control datepicker" autocomplete="off" readonly="" name="END_DATE[]" value="<?php echo $training['DATE_TO']?>">
													</label>
													</section>
													<section class="col col-4">
													<label class="label">Certificate Issued: 
														<select class="form-control" name="CERTIFICATE_ISSUE[]" readonly="">
															<option <?php echo ($training['CERTIFICATE_ISSUE']=='1' ? 'selected' : '')?>  value="0">No</option>
															<option <?php echo ($training['CERTIFICATE_ISSUE']=='0' ? 'selected' : '')?>  value="1">Yes</option>
														</select>
													</label>
													</section>
													</div>
														<?php
														}  
														}
														else{

															echo 'No Trainings Selected';
														}
													 ?>
										</section>
									</div>
									<div class="row">
										<section class="col col-12">
											<label class="label">Skills : </label>
													<div class="inline-group">
														<?php if(!empty($detail_skills_data)){ foreach($detail_skills_data as $skill){ ?>
														<label class="checkbox">
															<input type="checkbox" value="<?php echo $skill['ID']?>" checked  name="SKILLS[]" >
															<i></i><?php echo $skill['TITLE']?></label>
														<?php } } else{   ?>
															No Skills Selected
														<?php }  ?>
													</div>
										</section>
									</div>
									<h5>
									Employment Track (Start with Recent first)
									</h5>
								<br>
									<?php  if(count($get_staff_employment_track) > 0){ 
									foreach($get_staff_employment_track as $track){ ?>
									<div class="row">
										<section class="col col-6">
											<label class="input"> Workshop/Dealership
												<input type="text" name="WORKSHOP[]" readonly="" placeholder="Enter Workshop/Dealership" value="<?php echo $track['WORKSHOP']?>">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-2">
											<label class="input">Start Date
												<input type="text" disabled="" name="FROM_DATE[]" placeholder="Select Start Date" class="datepicker" value="<?php echo $track['FROM_DATE']?>">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">End Date
												<input type="text" disabled="" name="TO_DATE[]" placeholder="Select End Date" class="datepicker" value="<?php echo $track['TO_DATE']?>">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">Salary
												<input type="text" disabled="" name="SALARY[]" placeholder="Enter Salary" value="<?php echo $track['SALARY']?>">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">Commission
												<input type="text" readonly="" name="COMMISSION[]" placeholder="Enter Commission" value="<?php echo $track['COMMISSION']?>">
											</label>
										</section>
										<section class="col col-2">
											<div class="inline-group">
												<label class="checkbox"><input type="checkbox" name="CONTRACT[]" disabled="" <?php echo ($track['IS_CONTRACT']==1 ? 'checked': '') ?> value="1"><i></i>Contract</label>
												
											</div>
										</section>
									</div>
									<?php }
								}else{
									echo 'No Employment Track Record';
								}
									 ?>
									 <br>
									<div id="rowtrackpanel"></div>
												</fieldset>
												<footer>
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
				