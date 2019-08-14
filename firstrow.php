<div class="row">
		    <div class="col-lg-9 col-md-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-map-marker red"></i><strong>Cities</strong></h2>
							<div class="panel-actions">
								<a href="" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="" class="btn-close"><i class="fa fa-times"></i></a>
							</div>	
						</div>
						<div class="panel-body-map">
							<div id="map" style="height:380px;width:750px;">
							<?php include "lat.php"; ?>
                            
							</div>	
						</div>
	
					</div>
				</div>
              <div class="col-md-3">
              <!-- List starts -->
				<ul class="today-datas">
                <!-- List #1 -->
				<li>
                  <!-- Graph -->
                  
                <li>
                  <div><span id="todayspark5" class="spark"></span></div>
                  <div class="datas-text">
                  
                  <?php
                  $sum="SELECT SUM(occurrence) AS total from frequency";
$result=mysqli_query($obj->con,$sum);
$ar=mysqli_fetch_assoc($result);
$total=$ar["total"];                                
    echo  $total;
	?> <a href="chart-chartjs.php">Website visitors</a></div>
                </li>                                                                                                              
              </ul>
              </div>
              
			 
           </div>