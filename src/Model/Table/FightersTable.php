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
		$fighters->coordinate_x = 15;
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
	public function Aragorn(){
		return $this->find('all')->where(['id' => 1])->first();
	}
	public function Gimli(){
		return $this->find('all')->where(['id' => 3])->first();
	}

	public function updatePosition($x,$y,$id)
	{
		$Fighters = TableRegistry::get('Fighters');
		$fighter = $Fighters->find('all')->where(['id' == $id ])->first();
		$fighter->coordinate_y = $y;
		$fighter->coordinate_x = $x;
		$Fighters->save($fighter);
	}

	public function updateXP($xp,$id)
	{
		$Fighters = TableRegistry::get('Fighters');
		$fighter = $Fighters->find('all')->where(['id' == $id ])->first();
		$fighter->xp = $xp;
		$Fighters->save($fighter);
	}

	public function updateCarac($vue,$vie,$force,$id)
	{
		$Fighters = TableRegistry::get('Fighters');
		$fighter = $Fighters->find('all')->where(['id' == $id ])->first();
		$fighter->skill_strength = $force;
		$fighter->skill_health = $vie;
		$fighter->skill_sight = $vue;
		$Fighters->save($fighter);
	}

	public function updateLevel($niv,$id)
	{
		$Fighters = TableRegistry::get('Fighters');
		$fighter = $Fighters->find('all')->where(['id' == $id ])->first();
		$fighter->level = $niv;
		$Fighters->save($fighter);
	}


}
