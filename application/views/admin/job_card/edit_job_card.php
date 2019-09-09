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
											<h3>
													&nbsp; Edit Job Card
												</h3>
											<!-- view customer details -->
											<div class="col-12 col-sm-12">
												<table class="table table-bordered table-hover" >

								                    <tbody>
								                        <tr>
								                            <td width="40%"><i class="fa fa-user fa-xs"></i> <b>CUSTOMER DETAILS</b></td>
								                        </tr>
								                          <tr>
								                            <td width="200px"><b>Chassis No</b></td>
								                            <td width="200px" class="text-Bold" ><?php echo $get_custvehicle_row->CHASSIS_NO?></td>
								                            <td width="200px"><b>Engine No</b></td>
								                            <td width="200px" class="text-Bold" ><?php echo $get_custvehicle_row->ENGINE_NO?></td>
								                        </tr>
								                        <tr>
								                            <td><b>Registration No</b></td>
								                            <td class="text-Bold" ><?php echo $get_custvehicle_row->REGISTRATION_NO?></td>
								                            <td><b>Model &amp; Colour</b></td>
								                            <td class="text-Bold" ><?php echo $get_custvehicle_row->MODEL.' - '.$get_custvehicle_row->COLOR ?></td>
								                        </tr>
								                        <tr>
								                            <td><b>Customer Name</b></td>
								                            <td class="text-Bold" ><?php echo $get_custvehicle_row->NAME?></td>
								                            <td><b>Address</b></td>
								                            <td class="text-Bold" ><?php echo $get_custvehicle_row->ADDRESS?></td>
								                        </tr>
								                        <tr>
								                            <td><b>Contact No</b></td>
								                            <td class="text-Bold" ><?php echo $get_custvehicle_row->CONTACT?></td>
								                            <td><b>N.I.C No</b></td>
								                            <td class="text-Bold" ><?php echo $get_custvehicle_row->NIC?></td>
								                        </tr>
								                        <tr>
								                            <td><b>City</b></td>
								                            <td class="text-Bold"><?php echo $get_custvehicle_row->CITY?>
								                            </td>
								                            <td><b>Purchase Date</b></td>
								                            <td class="text-Bold"><?php echo $get_custvehicle_row->PURCHASE_DATE?></td>
								                        </tr>

								                    </tbody>
								                </table>
								       	    </div>
								       	    <!-- view customer details -->
								       	      	    <!--  add new job -->
								        <form action="<?php echo base_url()?>admin/job_card/update" id="edit-form" method="POST">
											<div class="col-12 col-sm-12">
												<div class="panel-group smart-accordion-default" id="accordion-2">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-1"> <i class="fa fa-fw fa-plus-circle txt-color-blue"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> JOB CARD</a></h4>
														</div>
														<div id="collapseOne-1" class="panel-collapse collapse in">
															<div class="panel-body">
																	<table class="table table-bordered table-hover" >

										                    <tbody>
										                        <tr>
										                            <td colspan="8"width="40%"><i class="fa fa-user fa-xs"></i> <b>Job Card</b></td>
										                        </tr>
										                          <tr>
										                            <td width="40%"><b>Job Status</b></td>
										                            <td width="40%" class="text-Bold"><?php echo $get_data_row->JOB_STATUS?></td>
										                            <td width="40%"><b>Job Opening Date</b></td>
										                            <td width="40%" class="text-Bold"><?php echo $get_data_row->OPENING_DATE?>
										                            	<input type="hidden" name="OPENING_DATE" value="<?php echo $get_data_row->OPENING_DATE?>">
										                            </td>
										                        </tr>
										                        <tr>
										                            <td><b>KM Reading</b></td>
										                            <td class="text-Bold"><input type="text" class="form-control" style="width: 80px;" name="KM_READING" value="<?php echo $get_data_row->KM_READING?>"></td>
										                            <td><b>Job Ref Number</b></td>
										                            <td class="text-Bold">
										                            	<input type="text" class="form-control" id="REF_NUMBER" style="width: 100px;" value="<?php echo $get_data_row->REF_NUMBER?>" name="REF_NUMBER" readonly="" >
										                            </td>
										                        </tr>
										                        <tr>
										                            <td><b>Visit type</b></td>
										                            <td class="text-Bold" ><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="check_visit_update" data-target="#myModal">
																	Select
																	</button> <span id="showselectedvisitradio"> <?php echo $get_data_row->VISIT_TYPE?></span></td>
																	<input type="hidden" id="visit_type_id" name="VISIT_TYPE_ID" value="<?php echo $get_data_row->VISIT_TYPE_ID?>">
																	<input type="hidden" id="job_visit_id" name="JOB_VISIT_ID" value="<?=$get_job_visit_type->ID?>">
										                            <td><b>Dealership</b></td>
										                            <td class="text-Bold" ><?php echo ucfirst($get_login_data->USER_NAME)?></td>
										                            <input type="hidden" name="DEALER_ID" value="<?php echo $get_login_data->ID?>">

										                            <input type="hidden" name="CUSTOMER_ID" value="<?php echo $get_data_row->CUSTOMER_ID?>">
										                            <input type="hidden" name="JOB_ID" value="<?php echo $get_data_row->ID?>">
										                            <input type="hidden"  name="CUSTOMER_VEHICLE_ID" value="<?php echo $get_data_row->CUSTOMER_VEHICLE_ID?>">
										                            <span id="resp_cust_vehicle_id" style="display: none;"><?php echo $get_data_row->CUSTOMER_VEHICLE_ID?></span>
										                        </tr>
										                        <tr>
										                            <td><b>Staff Assigned</b></td>
										                            <td colspan="8" class="text-Bold"><select class="js-example-basic-multiple" name="STAFF_ASSIGNED[]" style="width: 290px;" multiple="multiple" placeholder="Please select" >
										                            	<?php foreach($get_staff_data as $staff){ ?>
																	  <option <?php echo (in_array($staff['ID'], $job_staff_arr) ? 'selected' : '')?> value="<?php echo $staff['ID']?>"><?php echo $staff['NAME']?></option>
																	<?php }  ?>
																	</select></td>
										                        </tr>
										                    </tbody>
										                </table>
															</div>
														</div>
													</div>
<div class="panel panel-default">
  <div class="panel-heading">
  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-blue"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Services </a></h4>
  </div>
	<div id="collapseTwo-1" class="panel-collapse collapse">
	<div class="panel-body">
		<table class="table table-hover">
		<thead>
		<tr>
		<th style="width:5%">SR</th>
		<th style="width:65%">Services</th>
		<th style="width:10%">Charges</th>
		<th style="width:20%">&nbsp;</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$i=1;

		foreach($get_services_data as $service){
			$sql ="SELECT * FROM JOB_SERVICES WHERE JOB_ID=".$get_data_row->ID."AND SERVICE_ID=".$service['ID'];
				$query = $this->db->query($sql);
				$result=$query->row();
			?>
		<tr>
		<td><?php echo $i?></td>
		<td>
		<input type="hidden" name="SERVICE_ID[]" id="service_id_<?php echo $service['ID']?>">
		<input type="hidden" name="SERVICE_NAME[]" id="service_name_<?php echo $service['ID']?>">
		<?php echo $service['TITLE']?></td>
		<td>
		<?php if(!empty($result)){ ?>
		<input type="text" name="SERVICE_CHARGES[]"  data-id="<?php echo $service['ID']?>"  data-title="<?php echo $service['TITLE']?>" class="form-control"  style="width:85%;text-align:right;" value="<?php echo ($service['ID']==$result->SERVICE_ID ? $result->SERVICE_CHARGES: $service['CHARGES'])?>">
		<?php } else{ ?>
		<input type="text" name="SERVICE_CHARGES[]"  data-id="<?php echo $service['ID']?>"  data-title="<?php echo $service['TITLE']?>" class="form-control"  style="width:85%;text-align:right;" value="<?php echo $service['CHARGES']?>">
		<?php } ?>
		</td>
		<td>&nbsp;</td>
		</tr>
		<?php

		 $i++;

		} ?>
		<tr>
		<td><?php echo $i?></td>
		<td>
			<?php
		$sql ="SELECT * FROM JOB_SERVICES WHERE JOB_ID=".$get_data_row->ID."AND SERVICE_ID=".$get_others_services_row->ID;
				$query = $this->db->query($sql);
				$result=$query->row();

			?>
		<input type="hidden" name="SERVICE_ID[]" value="<?php echo $get_others_services_row->ID?>">

		<input type="text" name="SERVICE_NAME[]"  value="<?php echo (!empty($result) ? $result->SERVICE_NAME : '')?>" class="form-control input-small" style="width:95%" placeholder="Example: Tuning..." ></td>
		<td>
		<input type="tex"  name="SERVICE_CHARGES[]"  value="<?php echo (!empty($result) ? $result->SERVICE_CHARGES : 0)?>" data-id="0"  class="form-control" style="width:85%;text-align:right;">
		</td>
		<td>&nbsp;</td>
		</tr>
		</tbody>
		</table>
	</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
	<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseThree-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-blue"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Parts & Accessories</a></h4>
	</div>
 <div id="collapseThree-1" class="panel-collapse collapse">
  <div class="panel-body">
	<table class="table table-hover">
	<thead>
	<tr>
	<th style="width:5%">SR</th>
	<th style="width:65%">Parts</th>
	<th style="width:10%">Charges</th>
	<th style="width:20%">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=1;
	foreach($get_accessories_data as $accessories){
		$sql ="SELECT * FROM JOB_ACCESSORIES WHERE JOB_ID=".$get_data_row->ID."AND ACCESSORIES_ID=".$accessories['ID'];
				$query = $this->db->query($sql);
				$result=$query->row();
	 ?>
	<tr>
	<td><?php echo $i?></td>
	<td>
	<input type="hidden" name="ACCESSORIES_ID[]"  id="acc_id_<?php echo $accessories['ID']?>" >
	<input type="hidden" name="ACCESSORIES_NAME[]" id="acc_name_<?php echo $accessories['ID']?>">
	<?php echo $accessories['TITLE']?></td>
	<td>

	<?php if(!empty($result)){ ?>
		<input type="text" name="ACCESSORIES_CHARGES[]"  data-id="<?php echo $accessories['ID']?>"  data-title="<?php echo $accessories['TITLE']?>" class="form-control"  style="width:85%;text-align:right;" value="<?php echo ($accessories['ID']==$result->ACCESSORIES_ID ? $result->ACCESSORIES_CHARGES: $accessories['CHARGES'])?>">
		<?php } else{ ?>
		<input type="text" name="ACCESSORIES_CHARGES[]"  data-id="<?php echo $accessories['ID']?>"  data-title="<?php echo $accessories['TITLE']?>" class="form-control"  style="width:85%;text-align:right;" value="<?php echo $accessories['CHARGES']?>">
		<?php } ?>
	</td>
	<td>&nbsp;</td>
	</tr>
	<?php
	 $i++;
	}  ?>
	<tr>
	<td><?php echo $i?></td>
	<td>
		<?php
		$sql ="SELECT * FROM JOB_ACCESSORIES WHERE JOB_ID=".$get_data_row->ID." AND ACCESSORIES_ID=".$get_others_accessories_row->ID;

				$query = $this->db->query($sql);
				$result=$query->row();



			?>
	<input type="hidden" name="ACCESSORIES_ID[]" value="<?php echo $get_others_accessories_row->ID?>">
	<input type="text" name="ACCESSORIES_NAME[]"  value="<?php echo (!empty($result) ? $result->ACCESSORIES_NAME : '')?>" class="form-control input-small" style="width:95%" placeholder="Example: Engine Oil..." >
	</td>
	<td>
	<input type="text"  name="ACCESSORIES_CHARGES[]"  class="form-control" value="<?php echo (!empty($result) ? $result->ACCESSORIES_CHARGES : 0)?>" data-id="0"   style="width:85%;text-align:right;">
	<td>&nbsp;</td>
	</tr>

	</tbody>
	</table>
</div>
</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseFour-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-blue"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Total & Discount</a></h4>
	</div>
	<div id="collapseFour-1" class="panel-collapse collapse">
		<div class="panel-body">
		<table class="table table-hover">
                <thead>
                	<tr>
                    	<th style="width:5%">SR</th>
                        <th style="width:65%">Description</th>
                        <th style="width:10%">Charges</th>
                        <th style="width:20%">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                      <tr>
                        <td>1</td>
                        <td>Sub Total - Services</td>
                        <td><input type="text" name="TOTAL_SERVICES" id="total_services"  class="form-control" readonly="" value="<?php echo $get_data_row->TOTAL_SERVICES?>"  style="width:85%;text-align:right;"></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Sub Total - Parts</td>
                        <td><input type="text" name="TOTAL_ACCESSORIES" class="form-control" id="total_accessories" readonly=""  value="<?php echo $get_data_row->TOTAL_ACCESSORIES?>"  style="width:85%;text-align:right;"></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Discount</td>
                        <td><input type="text"  name="DISCOUNT"id="discount_change"  value="<?php echo $get_data_row->DISCOUNT?>" class="form-control" style="width:85%;text-align:right;"></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Grand Total</td>
                        <td><input type="text" id="grand_total" name="GRAND_TOTAL" class="form-control" style="width:85%;text-align:right;" readonly="" value="<?php echo $get_data_row->TOTAL?>">

                        </td>
                        <td>&nbsp;</td>
               		  </tr>
                      <tr>
                        <td colspan="4" align="center">
                        	<input type="submit"  value="Save Job Card" class="btn btn-primary btn-small">
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" onclick="editjobback()"  class="btn btn-default btn-small">Back</button>
                        </td>
               		  </tr>

                </tbody>
            </table>
		</div>
	</div>
</div>
												</div>
								       	    </div>
								       	</form>
								       	    <!-- add new job-->

								       	    <!--   Visit Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;
														</button>
														<h4 class="modal-title" id="myModalLabel">Select Purpose of Visit</h4>
													</div>
													<div class="modal-body">
													<div class="smart-form">
														<div class="row">
															<div class="col-md-12" id="showvisitexist">
															</div>
														</div>
													</div>
													<input type="hidden" id="cusvisittype" value="<?= $get_data_row->VISIT_TYPE_ID?>" >

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">
															Cancel
														</button>
														<button type="button" id="visit_radio_submit" class="btn btn-primary" data-dismiss="modal">
															Confirm
														</button>
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /visit modal -->

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
