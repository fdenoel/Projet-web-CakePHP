<?php
	

	$a=0;
	foreach ($affListFighter as $i) {
		$a=$a+1;
		if($i['id']==$a){
			echo "name:", $i['name'];
			echo "<br>";
			echo "level:", $i['level'];
			echo "<br>";
			echo "xp:", $i['xp'];
			echo "<br>";
			echo "vu:", $i['skill_sight'];
			echo "<br>";
			echo "force:", $i['skill_strength'];
			echo "<br>";
			echo "HP max:", $i['skill_health'];
			echo "<br>";
			echo "HP:", $i['current_health'];
			echo "<br>";

		}
		
	}

?>
