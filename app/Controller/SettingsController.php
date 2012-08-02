<?php
App::uses('AppController', 'Controller');

class SettingsController extends AppController {

    public $name = 'Settings';

    public $uses = array('User');

    public $helpers = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('body_class', 'settings');
    }

    public function index() {
        $this->set('canonical', 'http://reportshair.com/settings/');
    }

    public function account() {
        $this->set('canonical', 'http://reportshair.com/settings/account');
    }
}
?>