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
     * Facebookログイン コールバック
     *
     * @access public
     */
    public function callback() 
    {
        $redirectURL = $this->Session->read('fblogin.ref');
        if (empty($redirectURL)) {
            $this->redirect('/');
        }
        $this->Session->delete('fblogin.ref');
        $access_token = FB::getAccessToken();
        SessionComponent::write('access_token', $access_token);
        $facebook_id = FB::getUser();
        $user = $this->User->findByFacebookId($facebook_id);
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
