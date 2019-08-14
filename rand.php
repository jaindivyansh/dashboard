<?php

$datestart = strtotime('2009-12-10');//you can change it to your timestamp;
$dateend = strtotime('2009-12-31');//you can change it to your timestamp;

$daystep = 86400;
for($i=0;$i<=870;$i++){
$datebetween = abs(($dateend - $datestart) / $daystep);

$randomday = rand(0, $datebetween);

echo "\$randomday: $randomday\n";

echo date("Y-m-d", $datestart + ($randomday * $daystep)) . "\n";

}
?>