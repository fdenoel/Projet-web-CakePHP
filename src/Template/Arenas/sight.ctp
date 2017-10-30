<?php
$x=0;
$y=0;
$proximite=0;
$occupe;


echo $this->Form->create('Surroundings', array('url'=>['controller'=>'surroundings', 'action'=>'generationDecor']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->button('régénération du décor', array('type'=>'submit'));
echo $this->Form->end();

echo $this->Form->create('Tools', array('url'=>['controller'=>'tools', 'action'=>'generationEquipement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->button('génération de l\'équipement', array('type'=>'submit'));
echo $this->Form->end();
echo "<br>";

while($x<15)
{
	while($y<10)
	{
		$z=abs($fighter['coordinate_y']-$y)+abs($fighter['coordinate_x']-$x);
		if($z > $fighter['skill_sight'])
		{
				echo "?";
		}
		else
		{
			$occupe=0;
			foreach($allFighters as $j)
			{
				if($j['coordinate_x']==$x && $j['coordinate_y']==$y)
				{

					if($j['id']<>$fighter['id'])
					{
						echo "E";
					}
					else
					{
						echo "H";
					}
						$occupe=1;
				}	
			}
			if($occupe==0)
			{
				foreach($arene as $obstacle)
				{
					if($obstacle['coordinate_x']==$x && $obstacle['coordinate_y']==$y && $obstacle['type']=='P')
					{
						echo "x";
						$occupe=1;
					}
				}

				foreach($tool as $obstacle)
				{
					if($obstacle['coordinate_x']==$x && $obstacle['coordinate_y']==$y)
					{
						echo "A";
						$occupe=1;
					}
				}

				if($occupe==0)
				{
					echo "_";
				}
			}
		}
		$y=$y+1;
	}
	$x=$x+1;
	$y=0;
	echo "<br>";
}


foreach($arene as $obstacle)
{
	if($obstacle['type']=='T')
	{
		if(($fighter['coordinate_x']==$obstacle['coordinate_x']-1 && $fighter['coordinate_y']==$obstacle['coordinate_y']) || ($fighter['coordinate_x']==$obstacle['coordinate_x']+1 && $fighter['coordinate_y']==$obstacle['coordinate_y']) || ($fighter['coordinate_x']==$obstacle['coordinate_x'] && $fighter['coordinate_y']==$obstacle['coordinate_y']-1) ||($fighter['coordinate_x']==$obstacle['coordinate_x'] && $fighter['coordinate_y']==$obstacle['coordinate_y']+1))
		{
			echo "<br>Brise suspecte<br>";
		}
	}
}

foreach($arene as $obstacle)
{
	if($obstacle['type']=='W')
	{
		if(($fighter['coordinate_x']==$obstacle['coordinate_x']-1 && $fighter['coordinate_y']==$obstacle['coordinate_y']) || ($fighter['coordinate_x']==$obstacle['coordinate_x']+1 && $fighter['coordinate_y']==$obstacle['coordinate_y']) || ($fighter['coordinate_x']==$obstacle['coordinate_x'] && $fighter['coordinate_y']==$obstacle['coordinate_y']-1) ||($fighter['coordinate_x']==$obstacle['coordinate_x'] && $fighter['coordinate_y']==$obstacle['coordinate_y']+1))
		{
			echo "<br>Puanteur<br>";
		}
	}
}

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'deplacement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'nord'));
echo $this->Form->button('Nord', array('type'=>'submit'));
echo $this->Form->end();

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'deplacement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'ouest'));
echo $this->Form->button('Ouest', array('type'=>'submit'));
echo $this->Form->end();

echo "déplacement";

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'deplacement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'est'));
echo $this->Form->button('Est', array('type'=>'submit'));
echo $this->Form->end();


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'deplacement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'sud'));
echo $this->Form->button('Sud', array('type'=>'submit'));
echo $this->Form->end();


echo "<br>";
echo "<br>";


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'combat']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'nord'));
echo $this->Form->button('Nord', array('type'=>'submit'));
echo $this->Form->end();

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'combat']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'ouest'));
echo $this->Form->button('Ouest', array('type'=>'submit'));
echo $this->Form->end();

echo "attaque";

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'combat']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'est'));
echo $this->Form->button('Est', array('type'=>'submit'));
echo $this->Form->end();


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'combat']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'sud'));
echo $this->Form->button('Sud', array('type'=>'submit'));
echo $this->Form->end();


?>