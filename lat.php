<?php
ob_start();
?>

<?php
	for($i=3;$i<=3;$i++){
$var=$i;
	$qu="select ip_address from throttle where id=$var";
	$result=mysqli_query($obj->con,$qu);
	$no_records=mysqli_num_rows($result);
	 $arr=mysqli_fetch_array($result);
	//echo $arr['ip_address'];
	//$json = file_get_contents("http://ip-api.com/json/".$arr['ip_address']);
	//$xyz =json_decode($json,true);
	//echo "city:".$xyz["city"].'&nbsp;'."LAT:".$xyz["lat"].'&nbsp;'."Long:".$xyz["lon"].'&nbsp;'."country:".$xyz["country"]."<br>";
	// $ad="update throttle SET country='".$xyz["country"]."',city='".$xyz["city"]."',lat='".$xyz["lat"]."',lon='".$xyz["lon"]."' where id=$var";
//	 mysqli_query($obj->con,$ad);
		}
	?>
    <?php 
	
		$lat= array();
		$lon = array();
		$city= array();
		for($i=3;$i<=871;$i++)
		{
			$pro=$i;
			$qu="select lat,lon,city from throttle where id=$pro";
				$result=mysqli_query($obj->con,$qu);
				$no_records=mysqli_num_rows($result);
				 $la=mysqli_fetch_array($result);
			$_SESSION['lat']=$la['lat'];
			array_push($lat,$la['lat']);
			$_SESSION['lon']=$la['lon'];
			array_push($lon,$la['lon']);
			$_SESSION['city']=$la['city'];
			array_push($city,$la['city']);
			//echo $_SESSION['lat'] .'&nbsp;'.$_SESSION['lon'] .'&nbsp;'.'<br>';
		}
	?>
    
	<html>
  <head>
    <title>Website Analyzer</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5wynTot2FMEHSQEXX-iVwCRArPhXBP2c"></script>
    <script>
      // In this example, we center the map, and add a marker, using a LatLng object
      // literal instead of a google.maps.LatLng object. LatLng object literals are
      // a convenient way to add a LatLng coordinate and, in most cases, can be used
      // in place of a google.maps.LatLng object.

	
     var map;
      function initialize() {
	    var mapOptions = {
          zoom: 6,
		  
          center: { lat: 20.5937 , lng: 78.9629}
        };
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);
		var infowindow = new google.maps.InfoWindow();
		<?php
		for($i=0;$i<sizeof($lat);$i++){	
						
			 echo "var marker = new google.maps.Marker({\n";
			 echo "position:  {lat:".$lat[$i] .",lng:" .$lon[$i]. "},\n";
			 echo "map: map,\n";
			 echo "title:'".$city[$i].'\n'.$lat[$i]."'";
			 echo "});\n";
			 
		}
		?>
        // You can use a LatLng literal in place of a google.maps.LatLng object when
        // creating the Marker object. Once the Marker object is instantiated, its
        // position will be available as a google.maps.LatLng object. In this case,
        // we retrieve the marker's position using the
        // google.maps.LatLng.getPosition() method.
		/*
        var infowindow = new google.maps.InfoWindow({
          content: '<p>Marker Location:' + marker.getPosition() + '</p>'
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
        });
	  */
	  }

     google.maps.event.addDomListener(window, 'load', initialize);
	  
    </script>
  </head>
</html>
