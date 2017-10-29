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
  /*  $this->set('myname', "Julien Falconnet");
    $this->loadModel('Fighters');
	$figterlist=$this->Fighters->find('all');
	pr($figterlist->toArray());

	$this->loadModel('Fighters');
	$figterlist=$this->Fighters->find('all');
	pr($figterlist->toArray());
	
	$res=$this->Fighters->test();
	$this->set("test",$res);*/

	
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
	$tools=$this->loadModel('tools');
	$fighters = TableRegistry::get('Fighters');
	$fig=$this->Fighters->Aragorn();

	//charger la map
	$this->loadModel('Surroundings');
	$sur=$this->Surroundings->arene();

	/*si l'une des coordonnées du combattant est à 15(non initialisées) alors tant qu'on a pas un couple de coordonnées correspondant à un espace libre, on génère des positions aléatoirement*/
	/*dès que le couple est bon, on met la table à jour*/
	if ($fig['coordinate_y']==15 || $fig['coordinate_x']==15) {
		$sortie="FALSE";
		while($sortie=="FALSE")
		{
			$sortie="TRUE";
			$a=rand(0,14);
			$b=rand(0,9);
			foreach ($sur as $i) {
				if($i['coordinate_x']==$a && $i['coordinate_y']==$b)
				{
					$sortie="FALSE";
				}
				if($sortie=="TRUE")
				{	
					$fighter = $fighters->find('all')->where(['coordinate_x' == 15 or 'coordinate_y' == 15])->first();
					$fighter->coordinate_x = $a;
					$fighter->coordinate_y = $b;
					$fighters->save($fighter);
				}
			}
		}
	}



	
	$fig2 = $fighters->find('all');

	//envoyer le fighter
	$this->set("allFighters",$fig2);
	$this->set("fighter", $fig);
	$this->set("tool", $tools);
	//envoyer la map
	$this->set("arene", $sur);
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