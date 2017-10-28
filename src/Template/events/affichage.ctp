<?php

foreach($events as $events)
{
	$name=$events['name'];
	$date=$events['date'];
	$x=$events['coordinate_x'];
	$y=$events['coordinate_y'];
	echo("$name date : ($x;$y)<br>");
}
?>