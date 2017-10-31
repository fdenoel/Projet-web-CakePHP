<?php

// src/Controller/PlayersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class PlayersController extends AppController
{
    public $components = array('Auth');
    public function initialize()
    {
        // Active toujours le component CSRF.
        $this->loadComponent('Csrf');
        $this->loadComponent('Flash');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
        $this->Auth->allow('login');
    }

     public function index()
     {
        $this->set('player', $this->Players->find('all'));
    }

    public function view($id)
    {
        $player = $this->Players->get($id);
        $this->set(compact('player'));
    }

    public function add()
    {
        $player = $this->Players->newEntity();
        if ($this->request->is('post')) {
            $player = $this->Players->patchEntity($player, $this->request->getData());
            if ($this->Players->save($player)) {
                $this->Flash->success("Vos identifiants ont bien été sauvegardés", [
                    'key' => 'positive']);
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Impossible d\'ajouter le nouvelle utilisateur.'[
                    'key' => 'negatif']););
        }
        $this->set('player', $player);
        $this->Flash->error(__('Ce mail a déjà été pris !'[
                    'key' => 'negatif']););
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $player = $this->Auth->identify();
            if ($player) {
                $this->Auth->setUser($player);
                //return $this->redirect($this->Auth->redirectUrl());
                $this->Flash->success("Bienvenue sur Webarena !", [
                    'key' => 'positive']);
                return $this->redirect(['controller' => 'Arenas',
                                        'action' => 'index']);
            }
            $this->Flash->error(__('Mauvais identifiant ou mot de passe !'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

}

?>