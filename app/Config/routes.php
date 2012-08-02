<?php

	Router::connect('/', array('controller' => 'home', 'action' => 'index', 'home'));

	Router::connect('/about/', array('controller' => 'pages', 'action' => 'about'));
	Router::connect('/terms', array('controller' => 'pages', 'action' => 'terms'));
	Router::connect('/policy', array('controller' => 'pages', 'action' => 'policy'));

	Router::connect('/reports/', array('controller' => 'reports', 'action' => 'index'));
	Router::connect('/reports/add', array('controller' => 'reports', 'action' => 'add'));
	Router::connect('/reports/edit/*', array('controller' => 'reports', 'action' => 'edit'));
	Router::connect('/reports/delete/*', array('controller' => 'reports', 'action' => 'delete'));
	Router::connect('/reports/*', array('controller' => 'reports', 'action' => 'view'));

	Router::connect('/users/', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/users/callback', array('controller' => 'users', 'action' => 'callback'));
	Router::connect('/users/regist', array('controller' => 'users', 'action' => 'regist'));
	Router::connect('/users/*', array('controller' => 'users', 'action' => 'view'));

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

?>