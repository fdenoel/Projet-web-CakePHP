<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;


class FightersTable extends Table
{
	public $validate = array(
		'avatar_file' => array(
				'rule' => array('fileExtension', array('jpg', 'jpeg', 'png')),
				'message' => 'Only jpg and png' ,
			)
		);

	public function fileExtension($check, $extensions, $allowEmpty = true){
		$file = current($check);
		if($allowEmpty && empty($file['tmp_name'])){
			return true;
			}

		$extension = strtolower(pathinfo($file['name'] , PAHINFO_EXTENSION));
		#PATINFO = extension du fichier
		return in_array($extension, $extensions);
		
		//debug($check);
		//debug($extensions);
		}


	public function getFighter()
	{
		$fighterlist = $this->find('all');
		return $fighterlist->Array();
	}

	public function addFighter($pseudo)
	{
		$FightersTable = TableRegistry::get('fighters');
		$fighters = $FightersTable->newEntity();
		$fighters->name = $pseudo /*'Gimli'*/;
		$fighters->player_id = uniqid();
		$fighters->coordinate_x = 15;  //Position inexistante, blindé dans /Arenas/sight
		$fighters->coordinate_y = 15;
		$fighters->level = 1;
		$fighters->xp = 0;
		$fighters->skill_sight = 2;
		$fighters->skill_strength = 1;
		$fighters->skill_health = 3;
		$fighters->current_health = 3;

		$FightersTable->save($fighters);
		return "ok";
	}

	public function updateFighter($currentId, $addXp)
	{
		
		$FightersTable = TableRegistry::get('fighters');
		$fighters = $FightersTable->get($currentId); //retourne le fighters que l'on veut modifier
		//$fighters->coordinate_x = 25;  //Position inexistante, blindé dans /Arenas/sight
		//$fighters->coordinate_y = 25;
		$xpGagné = $figther->xp;
		$fighters->xp = $xpGagné + $addXp;
		$fighters->level = floor( $fighters->xp /4); //division Euclidienne
		//$rest = $fighters->xp %4                   //Reste de la division
		//$fighters->skill_sight = 3/*$newSight*/;
		//$fighters->skill_strength = 2/*$newStrength*/;
		//$fighters->skill_health = 4/*$newHealth*/;
		//$fighters->current_health = 4/*$newCurrentHealth*/;

		$FightersTable->save($fighters);
		return "update ok";
		//return $this->find('all');
	}

	public function test()
	{ 
		return "ok";
	}

	public function affListFighter()
	{
		return $this->find('all');
		//return "ok";
	}

	public function Aragorn(){
		return $this->find('all')->where(['id' => 1])->first();
	}
	public function Gimli(){
		return $this->find('all')->where(['id' => 3])->first();
	}


	//public function allFighters(){
	//	return $this->find('all');
	//}

	public function allFighters(){
		return $this->find('all')->first();
	}


}
