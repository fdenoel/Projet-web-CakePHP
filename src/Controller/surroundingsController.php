<?php 


namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;



class SurroundingsController  extends AppController
{
public function generationDecor()//fonction implémentée, qui peut être appelée qui crée l'environnement à des positions aléatoires après avoir détruit l'ancien
{
	$nbelements=15;
	$compteur=0;
	$a=$this->loadModel('Surroundings');
	$fighters=$this->loadModel('Fighters');
	$this->loadModel('tools');
	$a->suppression();

	while($compteur<$nbelements)
	{
		$loop=0;
		$sur=$this->Surroundings->find('all');
		$fig=$this->Fighters->find('all');
		$x=rand(0,14);
		$y=rand(0,9);
		foreach ($sur as $obstacles) {
			if($x==$obstacles['coordinate_x'] && $y==$obstacles['coordinate_y'])
			{
				$loop=1;
			}	
		}
		foreach ($fig as $combattants) {
			if($x==$combattants['coordinate_x'] && $y==$combattants['coordinate_y'])
			{
				$loop=1;
			}	
		}
		if($loop==0)
			{
				$a->insertion($compteur+1, 'P', $x, $y);
				$compteur=$compteur+1;
			}
	}

	$compteur=0;
	while($compteur<$nbelements)
	{
		$loop=0;
		$sur=$this->Surroundings->find('all');
		$x=rand(0,14);
		$y=rand(0,9);
		foreach ($sur as $obstacles) {
			if($x==$obstacles['coordinate_x'] && $y==$obstacles['coordinate_y'])
			{
				$loop=1;
			}
		}
		foreach ($fig as $combattants) {
			if($x==$combattants['coordinate_x'] && $y==$combattants['coordinate_y'])
			{
				$loop=1;
			}	
		}
		if($loop==0)
		{
				$a->insertion($compteur+16, 'T', $x, $y);
				$compteur=$compteur+1;
		}
	}

	$compteur=0;
	while($compteur<1)
	{
		$loop=0;
		$sur=$this->Surroundings->find('all');
		$x=rand(0,14);
		$y=rand(0,9);
		foreach ($sur as $obstacles) {
			if($x==$obstacles['coordinate_x'] && $y==$obstacles['coordinate_y'])
			{
				$loop=1;
			}
		}
		foreach ($fig as $combattants) {
			if($x==$combattants['coordinate_x'] && $y==$combattants['coordinate_y'])
			{
				$loop=1;
			}	
		}
		if($loop==0)
		{
				$a->insertion(31, 'W', $x, $y);
				$compteur=$compteur+1;
		}
	}


	$sur=$this->Surroundings->arene();
	$fig=$fighters->get($this->request->data['id']);
	$fig2=$this->Fighters->find('all');
	$tools=$this->tools->find('all');

	//envoyer le fighter
	$this->set("allFighters",$fig2);
	$this->set("fighter", $fig);
	$this->set("tool", $tools);
	//envoyer la map
	$this->set("arene", $sur);
	$this->render('../Arenas/sight');
}

	public function isAuthorized($user)
		{
		    // Le propriétaire d'un article peut l'éditer et le supprimer
		    if ($this->request->getParam('action') === 'generationDecor') {
		        return true;
		    }
		}
}


?>