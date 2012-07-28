<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $name = 'Users';

	public $uses = array();

	public function index() {
		$this->set('body_class', 'users');
	}

	public function view() {
		$this->set('body_class', 'users');
	}

	public function settings() {
		
	}
}
?>