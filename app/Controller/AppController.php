<?php
App::uses('Controller',   'Controller');
App::uses('FB',           'Facebook.Lib');
App::uses('FacebookInfo', 'Facebook.Lib');
class AppController extends Controller 
{
    public $helpers = array(
        'Facebook.Facebook',
        'Form',
        'Html',
        'Session'
    );
    public $components = array(
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            ),
            'authorize' => 'Controller'
        ),
        'DebugKit.Toolbar', // デバッグツールバー
        'Facebook.Connect' => array('model' => 'User'), // FBで認証されているかの状態を持っている
        'Session'
    );

    /**
     * Facebook認証で新規ユーザーを作成する際にユーザー名とEmailも一緒に追加する。
     */
    public function beforeFacebookSave() 
    {
        $this->Connect->authUser['User']['username'] = $this->Connect->user('username');
        $this->Connect->authUser['User']['email'] = $this->Connect->user('email');

        return true;
    }

    public function beforeFilter() 
    {
        $this->Auth->allow('*');

        $this->set('fbLoginURL', FB::getLoginUrl(array(
                    //'redirect_uri' => 'http://localhost:8888/users/callback',
                    'redirect_uri' => 'http://dev.reportshair.com/users/callback',
            'scope' => 'email,publish_stream,user_location,user_birthday,user_interests,user_likes'
        )));

        if (SessionComponent::check('loggedin')) {
            $this->set('loggedin', SessionComponent::read('loggedin'));

            // $this->set('user', $this->Auth->user());
        } else {
            $this->set('loggedin', false);
        }
        // $this->set('fbuser', $this->Connect->user());
    }
}
?>
