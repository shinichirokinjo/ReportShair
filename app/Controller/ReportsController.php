<?php
App::uses('AppController', 'Controller');

class ReportsController extends AppController {

	public $name = 'Reports';

	public $uses = array('Event', 'Report', 'User');

	public function beforeFilter() {
		parent::beforeFilter();

		$this->set('body_class', 'reports sc');
	}

	public function index() {
		$reports = $this->Report->find('all', array('conditions' => array('Report.status' => 'publish')));

		$this->set('reports', $reports);
		$this->set('title', __('Latest Reports').' &lsaquo; ReportShair');
	}

	public function feature() {
		$reports = $this->Report->find('all', array('conditions' => array('Report.status' => 'publish')));

		$this->set('reports', $reports);
		$this->set('title', __('Featured Reports').' &lsaquo; ReportShair');
	}

	public function category($slug) {
		$this->set('title', 'Category Name &lsaquo; ReportShair');
	}

	public function view($slug) {
		$report = $this->Report->find('first', array(
			'conditions' => array('Report.slug' => $slug)
		));

		$this->set('report', $report);

		$this->set('title', $report['Report']['name'].' &lsaquo; ReportShair');
	}

	public function add() {
		$this->set('title', __('Add report').' &lsaquo; ReportShair');
	}

	public function edit($slug) {
		$this->set('title', __('Edit report').' &lsaquo; ReportShair');
	}

	public function delete($slug) {
		$this->set('title', __('Delete report').' &lsaquo; ReportShair');
	}

	/**
	 * レポートを作成するダイアログのコンテナだけ表示する。
	 * Ajaxで呼び出されるがコンテンツはローディングを表示させ、
	 * dialog_fbpage()を非同期で取得しに行く。
	 */
	public function dialog_report_select() {
		$this->layout = 'dialog';
		$this->set('title', 'ReportShair');
		$this->set('headline', 'Create Report');

		$this->render('dialog/report/select');
	}

	public function dialog_report_fbpage() {
		$this->layout = 'dialog';
		$this->set('title', 'ReportShair');
		$this->set('headline', 'Create Report');

		$this->render('dialog/report/fbpage');
	}

	public function dialog_report_create() {
		$this->layout = 'dialog';
		$this->set('title', 'ReportShair');
		$this->set('headline', 'Create Report');

		$this->render('dialog/report/create');
	}

	public function dialog_event() {
		$this->layout = 'dialog';
		$this->set('title', 'ReportShair');
		$this->set('headline', 'Create Event');

		$this->render('dialog/event');
	}

	/**
	 * FBページの一覧を全て取得する。
	 *
	 * アプリケーションも入ってくるので、一回でページだけを全て取得できるか分からないので再帰処理をして
	 * FBページのみ一覧にして返す。
	 */
	public function dialog_fbpage() {
		$this->layout = 'ajax';

		if ( ! $this->request->is('ajax')) {
			die();
		} else {
			// FBページを取得する
			$this->set('account', FB::api('/me/accounts'));

			$this->render('dialog/fbpage');
		}
	}
}
