<?php
	namespace App\Controller;
	use App\Controller\AppController;
	use Cake\ORM\TableRegistry;
	use Cake\I18n\Time;
	/**
	* Personal Controller
	* User personal interface
	*
	*/
	class EventsController extends AppController
	{
		public function affichage()
		{
			
			$this->loadModel('events');
			$events=$this->events->find('all');
			$this->set("events", $events);

		}
		
	}

