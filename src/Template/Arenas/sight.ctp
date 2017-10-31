<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php

$x=0;
$y=0;
$proximite=0;
$occupe;


?> <div class="row">
<div class="col-md-3">
<?php

echo $this->Form->create('Surroundings', array('url'=>['controller'=>'surroundings', 'action'=>'generationDecor']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
?> <button type="submit" class="btn btn-default">Régénération du décor </button>
<?php
echo $this->Form->end();
?> </div>
<div class="col-md-3">
</div>
<div class="col-md-3">
<?php

echo $this->Form->create('Tools', array('url'=>['controller'=>'tools', 'action'=>'generationEquipement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
?> <button type="submit" class="btn btn-default">génération de l'équipement </button>
<?php
echo $this->Form->end();
echo "<br>";

?> </div>
</div>
<?php





while($x<15)
{
	?>
	<div class=row>
	<?php
	while($y<10)
	{
		$z=abs($fighter['coordinate_y']-$y)+abs($fighter['coordinate_x']-$x);
		if($z > $fighter['skill_sight'])
		{
			?>
			<div class=col-xs-1 style="background-color: white; opacity: 0.60;">
			<?php
				echo "?";
				?>
				</div>
				<?php
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
						?>
						<div class="col-xs-1" style="background-color: white;opacity: 0.60;">
						<?php
						echo "E";
						?>
						</div>
						<?php
					}
					else
					{
						?>
						<div class="col-xs-1" style="background-color: white;opacity: 0.60;">
						<?php
						echo "H";
						?>
						</div>
						<?php
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
						?>
						<div class="col-xs-1" style="background-color: white;opacity: 0.60;">
						<?php
						echo "x";
						?>
						</div>
						<?php
						$occupe=1;
					}
				}

				foreach($tool as $obstacle)
				{
					if($obstacle['coordinate_x']==$x && $obstacle['coordinate_y']==$y)
					{
						?>
						<div class="col-xs-1" style="background-color: white;opacity: 0.60;">
						<?php
						echo "A";
						?>
						</div>
						<?php
						$occupe=1;
					}
				}

				if($occupe==0)
				{
					?>
					<div class="col-xs-1" style="background-color: white;opacity: 0.60;">
					<?php
					echo "_";
					?>
					</div>
					<?php
				}
			}
		}
		$y=$y+1;
	}
	$x=$x+1;
	$y=0;
	?>
	</div>
	<?php
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

?> <div class="row">
<div class="col-md-1">
 </div>
 <div class="col-md-1">
<?php


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'deplacement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'nord'));
?> <button type="submit" class="btn btn-default"> Nord </button>
<?php
echo $this->Form->end();


?> </div>

<div class="col-md-1">
 </div>
 <div class="col-md-1">
 </div>
 <div class="col-md-1">
 </div>
 <div class="col-md-1">
 </div>
 <div class="col-md-1">
 </div>







 <div class="col-md-1">
<?php


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'combat']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'nord'));
?> <button type="submit" class="btn btn-default"> Nord </button>
<?php
echo $this->Form->end();


?> </div>











</div>
 <div class="row">
 <div class="col-md-1">
<?php


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'deplacement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'ouest'));
?> <button type="submit" class="btn btn-default">Ouest </button>
<?php
echo $this->Form->end();


?>
</div>
 <div class="col-md-1">

 	<?php


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'deplacement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'sud'));
?> <button type="submit" class="btn btn-default"> Sud </button>
<?php
echo $this->Form->end();
?>

</div>
 <div class="col-md-1">
<?php

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'deplacement']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'est'));
?> <button type="submit" class="btn btn-default">Est </button>
<?php
echo $this->Form->end();


?> </div>

 <div class="col-md-1">
 	<?php
 	echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'updateLevel']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('skill', array('value'=> 0));
?> <button type="submit" class="btn btn-default">Montée de niveau </button>
<?php
echo $this->Form->end();
?>
 </div>
 <div class="col-md-1">

 </div>
 <div class="col-md-1">
 </div>







 <div class="col-md-1">
<?php


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'combat']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'ouest'));
?> <button type="submit" class="btn btn-default">Ouest </button>
<?php
echo $this->Form->end();


?>
</div>
 <div class="col-md-1">

<?php


echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'combat']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'sud'));
?> <button type="submit" class="btn btn-default"> Sud </button>
<?php
echo $this->Form->end();
?>


</div>
 <div class="col-md-1">
<?php

echo $this->Form->create('Fighters', array('url'=>['controller'=>'Fighters', 'action'=>'combat']));
echo $this->Form->hidden('id', array('value'=> $fighter['id']));
echo $this->Form->hidden('name', array('value'=> 'est'));
?> <button type="submit" class="btn btn-default">Est </button>
<?php
echo $this->Form->end();


?> </div>









</div>
 <div class="row">
 <div class="col-md-1">
 </div>
 <div class="col-md-1">
<?php


echo "avancer";


?>
 </div>
 <div class="col-md-1">
 </div>
 <div class="col-md-1">
 </div>
 <div class="col-md-1">
 </div>
 <div class="col-md-1">
 </div>
 <div class="col-md-1">
 </div>


 <div class="col-md-1">
 	<?php
echo "attaquer";?>
 </div>


 </div>

</body>
</html>