<?php
App::uses('AppController', 'Controller');

class ReportsController extends AppController {

	public $name = 'Reports';

	public $uses = array();

	public function index() {
		$this->set('body_class', 'reports');
	}

	public function view($username = null) {
		$this->set('body_class', 'reports');
	}
}
?>