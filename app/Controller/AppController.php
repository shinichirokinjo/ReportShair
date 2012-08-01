<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('FB', 'Facebook.Lib');
App::uses('FacebookInfo', 'Facebook.Lib');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $helpers = array(
		'Facebook.Facebook',
		'Form',
		'Html'
	);

	public $components = array(
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email')
				)
			)
		),
		'DebugKit.Toolbar', // デバッグツールバー
		'Facebook.Connect' => array('model' => 'User'), // FBで認証されているかの状態を持っている
		'Session'
	);

	// public $authenticate = array('Form');

	public function beforeFilter() {
		$this->Auth->allow('*');

		$this->set('fbLoginURL', FB::getLoginUrl(array(
			'redirect_uri' => 'http://localhost/users/callback',
			'scope' => 'email,publish_stream,user_location,user_birthday,user_interests,user_likes'
		)));

		// $this->set('user', $this->Auth->user());
		// $this->set('fbuser', $this->Connect->user());
	}
}
?>