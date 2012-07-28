<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $name = 'Pages';

	public $uses = array();

	public function about() {
		$this->set('body_class', 'pages');
		$this->set('title_for_layout', 'ReportShairについて &lsaquo; ReportShair');
	}

	public function terms() {
		$this->set('body_class', 'pages');
		$this->set('title_for_layout', '利用規約 &lsaquo; ReportShair');
	}

	public function policy() {
		$this->set('body_class', 'pages');
		$this->set('title_for_layout', 'プライバシーポリシー &lsaquo; ReportShair');
	}
}
?>