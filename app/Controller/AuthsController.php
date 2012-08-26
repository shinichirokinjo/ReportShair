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
        $this->set('body_class', 'users sc');
    }

    /**
     * Facebookログイン
     *
     * @access public
     */
    public function fbLogin() 
    {
        $this->Session->write('fblogin.ref', $this->referer());
        return $this->redirect($this->fbLoginUrl);
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
            return $this->redirect('/');
        }
        $this->Session->delete('fblogin.ref');
        $access_token = FB::getAccessToken();
        $this->Session->write('access_token', $access_token);
        $facebook_id = FB::getUser();
        $user = $this->User->findByFacebookId($facebook_id);
        if ($user) {
            // 既にユーザー登録されている場合
            $this->Session->write('loggedin', True);
            return $this->redirect('/');
        } else {
            // 新規でユーザー登録した場合
            $this->Session->write('loggedin', True);
            return $this->redirect('/');
        }
    }

    /**
     * ログアウト
     *
     * @access public
     */
    public function logout() 
    {
        $this->Auth->logout();
        $this->Session->destroy();
        return $this->redirect('/');
    }
}
?>
