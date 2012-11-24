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

        $this->Security->validatePost = false;
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
		if (isset($_FILES['file']['tmp_name'])) {
			$this->set('cover_url','/media/reports/'.$this->_imageSave($_FILES['file']['tmp_name']));
			$this->viewClass = 'Json';
			$this->set('_serialize', array('cover_url'));
		} else {
	        $this->set('cover_url','error');
			$this->viewClass = 'Json';
			$this->set('_serialize', array('error'));
		}	
    }

    public function dialog_upload_icon() {
		$iconImage = $_FILES['icon']['tmp_name'];
		$this->_imageSave($iconImage);
        $this->set('icon_url','/media/reports/158038_196424980375651_569949477_n.jpg');
        $this->viewClass = 'Json';
        $this->set('_serialize', array('icon_url'));

    }

    public function dialog_event() {
        $this->layout = 'dialog';
        $this->set('title', 'ReportShair');
        $this->set('headline', 'Create Event');

        $this->render('dialog/event');
    }

	private function _imageSave($fileTmpName) {
		// validateを実行(sizeと拡張子,content-type?)
		if (!$fileTmpName) {
			return false;
		}
		// 保存するpathを生成
		$mediaPath = '../webroot/media/reports/';
		$mediaFileName = hash('md5',strtotime(date("Y-m-d h:i:s"))) .'.jpg';
		if(!move_uploaded_file($fileTmpName, $mediaPath . $mediaFileName)){
		}
		return $mediaFileName;
	}
}
