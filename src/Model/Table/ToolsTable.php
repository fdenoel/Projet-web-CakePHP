<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class ToolsTable extends Table
{
	
	public function suppression()
	{
		return $this->deleteAll(['id' < 40 ]);
	}

	public function insertion($id, $type, $bonus, $x, $y){
		$suroundings = TableRegistry::get('tools');
		$query = $suroundings->query();
		$query->insert(['id', 'type', 'bonus', 'coordinate_x', 'coordinate_y', 'fighter_id'])->values(['id' => $id, 'type' => $type, 'bonus' =>$bonus, 'coordinate_x' =>$x, 'coordinate_y' => $y, 'fighter_id' => NULL])->execute();
	}

	public function appropriation($idt, $idf)
	{
		$tools = TableRegistry::get('tools');
		$tool = $tools->find('all')->where(['id' == $idt ])->first();
		$tool->fighter_id = $idf;
		$tools->save($tool);

	}

}

?>