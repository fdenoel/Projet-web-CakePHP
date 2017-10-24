<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class FightersTable extends Table
{
	
	public function test(){
		return "ok";
	}

	public function getBestFighter(){
		return "ok";
	}
	public function Aragorn(){
		return $this->find('all')->where(['id' => 1])->first();
	}
	public function Gimli(){
		return $this->find('all')->where(['id' => 3])->first();
	}
	public function allFighters(){
		return $this->find('all');
	}

}