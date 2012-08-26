<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController 
{
    public $name = 'Users';
    public $uses = array('User');

    public function beforeFilter() 
    {
        parent::beforeFilter();
        $this->set('body_class', 'users sc');
    }

    /**
     * 
     *
     * @access public
     */
    public function view($username) 
    {
        $user = $this->User->find('first', array(
            'conditions' => array('User.username' => $username)
        ));

        $this->set('user', $user);
        $this->set('title', $user['User']['username'].' &lsaquo; ReportShair');
    }
}
