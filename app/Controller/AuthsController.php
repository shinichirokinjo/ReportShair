<?php
App::uses('AppController', 'Controller');
class AuthsController extends AppController 
{
    public $name    = 'Auths';
    public $uses    = array('User');
    public $helpers = array();

    public function beforeFilter() 
    {
        parent::beforeFilter();
        $this->set('body_class', 'users');
    }

    /**
     * Facebookログイン
     *
     * @access public
     */
    public function fbLogin() 
    {
        $this->Session->write('fblogin.ref', $this->referer());
        $this->redirect($this->fbLoginURL);
        exit;
    }

    /**
     * Facebookで認証が完了したらコールバックで戻ってきて
     * この関数でユーザーの登録やログインの処理を行う
     *
     * @access public
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
        }
        $this->Session->destroy();
        $this->redirect('/');
    }
}
?>
