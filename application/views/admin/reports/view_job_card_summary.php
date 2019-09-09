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
                            View Job Card Summary <?php echo $Title ?>
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

                                <form class="smart-form" id="jobcardsummaryfilter-form"  action="<?php echo base_url()?>admin/reports/filterjobcardsummary">
                                        <!-- <input type="hidden" name="DEALER_ID" value="<?php echo $get_login_data->ID?>"> -->

                                        <header>
                                            Search Parameter
                                        </header>


                                        <fieldset>
                                            <?php  if($this->session->userdata('USER_ROLE')=='Admin'){ ?>
        								    <?php } ?>
                                            <div class="row" >
                                                <section class="col col-5">

                                                    <label class="input"> Job Opening Date From :
                                                        <input type="text" class="form-control datepicker" name="JOB_OPENING_DATE_FROM" readonly="" value="<?php echo date('m/01/Y')?>">
                                                    </label>

                                                </section>
                                                <section class="col col-5">

                                                    <label class="input"> Job Opening Date To:
                                                        <input type="text"  class="form-control datepicker" name="JOB_OPENING_DATE_TO" readonly="" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y'). ' +1 day'))?>">
                                                    </label>

                                                </section>
                                                <!-- 
                                                <section class="col col-5">

                                                    <label class="input"> Customer Name :
                                                        <input type="text" class="form-control" name="CUSTOMER_NAME" placeholder="Search by Customer">
                                                    </label>

                                                </section>
                                                <section class="col col-5">

                                                    <label class="input"> Job Ref Number:
                                                        <input type="text" class="form-control" name="JOB_REF_NUMBER"  placeholder="Search by Job Reference">
                                                    </label>

                                                </section> -->
                                                <section class="col col-5">

                                                    <label class="input"> Job Status:
                                                        <select class="form-control" name="JOB_STATUS">
                                                             <option value="">Please select</option>
                                                             <option value="All">All</option>
                                                             <option value="Open">Open</option>
                                                             <option value="Closed">Closed</option>
                                                             <option value="Cancel">Cancel</option>
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
                                                <section class="col col-5">

                                                    <label class="input"> Region :
        											<select class="form-control js-example-basic-multiple" name="REGION_ID" >
        												<option value="">&nbsp;Please Select</option>
        											  <?php foreach($get_region_data as $dealers){ ?>
        											 	 <option value="<?php echo $dealers['ID']?>">    <?php echo $dealers['CODE'].'  - '.$dealers['TITLE']?></option>
        											  <?php } ?>

        											</select>
        											</label>

                                                </section>
                                                <section class="col col-5">

                                                    <label class="input"> Territory :
        											<select class="form-control js-example-basic-multiple" name="TERRITORY_ID" >
        												<option value="">&nbsp;Please Select</option>
        											  <?php foreach($get_territory_data as $dealers){ ?>
        											 	 <option value="<?php echo $dealers['ID']?>">    <?php echo $dealers['CODE'].'  - '.$dealers['TITLE']?></option>
        											  <?php } ?>

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
                                    <div class="col-12 col-sm-12" id="showprint">
                                        <div class="logoprint" style="display: none;" >
                                        <img src="<?php echo base_url()?>assets/admin/img/logo.png" style="margin-left: 290px; width: 20%;"  >
                                            <h2 style="text-align: center;">Job Card Summary Report</h2>
                                            
                                        </div>
                                        <table class="table table-bordered table-hover" border="1" cellpadding="3" id="filtersearchpanel" style="display: none;" >
                                            &nbsp;
                                            <a href="javascript:void(0);" id="printbutton" onclick="printDiv()" style="display: none;" class="btn btn-default btn-small pull-right"><i class="glyphicon glyphicon-print"></i> Print Report</a>
                                            <br><br>
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
