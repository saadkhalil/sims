		<!-- MAIN CONTENT -->
				<div id="content">

					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
							<h1 class="page-title txt-color-blueDark">
								<i class="fa fa-edit fa-fw "></i> 
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
					
											
											<form class="smart-form" id="edit-form"  action="<?php echo base_url()?>admin/dealer/update" >
											
												<header>
													View <?php echo $Title?>
												</header>
												<input type="hidden" name="USER_ID" value="<?php echo $get_data_row->USER_ID?>">
												<input type="hidden" name="DEALER_ID" value="<?php echo $get_data_row->ID?>" >
												<fieldset>
													<h3>Basic Information</h3><br>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Dealer Name :
																<input type="text" placeholder="Enter Dealer Name" readonly="" name="NAME" value="<?php echo $get_data_row->NAME?>">
															</label>
														</section>
														<section class="col col-5">
															
															<label class="input"> Email Address :
																<input type="email" placeholder="Enter Email Address"  readonly="" name="EMAIL" value="<?php echo $get_data_row->EMAIL?>">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															<label class="input"> Dealer Code :
																<input type="text" placeholder="Enter Dealer Code"  readonly="" name="USERNAME" value="<?php echo $get_data_row->USER_NAME?>">
															</label>
														</section><section class="col col-5">
															<label class="input"> Password :
																<input type="text"  readonly="" placeholder="Enter Password"  value="<?php echo $get_data_row->VIEW_PASSWORD?>" name="PASSWORD" >
															</label>
														</section>
													</div>
													<div class="row">
														
														<section class="col col-5">
															<label class="input"> Territory :
																<select class="form-control" disabled="" name="TERRITORY_ID">
																	<option value=""> Please Select </option>
																	<?php 
																	foreach($get_territory_data as $territory){ ?>
																		<option  <?php echo ($get_data_row->TERRITORY_ID==$territory['ID'] ? 'selected' : '')?>  value="<?php echo $territory['ID']?>"><?php echo $territory['TITLE']?></option>
																	<?php } ?>
																</select>
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Region:
																<select class="form-control" disabled="" name="REGION_ID">
																	<option value="">Please Select </option>
																	<?php 
																	foreach($get_region_data as $region){ ?>
																		<option <?php echo ($get_data_row->REGION_ID==$region['ID'] ? 'selected' : '')?> value="<?php echo $region['ID']?>"><?php echo $region['TITLE']?></option>
																	<?php } ?>
																</select>
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															<label class="input"> City :
																<select class="form-control" disabled="" name="CITY_ID">
																	<option value="">Please Select </option>
																	<?php 
																	foreach($get_city_data as $city){ ?>
																		<option <?php echo ($get_data_row->CITY_ID==$city['ID'] ? 'selected' : '')?>  value="<?php echo $city['ID']?>"><?php echo $city['TITLE']?></option>
																	<?php } ?>
																</select>
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Cell Phone:
																<input type="text" placeholder="Enter Cell Phone No" readonly="" value="<?php echo $get_data_row->MOBILE?>" class="phone" name="MOBILE" >
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															<label class="input"> Commencement Date :
															<input type="text" disabled=""placeholder="Select Commencement Date" value="<?php echo $get_data_row->COMMENCEMENT_DATE?>" autocomplete="off" class="datepicker" name="COMMENCEMENT_DATE">
																
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Telephone :
															<input type="text" readonly="" value="<?php echo $get_data_row->PHONE?>" placeholder="Enter Telephone No" name="PHONE">
																
															</label>
														</section>
													</div>
													<div class="row">
														
														<section class="col col-5">
															<label class="input"> Status:
																<select class="form-control" disabled="" name="STATUS">
																	<option value=""> Please Select </option>
																	<option  <?php echo ($get_data_row->STATUS=='1' ? 'selected' : '')?> value="1">Active </option>
																	<option <?php echo ($get_data_row->STATUS=='0' ? 'selected' : '')?> value="0">In-Active </option>
																</select>
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Address:
																<textarea class="form-control" name="ADDRESS" disabled="" rows="4" placeholder="Enter Complete Address"><?php echo (!empty($get_data_row->ADDRESS) ? $get_data_row->ADDRESS : 'null');?></textarea>
															</label>
														</section>
													</div>
													<br>
														<hr>
														<br>
														<h5>Workshop Size(ft)</h5><br>
														<section class="col col-3">
															<label class="input"> Length:
																<input type="text" name="WORKSHOP_LENGTH"  readonly="" value="<?php echo (!empty($get_data_row->WORKSHOP_LENGTH) ? $get_data_row->WORKSHOP_LENGTH : 'null');?>" placeholder="Enter Workshop Length" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Breadth:
																<input type="text" readonly="" value="<?php echo (!empty($get_data_row->WORKSHOP_BREADTH) ? $get_data_row->WORKSHOP_BREADTH : 'null');?>" name="WORKSHOP_BREADTH" placeholder="Enter Workshop Breadth" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Number of Lift(s):
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->LIFTS) ? $get_data_row->LIFTS : 'null');?>" name="LIFTS" placeholder="Enter Number of Lift(s)" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Number of Pit(s):
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->PITS) ? $get_data_row->PITS : 'null');?>" name="PITS" placeholder="Enter Number of Pit(s)"  >
															</label>
														</section>
														<br>
														<hr>
														<br>
														<h5>Categories</h5><br>
														<section class="col col-3">
															<label class="input"> Dealer Type :
																<select class="form-control" name="DEALERSHIP_GROUP" disabled="">
																	<option value="">Not Selected </option>
																	<?php 
																	foreach($get_dealershipgroup_data as $dealership){ ?>
																		<option <?php echo ($get_data_row->DEALERSHIP_GROUP_ID==$dealership['ID'] ? 'selected' : '')?>  value="<?php echo $dealership['ID']?>"><?php echo $dealership['TITLE']?></option>
																	<?php } ?>
																</select>
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Category Type:
																<select class="form-control" name="CATEGORY_TYPE" disabled="">
																	<option value="">Not Selected </option>
																	<option <?php echo ($get_data_row->CATEGORY_TYPE=='A' ? 'selected' : '')?> value="A">A</option>
																	<option <?php echo ($get_data_row->CATEGORY_TYPE=='B' ? 'selected' : '')?> value="B">B</option>
																	<option <?php echo ($get_data_row->CATEGORY_TYPE=='C' ? 'selected' : '')?> value="C">C</option>

																</select>
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> SAP Code(If Exists):
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->SAP_CODE) ? $get_data_row->SAP_CODE : 'null');?>" name="SAP_CODE" placeholder="Enter SAP Code" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Parts Purchase Link:
																<select class="form-control"  readonly="">
																	<option value="">Not Selected </option>
																</select>
															</label>
														</section>
														<hr>
														<br>
														<h5>Workshop Facilities </h5><br>
														<section class="col col-12">
															<label class="label">Workshop Facilities : </label>
																<div class="inline-group">
																	<?php if(!empty($detail_workshop_data)){ foreach($detail_workshop_data as $workshop){ ?>
																	<label class="checkbox">
																		<input type="checkbox" disabled="" checked  value="<?php echo $workshop['ID']?>" name="WORKSHOP[]" >
																		<i></i><?php echo $workshop['TITLE']?></label>
																	<?php } } else{
																		echo 'No Workshop Selected';
																	} ?>
																</div>
														</section>
														<br>
														<br>
														<br>
														<br>
														<h5>Signal Size(ft)</h5><br>
														<section class="col col-5">
															<label class="input"> Length:
																<input type="text"  readonly="" name="SIGN_LENGTH" value="<?php echo (!empty($get_data_row->SIGN_LENGTH) ? $get_data_row->SIGN_LENGTH : 'null');?>" placeholder="Enter Signal Length" >
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Breadth:
																<input type="text"  readonly="" name="SIGN_BREADTH" value="<?php echo (!empty($get_data_row->SIGN_BREADTH) ? $get_data_row->SIGN_BREADTH : 'null');?>" placeholder="Enter Signal Breadth" >
															</label>
														</section>
														<br>
														<hr>
														<br>
														<br>
														<br>
														<h5>Owner's Detail </h5><br>
														<section class="col col-3">
															<label class="input"> Owner's Name:
																
																<input type="text"  readonly="" name="O_NAME" placeholder="Enter Owner's Name" value="<?php echo (!empty($get_data_row->O_NAME) ? $get_data_row->O_NAME : 'null');?>" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Father Name:
																<input type="text"   readonly="" value="<?php echo (!empty($get_data_row->F_NAME) ? $get_data_row->F_NAME : 'null');?>" name="O_FATHER" placeholder="Enter Father Name" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Age:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->O_AGE) ? $get_data_row->O_AGE : 'null');?>" name="O_AGE" placeholder="Enter Owner's Age" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Workshop Owner:
																<select class="form-control" disabled="" 	name="WORKSHOP_OWNER">
																	<option value="">Please Select </option>
																	<option  <?php echo ($get_data_row->WORKSHOP_OWNER=='Owned' ? 'selected' : '')?> value="Owned">Owned </option>
																	<option <?php echo ($get_data_row->WORKSHOP_OWNER=='Rental' ? 'selected' : '')?> value="Rental">Rental </option>
																</select>
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> NIC:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->O_NIC) ? $get_data_row->O_NIC : 'null');?>"  name="O_NIC" placeholder="Enter Owner's Age" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Mobile Number:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->O_MOBILE) ? $get_data_row->O_MOBILE : 'null');?>" 
																name="O_MOBILE" placeholder="Enter Owner's Mobile" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Next of Kin:
																<input type="text"   readonly="" value="<?php echo (!empty($get_data_row->O_NXT_KIN) ? $get_data_row->O_NXT_KIN : 'null');?>" name="O_NXT_KIN" placeholder="Enter Next of Kin" >
															</label>
														</section><br><br><br><br><br><br><br><br><hr>	<br>
														<section class="col col-3">
															<label class="input"> NTN:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->O_NTN) ? $get_data_row->O_NTN : 'null');?>"  name="O_NTN" placeholder="Enter NTN No" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Bank:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->O_BANK) ? $get_data_row->O_BANK : 'null');?>" name="O_BANK" placeholder="Enter Bank Name" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Branch:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->O_BRANCH) ? $get_data_row->O_BRANCH : 'null');?>" name="O_BRANCH" placeholder="Enter Branch Name" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Account No:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->O_ACCNO) ? $get_data_row->O_ACCNO : 'null');?>" name="O_ACCNO" placeholder="Enter Account No" >
															</label>
														</section>
														<br>
														<br>
														<br>
														<hr>
														<h3>Potential Calculation</h3>
														<br>
														<section class="col col-3">
															<label class="input"> Monthly Service Incoming:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->MON_SER_IN) ? $get_data_row->MON_SER_IN : 'null');?>" name="MON_SER_IN" placeholder="Enter Monthly Service Incoming" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Initial Parts Investment:
																<input type="text"  readonly="" name="IN_PART_INVEST" value="<?php echo (!empty($get_data_row->IN_PART_INVEST) ? $get_data_row->IN_PART_INVEST : 'null');?>" placeholder="Enter Initial Parts Investment" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Monthly Committed Parts Target:
																<input type="text"  readonly="" value="<?php echo (!empty($get_data_row->MON_COM_PART) ? $get_data_row->MON_COM_PART : 'null');?>" name="MON_COM_PART" placeholder="Enter Monthly Committed Parts Target" >
															</label>
														</section>
														<br><br>
														<br><br><br>
														<h3>Devices, Machines & Tools</h3>
														<br>
														<section class="col col-12">
															<label class="label">Devices and Machines : </label>
																<div class="inline-group">
																	<?php if(!empty($detail_devices_data)){ foreach($detail_devices_data as $device){ ?>
																	<label class="checkbox">
																		<input type="checkbox" checked="" disabled  value="<?php echo $device['ID']?>" name="DEVICES[]" >
																		<i></i><?php echo $device['TITLE']?></label>
																	<?php } }else{

																		echo 'No Device Selected';

																	} ?>
																</div>
														</section>
														<section class="col col-12">
															<label class="label">Special Tools : </label>
																<div class="inline-group">
																	<?php if(!empty($detail_tools_data)){ foreach($detail_tools_data as $tool){ ?>
																	<label class="checkbox">
																		<input type="checkbox" checked disabled value="<?php echo $tool['ID']?>" name="SPECIALTOOLS[]" >
																		<i></i><?php echo $tool['TITLE']?></label>
																	<?php } 
																	}
																	else{
																		echo 'No Special Tools';
																	} ?>
																</div>
														</section> 
														<section class="col col-12">
															<label class="label">Miscellaneous Tools : </label>
																<div class="inline-group">
																	<?php
																	if(!empty($get_miscellaneous_data)){
																	 foreach($get_miscellaneous_data as $misc){ ?>
																	
																	<label class="checkbox">
																		<input type="checkbox" checked disabled value="<?php echo $misc['ID']?>" name="MISC[]" >
																		<i></i><?php echo $misc['TITLE']?></label>
																	<?php }  }

																	else{
																		echo 'No Miscellaneous Tools Selected';

																	} ?>
																</div>
														</section>
												</fieldset>
												<footer>
													<button type="button" class="btn btn-default" onclick="LoadAjaxScreen('Dealer','view_dealer')">
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
				