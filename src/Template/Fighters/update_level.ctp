ok updateLevel.ctp<br>

<?php

	$newXp = 5;
	$id = 1;
	/*echo*/ $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'updateLevel']));
	/*echo*/ $this->Form->hidden('currentId', array('value'=> $id));
	/*echo*/ $this->Form->hidden('addXp', array('value'=> $newXp));
	/*echo*/ $this->Form->end();

?>
