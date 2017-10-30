<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;


class ArenasTable extends Table
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


	public function isOwnedBy($fighterId, $userId)
	{
	    return $this->exists(['id' => $fighterId, 'player_id' => $userId]);
	}


}
