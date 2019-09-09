		<!-- MAIN CONTENT -->
				<div id="content">

					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
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
					
											<form class="smart-form" id="add-form"  action="<?php echo base_url()?>admin/customer_vehicles/submit" >
											
												<header>
													Add <?php echo $Title?>
												</header>
													

												<fieldset>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Chassis No :
																<input type="text" placeholder="Enter Chassis No" name="CHASSIS_NO" style="text-transform: uppercase;">
															</label>
														</section>
														<section class="col col-5">
															
															<label class="input"> Registration No :
																<input type="text" class="form-control" placeholder="Enter Registration No" name="REGISTRATION_NO" style="text-transform: uppercase;">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Model :
																<select class="form-control" name="MODEL_ID" >
																	<option value="">Please Select</option>
																	<?php foreach($get_models_data as $model){ ?>
																	  <option value="<?php echo $model['ID']?>"> <?php echo $model['TITLE']?></option>
																	<?php } ?>
																</select>
														</section>
														<section class="col col-5">
															
															<label class="input"> Color :
																<select class="form-control" name="COLOR_ID" >
																	<option value="">Please Select</option>
																	<?php foreach($get_colors_data as $color){ ?>
																	  <option value="<?php echo $color['ID']?>"><?php echo $color['TITLE']?></option>
																	<?php } ?>
																</select>
														</section>
													</div>
												<div class="row">
													<section class="col col-5">
															
															<label class="input"> Engine No :
																<input type="text" class="form-control" placeholder="Enter Engine No" name="ENGINE_NO" style="text-transform: uppercase;">
															</label>
														</section>
														<section class="col col-5">
															<label class="input"> Purchase Date :
																<input type="text" class=" form-control datepicker" name="PURCHASE_DATE" autocomplete="off">
															</label>
														</section>
												</div>
													<input type="hidden" name="CUSTOMER_ID" value="<?php echo $get_customer_data->ID?>">
												</fieldset>
												<footer>
													<input type="submit"  class="btn btn-primary" value="Submit">
													<button type="button" class="btn btn-default" onclick="LoadAjaxScreen('customer_vehicles/index/<?php echo $get_customer_data->ID?>','view_customer_vehicles')">
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
				