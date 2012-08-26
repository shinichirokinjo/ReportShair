<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $name = 'Pages';

	public function beforeFilter() {
		parent::beforeFilter();

		$this->set('body_class', 'pages cs');
	}

	public function about_index() {
		$this->set('title', __('About ReportShair').' &lsaquo; ReportShair');

		$this->render('about/index');
	}

	public function terms() {
		$this->set('title', __('Terms of services').' &lsaquo; ReportShair');
	}

	public function policy() {
		$this->set('title', __('Privacy Policy').' &lsaquo; ReportShair');
	}
}
