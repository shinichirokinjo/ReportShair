<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $name = 'User';

	public $validate = array(
		'username' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric'
            ),
            'notEmpty' => array(
                'rule' => 'notEmpty'
            )
        ),
		'email' => 'email',
		'facebook_id' => array()
	);
}
?>