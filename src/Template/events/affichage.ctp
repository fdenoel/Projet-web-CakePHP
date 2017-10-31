<?php

foreach($events as $events)
{
	$date=$events['date'];
	if($date->wasWithinLast(1))
	{
		?>
		<div style="background-color: white; opacity: 0.60;">
		<?php
		$name=$events['name'];
		$x=$events['coordinate_x'];
		$y=$events['coordinate_y'];
		echo("$date $name en ($x;$y) <br>");
		?>
		</div>
		<?php
	}
}
?>