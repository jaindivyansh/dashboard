<?php
/**
 * Function written by Roger E Thomas (http://www.rogerethomas.com)
 * 2011
 */

$googleMapsAPIKey="AIzaSyD5wynTot2FMEHSQEXX-iVwCRArPhXBP2c"; // your Google Maps API Key
$ipAddress = $_SERVER['REMOTE_ADDR'];
$mapResult = mapUserIPWithGoogleMaps($ipAddress,"400px","400px",$apiKey,$googleMapsAPIKey);

function mapUserIPWithGoogleMaps($ipAddress,$mapHeight,$mapWidth,$apiKey,$googleMapsAPIKey) {
    $xml = simplexml_load_file('http://api.ipinfodb.com/v2/ip_query.php?key='.$apiKey.'&ip='.$ipAddress.'&timezone=true');
    $result['ip'] = $xml->Ip;
    $result['status'] = $xml->Status;
    $result['country'] = $xml->CountryName;
    $result['region'] = $xml->RegionName;
    $result['city'] = $xml->City;
    $result['latitude'] = $xml->Latitude;
    $result['longitude'] = $xml->Longitude;
    $result['timezone'] = $xml->TimezoneName;
    $result['jsLink'] = "<script src=\"http://maps.google.com/maps?file=api&v=1&key=".$googleMapsAPIKey."\" type=\"text/javascript\"></script>";
    $result['mapDiv'] = "
        <div id=\"map\" style=\"width: ".$mapWidth."; height: ".$mapHeight."; margin-top:20px;\"></div>
            <script type=\"text/javascript\">
            var map = new GMap(document.getElementById(\"map\"));
            var point = new GPoint(".$result['longitude'].",".$result['latitude'].");
            map.centerAndZoom(point, 3);
            var marker = new GMarker(point);
            map.addOverlay(marker);
            </script>
        </div>
    ";
    return $result;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
echo $mapResult['jsLink'];
?>
</head>
<body style="text-align:center;">
<div style="margin-left:auto;margin-right:auto;width:600px;text-align:left;">
    <b>IP Address:</b> <?php echo $mapResult['ip']; ?><br />
    <b>Country:</b> <?php echo $mapResult['country']; ?><br />
    <b>Region:</b> <?php echo $mapResult['region']; ?><br />
    <b>City:</b> <?php echo $mapResult['city']; ?><br />
    <b>Timezone:</b> <?php echo $mapResult['timezone']; ?><br />

    <?php echo $mapResult['mapDiv']; ?>

</div>


</body>
</html>