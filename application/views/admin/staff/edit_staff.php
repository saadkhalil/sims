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
									Edit <?php echo $Title ?>
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
															<select class="form-control js-example-basic-multiple" name="DEALER_ID" >
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
																<input type="text" placeholder="Enter Staff Name" style="text-transform: uppercase;" name="NAME" value="<?php echo $get_data_row->NAME?>">
															</label>
														</section>
														<section class="col col-5">
															
															<label class="input"> Status :
																<select class="form-control" style="text-transform: uppercase;" name="STATUS" >
																	 <option <?php echo ($get_data_row->STATUS==1 ? 'selected' : '')?>  value="1">Active</option>
																	 <option <?php echo ($get_data_row->STATUS==0 ? 'selected' : '')?>  value="0">In-Active</option>
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
																	  <option <?php echo ($get_data_row->EDUCATION_ID==$education['ID'] ? 'selected' : '')?> value="<?php echo $education['ID']?>"> <?php echo $education['TITLE']?></option>
																	<?php } ?>
																</select>
														</section>

														<section class="col col-5">
															
															<label class="input"> NIC :
																<input type="text" style="text-transform: uppercase;" name="NIC" placeholder="Enter NIC No" value="<?php echo $get_data_row->NIC?>">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															
														<label class="input"> Designation :
<select name="DESIGNATION"  class="form-control" style="text-transform: uppercase;">
<option value="">Please Select</option>
<option <?php echo ($get_data_row->DESIGNATION=='TECHNICIAN' ? 'selected' : ''); ?> value="TECHNICIAN">TECHNICIAN</option>
<option <?php echo ($get_data_row->DESIGNATION=='HELPER' ? 'selected' : ''); ?> value="HELPER">HELPER</option>
<option <?php echo ($get_data_row->DESIGNATION=='SERVICE ADVISOR' ? 'selected' : ''); ?> value="SERVICE ADVISOR">SERVICE ADVISOR</option>
<option <?php echo ($get_data_row->DESIGNATION=='PARTS STAFF' ? 'selected' : ''); ?> value="PARTS STAFF">PARTS STAFF</option>
<option <?php echo ($get_data_row->DESIGNATION=='SALES STAFF' ? 'selected' : ''); ?> value="SALES STAFF">SALES STAFF</option>
<option <?php echo ($get_data_row->DESIGNATION=='ADMINISTRATIVE STAFF' ? 'selected' : ''); ?> value="ADMINISTRATIVE STAFF">ADMINISTRATIVE STAFF</option>
</select>
														</label>
														</section>

														<section class="col col-5">
															
															<label class="input"> Contact Number :
																<input type="text" placeholder="Enter Contact Number" style="text-transform: uppercase;" name="CONTACT" value="<?php echo $get_data_row->CONTACT?>">
															</label>
														</section>
													</div>

											<div class="row">
												<section class="col col-5">
													
													<label class="input"> Age(in years) :
														<input type="text"  class="form-control" style="text-transform: uppercase;" placeholder="Enter Age" value="<?php echo $get_data_row->AGE?>" name="AGE">
													</label>
												</section>

												<section class="col col-5">
													
													<label class="input"> DOB :
														<input type="text" class="form-control datepicker" style="text-transform: uppercase;" value="<?php echo $get_data_row->DOB?>" placeholder="Enter Date of Birth" name="DOB">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-5">
													
													<label class="input"> Exerience(in years) :
														<input type="text" value="<?php echo $get_data_row->EXPERIENCE?>"  style="text-transform: uppercase;" class="form-control" placeholder="Enter Experience" name="EXP">
													</label>
												</section>

												<section class="col col-5">
													
													<label class="input"> Remarks :
														<textarea class="form-control" name="REMARKS" style="text-transform: uppercase;"   rows="5" placeholder="   Enter Remarks"><?php echo $get_data_row->REMARKS?></textarea>
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
													<?php foreach($get_training_data as $training){
														$sql ="SELECT * FROM STAFF_TRAINING WHERE STAFF_ID=".$get_data_row->ID."AND TRAINING_ID=".$training['ID'];
														$query = $this->db->query($sql); 
														$result=$query->row();
													 ?>
													<div class="col-md-12">

														
														<label class="checkbox">
															<?php if(!empty($result)){ ?>
															<input type="checkbox" data-id="<?php echo $training['ID']?>" <?php echo ($training['ID']==$result->TRAINING_ID ? 'checked' : '')?> value="<?php echo $training['ID']?>"  name="TRAINING[]" >
																	<i></i><?php echo $training['TITLE']?></label>
													</div>
													<div id="trainingdetailspanel-<?php echo $training['ID']?>" >
													<div class="row">
													<section class="col col-3">
													<label class="label">Start Date: 
																<input type="text" style="text-transform: uppercase;" class="form-control datepicker" autocomplete="off" name="START_DATE[]" value="<?php echo $result->START_DATE?>">
																</label>
															</section>
													<section class="col col-3">
													<label class="label">End Date: 
																<input type="text"  style="text-transform: uppercase;" class="form-control datepicker" autocomplete="off" name="END_DATE[]" value="<?php echo $result->DATE_TO?>">
													</label>
													</section>
													<section class="col col-4">
													<label class="label">Certificate Issued: 
														<select class="form-control" style="text-transform: uppercase;"data-id="<?php echo $training['ID'];?>" name="CERTIFICATE_ISSUE[]">
															<option <?php echo ($result->CERTIFICATE_ISSUE=='0' ? 'selected' : '')?>  value="0">No</option>
															<option <?php echo ($result->CERTIFICATE_ISSUE=='1' ? 'selected' : '')?>  value="1">Yes</option>
														</select>
													</label>
													</section>
													<?php if($result->CERTIFICATE_ISSUE==1){ ?>
														<section class="col col-2" id="showcertificatenumber-<?php echo $training['ID'];?>" >
														<label class="label">Certificate No.: 
															<input type="text" style="text-transform: uppercase;" class="form-control" value="<?php echo $result->CERTIFICATE_NO;?>" name="CERTIFICATE_NO[]">
														</label>
														</section>
													<?php }else{  ?>
														<section class="col col-2" id="showcertificatenumber-<?php echo $training['ID'];?>" style="display: none;">
														<label class="label">Certificate No.: 
															<input type="text" class="form-control" style="text-transform: uppercase;"  name="CERTIFICATE_NO[]">
														</label>
														</section>
													<?php } ?>
													</div>



													</div>
														<?php } else{ ?>
															<input type="checkbox" data-id="<?php echo $training['ID']?>" value="<?php echo $training['ID']?>"  name="TRAINING[]" >
																	<i></i><?php echo $training['TITLE']?></label>
													</div>
													<div id="trainingdetailspanel-<?php echo $training['ID']?>"  style="display: none;">
													<div class="row">
														<section class="col col-3">
														<label class="label">Start Date: 
															<input type="text" class="form-control datepicker" autocomplete="off" id="startdate-<?php echo $training['ID']?>" name="START_DATE[]" id="startdate-<?php echo $training['ID']?>" value=""> 
														</label>
														</section>	
														<section class="col col-3">
														<label class="label">End Date: 
															<input type="text" autocomplete="off" class="form-control datepicker" id="enddate-<?php echo $training['ID']?>" name="END_DATE[]"> 
														</label>
														</section>
														<section class="col col-4">
														<label class="label">Certificate issued: 
															<select class="form-control" name="CERTIFICATE_ISSUE[]" data-id="<?php echo $training['ID']?>" id="certificate-<?php echo $training['ID']?>">
																	<option value="0">No</option>
																	<option value="1">Yes</option>
																</select>
														</label>
														</section>	
														<section class="col col-2" id="showcertificatenumber-<?php echo $training['ID'];?>" style="display: none;">
														<label class="label">Certificate No.: 
															<input type="text" class="form-control" name="CERTIFICATE_NO[]">
														</label>
														</section>	
													</div>
													</div>

														<?php  } ?>
													
													<?php }  ?>
										</section>
									</div>
									<div class="row">
										<section class="col col-12">
											<label class="label">Skills : </label>
													<div class="inline-group">
														<?php foreach($get_skills_data as $skill){ ?>
														<label class="checkbox">
															<input type="checkbox" value="<?php echo $skill['ID']?>" <?php echo (in_array($skill['ID'], $stfskillarr) ? 'checked' : '')?> name="SKILLS[]" >
															<i></i><?php echo $skill['TITLE']?></label>
														<?php }  ?>
													</div>
										</section>
									</div>
									<h5>
									Employment Track (Start with Recent first)
									</h5>
								<br>
									<?php  foreach($get_staff_employment_track as $track){ ?>
									<div class="row">
										<section class="col col-6">
											<label class="input"> Workshop/Dealership
												<input type="text" style="text-transform: uppercase;" name="WORKSHOP[]" placeholder="Enter Workshop/Dealership" value="<?php echo $track['WORKSHOP']?>">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-2">
											<label class="input">Start Date
												<input type="text" style="text-transform: uppercase;" name="FROM_DATE[]" placeholder="Select Start Date" class="datepicker" value="<?php echo $track['FROM_DATE']?>">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">End Date
												<input type="text" style="text-transform: uppercase;" name="TO_DATE[]" placeholder="Select End Date" class="datepicker" value="<?php echo $track['TO_DATE']?>">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">Salary
												<input type="text" style="text-transform: uppercase;" name="SALARY[]" placeholder="Enter Salary" value="<?php echo $track['SALARY']?>">
											</label>
										</section>
										<section class="col col-2">
											<label class="input">Commission
												<input type="text" name="COMMISSION[]" placeholder="Enter Commission" value="<?php echo $track['COMMISSION']?>">
											</label>
										</section>
										<section class="col col-2">
											<div class="inline-group">
												<label class="checkbox"><input type="checkbox" name="CONTRACT[]" <?php echo ($track['IS_CONTRACT']==1 ? 'checked': '') ?> value="1"><i></i>Contract</label>
												
											</div>
										</section>
									</div>
									<?php } ?>
									<div id="rowtrackpanel"></div>
									<div class="row">
										<section class="col col-3">
											<button type="button"  style="height: 34px;width: 86px;" class="btn btn-danger" id="addtrackrow">
										+ Add Rows
									</button>

										</section>
									</div>
												</fieldset>
												<footer>
													<input type="hidden" name="ID" value="<?php echo $get_data_row->ID?>">
													<button type="submit" class="btn btn-primary">
														Submit
													</button>
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
				