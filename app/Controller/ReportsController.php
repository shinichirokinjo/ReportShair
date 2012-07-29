<?php
App::uses('AppController', 'Controller');

class ReportsController extends AppController {

	public $name = 'Reports';

	public $uses = array();

	public $helpers = array();

	public function beforeFilter() {
		$this->set('body_class', 'reports');
	}

	public function index() {
		$this->set('reports', $this->Report->find('all'));

		$this->set('canonical', 'http://reportshair.com/reports/');
		$this->set('title_for_layout', 'レポート一覧 &lsaquo; ReportShair');
	}

	public function view($id = null) {
		$this->Report->id = $id;

		$this->set('report', $this->Report->read());

		$this->set('canonical', 'http://reportshair.com/reports/'.$id);
		$this->set('title_for_layout', 'Report name &lsaquo; ReportShair');
	}

	public function add() {
		$this->set('canonical', 'http://reportshair.com/reports/add');
		$this->set('title_for_layout', 'Add report &lsaquo; ReportShair');

		if ($this->request->is('post')) {
			if ($this->Report->save($this->request->data)) {
				$this->redirect(array('action'=>'index'));
			} else {
				
			}
		}
	}

	public function edit() {
		
	}

	public function delete() {
		
	}
}
?>