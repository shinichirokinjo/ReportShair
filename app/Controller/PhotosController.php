<?php
App::uses('AppController', 'Controller');

class PhotosController extends AppController {

	public $name = 'Photos';

	public $uses = array();

	public $helpers = array();

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function upload() {
		
	}
}
?>