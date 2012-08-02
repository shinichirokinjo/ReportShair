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
		if ($username == null) {
			//
		}
		$user = $this->User->findByUsername($username);
		$this->set('user', $user);

		$this->set('canonical', 'http://reportshair.com/users/'.$username);
		$this->set('title_for_layout', $user['User']['username'].' &lsaquo; ReportShair');
	}

	/**
	 * Facebookで認証が完了したらコールバックで戻ってきて
	 * この関数でユーザーの登録やログインの処理を行う
	 */
	public function callback() {
		// TODO: 普通にURLでアクセスすることができるのでFBからのコールバック以外は弾く処理が必要

		// アクセストークンをセッションに格納
		$access_token = FB::getAccessToken();
		SessionComponent::write('access_token', $access_token);

		$facebook_id = FB::getUser();

		$user = $this->User->findByFacebookId($facebook_id);

		// 既に登録されているかチェックする
		if ($user) {
			SessionComponent::write('loggedin', True);

			$this->redirect('/');
		} else {
			// ユーザー登録画面へ

			$this->redirect('/users/regist');
		}
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
		$this->Sesion->destroy();
		$this->Auth->logout();
	}
}
?>