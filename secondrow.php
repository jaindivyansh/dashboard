

<div class="row">
               	
				<div class="col-lg-11 col-md-12">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-flag-o red"></i><strong>Viewers</strong></h2>
							<div class="panel-actions">
								<a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<table class="table bootstrap-datatable countries">
								<thead>
									<tr>
										
										<th>city</th>
										
										<th>Number Of times</th>
                                        <th>Percentage</th>
										<th>Performance</th>
									</tr>
								</thead> 
                               
								<tbody>
                                  <?php 
				$qu="select * from frequency order by occurrence desc limit 5";
				$result=mysqli_query($obj->con,$qu);
				while($arr=mysqli_fetch_assoc($result))
				{
				?>  
									<tr>
							
										<td><?php echo $arr['city'];?></td>
										<td><?php echo $arr['occurrence'];?></td>
                                        <td><?php echo $arr['percentage'];?> %</td>
										<td>
											<div class="progress thin">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $arr['percentage']; ?>%">
												</div>
                                                </div>
											</div>
											  	
										</td>
									</tr>
                                  <?php
                                  }
                                  ?>
                                   
                                    
								</tbody>
							</table>
						</div>
	
					</div>	

				</div><!--/col-->
				
				<!--/col-->
				<!--/col-->
				</div>
</div>
              </div>