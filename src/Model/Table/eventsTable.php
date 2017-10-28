<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


class eventsTable extends Table
{
	
	public function insertion($name, $x, $y)
	{
		$suroundings = TableRegistry::get('events');
		$time = Time::createFromFormat('Y-m-d H:i:s', "2016-08-01 08:49:11", 'Europe/Paris');
		$time = Time::now();
		/*VOIR COMMENT INSERER AVEC AUTO-INCREMENT*/
		$query = $suroundings->query();
		$query->insert(['id', 'name', 'date', 'coordinate_x', 'coordinate_y'])->values(['id' => $id, 'name' => $type, 'date' =>$bonus, 'coordinate_x' =>$x, 'coordinate_y' => $y])->execute();
	}

	public function suppression()
	{
		$time = Time::createFromFormat('Y-m-d H:i:s', "2016-08-01 08:49:11", 'Europe/Paris');
		$time = Time::now();
		$time->subDays(1);
		return $this->deleteAll(['date' < $time ]);
	}

}
