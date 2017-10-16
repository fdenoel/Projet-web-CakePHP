<?php


	


	$arene = array(
	'0' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'1' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'2' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'3' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'4' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'5' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'6' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'7' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'8' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
	'9' =>array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1));

#on désigne les cases qui seront des obstacles

$arene[2][2]=0;
$arene[3][6]=0;
$arene[3][10]=0;
$arene[5][7]=0;
$arene[6][2]=0;
$arene[8][6]=0;
$arene[8][12]=0;

#affichage pour test

	#$id=selecFighter();
	$id=1;
	appFighter($id);




	foreach ($arene as $i) {
		echo "<br>";
		foreach ($i as $j) {
			if($j==1){
				echo "_";
			}elseif ($j==2) {
				echo "H";
			}else{
				echo"x";
			}	
		}
	}




#selectionner le combattant =>JS à implémenter pour entrée clavier/souris(sélectionner)
#function selecFighter(){
#	echo "choisissez un combattant parmi :";
#	return '$id';
#}




#boucle de l'apparition du joueur
#a voir comment on récupère l'id du perso

function appFighter($id){
	global $arene;
	$sortie=FALSE;
	while($sortie==FALSE)
	{
		$posx_player=rand(0,9);
		$posy_player=rand(0,14);
		echo $posx_player;
		echo "<br>";
		echo $posy_player;
		echo "<br>";
		if ($arene[$posx_player][$posy_player]==1) {
			$arene[$posx_player][$posy_player]=2;
			$bdd = new mysqli("localhost", "root", "","webarena");
			if ($bdd->connect_error) {
    			die("Connection failed: " . $bdd->connect_error);
			}
			if ($bdd->query("UPDATE fighters SET coordinate_x='$posx_player', coordinate_y='$posy_player' where id='$id'") === TRUE) {
    			$sortie=TRUE;
			}
			$bdd->close();	
		}
	}
}



#déplacement =>js
#$end=FALSE;
#while ($end==FALSE) {
	#capture direction
#}


#bataille : tant qu'aucun des combattants n'est mort, ils se battent
#01, 02 = current health
#11, 12 = level
#21, 22 = skill_strength
#31, 32 = xp
function bataille($id1, $id2){
	$bdd = new mysqli("localhost", "root", "","webarena");
	if ($bdd->connect_error) {
    	die("Connection failed: " . $bdd->connect_error);
	}


	$q01="SELECT current_health from fighters where id='$id1'";
	$q02="SELECT current_health from fighters where id='$id2'";
	$bdd->query($q01);
	$bdd->query($q02);
	$m01=mysqli_fetch_assoc($q01);
	$m02=mysqli_fetch_assoc($q02);
	$r01=$m01['current_health'];
	$r02=$m02['current_health'];


	while ($r01>0 && $r02>0) {
		attaque($id1,$id2);
		attaque($id2,$id1);
	}
	$bdd->close();
}



#attaque: dé20-nivAttaqué+nivAttaquant pour toucher
#dégats = force
#xp+1 à chaque attaque réussie et xp+nivAttaqué si mort
#1= attaquant, 2= attaqué
function attaque($id1,$id2){
	$bdd = new mysqli("localhost", "root", "","webarena");
	if ($bdd->connect_error) {
    	die("Connection failed: " . $bdd->connect_error);
	}


	$q01="SELECT current_health from fighters where id='$id1'";
	$q02="SELECT current_health from fighters where id='$id2'";
	$bdd->query($q01);
	$bdd->query($q02);
	$m01=mysqli_fetch_assoc($q01);
	$m02=mysqli_fetch_assoc($q02);
	$r01=$m01['current_health'];
	$r02=$m02['current_health'];
		$q11="SELECT level from fighters where id='$id1'";
		$q12="SELECT level from fighters where id='$id2'";
		$m11=mysqli_fetch_assoc($q11);
		$m12=mysqli_fetch_assoc($q12);
		$r11=$m11['level'];
		$r12=$m12['level'];


		if(rand(1,20)-$r12+$r11>=10){

			$q21="SELECT skill_strength from fighters where id='$id1'";
			$q22="SELECT skill_strength from fighters where id='$id2'";
			$m21=mysqli_fetch_assoc($q21);
			$m22=mysqli_fetch_assoc($q22);
			$r21=$m21['skill_strength'];
			$r22=$m22['skill_strength'];
			$currpv2=$r02-$r21;
			$bdd->query("UPDATE fighters SET current_health='$currpv2' where id='$id2'");

			$bdd->query($q02);
			$m02=mysqli_fetch_assoc($q02);
			$r02=$m02['current_health'];

			$q31="SELECT xp from fighters where id='$id1'";
			$q32="SELECT xp from fighters where id='$id2'";
			$m31=mysqli_fetch_assoc($q31);
			$m32=mysqli_fetch_assoc($q32);
			$r31=$m31['xp'];
			$r32=$m32['xp'];
			$xp=$r31+1;

			$bdd->query("UPDATE fighters SET xp='$xp' where id='$id1'");

			$q31="SELECT xp from fighters where id='$id1'";
			$m31=mysqli_fetch_assoc($q31);
			$r31=$m31['xp'];

			if($r02<=0){
				$xp=$r31+$r12;
				$bdd->query("UPDATE fighters SET xp='$xp' where id='$id1'");
			}


		}
		$bdd->close();
}








?>