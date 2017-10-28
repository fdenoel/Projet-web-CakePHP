ok updateCurrentHp.ctp<br>

<?php

	$newHp = 5;
	$id = 1;
	/*echo*/ $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'updateCurrentHp']));
	/*echo*/ $this->Form->hidden('currentId', array('value'=> $id));
	/*echo*/ $this->Form->hidden('chgHp', array('value'=> $newHp));
	/*echo*/ $this->Form->end();

?>