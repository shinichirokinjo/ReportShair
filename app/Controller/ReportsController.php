<?php
App::uses('AppController', 'Controller');

class ReportsController extends AppController {

    public $name = 'Reports';

    public $uses = array('Event', 'Report', 'User');

    public function beforeFilter() {
        parent::beforeFilter();

        // TODO:
        // HTMLのbody要素のクラスに'reports'と'sc'(左にsidebar、右にcontent)
        // 'sc'はクラス名が判別しにくいのでCSSを修正します。
        $this->set('body_class', 'reports sc');
    }

    public function index() {
        // $reports = $this->Report->find('all', array('conditions' => array('Report.status' => 'publish')));
        $reports = array();

        $this->set('reports', $reports);
        $this->set('title', __('Latest Reports').' &lsaquo; ReportShair');
    }

    public function category($slug) {
        $this->set('title', 'Category Name &lsaquo; ReportShair');
    }

    public function view($slug) {
        $report = $this->Report->find('first', array(
            'conditions' => array('Report.slug' => $slug)
        ));

        $this->set('report', $report);

        $this->set('title', $report['Report']['name'].' &lsaquo; ReportShair');
    }

    public function dialog_report_select() {
        $this->layout = 'dialog';
        $this->set('title', 'ReportShair');
        $this->set('headline', 'Create Report');

        $this->render('dialog/report/select');
    }

    public function dialog_report_fbpage() {
        $this->layout = 'dialog';
        $this->set('title', 'ReportShair');
        $this->set('headline', 'Create Report');

        $this->render('dialog/report/fbpage');
    }

    public function dialog_report_create() {
        $this->layout = 'dialog';
        $this->set('title', 'ReportShair');
        $this->set('headline', 'Create Report');

        $this->render('dialog/report/create');
    }

    public function dialog_upload_cover() {

    }

    public function dialog_upload_icon() {

    }

    public function dialog_event() {
        $this->layout = 'dialog';
        $this->set('title', 'ReportShair');
        $this->set('headline', 'Create Event');

        $this->render('dialog/event');
    }
}
