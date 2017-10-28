ok updateSight.ctp<br>

<?php

	$newSight = 5;
	$id = 1;
	/*echo*/ $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'updateSight']));
	/*echo*/ $this->Form->hidden('currentId', array('value'=> $id));
	/*echo*/ $this->Form->hidden('addSight', array('value'=> $newSight));
	/*echo*/ $this->Form->end();

?>