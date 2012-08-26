<?php
App::uses('AppController', 'Controller');
class HomesController extends AppController
{
    public $name = 'Homes';

    /**
     * トップ
     * 
     * @access public
     */
    public function index()
    {
        $this->set('title', 'ReportShair');
        $this->set('body_class', 'home cs');
    }
}
