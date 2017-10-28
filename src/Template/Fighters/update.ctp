ok update.ctp<br>

<?php
$newXp = 5;
$id = 1;
/*echo*/ $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'update']));
/*echo*/ $this->Form->hidden('currentId', array('value'=> $id));
/*echo*/ $this->Form->hidden('addXp', array('value'=> $newXp));
//echo $this->Form->button('Submit', array('type'=>'submit'));
/*echo*/ $this->Form->end();
			

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
