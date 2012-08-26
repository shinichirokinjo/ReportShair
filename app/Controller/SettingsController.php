<?php
App::uses('AppController', 'Controller');

class SettingsController extends AppController {

	public $name = 'Settings';

	public $uses = array('User');

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Security->blackHoleCallback = 'blackhole';

		$this->set('body_class', 'settings sc');
	}

	public function account() {
		$username = SessionComponent::read('Auth.User.username');
		$user = $this->User->find('first', array('conditions' => array('username' => $username)));

		if ( ! empty($this->data)) {
			$this->User->save($this->data);

			$this->Session->setFlash("Saved!");

			$this->redirect('/settings/');
		}

		$this->set('user', $user);

		$this->set('title', __('Settings').' &lsaquo; ReportShair');
	}

	public function blackhole($type) {
		
	}
}
