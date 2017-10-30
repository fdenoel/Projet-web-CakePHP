<?php
// src/Controller/UsersController.php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
        {
        parent::beforeFilter($event);
        $this->loadModel('Players');
        $this->Auth->allow(['add', 'logout', 'login']);
        }
    public function index()
        {
        $this->set('user', $this->Players->find('all'));
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
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                return $this->redirect(['controller' => 'Users',
                                        'action' => 'login']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
            }
        $this->set('user', $user);
        }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
?>