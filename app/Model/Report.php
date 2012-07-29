<?php
App::uses('AppModel', 'Model');

class Report extends AppModel {

	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
		),
		'body' => array(
			'rule' => 'notEmpty',
		)
	);
}
?>