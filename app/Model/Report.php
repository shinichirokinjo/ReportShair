<?php
App::uses('AppModel', 'Model');
App::uses('Lib', 'Utils.Sluggable');

class Report extends AppModel {

	public $name = 'Report';

	public $actsAs = array();

	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
		),
		'body' => array(
			'rule' => 'notEmpty',
		)
	);

	public $belongsTo = array(
		'User' => array(
			'className'  => 'User',
			'foreignKey' => 'user_id',
			'fields'     => array('id', 'username', 'facebook_id')
		)
	);
}
?>