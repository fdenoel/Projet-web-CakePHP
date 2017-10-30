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


	public function initialize()
	    {
	        parent::initialize();
	        $this->loadComponent('Flash'); // Charge le FlashComponent
	    }


public function sight($id)
{
	//charger le fighter choisi par le joueur
	$fighters=$this->loadModel('Fighters');
	$tools=$this->loadModel('tools');
	$fig=$fighters->get($id);

	//charger la map
	$this->loadModel('Surroundings');
	$sur=$this->Surroundings->arene();

	/*si l'une des coordonnées du combattant est à 15(non initialisées) alors tant qu'on a pas un couple de coordonnées correspondant à un espace libre, on génère des positions aléatoirement*/
	/*dès que le couple est bon, on met la table à jour*/
	$x=$fig->coordinate_x;
	$y=$fig['coordinate_y'];
	if ($y==15 || $x==15) {
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
					$fighter = $fighters->get($id);
					$fighter->coordinate_x = $a;
					$fighter->coordinate_y = $b;
					$fighters->save($fighter);
				}
			}
		}
	}



	
	$fig2 = $fighters->find('all');
	$fig=$fighters->get($id);

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
public function isAuthorized($user)
		{
		    // Le propriétaire d'un article peut l'éditer et le supprimer
		    if (in_array($this->request->getParam('action'), ['sight'])) {
		        $fighterId = (int)$this->request->getParam('pass.0');
		        if ($this->Fighters->isOwnedBy($fighterId, $user['id'])) {
		            return true;
		        }
	    	}
		}
}

?>