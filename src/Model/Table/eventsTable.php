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
		$query = $suroundings->query();
		$query->insert(['id', 'name', 'date', 'coordinate_x', 'coordinate_y'])->values(['name' => $name, 'date' =>$time, 'coordinate_x' =>$x, 'coordinate_y' => $y])->execute();
	}

}
