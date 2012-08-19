<?php
App::uses('AppController', 'Controller');
class PhotosController extends AppController 
{
    public $name    = 'Photos';
    public $uses    = array();
    public $helpers = array();

    public function beforeFilter() 
    {
        parent::beforeFilter();
    }

    /**
     * 画像アップロード
     *
     * @access public
     */
    public function upload() 
    {
        
    }
}
?>
