<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SurroundingsTable extends Table
{
	
	public function arene(){
		return $this->find('all');
	}

}

?>