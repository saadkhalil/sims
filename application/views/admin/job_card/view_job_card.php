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
									View <?php echo $Title ?>
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

										<form class="smart-form" id="filter-form"  action="<?php echo base_url()?>admin/job_card/filter" >
												<input type="hidden" name="DEALER_ID" value="<?php echo $get_login_data->ID?>">
												<header>
													Search Parameter
												</header>


												<fieldset>
													<div class="row" >
														<section class="col col-5">

															<label class="input"> Job Opening Date From :
																<input type="text" class="form-control datepicker" name="JOB_OPENING_DATE_FROM" readonly="" value="<?php echo date('m/01/Y')?>">
															</label>

														</section>
														<section class="col col-5">

															<label class="input"> Job Opening Date To:
																<input type="text" class="form-control datepicker" name="JOB_OPENING_DATE_TO" readonly="" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y'). ' +1 day'))?>">
															</label>

														</section>
														<section class="col col-5">

															<label class="input"> Customer Name :
																<input type="text" class="form-control" name="CUSTOMER_NAME" placeholder="Search by Customer">
															</label>

														</section>
														<section class="col col-5">

															<label class="input"> Job Ref Number:
																<input type="text" class="form-control" name="JOB_REF_NUMBER"  placeholder="Search by Job Reference">
															</label>

														</section>
														<section class="col col-5">

															<label class="input"> Job Status:
																<select class="form-control" name="JOB_STATUS">
																	 <option value="">Please select</option>
																	 <option value="All">All</option>
																	 <option value="Open">Open</option>
																	 <option value="Closed">Closed</option>
																</select>
															</label>

														</section>
														<section class="col col-5">

															<label class="input"> Job Payment:
																<select class="form-control"  name="JOB_PAYMENT">
																	 <option value="">Please select</option>
																	 <option value="Not Done">Not Done</option>
																	 <option value="Done - Cash">Done - Cash</option>
																	 <option value="Credit">Credit</option>
																	 <option value="Free Service Card">Free Service Card</option>
																</select>
															</label>

														</section>
													</div>
													<div class="row" >
															<footer>

																<input type="submit"  class="btn btn-primary btn-small" value="Search">
															</footer>
													</div>
												</fieldset>
											</form>


											<!-- view customer details -->
											<div class="col-12 col-sm-12">
												<table class="table table-bordered table-hover" id="filtersearchpanel"  >


								                    <tbody class="filterresult">
								                    	<tr><td width="100" >Sr.</td><td width="100">Ref#</td><td width="200">Customer  Name</td><td width="100">Open Date</td><td width="200">Visit Type</td><td width="100">Job Status</td><td width="100">Payment</td><td width="150">Actions</td></tr>
								                    	<?php $i=1; foreach($getcurrentjobcard as $current){  ?>
								                    	<tr>
								                    		<td><?php echo $i; ?></td>
								                    		<td><?php echo $current['REF_NUMBER']; ?></td>
								                    		<td><?php echo $current['NAME']; ?></td>
								                    		<td><?php echo $current['OPENING_DATE']; ?></td>
								                    		<td><?php echo $current['SERVICE_NAME']; ?></td>
								                    		<td><?php echo $current['JOB_STATUS']; ?></td>
								                    		<td><?php echo $current['PAYMENT_STATUS']; ?></td>
								                    		<td>&nbsp;<a href="javascript:void(0);"  onclick="LoadAjaxScreen('job_card/detail/<?php echo $current['ID']; ?>','detail_job_card')"  class="btn btn-success btn-circle"><i class="glyphicon glyphicon-eye-open" title="View Record"></i></a>&nbsp;<a href="javascript:void(0);"  onclick="LoadAjaxScreen('job_card/edit/<?php echo $current['ID']; ?>','edit_job_card')"  class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-pencil" title="Edit Record"></i></a>&nbsp;<a href="javascript:void(0);" onclick="closejobcard(<?php echo $current['ID']?>)"  class="btn btn-danger btn-circle smallbox" title="Close Job"><i class="glyphicon glyphicon-remove"></i></a></td>
								                    	</tr>
								                   		 <?php $i++; }  ?>

								                    </tbody>
								                </table>
								       	    </div>
								       	    <!-- view customer details -->
								       	    <!-- edit customer details -->
											<div class="col-12 col-sm-12">
												<form class="smart-form" id="edit-form" action="<?php echo base_url()?>admin/job_card/update" method="post" >
													<table class="table table-bordered table-hover" id="edit_cust_table" style="display: none;">
														<input type="hidden"  id="edit_cust_id" name="ID">
									                    <tbody>
									                        <tr>
									                            <td width="40%"><i class="fa fa-user fa-xs"></i> <b>Customer Details</b></td>
									                        </tr>
									                          <tr>
									                            <td width="40%">Chassis No</td>
									                            <td width="40%" class="text-Bold"><input type="text" id="edit_chassis_no" class="form-control" readonly="">
									                            </td>
									                            <td width="40%">Engine No</td>
									                            <td width="40%" class="text-Bold"><input type="text" class="form-control"  id="edit_engine_no"  readonly=""></td>
									                        </tr>
									                        <tr>
									                            <td>Registration No</td>
									                            <td class="text-Bold"><input type="text" class="form-control" id="edit_registration_no" name="REGISTRATIONNO" readonly=""></td>
									                            <td>Model &amp; Colour</td>
									                            <td class="text-Bold">
									                            	<select name="MODEL_ID" id="edit_model_no" class="form-control">
	                                    							<option value="" disabled="">Model</option>

									                            	</select>
									                            </td>
									                        </tr>
									                        <tr>
									                            <td>Customer Name</td>
									                            <td class="text-Bold" ><input type="text" class="form-control" id="edit_cust_name" name="NAME"></td>
									                            <td>Address</td>
									                            <td class="text-Bold" >
									                            <textarea class="form-control" rows="3" id="edit_cust_address" name="ADDRESS"></textarea>
									                            </td>
									                        </tr>
									                        <tr>
									                            <td>Contact No</td>
									                            <td class="text-Bold"><input type="text"  class="form-control"  id="edit_contact_no"  name="CONTACT"></td>
									                            <td>N.I.C No</td>
									                            <td class="text-Bold" ><input type="text" id="edit_nic_no"  class="form-control" name="NIC"></td>
									                        </tr>
									                        <tr>
									                            <td>City</td>
									                            <td class="text-Bold" >
									                            	<select class="form-control" id="edit_city" name="CITY_ID"><option value="">Please select</option>
									                            	</select>

									                            </td>
									                            <td>Purchase Date</td>
									                            <td class="text-Bold"><input type="text" id="edit_cust_purch_dt"  name="PURCHASE_DATE" disabled=""></td>
									                        </tr>
									                        <tr>
									                        	<td colspan="4" align="center">
									                            	<input type="submit"  class="btn btn-primary btn-sm" value="Save Customer Info">
									                                &nbsp;&nbsp;&nbsp;
									                                <button type="button" class="btn btn-default btn-sm"  id="cancel_save_action">No Thanks</button>
									                            </td>
									                        </tr>
									                    </tbody>
									                </table>
									              </form>
								       	    </div>
								       	    <!-- edit customer details -->

				 						 	<!-- CloseModal -->
				<div class="modal fade" id="closejobmodal" tabindex="-1" role="dialog" aria-labelledby="CloseJob" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title" id="CloseJob">Close Job Card</h4>
							</div>
							<form action="<?php echo base_url()?>admin/job_card/closesubmit" id="close-form" method="post" >
							<div class="modal-body">
								<div class="row">
									<div class="col-md-8">
										<div class="col-md-6">
											<div class="form-group">
												<label>Sub Total - Services</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<input type="text" readonly="" name="TOTAL_SERVICES"  id="total_services" class="form-control"  />
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="col-md-6">
											<div class="form-group">
												<label>Sub Total - Accessories</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<input type="text" name="TOTAL_ACCESSORIES" id="total_accessories" readonly="" class="form-control"  />
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="col-md-6">
											<div class="form-group">
												<label>Discount</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<input type="text" name="DISCOUNT" id="discount"  class="form-control"  required />
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="col-md-6">
											<div class="form-group">
												<label>Grand Total</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<input type="text" readonly="" id="total" name="TOTAL" class="form-control"  required />
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="col-md-6">
											<div class="form-group">
												<label> Payment Type -Status</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select class="form-control"  name="PAYMENT_STATUS" id="payment_status">
													 <option value="">Please select</option>
													 <option value="Not Done">Not Done</option>
													 <option value="Done - Cash">Done - Cash</option>
													 <option value="Credit">Credit</option>
													 <option value="Free Service Card">Free Service Card</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="col-md-6">
											<div class="form-group">
												<label> Next Visit (YES/NO)</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control datepicker" name="NEXT_VISIT_DATE" value="<?php echo $date = date('d-M-Y', strtotime('+1 month'));?>"  />
											</div>
										</div>
									</div>
								</div>
							<input type="hidden" name="id" id="job_id" >
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Cancel
								</button>
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
							</div>
						</form>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.close jobmodal -->


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
