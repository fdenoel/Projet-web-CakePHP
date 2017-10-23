<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
//Cake\View\Helper\HtmlHelper::script(mixed $url, mixed $options)

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function index()
{
//die('test');
    $this->set('myname', "Julien Falconnet");
    $this->loadModel('Fighters');
	$figterlist=$this->Fighters->find('all');
	pr($figterlist->toArray());

	$this->loadModel('Fighters');
	$figterlist=$this->Fighters->find('all');
	pr($figterlist->toArray());
	
	$res=$this->Fighters->test();
	$this->set("test",$res);

	
}
public function login()
{
//die('test');
}
public function fighter()
{
//die('test');
}
public function sight()
{
	//charger le fighter choisi par le joueur
	$this->loadModel('Fighters');
	$fig=$this->Fighters->allFighters();

	//charger la map
	$this->loadModel('Surroundings');
	$sur=$this->Surroundings->arene();

	/*si l'une des coordonnées du combattant est à 15(non initialisées) alors tant qu'on a pas un couple de coordonnées correspondant à un espace libre, on génère des positions aléatoirement*/
	/*dès que le couple est bon, on met la table à jour*/
	if ($fig['coordinate_y']==15 || $fig['coordinate_x']==15) {
		$sortie="FALSE";
		while($sortie=="FALSE")
		{
			$a=rand(0,9);
			$b=rand(0,14);
			foreach ($sur as $i) {
				if($i['coordinate_x']==$a && $i['coordinate_y']==$b && $i['type']=="sol")
				{
					$sortie="TRUE";
					$fighters = TableRegistry::get('Fighters');
					$fighter = $fighters->find('all')->where(['coordinate_x' == 15 or 'coordinate_y' == 15])->first();
					$fighter->coordinate_x = $a;
					$fighter->coordinate_y = $b;
					$fighters->save($fighter);
				}
			}
		}
	}




	if($this->request->data){
		if($fig['coordinate_x']-1 >=0 && $this->request->data['id'] == 1){
			$coordx=$fig['coordinate_x']-1;
			$coordy=$fig['coordinate_y'];
			foreach ($sur as $loc) {
				if($loc['coordinate_x']==$coordx && $loc['coordinate_y']==$coordy && $loc['type']=="sol")
				{
					$fighters = TableRegistry::get('Fighters');
					$fighter = $fighters->find('all')->where(['id' ==$fig['id'] ])->first();
					$fighter->coordinate_x =$fig['coordinate_x']-1;
					$fighters->save($fighter);
				}
			}




        	
      }
      if($fig['coordinate_y']-1 >=0 && $this->request->data['id'] == 2){
			$coordy=$fig['coordinate_y']-1;
			$coordx=$fig['coordinate_x'];

			foreach ($sur as $loc) {
				if($loc['coordinate_x']==$coordx && $loc['coordinate_y']==$coordy && $loc['type']=="sol")
				{
					$fighters = TableRegistry::get('Fighters');
					$fighter = $fighters->find('all')->where(['id' ==$fig['id'] ])->first();
					$fighter->coordinate_y =$fig['coordinate_y']-1;
					$fighters->save($fighter);
				}
			}




      }
      if($fig['coordinate_y']+1 <=14 && $this->request->data['id'] == 3){
			$coordy=$fig['coordinate_y']+1;
			$coordx=$fig['coordinate_x'];

			foreach ($sur as $loc) {
				if($loc['coordinate_x']==$coordx && $loc['coordinate_y']==$coordy && $loc['type']=="sol")
				{
					$fighters = TableRegistry::get('Fighters');
					$fighter = $fighters->find('all')->where(['id' ==$fig['id'] ])->first();
					$fighter->coordinate_y =$fig['coordinate_y']+1;
					$fighters->save($fighter);
				}
			}

      }
      if($fig['coordinate_x']+1 <=9 && $this->request->data['id'] == 4){
			$coordx=$fig['coordinate_x']+1;
			$coordy=$fig['coordinate_y'];

			foreach ($sur as $loc) {
				if($loc['coordinate_x']==$coordx && $loc['coordinate_y']==$coordy && $loc['type']=="sol")
				{
					$fighters = TableRegistry::get('Fighters');
					$fighter = $fighters->find('all')->where(['id' ==$fig['id'] ])->first();
					$fighter->coordinate_x =$fig['coordinate_x']+1;
					$fighters->save($fighter);
				}
			}        	
    	}
	}


	



	$fig=$this->Fighters->allFighters();

	//envoyer le fighter
	$this->set("allFighters",$fig);
	//envoyer la map
	$this->set("arene", $sur);
}


public function deplacement()
{
	$this->loadModel('Fighters');
	$fig=$this->Fighters->allFighters();



}





//fonction décrivant une attaque
//toucher=d20-niv attaqué +niv attaquant
//dégats=force attaquant
//xp+1 à chaque attaque et +niv attaqué s'il meurt
//1=attaquant 2=attaqué
public function attaque($id1, $id2)
{
	$fighters = TableRegistry::get('Fighters');
	$fighter1 = $fighters->find('all')->where(['id' == '$id1']);
	$fighter2 = $fighters->find('all')->where(['id' == '$id2']);
	if(rand(1,20)-$fighter2['level']+$fighter1['level']>=10)
	{
		$fighter2->current_health = $fighter2['current_health']-$fighter1['skill_strength'];
		$Fighters->save($fighter2);
		$fighter1->xp = $fighter1['xp']+1;
		if($fighter2['current_health'] <=0)
		{
			$fighter1->xp = $fighter1['xp']+$fighter2['level'];
		}
		$fighters->save($fighter1);
	}
}




public function diary()
{
//die('test');
}
public function appFighter()
{
	
}
}

?>