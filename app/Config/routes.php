<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/',                array('controller' => 'homes', 'action' => 'index'));

	Router::connect('/login',           array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout',          array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/callback',        array('controller' => 'users', 'action' => 'callback'));
	Router::connect('/users/:username', array('controller' => 'users', 'action' => 'view'), array('pass' => array('username'), 'username' => '[A-z0-9-]+'));

	Router::connect('/reports/',              array('controller' => 'reports', 'action' => 'index'));
	Router::connect('/reports/dialog/report', array('controller' => 'reports', 'action' => 'dialog_report'));
	Router::connect('/reports/dialog/event',  array('controller' => 'reports', 'action' => 'dialog_event'));
	Router::connect('/reports/dialog/fbpage', array('controller' => 'reports', 'action' => 'dialog_fbpage'));
	Router::connect('/reports/:slug',         array('controller' => 'reports', 'action' => 'view'), array('pass' => array('slug'), 'slug' => '[A-z0-9-]+'));

	Router::connect('/settings/account',       array('controller' => 'settings', 'action' => 'account'));
	Router::connect('/settings/password',      array('controller' => 'settings', 'action' => 'password'));
	Router::connect('/settings/notifications', array('controller' => 'settings', 'action' => 'notifications'));
	Router::connect('/settings/profile',       array('controller' => 'settings', 'action' => 'profile'));

	Router::connect('/about/', array('controller' => 'pages', 'action' => 'about_index'));
	Router::connect('/terms',  array('controller' => 'pages', 'action' => 'terms'));
	Router::connect('/policy', array('controller' => 'pages', 'action' => 'policy'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
