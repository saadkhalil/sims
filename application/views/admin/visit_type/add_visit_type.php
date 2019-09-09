		<!-- MAIN CONTENT -->
				<div id="content">

					<div class="row">
						<div class="col-xs-12 col-sm-9 col-md-9 col-lg-8">
							<h1 class="page-title txt-color-blueDark">
								<i class="fa fa-edit fa-fw "></i> 
									LOVs
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
					
											<form class="smart-form" id="add-form"  action="<?php echo base_url()?>admin/visit_type/submit" >
											
												<header>
													Add <?php echo $Title?>
												</header>
					
												<fieldset>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Service Name :
																<input type="text" placeholder="Enter Service Name" name="SERVICE_NAME">
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> AVAILABILITY :
																<select class="form-control" name="AVAILABLE">
																	<option>Please Select</option>
																	<option value="1">Available</option>
																	<option value="0">Not Available</option>
																</select>
															</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Description (Optional) :
																
																<textarea name="DESCRIPTION" placeholder="  Enter Description" class="form-control" rows="5"></textarea>
															</label>
														</section>
													</div>
					
												</fieldset>
												<footer>
													<input type="submit"  class="btn btn-primary" value="Submit">
													<button type="button" class="btn btn-default" onclick="LoadAjaxScreen('visit_type','view_visit_type')">
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
				