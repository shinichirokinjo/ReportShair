<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $name = 'User';

	public $actsAs = array();

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

	public $hasMany = array(
		'Report' => array(
			'className'  => 'Report',
			'foreignKey' => 'user_id',
			'conditions' => array('Report.status' => 'publish'),
			'order'      => 'Report.created DESC',
			'limit'      => '5',
			'dependent'  => true
		)
	);
}
?>