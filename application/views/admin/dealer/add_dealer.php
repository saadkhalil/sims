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
									data-widget-fullscreenbutton="fa<?php echo $Title?>lse"
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
					
											<form class="smart-form" id="add-form"  action="<?php echo base_url()?>admin/dealer/submit" >
											
												<header>
													Add <?php echo $Title?>
												</header>
					
												<fieldset>
													<h3>Basic Information</h3><br>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Dealer Name :
																<input type="text" placeholder="Enter Dealer Name" name="NAME">
															</label>
														</section>
														<section class="col col-5">
															
															<label class="input"> Email Address :
																<input type="email" placeholder="Enter Email Address" name="EMAIL">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															<label class="input"> Dealer Code :
																<input type="text" placeholder="Enter Dealer Code" name="USERNAME">
															</label>
														</section><section class="col col-5">
															<label class="input"> Password :
																<input type="password" placeholder="Enter Password" name="PASSWORD">
															</label>
														</section>
													</div>
													<div class="row">
														
														<section class="col col-5">
															<label class="input"> Territory :
																<select class="form-control" name="TERRITORY_ID">
																	<option value="">Please Select </option>
																	<?php 
																	foreach($get_territory_data as $territory){ ?>
																		<option value="<?php echo $territory['ID']?>"><?php echo $territory['TITLE']?></option>
																	<?php } ?>
																</select>
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Region:
																<select class="form-control" name="REGION_ID">
																	<option value="">Please Select </option>
																	<?php 
																	foreach($get_region_data as $region){ ?>
																		<option value="<?php echo $region['ID']?>"><?php echo $region['TITLE']?></option>
																	<?php } ?>
																</select>
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															<label class="input"> City :
																<select class="form-control" name="CITY_ID">
																	<option value="">Please Select </option>
																	<?php 
																	foreach($get_city_data as $city){ ?>
																		<option value="<?php echo $city['ID']?>"><?php echo $city['TITLE']?></option>
																	<?php } ?>
																</select>
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Cell Phone:
																<input type="text" placeholder="Enter Cell Phone No" class="phone" name="MOBILE" >
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															<label class="input"> Commencement Date :
															<input type="text" placeholder="Select Commencement Date" autocomplete="off" class="datepicker" name="COMMENCEMENT_DATE">
																
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Telephone :
															<input type="text" placeholder="Enter Telephone No" name="PHONE">
																
															</label>
														</section>
													</div>
													<div class="row">
														
														<section class="col col-5">
															<label class="input"> Status:
																<select class="form-control" name="STATUS">
																	
																	<option value="1">Active </option>
																	<option value="0">In-Active </option>
																</select>
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Address:
																<textarea class="form-control" name="ADDRESS" rows="4" placeholder="Enter Complete Address"></textarea>
															</label>
														</section>
													</div>
													<br>
														<hr>
														<br>
														<h5>Workshop Size(ft)</h5><br>
														<section class="col col-3">
															<label class="input"> Length:
																<input type="number" name="WORKSHOP_LENGTH" placeholder="Enter Workshop Length" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Breadth:
																<input type="number" name="WORKSHOP_BREADTH" placeholder="Enter Workshop Breadth" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Number of Lift(s):
																<input type="number" name="LIFTS" placeholder="Enter Number of Lift(s)" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Number of Pit(s):
																<input type="number" name="PITS" placeholder="Enter Number of Pit(s)"  >
															</label>
														</section>
														<br>
														<hr>
														<br>
														<h5>Categories</h5><br>
														<section class="col col-3">
															<label class="input"> Dealer Type :
																<select class="form-control" name="DEALERSHIP_GROUP">
																	<option value="">Please Select </option>
																	<?php 
																	foreach($get_dealershipgroup_data as $dealership){ ?>
																		<option value="<?php echo $dealership['ID']?>"><?php echo $dealership['TITLE']?></option>
																	<?php } ?>
																</select>
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Category Type:
																<select class="form-control" name="CATEGORY_TYPE">
																	<option value="">Please Select </option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																	<option value="C">C</option>

																</select>
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> SAP Code(If Exists):
																<input type="text" name="SAP_CODE" placeholder="Enter SAP Code" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Parts Purchase Link:
																<select class="form-control">
																	<option value="">Please Select </option>
																</select>
															</label>
														</section>
														<hr>
														<br>
														<h5>Workshop Facilities </h5><br>
														<section class="col col-12">
															<label class="label">Workshop Facilities : </label>
																<div class="inline-group">
																	<?php foreach($get_workshop_data as $workshop){ ?>
																	<label class="checkbox">
																		<input type="checkbox" value="<?php echo $workshop['ID']?>" name="WORKSHOP[]" >
																		<i></i><?php echo $workshop['TITLE']?></label>
																	<?php }  ?>
																</div>
														</section>
														<br>
														<br>
														<h5>Signal Size(ft)</h5><br>
														<section class="col col-5">
															<label class="input"> Length:
																<input type="number" name="SIGN_LENGTH" placeholder="Enter Signal Length" >
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Breadth:
																<input type="number" name="SIGN_BREADTH" placeholder="Enter Signal Breadth" >
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
																<input type="text" name="O_NAME" placeholder="Enter Owner's Name" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Father Name:
																<input type="text" name="O_FATHER" placeholder="Enter Father Name" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Age:
																<input type="number" name="O_AGE" placeholder="Enter Owner's Age" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Workshop Owner:
																<select class="form-control" name="WORKSHOP_OWNER">
																	<option value="">Please Select </option>
																	<option value="Owned">Owned </option>
																	<option value="Rental">Rental </option>
																</select>
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> NIC:
																<input type="text" class="nic" name="O_NIC" placeholder="Enter Owner's Age" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Mobile Number:
																<input type="text"  class="phone"
																name="O_MOBILE" placeholder="Enter Owner's Mobile" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Next of Kin:
																<input type="text" name="O_NXT_KIN" placeholder="Enter Next of Kin" >
															</label>
														</section><br><br><br><br><br><br><br><br><hr>	<br>
														<section class="col col-3">
															<label class="input"> NTN:
																<input type="text"  name="O_NTN" placeholder="Enter NTN No" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Bank:
																<input type="text" name="O_BANK" placeholder="Enter Bank Name" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Branch:
																<input type="text" name="O_BRANCH" placeholder="Enter Branch Name" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Account No:
																<input type="text" name="O_ACCNO" placeholder="Enter Account No" >
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
																<input type="text"  name="MON_SER_IN" placeholder="Enter Monthly Service Incoming" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Initial Parts Investment:
																<input type="text" name="IN_PART_INVEST" placeholder="Enter Initial Parts Investment" >
															</label>
														</section>
														<section class="col col-3">
															<label class="input"> Monthly Committed Parts Target:
																<input type="text" name="MON_COM_PART" placeholder="Enter Monthly Committed Parts Target" >
															</label>
														</section>
														<br><br>
														<br><br><br>
														<h3>Devices, Machines & Tools</h3>
														<br>
														<section class="col col-12">
															<label class="label">Devices and Machines : </label>
																<div class="inline-group">
																	<?php foreach($get_devices_data as $device){ ?>
																	<label class="checkbox">
																		<input type="checkbox" value="<?php echo $device['ID']?>" name="DEVICES[]" >
																		<i></i><?php echo $device['TITLE']?></label>
																	<?php }  ?>
																</div>
														</section>
														<section class="col col-12">
															<label class="label">Special Tools : </label>
																<div class="inline-group">
																	<?php foreach($get_tools_data as $tool){ ?>
																	<label class="checkbox">
																		<input type="checkbox" value="<?php echo $tool['ID']?>" name="SPECIALTOOLS[]" >
																		<i></i><?php echo $tool['TITLE']?></label>
																	<?php }  ?>
																</div>
														</section> 
														<section class="col col-12">
															<label class="label">Miscellaneous Tools : </label>
																<div class="inline-group">
																	<?php foreach($get_miscellaneous_data as $misc){ ?>
																	<label class="checkbox">
																		<input type="checkbox" value="<?php echo $misc['ID']?>" name="MISC[]" >
																		<i></i><?php echo $misc['TITLE']?></label>
																	<?php }  ?>
																</div>
														</section>
												</fieldset>
												<footer>
													<input type="submit"  class="btn btn-primary" value="Submit">
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
				