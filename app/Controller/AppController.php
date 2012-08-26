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
        'Facebook.Connect' => array('model' => 'User'),
        'DebugKit.Toolbar',
        'Security',
        'Session'
    );

    public $fbLoginUrl;

    public function beforeFacebookLogin($user) 
    {
        
    }

    public function afterFacebookLogin() 
    {
        
    }

    public function beforeFacebookSave() 
    {
        $this->Connect->authUser['User']['username'] = $this->Connect->user('username');
        $this->Connect->authUser['User']['email'] = $this->Connect->user('email');
//        $this->Connect->authUser['User']['locale'] = $this->Connect->user('locale');
//        $this->Connect->authUser['User']['facebook_link'] = $this->Connect->user('link');
        return true;
    }

    public function beforeFilter() 
    {
        $this->Auth->allow('*');
        $this->fbLoginUrl = FB::getLoginUrl(array(
            'redirect_uri' => SITE_URL . '/fblogin/callback',
            'scope'        => 'email,publish_stream,user_location,user_birthday,user_interests,user_likes'
        ));

        if (SessionComponent::check('loggedin')) {
            $this->set('loggedin', SessionComponent::read('loggedin'));
        } else {
            $this->set('loggedin', False);
        }
    }
}
