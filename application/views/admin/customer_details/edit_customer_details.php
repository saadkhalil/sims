		<!-- MAIN CONTENT -->
				<div id="content">

					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
							<h1 class="page-title txt-color-blueDark">
								<i class="fa fa-edit fa-fw "></i> 
									LOVs
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
					
											<form class="smart-form" id="edit-form" action="<?php echo base_url()?>admin/customer_details/update" method="post" >
												<header>
													Edit <?php echo $Title ?>
												</header>
					
												<fieldset>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Customer Name :
																<input type="text" class="form-control" placeholder="Enter Customer Name" value="<?php echo $get_data_row->NAME?>" name="NAME">
															</label>
														</section>
														<section class="col col-5">
															
															<label class="input"> Contact(Mobile) No :
																<input type="text"  class="form-control phone" placeholder="Enter Contact No" id="phone" value="<?php echo $get_data_row->CONTACT?>" name="CONTACT">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> City :
																<select class="form-control js-example-basic-multiple" name="CITY_ID" >
																	<option value="">Please Select</option>
																	<?php foreach($get_cities_data as $city){ ?>
																	  <option <?php echo ($get_data_row->CITY_ID==$city['ID'] ? 'selected' : '')?>  value="<?php echo $city['ID']?>"><?php echo $city['CODE'].' - '.$city['TITLE']?></option>
																	<?php } ?>
																</select>
														</section>
															<section class="col col-5">
															
															<label class="input"> Address :
																<textarea class="form-control" placeholder="  Enter Address" name="ADDRESS" rows="3">   <?php echo $get_data_row->ADDRESS?></textarea>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															<label class="input"> NIC No :
																<input type="text"  class="form-control nic" placeholder="Enter NIC No" value="<?php echo $get_data_row->NIC?>" name="NIC">
															</label>
														</section>
													</div>
												</fieldset>
												<footer>
													<input type="hidden" name="ID" value="<?php echo $get_data_row->ID?>">
													<button type="submit" class="btn btn-primary">
														Submit
													</button>
													<button type="button" class="btn btn-default" onclick="LoadAjaxScreen('customer_details','view_customer_details')">
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
				