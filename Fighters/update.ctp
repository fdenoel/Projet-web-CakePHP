ok update ctp


<?php
	$a=1;
	$f=$Fighters->get(1);
	foreach ($updateFighter as $i) {
		if($i['id']==$a){
			echo "name:", $i['name'];
			$i['name'] = "Gimli";
			$this->save($i);
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
	// update fighter id = 1
	//$Fighters=$this->get(1)
	//	$Fighters->coordinate_x = 1;
	//	$Fighters->coordinate_y = 9;
	//	$Fighters->xp = 0
	 //   $Fighters->level = floor( $a->xp /4);
	//	$Fighters->skill_sight = 3;
	//	$Fighters->skill_strength = 2;
	//	$Fighters->skill_health = 4;
	//	$Fighters->current_health = 3
	//	$Fighters->skill_healthnext_action_time ='000-00-00 00:00:00';

	//	$this->save($Fighters);

	//	echo $Fighters['id'] = 1;
?>
