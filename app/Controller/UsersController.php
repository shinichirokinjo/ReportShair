<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $name = 'Users';

	public $uses = array('User');

	public $helpers = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('body_class', 'users');
	}

	public function index() {
		$this->set('canonical', 'http://reportshair.com/users/');
		$this->set('title_for_layout', 'User &lsaquo; ReportShair');
	}

	public function view($username = null) {
		$this->set('username', $username);

		$this->set('canonical', 'http://reportshair.com/users/'.$username);
		$this->set('title_for_layout', 'Username &lsaquo; ReportShair');
	}

	/**
	 * Facebookで認証が完了したらコールバックで戻ってきて
	 * この関数でユーザーの登録やログインの処理を行う
	 */
	public function callback() {
		// アクセストークンをセッションに格納
		$access_token = FB::getAccessToken();
		SessionComponent::write('access_token', $access_token);

		// 既に登録されているかチェックする

		$this->redirect('/');
	}

	/**
	 * Facebookで初めて認証する場合に残りの情報の登録を行う
	 */
	public function regist() {
		if ($this->request->is('post')) {
			//
		}
	}

	public function logout() {
		$this->Auth->logout();
	}
}
?>