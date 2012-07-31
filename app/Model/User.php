<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $name = 'User';

	public $validate = array(
		'username' => array(),
		'password' => array(),
		'facebook_id' => array()
	);
}
?>