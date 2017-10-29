<?php 


namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;



class ToolsController  extends AppController
{
	public function generationEquipement()
	{
		//initialisation des variables et chargement des modèles
		$compteur=10;
		$a=1;
		$this->loadModel('Surroundings');
		$sur=$this->Surroundings->find('all');
		$f=$this->loadModel('Fighters');
		$fig=$this->Fighters->find('all');
		$table=$this->loadModel('Tools');


		foreach($table as $t)
		{
			if($t['fighter_id'] != NULL)
			{
				if($tools['type'] == "L")
				{
					$bonus=-$tools['bonus'];
					$f->updateCarac(0,$bonus,0,$fig['id']);
				}
				if($tools['type'] == "V")
				{
					$bonus=-$tools['bonus'];
					$f->updateCarac($bonus,0,0,$fig['id']);
				}
				if($tools['type'] == "D")
				{
					$bonus=-$tools['bonus'];
					$f->updateCarac(0,0,$bonus,$fig['id']);
				}
			}
		}

		$table->suppression();

		//tant qu'on a pas traité toutes les pièces d'équipement
		while ($compteur > 0) {
			//génération aléatoire des coordonnées
			$arret=0;
			$coordx=rand(0,14);
			$coordy=rand(0,9);
				$tool=$this->Tools->find('all');

			//vérification de la position des obstacles
			foreach ($sur as $obstacle) {
				if($obstacle['coordinate_x'] == $coordx && $obstacle['coordinate_y'] == $coordy)
				{
					$arret=1;
				}
			}

			//verification de la position des combattants
			foreach ($fig as $obstacle) {
				if($obstacle['coordinate_x'] == $coordx && $obstacle['coordinate_y'] == $coordy)
				{
					$arret=1;
				}
			}

			//verification de la position des pièces d'équipement
			foreach ($tool as $obstacle) {
				if($obstacle['coordinate_x'] == $coordx && $obstacle['coordinate_y'] == $coordy)
				{
					$arret=1;
				}
			}

			if($arret==0)
			{
				if($a < 2)
				{
					$table->insertion($a, 'L', 2, $coordx, $coordy);
				}
				if($a < 3 && $a > 1)
				{
					$table->insertion($a, 'L', 4, $coordx, $coordy);
				}
				if($a < 5 && $a > 2)
				{
					$table->insertion($a, 'V', 1, $coordx, $coordy);
				}
				if($a < 7 && $a > 4)
				{
					$table->insertion($a, 'V', 2, $coordx, $coordy);
				}
				if($a < 9 && $a > 6)
				{
					$table->insertion($a, 'D', 1, $coordx, $coordy);
				}
				if($a < 11 && $a > 8)
				{
					$table->insertion($a, 'D', 2, $coordx, $coordy);
				}
				$compteur=$compteur-1;
				$a=$a+1;
			}
		}


			$sur=$this->Surroundings->arene();
	$fig=$this->Fighters->Aragorn();
	$fig2=$this->Fighters->find('all');
	$tools=$this->Tools->find('all');

	$this->set("tool", $tools);

	//envoyer le fighter
	$this->set("allFighters",$fig2);
	$this->set("fighter", $fig);
	//envoyer la map
	$this->set("arene", $sur);
	$this->render('../Arenas/sight');
	}

}
?>



		
		