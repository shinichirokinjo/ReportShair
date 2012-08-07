<?php
App::uses('AppController', 'Controller');

class ReportsController extends AppController {

	public $name = 'Reports';

	public $uses = array();

	public $helpers = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('body_class', 'reports');
	}

	public function index() {
		$this->set('reports', $this->Report->find('all'));

		$this->set('canonical', 'http://reportshair.com/reports/');
		$this->set('title_for_layout', 'レポート一覧 &lsaquo; ReportShair');
	}

	public function view($id = null) {
		$this->Report->id = $id;

		$report = $this->Report->read();

		$this->set('report', $report);

		$this->set('canonical', 'http://reportshair.com/reports/'.$id);
		$this->set('title_for_layout', $report['Report']['title'].' &lsaquo; ReportShair');
	}

	public function add() {
		if ( ! SessionComponent::read('loggedin')) {
			// TODO: 不正なアクセスなので警告を表示するために
			//       フラッシュメッセージをセットする
			$this->redirect('/');
			exit;
		}

		$this->set('canonical', 'http://reportshair.com/reports/add');
		$this->set('title_for_layout', 'Add Report &lsaquo; ReportShair');

		if ($this->request->is('post')) {
			if ($this->Report->save($this->request->data)) {
				$this->redirect(array('action'=>'index'));
			} else {

			}
		}
	}

	public function edit($id = null) {
		if ( ! SessionComponent::read('loggedin')) {
			// TODO: 不正なアクセスなので警告を表示するために
			//       フラッシュメッセージをセットする
			$this->redirect('/');
			exit;
		}

		$this->set('canonical', 'http://reportshair.com/reports/edit/'.$id);
		$this->set('title_for_layout', 'Edit Report &lsaquo; ReportShair');

		if ($this->request->is('post')) {
			
		}
	}

	public function delete($id = null) {
		if ( ! SessionComponent::read('loggedin')) {
			// TODO: 不正なアクセスなので警告を表示するために
			//       フラッシュメッセージをセットする
			$this->redirect('/');
			exit;
		}
	}
}
?>