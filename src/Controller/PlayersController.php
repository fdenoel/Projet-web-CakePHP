<?php

// src/Controller/UsersController.php

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
    }

     public function index()
     {
        $this->set('users', $this->Players->find('all'));
    }

    public function view($id)
    {
        $user = $this->Players->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Players->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Players->patchEntity($user, $this->request->getData());
            if ($this->Players->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

}

?>