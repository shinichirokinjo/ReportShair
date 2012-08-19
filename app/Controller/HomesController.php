<?php
App::uses('AppController', 'Controller');
class HomesController extends AppController 
{
    public $name       = 'Homes';
    public $uses       = array('Report');
    public $helpers    = array();
    public $components = array();

    /**
     * トップ
     *
     * @access public
     */
    public function index() 
    {
    	$this->set('reports', $this->Report->find('all'));

    	$this->set('canonical', 'http://reportshair.com/');
    	$this->set('body_class', 'home');
    	$this->set('title_for_layout', 'ReportShair');
    }
}
?>
