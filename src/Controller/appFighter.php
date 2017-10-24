<?php



	var $sortie=FALSE;
	while($sortie==FALSE)
	{
		$posx_player=rand(0,9);
		$posy_player=rand(0,14);
			$bdd = new mysqli("localhost", "root", "","webarena");
			if ($bdd->connect_error) {
    			die("Connection failed: " . $bdd->connect_error);
			}
			if ($bdd->query("UPDATE fighters SET coordinate_x='$posx_player', coordinate_y='$posy_player' where id='$id'") === TRUE) {
    			$sortie=TRUE;
			}
			$bdd->close();	
		}

?>