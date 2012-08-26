<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $name = 'Users';

	public $uses = array('User');

	public function beforeFilter() {
		parent::beforeFilter();

		$this->set('body_class', 'users sc');
	}

	public function view($username) {
		$user = $this->User->find('first', array(
			'conditions' => array('User.username' => $username)
		));

		$this->set('user', $user);
		$this->set('title', $user['User']['username'].' &lsaquo; ReportShair');
	}

	public function login() {
		$this->set('title', __('Login').' &lsaquo; ReportShair');
	}

	public function logout() {
		$this->Auth->logout();
		SessionComponent::destroy();

		$this->redirect('/');
	}

	public function callback() {
		// TODO: 普通にURLでアクセスすることができるのでFBからのコールバック以外は弾く処理が必要

		// アクセストークンをセッションに格納
		$access_token = FB::getAccessToken();
		SessionComponent::write('access_token', $access_token);

		$facebook_id = FB::getUser();

		$user = $this->User->findByFacebookId($facebook_id);

		if ($user) {
			// 既にユーザー登録されている場合
			SessionComponent::write('loggedin', True);

			$this->redirect('/');
		} else {
			// 新規でユーザー登録した場合
			SessionComponent::write('loggedin', True);

			$this->redirect('/');
		}
	}
}
