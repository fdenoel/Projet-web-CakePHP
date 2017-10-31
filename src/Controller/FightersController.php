<?php
	namespace App\Controller;
	use App\Controller\AppController;
	use Cake\ORM\TableRegistry;
	use Cake\Utility\Text;
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
	            $fighter->player_id = $this->Auth->user('id');
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

		public function isAuthorized($user)
		{
		    // Tous les utilisateurs enregistrés peuvent ajouter des articles
		    if ($this->request->getParam('action') === 'add' || $this->request->getParam('action') === 'choisirFighter' || $this->request->getParam('action') === 'deplacement' || $this->request->getParam('action') === 'combat' || $this->request->getParam('action') === 'updateLevel') {
		        return true;
		    }
		    // Le propriétaire d'un article peut l'éditer et le supprimer
		    if (in_array($this->request->getParam('action'), ['delete','view'])) {
		        $fighterId = (int)$this->request->getParam('pass.0');
		        if ($this->Fighters->isOwnedBy($fighterId, $user['id'])) {
		            return true;
		        }
	    	}
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

			
				$a=$this->loadModel('Fighters');
				$b=0;
				//$fighterlist=$this->Fighters->find('all');
				//pr($fighterlist->toArray());

				$fighters = TableRegistry::get('Fighters');

				$fig=$this->Fighters->get($this->request->data['id']);
				$this->set("f",$fig);
				$skill=$this->request->data['skill'];
				if($skill<>0){
					$b=1;
					$a->update_level($fig['id'], $this->request->data['skill']);
					$this->redirect(['controller' => 'Arenas', 'action' => 'sight', $this->request->data['id']]);
			}
			if($b==1)
			{

				$this->redirect(['controller' => 'Arenas', 'action' => 'sight', $this->request->data['id']]);
			}
			
		}
	

		public function update()
		{
			$this->loadModel('Fighters');
			$fighterlist=$this->Fighters->find('all');
			//pr($fighterlist->toArray());

			$upd=$this->Fighters->updateFighter($pseudo);
			$this->set("updateFighter",$upd);
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

		public function deplacement()
		{

			//si on a du data
			$vivant=1;
			if($this->request->data)
			{
				//on charge le modèle fighter, le fighter à update et la liste des fighters pour vérification
				$f=$this->loadModel('Fighters');
				$test=$this->request->data['id'];
				$fig=$this->Fighters->get($test);/*si besoin créer une fonction qui le fait naturellement*/
				$fighters=$this->Fighters->find('all');

				$t=$this->loadModel('tools');
				$tools=$this->tools->find('all');

				//on charge la liste des obstacles pour vérification
				$this->loadModel('Surroundings');
				$sur=$this->Surroundings->find('all');

				$ev=$this->loadModel('events');

				//si on est pas sur la rangée du haut et qu'on va vers le haut
				if($fig['coordinate_x']-1 >=0 && $this->request->data['name'] == "nord")
				{
					//variables enregistrant la nouvelle position de $fig et variable de test
					$coordx=$fig['coordinate_x']-1;
					$coordy=$fig['coordinate_y'];
					$arret=0;


					//on teste qu'aucun combattant n'est à la nouvelle position
					foreach ($fighters as $f) {
						$x=$f['coordinate_x'];
						$y=$f['coordinate_y'];
						if($x == $coordx && $y == $coordy)
						{
							$arret=1;
						}
					}

					//on teste qu'aucun mur n'est à la nouvelle position
					foreach ($sur as $f) {
						$x=$f['coordinate_x'];
						$y=$f['coordinate_y'];
						$type=$f['type'];
						if($x == $coordx && $y == $coordy)
						{
							if($type=='P')
							{
								$arret=1;
							}
							else
							{
								$f=$this->loadModel('Fighters');
								$f->deleteFighter($fig['id']);
								$vivant=0;
								$arret=1;
							}
							
						}
					}


					if($arret == 0)
					{
						$f=$this->loadModel('Fighters');
						$test=$fig['id'];
						$f->updatePosition(-1,0,$fig['id']);
						$message=Text::insert(":name va au nord", ['name' => $fig['name']]);
						$ev->insertion($message, $coordx, $coordy);
						$tid=0;
						foreach($tools as $tool)
						{
							$ty=$tool['coordinate_y'];
							$tx=$tool['coordinate_x'];
							$tid=$tid+1;
							if($ty == $coordy &&  $tx== $coordx)
							{
								$t->appropriation($tid, $fig['id']);
								if($tool['type'] == "L")
								{
									$f->updateCarac(0,$tool['bonus'],0,$fig['id']);
								}
								if($tool['type'] == "V")
								{
									$f->updateCarac($tool['bonus'],0,0,$fig['id']);
								}
								if($tool['type'] == "D")
								{
									$f->updateCarac(0,0,$tool['bonus'],$fig['id']);
								}
							}
							if($tid==10)
							{
								$tid=0;
							}
						}
					}

				}


				//si on est pas sur la rangée de gauche et qu'on va vers la gauche
				if($fig['coordinate_y']-1 >=0 && $this->request->data['name'] == "ouest")
				{
					//variables enregistrant la nouvelle position de $fig et variable de test
					$coordx=$fig['coordinate_x'];
					$coordy=$fig['coordinate_y']-1;
					$arret=0;


					//on teste qu'aucun combattant n'est à la nouvelle position
					foreach ($fighters as $f) {
						$x=$f['coordinate_x'];
						$y=$f['coordinate_y'];
						if($x == $coordx && $y == $coordy)
						{
							$arret=1;
						}
					}

					//on teste qu'aucun mur n'est à la nouvelle position
					foreach ($sur as $s) {
						$x=$s['coordinate_x'];
						$y=$s['coordinate_y'];
						$type=$s['type'];
						if($x == $coordx && $y == $coordy)
						{
							if($type == 'P')
							{
								$arret=1;
							}
							else
							{
								$f=$this->loadModel('Fighters');
								$f->deleteFighter($fig['id']);
								$vivant=0;
								$arret=1;
							}	
						}
					}


					if($arret == 0)
					{
						$f=$this->loadModel('Fighters');
						$f->updatePosition(0,-1,$fig['id']);
						$message=Text::insert(":name va a l'ouest", ['name' => $fig['name']]);
						$ev->insertion($message, $coordx, $coordy);
						$tid=0;
						foreach($tools as $tool)
						{
							$ty=$tool['coordinate_y'];
							$tx=$tool['coordinate_x'];
							$tid=$tid+1;
							if($ty == $coordy &&  $tx== $coordx)
							{
								$t->appropriation($tid, $fig['id']);
								if($tool['type'] == "L")
								{
									$f->updateCarac(0,$tool['bonus'],0,$fig['id']);
								}
								if($tool['type'] == "V")
								{
									$f->updateCarac($tool['bonus'],0,0,$fig['id']);
								}
								if($tool['type'] == "D")
								{
									$f->updateCarac(0,0,$tool['bonus'],$fig['id']);
								}
							}
							if($tid==10)
							{
								$tid=0;
							}
						}
					}
				}


				//si on est pas sur la rangée de droite et qu'on va vers la droite
				if($fig['coordinate_y']+1 <10 && $this->request->data['name'] == "est")
				{
					//variables enregistrant la nouvelle position de $fig et variable de test
					$coordx=$fig['coordinate_x'];
					$coordy=$fig['coordinate_y']+1;
					$arret=0;


					//on teste qu'aucun combattant n'est à la nouvelle position
					foreach ($fighters as $f) {
						$x=$f['coordinate_x'];
						$y=$f['coordinate_y'];
						if($x == $coordx && $y == $coordy)
						{
							$arret=1;
						}
					}

					//on teste qu'aucun mur n'est à la nouvelle position
					foreach ($sur as $f) {
						$x=$f['coordinate_x'];
						$y=$f['coordinate_y'];
						$type=$f['type'];
						if($x == $coordx && $y == $coordy)
						{
							if($type=='P')
							{
								$arret=1;
							}
							else
							{
								$f=$this->loadModel('Fighters');
								$f->deleteFighter($fig['id']);
								$vivant=0;
								$arret=1;
							}
							
						}
					}


					if($arret == 0)
					{
						$f=$this->loadModel('Fighters');
						$f->updatePosition(0,1,$fig['id']);
						$message=Text::insert(":name va a l'est", ['name' => $fig['name']]);
						$ev->insertion($message, $coordx, $coordy);
						$tid=0;
						foreach($tools as $tool)
						{
							$ty=$tool['coordinate_y'];
							$tx=$tool['coordinate_x'];
							$tid=$tid+1;
							if($ty == $coordy &&  $tx== $coordx)
							{
								$t->appropriation($tid, $fig['id']);
								if($tool['type'] == "L")
								{
									$f->updateCarac(0,$tool['bonus'],0,$fig['id']);
								}
								if($tool['type'] == "V")
								{
									$f->updateCarac($tool['bonus'],0,0,$fig['id']);
								}
								if($tool['type'] == "D")
								{
									$f->updateCarac(0,0,$tool['bonus'],$fig['id']);
								}
							}
							if($tid==10)
							{
								$tid=0;
							}
						}
					}
				}


				//si on est pas sur la rangée du bas et qu'on va vers le bas
				if($fig['coordinate_x']+1 <15 && $this->request->data['name'] == "sud")
				{
					//variables enregistrant la nouvelle position de $fig et variable de test
					$coordx=$fig['coordinate_x']+1;
					$coordy=$fig['coordinate_y'];
					$arret=0;


					//on teste qu'aucun combattant n'est à la nouvelle position
					foreach ($fighters as $f) {
						$x=$f['coordinate_x'];
						$y=$f['coordinate_y'];
						if($x == $coordx && $y == $coordy)
						{
							$arret=1;
						}
					}

					//on teste qu'aucun mur n'est à la nouvelle position
					foreach ($sur as $f) {
						$x=$f['coordinate_x'];
						$y=$f['coordinate_y'];
						$type=$f['type'];
						if($x == $coordx && $y == $coordy)
						{
							if($type=='P')
							{
								$arret=1;
							}
							else
							{
								$f=$this->loadModel('Fighters');
								$f->deleteFighter($fig['id']);
								$vivant=0;
								$arret=1;
							}
							
						}
					}


					if($arret == 0)
					{
						$f=$this->loadModel('Fighters');
						$f->updatePosition(1,0,$fig['id']);
						$message=Text::insert(":name va au sud", ['name' => $fig['name']]);
						$ev->insertion($message, $coordx, $coordy);
						$tid=0;
						foreach($tools as $tool)
						{
							$ty=$tool['coordinate_y'];
							$tx=$tool['coordinate_x'];
							$tid=$tid+1;
							if($ty == $coordy &&  $tx== $coordx)
							{
								$t->appropriation($tid, $fig['id']);
								if($tool['type'] == "L")
								{
									$f->updateCarac(0,$tool['bonus'],0,$fig['id']);
								}
								if($tool['type'] == "V")
								{
									$f->updateCarac($tool['bonus'],0,0,$fig['id']);
								}
								if($tool['type'] == "D")
								{
									$f->updateCarac(0,0,$tool['bonus'],$fig['id']);
								}
							}
							if($tid==10)
							{
								$tid=0;
							}
						}
					}
				}
			}


			if($vivant==1)
			{
				$fig=$this->Fighters->get($this->request->data['id']);
				$fighters = TableRegistry::get('Fighters');
				$fig2 = $fighters->find('all');

				//envoyer le fighter
				$this->set("allFighters",$fig2);
				$this->set("fighter", $fig);
				$this->set("tool", $tools);
				//envoyer la map
				$this->set("arene", $sur);
				$this->render('../Arenas/sight');
			}
			else
			{
				$this->redirect(['action' => 'choisirFighter']);
			}
			
		}


				//fonction décrivant une attaque
				//toucher=d20-niv attaqué +niv attaquant
				//dégats=force attaquant
				//xp+1 à chaque attaque et +niv attaqué s'il meurt
				//1=attaquant 2=attaqué
		public function combat()
		{

			if($this->request->data)
			{
				//on charge le modèle fighter, le fighter à update et la liste des fighters pour vérification
				$b=$this->loadModel('Fighters');
				$fig=$this->Fighters->find('all')->where(['id' => $this->request->data['id']])->first();/*si besoin créer une fonction qui le fait naturellement*/
				$fighters=$this->Fighters->find('all');

				//on charge la liste des obstacles pour vérification liée au monstre
				$a=$this->loadModel('Surroundings');
				$sur=$this->Surroundings->arene();

				$ev=$this->loadModel('Events');

				//si on est pas sur la rangée du haut et qu'on attaque vers le haut
				if($fig['coordinate_x']-1 >=0 && $this->request->data['name'] == "nord")
				{

					//variables enregistrant la nouvelle position de $fig
					$coordx=$fig['coordinate_x']-1;
					$coordy=$fig['coordinate_y'];

					//on vérifie si le monstre est à l'endroit attaqué
					foreach ($sur as $monstre) {
						if($monstre['type'] == 'W')
						{
							if($monstre['coordinate_x'] == $coordx && $monstre['coordinate_y'] == $coordy)
							{
								$a->suppressionMonstre($monstre['id']);

								$message=Text::insert(":name detruit le monstre invisible", ['name' => $fig['name']]);
								$ev->insertion($message, $coordx, $coordy);
							}
						}
					}

					//on vérifie s'il y a un combattant à l'endroit attaqué
					foreach($fighters as $f)
					{
						if($f['coordinate_x']==$coordx && $f['coordinate_y']==$coordy)
						{
							//on lance le dé pour toucher
							if(rand(1,20)-$f['level']+$fig['level']>=10)
							{
								//on décrémente la vie et incrémente l'expérience
								$newpvs=$f['current_health']-$fig['skill_strength'];
								//l'attaqué est-il mort?
								if($newpvs<=0)
								{
									$b->deleteFighter($f['id']);
									$b->updateXp($f['level'], $fig['id']);
									$message=Text::insert(":name tue :name2", ['name' => $fig['name'], 'name2' => $f['name']]);
									$ev->insertion($message, $coordx, $coordy);
								}
								else
								{
									$b->updatePv($fig['skill_strength'], $f['id']);
									$message=Text::insert(":name attaque :name2 et lui inflige :degat degats", ['name' => $fig['name'], 'name2' => $f['name'], 'degat' => $fig['skill_strength']]);
									$ev->insertion($message, $coordx, $coordy);
								}
								$b->updateXp(1, $fig['id']);
							}
							else
							{
								$message=Text::insert(":name rate :name2", ['name' => $fig['name'], 'name2' => $f['name']]);
								$ev->insertion($message, $coordx, $coordy);

							}
						}
					}
				}




				//si on est pas sur la rangée de gauche et qu'on attaque vers la gauche
				if($fig['coordinate_y']-1 >=0 && $this->request->data['name'] == "ouest")
				{

					//variables enregistrant la nouvelle position de $fig
					$coordx=$fig['coordinate_x'];
					$coordy=$fig['coordinate_y']-1;

					//on vérifie si le monstre est à l'endroit attaqué
					foreach ($sur as $monstre) {
						if($monstre['type'] == 'W')
						{
							if($monstre['coordinate_x'] == $coordx && $monstre['coordinate_y'] == $coordy)
							{
								$a->suppressionMonstre($monstre['id']);
								$message=Text::insert(":name detruit le monstre invisible", ['name' => $fig['name']]);
								$ev->insertion($message, $coordx, $coordy);
							}
						}
					}

					//on vérifie s'il y a un combattant à l'endroit attaqué
					foreach($fighters as $f)
					{
						if($f['coordinate_x']==$coordx && $f['coordinate_y']==$coordy)
						{
							//on lance le dé pour toucher
							if(rand(1,20)-$f['level']+$fig['level']>=10)
							{
								//on décrémente la vie et incrémente l'expérience
								$newpvs=$f['current_health']-$fig['skill_strength'];
								//l'attaqué est-il mort?
								if($newpvs<=0)
								{
									$b->deleteFighter($f['id']);
									$b->updateXp($f['level'], $fig['id']);
									$message=Text::insert(":name tue :name2", ['name' => $fig['name'], 'name2' => $f['name']]);
									$ev->insertion($message, $coordx, $coordy);
								}
								else
								{
									$b->updatePv($fig['skill_strength'], $f['id']);
									$message=Text::insert(":name attaque :name2 et lui inflige :degat degats", ['name' => $fig['name'], 'name2' => $f['name'], 'degat' => $fig['skill_strength']]);
									$ev->insertion($message, $coordx, $coordy);
									$ev->insertion($fig['name']+" attaque "+$f['name']+" et lui inflige "+$fig['skill_strength']+" degats", $f['coordinate_x'], $f['coordinate_y']);
								}
								$b->updateXp(1, $fig['id']);
							}
							else
							{
								$message=Text::insert(":name rate :name2", ['name' => $fig['name'], 'name2' => $f['name']]);
								$ev->insertion($message, $coordx, $coordy);

							}
						}
					}
				}


				//si on est pas sur la rangée de droite et qu'on attaque vers la droite
				if($fig['coordinate_y']+1 <10 && $this->request->data['name'] == "est")
				{
					//variables enregistrant la nouvelle position de $fig
					$coordx=$fig['coordinate_x'];
					$coordy=$fig['coordinate_y']+1;

					//on vérifie si le monstre est à l'endroit attaqué
					foreach ($sur as $monstre) {
						if($monstre['type'] == 'W')
						{
							if($monstre['coordinate_x'] == $coordx && $monstre['coordinate_y'] == $coordy)
							{
								$a->suppressionMonstre($monstre['id']);
								$message=Text::insert(":name detruit le monstre invisible", ['name' => $fig['name']]);
								$ev->insertion($message, $coordx, $coordy);
							}
						}
					}

					//on vérifie s'il y a un combattant à l'endroit attaqué
					foreach($fighters as $f)
					{
						if($f['coordinate_x']==$coordx && $f['coordinate_y']==$coordy)
						{
							$try=1;
							//on lance le dé pour toucher
							$test=rand(1,20)-$f['level']+$fig['level'];
							if($test>=10)
							{
								//on décrémente la vie et incrémente l'expérience
								$newpvs=$f['current_health']-$fig['skill_strength'];
								//l'attaqué est-il mort?
								if($newpvs<=0)
								{
									$b->deleteFighter($f['id']);
									$b->updateXp($f['level'], $fig['id']);
									$message=Text::insert(":name tue :name2", ['name' => $fig['name'], 'name2' => $f['name']]);
									$ev->insertion($message, $coordx, $coordy);
								}
								else
								{
									$b->updatePv($fig['skill_strength'], $f['id']);
									$message=Text::insert(":name attaque :name2 et lui inflige :degat degats", ['name' => $fig['name'], 'name2' => $f['name'], 'degat' => $fig['skill_strength']]);
									$ev->insertion($message, $coordx, $coordy);
									$ev->insertion($fig['name']+" attaque "+$f['name']+" et lui inflige "+$fig['skill_strength']+" degats", $f['coordinate_x'], $f['coordinate_y']);
								}
								$b->updateXp(1, $fig['id']);
							}
							else
							{
								$message=Text::insert(":name rate :name2", ['name' => $fig['name'], 'name2' => $f['name']]);
								$ev->insertion($message, $coordx, $coordy);

							}
						}
					}
				}


				//si on est pas sur la rangée du bas et qu'on attaque vers le bas
				if($fig['coordinate_x']+1 <15 && $this->request->data['name'] == "sud")
				{

					//variables enregistrant la nouvelle position de $fig
					$coordx=$fig['coordinate_x']+1;
					$coordy=$fig['coordinate_y'];

					//on vérifie si le monstre est à l'endroit attaqué
					foreach ($sur as $monstre) {
						if($monstre['type'] == 'W')
						{
							if($monstre['coordinate_x'] == $coordx && $monstre['coordinate_y'] == $coordy)
							{
								$a->suppressionMonstre($monstre['id']);
								$message=Text::insert(":name detruit le monstre invisible", ['name' => $fig['name']]);
								$ev->insertion($message, $coordx, $coordy);
							}
						}
					}

					//on vérifie s'il y a un combattant à l'endroit attaqué
					foreach($fighters as $f)
					{
						if($f['coordinate_x']==$coordx && $f['coordinate_y']==$coordy)
						{
							//on lance le dé pour toucher
							if(rand(1,20)-$f['level']+$fig['level']>=10)
							{
								//on décrémente la vie et incrémente l'expérience
								$newpvs=$f['current_health']-$fig['skill_strength'];
								//l'attaqué est-il mort?
								if($newpvs<=0)
								{
									$b->deleteFighter($f['id']);
									$b->updateXp($f['level'], $fig['id']);
									$message=Text::insert(":name tue :name2", ['name' => $fig['name'], 'name2' => $f['name']]);
									$ev->insertion($message, $coordx, $coordy);
								}
								else
								{
									$b->updatePv($fig['skill_strength'], $f['id']);
									$message=Text::insert(":name attaque :name2 et lui inflige :degat degats", ['name' => $fig['name'], 'name2' => $f['name'], 'degat' => $fig['skill_strength']]);
									$ev->insertion($message, $coordx, $coordy);
									$ev->insertion($fig['name']+" attaque "+$f['name']+" et lui inflige "+$fig['skill_strength']+" degats", $f['coordinate_x'], $f['coordinate_y']);
								}
								$b->updateXp(1, $fig['id']);
							}
							else
							{
								$message=Text::insert(":name rate :name2", ['name' => $fig['name'], 'name2' => $f['name']]);
								$ev->insertion($message, $coordx, $coordy);

							}
						}
					}
				}

			}

			$fig=$this->Fighters->get($this->request->data['id']);
			$fig2=$this->Fighters->find('all');
			$this->loadModel('tools');

			$tools=$this->tools->find('all');

			//envoyer le fighter
			$this->set("allFighters",$fig2);
			$this->set("fighter", $fig);
			$this->set("tool", $tools);
			//envoyer la map
			$this->set("arene", $sur);
			$this->render('../Arenas/sight');
		}


		public function choisirFighter()
		{
			$fighters=$this->Fighters->find('all');

			$this->set("fighters",$fighters);
		}
	
	}

