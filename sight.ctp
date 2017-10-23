<?php
$a=0;
$z;



foreach ($arene as $i) {
	$a=$a+1;
	if($allFighters['coordinate_x']==$i['coordinate_x'] && $allFighters['coordinate_y']==$i['coordinate_y'])
	{
		echo "H";
	}
	else{
		$z=abs($allFighters['coordinate_y']-$i['coordinate_y'])+abs($allFighters['coordinate_x']-$i['coordinate_x']);
		if($z > $allFighters['skill_sight'])
		{
			echo "?";
		}
		else
		{
			if($i['type']=="sol"){
				echo "_";
			}else{
				echo"x";
			}
		}
	}	
	if($a==15){
		echo "<br>";
		$a=0;
	}
}




echo $this->Form->create('Fighters', array('url'=>['controller'=>'Arenas', 'action'=>'sight']));
echo $this->Form->hidden('id', array('value'=> 1));
echo $this->Form->button('Haut', array('type'=>'submit'));
echo $this->Form->end();
echo "<br>";

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Arenas', 'action'=>'sight']));
echo $this->Form->hidden('id', array('value'=> 2));
echo $this->Form->button('Gauche', array('type'=>'submit'));
echo $this->Form->end();






echo "déplacement";

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Arenas', 'action'=>'sight']));
echo $this->Form->hidden('id', array('value'=> 3));
echo $this->Form->button('Droite', array('type'=>'submit'));
echo $this->Form->end();


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Arenas', 'action'=>'sight']));
echo $this->Form->hidden('id', array('value'=> 4));
echo $this->Form->button('Bas', array('type'=>'submit'));
echo $this->Form->end();

echo "<br>";

echo "<br>";
echo "<br>";
echo $this->Form->button('Haut', ['type' => 'button']);
echo "<br>";
echo $this->Form->button('Gauche', ['type' => 'button']);
echo "attaque";
echo $this->Form->button('Droite', ['type' => 'button']);
echo "<br>";
echo $this->Form->button('Bas', ['type' => 'button']);
?>