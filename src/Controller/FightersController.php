<?php
	namespace App\Controller;
	use App\Controller\AppController;
	use Cake\ORM\TableRegistry;
	/**
	* Personal Controller
	* User personal interface
	*
	*/
	class FightersController extends AppController
	{
		public function edit()
		{
			if(§empty($this->request->data)){
				$this->request->data['Fighters']['id'] = 1;
				//debug($this->request->data); die();
				$this->Fighters->save($this->request->data);
			}else{
				$this->Fighters->id = 1;
				$this->request->data = $this->Fighters->read();
			}
		}
	

		public function updateLevel()
		{
			
			if($this->request->data){

				$this->loadModel('Fighters');
				$fighterlist=$this->Fighters->find('all');
				//pr($fighterlist->toArray());

				$updLvl=$this->Fighters->update_level($this->request->data['addXp']);
				$this->set("update_level",$updLvl);
				echo "bonjour";
			}
			
		}

		public function updateStrength()
		{
			
			if($this->request->data){

				$this->loadModel('Fighters');
				$fighterlist=$this->Fighters->find('all');
				//pr($fighterlist->toArray());

				$updF=$this->Fighters->update_strength($this->request->data['addStrength']);
				$this->set("update_strength",$updF);
			}
			
		}

		public function updateSight()
		{
			
			if($this->request->data){

				$this->loadModel('Fighters');
				$fighterlist=$this->Fighters->find('all');
				//pr($fighterlist->toArray());

				$updS=$this->Fighters->update_sight($this->request->data['addSight']);
				$this->set("update_sight",$updS);
			}
			
		}

		public function updateMaxHp()
		{
			
			if($this->request->data){

				$this->loadModel('Fighters');
				$fighterlist=$this->Fighters->find('all');
				//pr($fighterlist->toArray());

				$updMax=$this->Fighters->update_maxHp($this->request->data['addHp']);
				$this->set("update_maxHp",$updMax);
			}
			
		}

		public function updateCurrentHp()
		{
			
			if($this->request->data){

				$this->loadModel('Fighters');
				$fighterlist=$this->Fighters->find('all');
				//pr($fighterlist->toArray());

				$updHp=$this->Fighters->update_currentHp($this->request->data['chgHp']);
				$this->set("update_currentHp",$updHp);
			}
			
		}

		public function create()
		{
			if($this->request->data){

				$this->loadModel('Fighters');
				$fighterlist=$this->Fighters->find('all');
				//pr($fighterlist->toArray());

				$add=$this->Fighters->addFighter($this->request->data['pseudo']);
				$this->set("addFighter",$add);
			}
			
		}

		public function fighter()
		{
			$this->loadModel('Fighters');
			$fighterlist=$this->Fighters->find('all');
			//pr($fighterlist->toArray());

			$aff=$this->Fighters->affListFighter();
			$this->set("affListFighter",$aff);
		}
	
	}

