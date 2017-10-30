ok updateLevel.ctp<br>

<?php

	//$currentId = $fighter->id;
-
-	$xp=$f['xp'];
-	$id=$f['id'];
-	echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'updateLevel']));
-	//$this->Form->hidden('currentId', array('value'=> $id));
-	echo $this->Form->hidden('id', array('value'=> $id));
-	echo $this->Form->hidden('xp', array('value'=> $xp));
-
-	if($f->xp >= (($f->level)*4+4)) {
-		echo ("selectionner pour ajouter un niveau");
-
-		$options = array(
-			'1'=> 'Vue +1',
-			'2'=> 'Vie +3',
-			'3'=> 'Force +1'
-			);
-		echo $this->Form->input('skill' , array('options' => $options));
-		/*echo $this->Form->select('choix',
-		    ['Vue +1', 'Vie max +3', 'Force +1'], ['empty' => '(Choisissez un skill à augmenter)']);*/
-
-		echo $this->Form->button('select',['type' => 'submit']);
-		echo $this->Form->end();
-
-	}

?>
