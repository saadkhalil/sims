	<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							<i class="fa fa-home"></i> 
								Home
							<span>> 
								Dashboard
							</span>
						</h1>
					</div>
				</div>
                <?php if($this->session->userdata('USER_ROLE')=='Dealer'){ ?>
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel dpanel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                     <!--    <h3 class="mar-no"> <span class="counter">04</span></h3> -->
                                        <p class="mar-ver-5"><b>Current Job Card</b></p>
                                        <br>
                                        <p>Total </p>
                                        <p>Open</p>
                                        <p>Closed</p>
                                        
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa fa-bookmark fa-2x text-info"></i><br><br>
                                            <p><?php echo $totalcurrentcount?></p>
                                            <p><?php echo $opencurrentcount?></p>
                                            <p><?php echo $closedcurrentcount?></p>
                                     </div>
                                </div>
                            </div>
                        </div>
	                 </div>
	                <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel dpanel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                     <!--    <h3 class="mar-no"> <span class="counter">04</span></h3> -->
                                        <p class="mar-ver-5"><b>Monthly Job Card</b></p>
                                        <br>
                                        <p>Total </p>
                                        <p>Open</p>
                                        <p>Closed</p>
                                        
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa fa-bookmark fa-2x text-danger"></i><br><br>
                                            <p><?php echo $totalmonthcount?></p>
                                            <p><?php echo $openmonthcount?></p>
                                            <p><?php echo $closedcopencount?></p>
                                     </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel dpanel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                     <!--    <h3 class="mar-no"> <span class="counter">04</span></h3> -->
                                        <p class="mar-ver-5"><b>Customers</b></p>
                                        <br>
                                        <p>Total </p>
                                        <p>Current</p>
                                        <p>New this month</p>
                                        
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa fa-users fa-2x text-success"></i><br><br>
                                            <p><?php echo $totalcustomercount?></p>
                                            <p><?php echo $currentcustomercount?></p>
                                            <p><?php echo $monthcustomercount?></p>
                                     </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <span style="display: none;" id="strmonth"></span>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="panel dpanel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                     <!--    <h3 class="mar-no"> <span class="counter">04</span></h3> -->
                                        <p class="mar-ver-5"><b>Sales</b></p>
                                        <br>
                                        <p>Total</p>
                                        <p>Current </p>
                                        <p>Monthly</p>
                                       
                                        
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa fa-shopping-cart fa-2x text-warning"></i><br><br>
                                            <p><?php echo ($totalsales->TOTAL=="" ? 0 : $totalsales->TOTAL)?></p>
                                            <p><?php echo ($currentsales->TOTAL=="" ? 0 : $currentsales->TOTAL)?></p>
                                            <p><?php echo ($monthsales->TOTAL=="" ? 0 : $monthsales->TOTAL)?></p>
                                     </div>
                                </div>
                            </div>
                        </div>
                     </div>
				</div>

                <div class="row">
                    
                   <!-- NEW WIDGET START -->
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                           <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
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
                                <header>
                                    
                                    <h2>Services & Accessories </h2>                
                                    
                                </header>

                                <!-- widget div-->
                                <div>
                                    
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->
                                        <input class="form-control" type="text">    
                                    </div>
                                    <!-- end widget edit box -->
                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                        
                                        <!-- this is what the user will see -->
                                        <canvas id="lineChart" height="120"></canvas>

                                    </div>
                                    <!-- end widget content -->
                                    
                                </div>
                                <!-- end widget div -->
                                
                            </div>

                        </article>
                        <!-- WIDGET END -->
                </div>
        
				<div class="row">

					<!-- new widget -->
						<!-- NEW WIDGET START -->
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <!-- Widget ID (each widget will need unique ID)-->
                            <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false">
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
                                <header>
                                    <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                                    <h2>Job Card</h2>

                                </header>

                                <!-- widget div-->
                                <div>

                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
                                    <!-- end widget edit box -->

                                     <!-- widget content -->
                                    <div class="widget-body">
                                        
                                        <!-- this is what the user will see -->
                                        <canvas id="JobChart" height="120"></canvas>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                            </div>
                            <!-- end widget -->

                        </article>
                        <!-- WIDGET END -->
				</div>
                <?php }  ?>



			</div>
	

			<!-- END MAIN CONTENT -->

<script type="text/javascript">
                
    $(document).ready(function() {

        
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function(opacity) {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
        };

                
        var JobConfig = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July","Aug","Sept","Oct","Nov","Dec"],
                datasets: [{
                    label: "Job Card",
                     data: [<?php foreach($jobmontarr as $job){
                        echo ','.$job;
                    }
                     ?>],
                    
                }]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'label'
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 100,
                        }
                    }]
                }
            }
        };
        window.onload = function() {
            window.jobline = new Chart(document.getElementById("JobChart"), JobConfig);
            window.linechart = new Chart(document.getElementById("lineChart"), LineConfig);

          
        };

        $.each(JobConfig.data.datasets, function(i, dataset) {
            dataset.borderColor = 'rgba(0,0,0,0.15)';
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = 'rgba(0,0,0,0.15)';
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });

     
        var LineConfig = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July","Aug","Sept","Oct","Nov","Dec"],
                datasets: [{
                    label: "Labour",
                   
                    data: [<?php foreach($sermontarr as $ser){
                        echo ','.$ser;
                    }
                     ?>],
                    
                }, {
                    label: "Parts",
                    data: [<?php foreach($accmontarr as $acc){
                        echo ','.$acc;
                    }
                     ?>],
                }]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'label'
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 100,
                        }
                    }]
                }
            }
        };
     

        $.each(LineConfig.data.datasets, function(i, dataset) {
            dataset.borderColor = 'rgba(0,0,0,0.15)';
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = 'rgba(0,0,0,0.15)';
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });          
    });
</script>
			