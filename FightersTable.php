<?php
namespace App\Model\Table;

use Cake\ORM\Table;

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
		

	public function test()
	{ 
		return "ok";
	}

	public function getBestFighter()
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
