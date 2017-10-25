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

	public function addFighter()
	{
		$FightersTable = TableRegistry::get('fighters');
		$fighters = $FightersTable->newEntity();
		$fighters->name = /*$pseudo*/ 'Gimli';
		$fighters->player_id = uniqid();
		$fighters->coordinate_x=rand(0,14);
		$fighters->coordinate_y=rand(0,9);
		$fighters->level = 1;
		$fighters->xp = 0;
		$fighters->skill_sight = 2;
		$fighters->skill_strength = 1;
		$fighters->skill_health = 3;
		$fighters->current_health = 3;

		$FightersTable->save($fighters);
		return "ok";

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

	public function updateFighter()
	{
		return $this->find('all');
	}

	public function allFighters(){
		return $this->find('all')->first();
	}


}
