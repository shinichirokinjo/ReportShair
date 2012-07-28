<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {

	public $name = 'Home';

	public $uses = array();

	public function index() {
		$this->set('title_for_layout', 'ReportShair');
	}
}
?>