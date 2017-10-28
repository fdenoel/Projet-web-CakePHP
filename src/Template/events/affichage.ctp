<?php

foreach($events as $events)
{
	$date=$events['date'];
	if($date->wasWithinLast(1))
	{
		$name=$events['name'];
		$x=$events['coordinate_x'];
		$y=$events['coordinate_y'];
		echo("$date $name en ($x;$y) <br>");

	}
}
?>