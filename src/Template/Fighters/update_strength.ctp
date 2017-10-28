ok updateStrength.ctp<br>

<?php

	$newStrength = 2;
	$id = 1;
	/*echo*/ $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'updateStrength']));
	/*echo*/ $this->Form->hidden('currentId', array('value'=> $id));
	/*echo*/ $this->Form->hidden('addStrength', array('value'=> $newStrength));
	/*echo*/ $this->Form->end();

?>
