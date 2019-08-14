<?php
ob_start();
header ('Content-Type:application/json');
include "../lib/database.php";
//$qu=" select city, occurence from throttle GROUP BY city ORDER BY COUNT(city) desc ";
$qu="select city,occurrence from frequency GROUP BY city order by occurrence desc";
	$result=mysqli_query($obj->con,$qu);
	$no_records=mysqli_num_rows($result);
	while($arr=mysqli_fetch_assoc($result))
	{
		//echo $arr['city'].$arr['COUNT(city)']."<br>" ;
	    //$_SESSION['city']=$arr['city'];
		//$_SESSION['count']=$arr['COUNT(city)'];
		print json_encode($arr);
		
		//$sq= "INSERT INTO `frequency` (`city`,`occurrence`) VALUES ('".$arr['city']."',".$arr['COUNT(city)'].");";	
		//mysqli_query($obj->con,$sq);
	}
?>	