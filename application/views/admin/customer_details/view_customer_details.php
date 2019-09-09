		<!-- MAIN CONTENT -->
				<div id="content">

					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
							<h1 class="page-title txt-color-blueDark">
								<i class="fa fa-edit fa-fw "></i> 
									Customer Details
								<span>> 
									<?php echo $Title ?>
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
									
										
					
									<!-- widget div-->
									<div>
					
										<!-- widget edit box -->
										<div class="jarviswidget-editbox">
											<!-- This area used as dropdown edit box -->
					
										</div>
										<!-- end widget edit box -->
					<a class="btn btn-primary" href="javascript:void(0);" onclick="LoadAjaxScreen('customer_details','add_customer_details')"><i class="fa fa-plus"></i> Add <?php echo $Title?></a>
					<br> &nbsp;
										<!-- widget content -->
										<div class="widget-body no-padding">

					
												<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
													
											<thead>
												<tr>
													<th data-hide="phone">SR No.</th>
													<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Customer Name</th>
													<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Contact No</th>
													<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> NIC No</th>
													   <th data-class="expand">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$i=1;
												 foreach($get_data as $data){ ?>
												<tr>
													<td><?php echo  $i?></td>
													<td><?php echo  $data['NAME']?></td>
													<td><?php echo  $data['CONTACT']?></td>
													<td><?php echo  $data['NIC']?></td>
													<td>
														<a href="javascript:void(0);" onclick="LoadAjaxScreen('customer_details/edit/<?php echo $data['ID']?>','edit_customer_details')" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-pencil" title="Edit Record"></i></a> <a href="javascript:void(0);" onclick="LoadAjaxScreen('customer_vehicles/index/<?php echo $data['ID']?>','view_customer_vehicles')" class="btn btn-success btn-circle" title="View Vehicles"><i class="glyphicon glyphicon-eye-open"></i></a>
														<a href="javascript:void(0);" data-id="<?php echo $data['ID']?>" data-cname="customer_details"data-vname="view_customer_details" data-action="<?php echo base_url()?>admin/customer_details/delete"  class="btn btn-danger btn-circle smallbox smart-mod-eg1" title="Delete Record"><i class="glyphicon glyphicon-remove"></i></a>
														
													</td>
												</tr>
											<?php $i++;	  } ?>
											</tbody>
										</table>

					
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
				