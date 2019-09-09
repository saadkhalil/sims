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
                            Busniess Monthly II <?php echo $Title ?>
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

                                <form class="smart-form" id="businesssummary2-form"  action="<?php echo base_url()?>admin/dealer_reports/filter1" >

                                        <header>
                                            Report Criteria
                                        </header>


                                        <fieldset>
                                            
                                            <div class="row" >
                                                <section class="col col-5">

                                                    <label class="input"> From :
                                                        <input type="text" class="form-control datepicker" name="FROM" readonly="" value="<?php echo date('m/01/Y')?>">
                                                    </label>

                                                </section>
                                                <section class="col col-5">

                                                    <label class="input"> To:
                                                        <input type="text" class="form-control datepicker" name="TO" readonly="" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y'). ' +1 day'))?>">
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
                                         <h2 style="text-align: center;">Monthly Business II Report</h2>
                                           
                                        </div>
                                        <table class="table table-bordered table-hover" border="1" cellpadding="3" id="filtersearchpanel" style="display: none;" >
                                                &nbsp;
                                        <a href="javascript:void(0);" id="printbutton" onclick="printDiv()" style="display: none;" class="btn btn-default btn-small pull-right"><i class="glyphicon glyphicon-print"></i> Print Report</a>
                                        <br><br>
                                            <tbody class="filterresult">

                                            </tbody>
                                        </table>
                                    </div>

                                   


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
