<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController 
{
    public $name    = 'Pages';
    public $uses    = array();
    public $helpers = array();

    public function beforeFilter() 
    {
        parent::beforeFilter();
        $this->set('body_class', 'pages');
    }

    /**
     * ReportShairについて
     *
     * @access public
     */
    public function about() 
    {
        $this->set('canonical', 'http://reportshair.com/about/');
        $this->set('title_for_layout', 'ReportShairについて &lsaquo; ReportShair');
    }

    /**
     * 利用規約
     *
     * @access public
     */
    public function terms() 
    {
        $this->set('canonical', 'http://reportshair.com/terms');
        $this->set('title_for_layout', '利用規約 &lsaquo; ReportShair');
    }

    /**
     * プライバシーポリシー
     *
     * @access public
     */
    public function policy() 
    {
        $this->set('canonical', 'http://reportshair.com/policy');
        $this->set('title_for_layout', 'プライバシーポリシー &lsaquo; ReportShair');
    }
}
?>
