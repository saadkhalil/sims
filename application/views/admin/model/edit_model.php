		<!-- MAIN CONTENT -->
				<div id="content">

					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
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
					
											<form class="smart-form" id="edit-form" action="<?php echo base_url()?>admin/model/update" method="post" >
												<header>
													Edit <?php echo $Title ?>
												</header>
					
												<fieldset>
													<div class="row">
														<section class="col col-5">
															
															<label class="input"> Title Name :
																<input type="text" value="<?php echo  $get_data_row->TITLE ?>" placeholder="Enter Title Name" name="TITLE">
																<input type="hidden" name="ID" value="<?php echo $get_data_row->ID?>">
															</label>
														</section>
													</div>
													<div class="row">
														
														<section class="col col-5">
															
															<label class="input"> Description (Optional) :
																
																<textarea name="DESCRIPTION" placeholder="  Enter Description" class="form-control" rows="5"><?php echo  $get_data_row->DESCRIPTION ?></textarea>
															</label>
														</section>
													</div>
					
												</fieldset>
												<footer>
													<button type="submit" class="btn btn-primary">
														Submit
													</button>
													<button type="button" class="btn btn-default" onclick="LoadAjaxScreen('model','view_model')">
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
				