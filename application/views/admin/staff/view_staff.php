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
                            View Job Card <?php echo $Title ?>
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

                                <form class="smart-form" id="stafffilter-form"  action="<?php echo base_url()?>admin/staff/filter" >

                                        <header>
                                            Search Parameter
                                        </header>


                                        <fieldset>
        									<div class="row">
        										<section class="col col-4">

        											<label class="input"> Dealer Name :
        											<select class="form-control js-example-basic-multiple" name="DEALER" >
        												<option value="">&nbsp;All Dealers</option>
        											  <?php foreach($get_dealers_data as $dealers){ ?>
        											 	 <option value="<?php echo $dealers['ID']?>">    <?php echo $dealers['USER_NAME'].'  - '.$dealers['NAME']?></option>
        											  <?php } ?>

        											</select>
        											</label>
        										</section>
                                                 <section class="col col-4">

                                                    <label class="input"> Designation :
                                                    <select class="form-control js-example-basic-multiple" name="DESIGNATION" >
                                                        <option value="">&nbsp;All Designation</option>
                                                        <option value="Technician">Technician</option>
                                                            <option value="Helper">Helper</option>
                                                            <option value="Service Advisor">Service Advisor</option>
                                                            <option value="Parts Staff">Parts Staff</option>
                                                            <option value="Sales Staff">Sales Staff</option>
                                                            <option value="Administrative Staff">Administrative Staff</option>

                                                    </select>
                                                    </label>
                                                </section>
        									</div>
        									<div class="row">
        										<section class="col col-4">

        											<label class="input"> Region :
        											<select class="form-control js-example-basic-multiple" name="REGION" >
        												<option value="">&nbsp;All Region</option>
        											  <?php foreach($get_region_data as $region){ ?>
        											 	 <option value="<?php echo $region['ID']?>">    <?php echo $region['CODE'].'  - '.$region['TITLE']?></option>
        											  <?php } ?>

        											</select>
        											</label>
        										</section>
        										<section class="col col-4">

        											<label class="input"> Territory :
        											<select class="form-control js-example-basic-multiple" name="TERRITORY" >
        												<option value="">&nbsp;All Territory</option>
        											  <?php foreach($get_region_data as $territory){ ?>
        											 	 <option value="<?php echo $territory['ID']?>">    <?php echo $territory['CODE'].'  - '.$territory['TITLE']?></option>
        											  <?php } ?>

        											</select>
        											</label>
        										</section>
        									</div>
        									<div class="row">
        										
        										<section class="col col-4">

        											<label class="input"> Dealership Group :
        											<select class="form-control js-example-basic-multiple" name="DEALERSHIP" >
        												<option value="">&nbsp;All Groups</option>
        											  <?php foreach($get_dealershipgroup_data as $dealership){ ?>
        											 	 <option value="<?php echo $dealership['ID']?>">    <?php echo $dealership['TITLE']?></option>
        											  <?php } ?>

        											</select>
        											</label>
        										</section>
        										<section class="col col-4">

        											<label class="input"> City :
        											<select class="form-control js-example-basic-multiple" name="CITY" >
        												<option value="">&nbsp;All Cities</option>
        											  <?php foreach($get_city_data as $city){ ?>
        											 	 <option value="<?php echo $city['ID']?>">    <?php echo $city['CODE'].'  - '.$city['TITLE']?></option>
        											  <?php } ?>

        											</select>
        											</label>
        										</section>
        									</div>
                                            <div class="row">
                                                
                                                <section class="col col-4">

                                                    <label class="input"> Education :
                                                    <select class="form-control js-example-basic-multiple" name="EDUCATION" >
                                                        <option value="">&nbsp;All </option>
                                                      <?php foreach($get_education_data as $education){ ?>
                                                         <option value="<?php echo $education['ID']?>">    <?php echo $education['TITLE']?></option>
                                                      <?php } ?>

                                                    </select>
                                                    </label>
                                                </section>
                                                <section class="col col-4">

                                                    <label class="input"> Training :
                                                    <select class="form-control js-example-basic-multiple" name="TRAINING" >
                                                        <option value="">&nbsp;All Training</option>
                                                      <?php foreach($get_training_data as $training){ ?>
                                                         <option value="<?php echo $training['ID']?>">    <?php echo $training['TITLE']?></option>
                                                      <?php } ?>

                                                    </select>
                                                    </label>
                                                </section>
                                            </div>
        										<div class="row" >
															<footer>

																<input type="submit"  class="btn btn-primary btn-small" value="Search">
                                                                <a class="btn btn-danger btn-small" href="javascript:void(0);" onclick="LoadAjaxScreen('staff','add_staff')"><i class="fa fa-plus"></i> Add <?php echo $Title?></a>
                            
															</footer>
													</div>
        									 </fieldset>
                                    </form>


                                    <!-- view customer details -->
                                 
                                    <div class="col-12 col-sm-12" id="showprint">
                                           &nbsp;
                                    <a href="javascript:void(0);" id="printbutton" onclick="printDiv()" style="display: none;" class="btn btn-default btn-small pull-right"><i class="glyphicon glyphicon-print"></i> Print Report</a>
                                    <br><br>
                                        <table class="table table-bordered table-hover" id="filtersearchpanel" style="display: none;" >
                                             
                                            <tbody class="filterresult">

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
        <script type="text/javascript">
                // Delete Alert
                function deletestaff(id){

                        var action="<?php echo base_url();?>admin/staff/delete";
                            
                   $.SmartMessageBox({
                            title : "Delete Record !",
                            content : "Are you sure to delete this record ?",
                            buttons : '[No][Yes]'
                        }, function(ButtonPressed) {
                            if (ButtonPressed === "Yes") {
                                    $.ajax({
                                        url:action,
                                        type:'POST',
                                        data:{id:id},
                                        success:function(result){
                                            if(result=='deleted'){
                                                $.smallBox({
                                                    title : "Record Deleted",
                                                    content : "<i class='fa fa-clock-o'></i> <i>Record successfully deleted</i>",
                                                    color : "#659265",
                                                    iconSmall : "fa fa-check fa-2x fadeInRight animated",
                                                    timeout : 4000
                                                });
                                                $('#stafffilter-form').trigger('submit');
                                            }
                                            else{
                                                $.smallBox({
                                                    title : "Record Not Deleted",
                                                    content : "<i class='fa fa-clock-o'></i> <i>Error found in the system </i>",
                                                    color : "#C46A69",
                                                    iconSmall : "fa fa-times fa-2x fadeInRight animated",
                                                    timeout : 4000
                                                });
                                            }
                                        },
                                        error: function (xhr, textStatus, errorThrown){
                                            alert(xhr.responseText);
                                        }
                                    });

                            }
                            if (ButtonPressed === "No") {
                                $.smallBox({
                                    title : "Request Cancelled",
                                    content : "<i class='fa fa-clock-o'></i> <i>Request successfully cancelled</i>",
                                    color : "#C46A69",
                                    iconSmall : "fa fa-times fa-2x fadeInRight animated",
                                    timeout : 4000
                                });
                            }

                        });
                }
                   
                    // Delete Alert
        </script>
