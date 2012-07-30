<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $name = 'Pages';

	public $uses = array();

	public $helpers = array();

	public function beforeFilter() {
		$this->set('body_class', 'pages');
	}

	public function about() {
		$this->set('canonical', 'http://reportshair.com/about/');
		$this->set('title_for_layout', 'ReportShairについて &lsaquo; ReportShair');
	}

	public function terms() {
		$this->set('canonical', 'http://reportshair.com/terms');
		$this->set('title_for_layout', '利用規約 &lsaquo; ReportShair');
	}

	public function policy() {
		$this->set('canonical', 'http://reportshair.com/policy');
		$this->set('title_for_layout', 'プライバシーポリシー &lsaquo; ReportShair');
	}
}
?>