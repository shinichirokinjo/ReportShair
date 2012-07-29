<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {

	public $name = 'Home';

	public $uses = array('Report');

	public $components = array();

	public function index() {
		$this->set('reports', $this->Report->find('all'));

		$this->set('canonical', 'http://reportshair.com/');
		$this->set('body_class', 'home');
		$this->set('title_for_layout', 'ReportShair');
	}
}
?>