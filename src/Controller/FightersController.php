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

		public function initialize()
	    {
	        parent::initialize();
	        $this->loadComponent('Flash'); // Charge le FlashComponent
	    }

		public function index()
	    {
	        $fighter = $this->Fighters->find('all');
	        $this->set(compact('fighter'));
	    }

	    public function view($id = null)
	    {
	        $fighter = $this->Fighters->get($id);
	        $this->set(compact('fighter'));
	    }

	    public function add()
	    {
	        $fighter = $this->Fighters->newEntity();
	        $fighter->player_id = uniqid();
	        if ($this->request->is('post')) {
	            $fighter = $this->Fighters->patchEntity($fighter, $this->request->getData());
	            if ($this->Fighters->save($fighter)) {
	                $this->Flash->success(__('Votre fighter a été sauvegardé.'));
	                return $this->redirect(['action' => 'index']);
	            }
	            $this->Flash->error(__('Impossible d\'ajouter votre fighter.'));
	        }
	        $this->set('fighter', $fighter);
	    }

	    public function delete($id)
		{
		    $this->request->allowMethod(['post', 'delete']);

		    $fighter = $this->Fighters->get($id);
		    if ($this->Fighters->delete($fighter)) {
		        $this->Flash->success(__("Le fighter avec l'id: {0} a été supprimé.", h($id)));
		        return $this->redirect(['action' => 'index']);
	    	}
		}
		
		/*public function index()
	    {
	        $fighter = $this->Fighters->find('all');
	        $this->set(compact('fighter'));
	    }

		public function initialize()
		{
		parent::initialize();
		$this->loadComponent('Flash'); // Charge le FlashComponent
		}

		public function view($id)
		{
		$fighter = $this->Fighters->get($id);
		$this->set(compact('fighter'));
		}

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

		public function delete($id)
		{
			$this->request->allowMethod(['post', 'delete']);
			$fighterlist = $this->Fighters->get($id);
			if ($this->Fighters->delete($fighterlist)) {
			$this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'create']);
		}*/


}