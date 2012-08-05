<?php
App::uses('AppController', 'Controller');

class SettingsController extends AppController {

    public $name = 'Settings';

    public $uses = array('User');

    public $helpers = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('body_class', 'settings');
    }

    public function index() {
    	if ($this->request->is('post')) {
    		if ($this->User->updateAll($this->request->data)) {
    			$this->redirect('/settings/');
    		} else {
    			
    		}
		} else {
			$username = SessionComponent::read('Auth.User.username');
			
			$user = $this->User->findByUsername($username);
			$this->set('user', $user);
			
			$this->set('canonical', 'http://reportshair.com/settings/');
		}
    }
}
?>