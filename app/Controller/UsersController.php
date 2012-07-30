<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $name = 'Users';

	public $uses = array('User');

	public $helpers = array();

	public function beforeFilter() {
		$this->set('body_class', 'users');
	}

	public function index() {
		$this->set('canonical', 'http://reportshair.com/users/');
		$this->set('title_for_layout', 'User &lsaquo; ReportShair');
	}

	public function view($username = null) {
		$this->set('username', $username);

		$this->set('canonical', 'http://reportshair.com/users/'.$username);
		$this->set('title_for_layout', 'Username &lsaquo; ReportShair');
	}

	public function login() {
		
	}
}
?>