ok updateMaxHp.ctp<br>

<?php

	$newMaxHp = 5;
	$id = 1;
	/*echo*/ $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'updateMaxHp']));
	/*echo*/ $this->Form->hidden('currentId', array('value'=> $id));
	/*echo*/ $this->Form->hidden('addHp', array('value'=> $newMaxHp));
	/*echo*/ $this->Form->end();

?>