        <!-- MAIN CONTENT -->
                <div id="content">

                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-10 col-lg-14">
                            <h1 class="page-title txt-color-blueDark">
                                <i class="fa fa-edit fa-fw "></i> 
                                    Home
                                <span>>
                                     <?php echo $Title; ?>
                                </span>
                                <span>>
                                    View Network Summary <?php echo $Title;  ?>
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
                   
                                        <!-- widget content -->
                                        <div class="widget-body no-padding">

                    
                                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                    
                                            <thead>
                                                <tr>
                                                    <th data-class="expand"><b>Region</b></th>
                                                    <?php   foreach($get_dealership_group_data as $dealership){ ?>
                                                     <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i><?php echo $dealership['TITLE']; ?></th>
                                                    <?php }  ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                foreach($get_dealership_count_by_region as $key => $countregion){
                                                    ?>
                                                <tr>
                                                    
                                                       <td><?php echo $key?></td>
                                                    <?php foreach($countregion as $creg){ ?>
                                                    <td><?php echo $creg?></td>
                                                    <?php } ?>
                                                </tr>
                                              <?php } ?>
                                              <tr>
                                                  <td><b>National</b></td>
                                                      <?php foreach($get_dealership_count_by_national as  $national){ ?>
                                                        <td><b><?php echo $national?></b></td>
                                                    <?php } ?>
                                              </tr>
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
                