<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController 
{
    public $name    = 'Users';
    public $uses    = array('User');
    public $helpers = array();

    public function beforeFilter() 
    {
        parent::beforeFilter();
        $this->set('body_class', 'users');
    }

    /**
     *
     *
     * @access public
     */
    public function index() 
    {
        $this->set('canonical', 'http://reportshair.com/users/');
        $this->set('title_for_layout', 'User &lsaquo; ReportShair');
    }

    /**
     * 
     *
     * @access public
     */
    public function view($username = null) 
    {
        if ($username == null) {
            //
        }
        $user = $this->User->findByUsername($username);
        $this->set('user', $user);

        $this->set('canonical', 'http://reportshair.com/users/'.$username);
        $this->set('title_for_layout', $user['User']['username'].' &lsaquo; ReportShair');
    }

    /**
     * Facebookで認証が完了したらコールバックで戻ってきて
     * この関数でユーザーの登録やログインの処理を行う
     */
    public function callback() 
    {
        // TODO: 普通にURLでアクセスすることができるのでFBからのコールバック以外は弾く処理が必要

        // アクセストークンをセッションに格納
        $access_token = FB::getAccessToken();
        SessionComponent::write('access_token', $access_token);

        $facebook_id = FB::getUser();

        $user = $this->User->findByFacebookId($facebook_id);

        // 既に登録されているかチェックする
        if ($user) {
            SessionComponent::write('loggedin', True);

            $this->redirect('/');
        } else {
            
        }
    }

    /**
     * ログアウト
     *
     * @access public
     */
    public function logout() 
    {
        if ( ! SessionComponent::read('loggedin')) {
            // TODO: 不正なアクセスなので警告を表示するために
            //       フラッシュメッセージをセットする
            $this->redirect('/');
            exit;
        }

        $this->Sesion->destroy();
    }
}
?>
