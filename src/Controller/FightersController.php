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
	

		public function update()
		{
			
			if($this->request->data){

				$this->loadModel('Fighters');
				$fighterlist=$this->Fighters->find('all');
				//pr($fighterlist->toArray());

				$upd=$this->Fighters->updateFighter($this->request->data['currentId'], $this->request->data['addXp']);
				$this->set("updateFighter",$upd);
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

