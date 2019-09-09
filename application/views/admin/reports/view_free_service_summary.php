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
                            View Free Service Summary <?php echo $Title ?>
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

                                <form class="smart-form" id="freeservicesummaryfilter-form"  action="<?php echo base_url()?>admin/reports/filterfreeservicesummary">
                                        <header>
                                            Search Parameter
                                        </header>


                                        <fieldset>
                                            <?php  if($this->session->userdata('USER_ROLE')=='Admin'){ ?>
        								    <?php } ?>
                                            <div class="row" >
                                                <section class="col col-5">

                                                    <label class="input"> Closing Date From :
                                                        <input type="text" class="form-control datepicker" name="CLOSING_DATE_FROM" readonly="" value="<?php echo date('m/01/Y')?>">
                                                    </label>

                                                </section>
                                                <section class="col col-5">

                                                    <label class="input"> Closing Date To:
                                                        <input type="text" class="form-control datepicker" name="CLOSING_DATE_TO" readonly="" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y'). ' +1 day'))?>">
                                                    </label>

                                                </section>
                                                <section class="col col-5">

                                                    <label class="input"> Region / Sales Office :
        											<select class="form-control js-example-basic-multiple" name="REGION_ID" >
        												<option value="">&nbsp;Please Select</option>
        											  <?php foreach($get_region_data as $region){ ?>
        											 	 <option value="<?php echo $region['ID']?>">    <?php echo $region['CODE'].'  - '.$region['TITLE']?></option>
        											  <?php } ?>

        											</select>
        											</label>

                                                </section>
                                                <section class="col col-5">

                                                    <label class="input"> Territory / Sales Group :
        											<select class="form-control js-example-basic-multiple" name="TERRITORY_ID" >
        												<option value="">&nbsp;Please Select</option>
        											  <?php foreach($get_territory_data as $territory){ ?>
        											 	 <option value="<?php echo $territory['ID']?>">    <?php echo $territory['CODE'].'  - '.$territory['TITLE']?></option>
        											  <?php } ?>

        											</select>
        											</label>

                                                </section>
                                                <section class="col col-5">

                                                    <label class="input"> Dealer Category :
        											<select class="form-control js-example-basic-multiple" name="DEALERSHIP_ID" >
        												<option value="">&nbsp;Please Select</option>
                                                        <option value="all">All</option>
            											  <?php foreach($get_dealership_group_data as $dealership_group){ ?>
            											 	 <option value="<?php echo $dealership_group['ID']?>">    <?php echo $dealership_group['TITLE']?></option>
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
                                            <h2 style="text-align: center;">Free Service Summary Report</h2>
                                        </div>
                                        <table class="table table-bordered table-hover" border="1" cellpadding="3" id="filtersearchpanel" style="display: none;" >
                                         &nbsp;
                                        <a href="javascript:void(0);" id="printbutton" onclick="printDiv()" style="display: none;" class="btn btn-default btn-small pull-right"><i class="glyphicon glyphicon-print"></i> Print Report</a>
                                        <br><br>

                                            <tbody class="filterresult">
                                                 
                                            </tbody>
                                        </table>
                                        <div style="display: none;" id="signingmartrix">
                                        <br><br><table class="table" style="width:100%;"><tbody><tr><td width="25%">R.M SERVICE</td><td width="25%">N.M SERVICE</td><td width="25%">G.M AFETR SALES</td><td>V.P MARKETING</td></tr></tbody></table>
                                         </div>
                                    </div>
                                    <!-- view customer details -->


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
