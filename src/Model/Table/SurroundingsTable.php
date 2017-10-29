<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class SurroundingsTable extends Table
{
	
	public function arene(){
		return $this->find('all');
	}

	public function insertion($id, $type, $x, $y){
		$suroundings = TableRegistry::get('surroundings');
		$query = $suroundings->query();
		$query->insert(['id', 'type', 'coordinate_x', 'coordinate_y'])->values(['id' => $id, 'type' => $type, 'coordinate_x' =>$x, 'coordinate_y' => $y])->execute();
	}

	public function suppression()
	{
		return $this->deleteAll(['id' < 40 ]);
	}

	public function suppressionMonstre($id)
	{
		$fighters = TableRegistry::get('surroundings');
		$fighter = $fighters->get($id);
		$fighters->delete($fighter);
	}

}

?>