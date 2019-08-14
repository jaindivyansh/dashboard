<?php
ob_start();
include "../lib/database.php";
$city= array();
$occurrency= array();
//$qu=" select city, occurence from throttle GROUP BY city ORDER BY COUNT(city) desc ";
$qu="select city,occurrence from frequency GROUP BY city order by occurrence desc";
	$result=mysqli_query($obj->con,$qu);
	$no_records=mysqli_num_rows($result);
	$i=0; 
	while($arr=mysqli_fetch_assoc($result))
	{
		$city[$i] = $arr["city"];
		$occurrency[$i] = $arr["occurrence"]; 
		$i= $i + 1;
	}
$sum="SELECT SUM(occurrence) AS total from frequency";
$result=mysqli_query($obj->con,$sum);
$ar=mysqli_fetch_assoc($result);
$total=$ar["total"];
//echo $total;

?>	


<html>
<head>
<title>Top location for website smartcity Gwalior</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>

<?php
	echo $arr["occurence"].$arr["city"];
	$dataPoints = array();
	for($i=0;$i<sizeof($city);$i++)
	{
		array_push($dataPoints,array("y"=>($occurrency[$i]/$total)*100,"name"=>$city[$i]));
	}
	
?>   
 
<body>
<div id="chartContainer"></div>
<script type="text/javascript">
$(function () {
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "theme2",
	title:{
		text: "Top locations for website smartcity Gwalior"
	},
	//exportFileName: "Top location for website smartcity Gwalior",
	exportEnabled: true,
	animationEnabled: true,		
	data: [
	{       
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} {y}%",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
});
</script>
</body>
 
</html>