<?php

	Router::connect('/admin', array('prefix'=>'admin','admin'=>true,'controller' => 'produtos', 'action' => 'index'));
	Router::connect('/',array('controller' => 'produtos', 'action' => 'index'));
	
        Router::connect('/produto/:slug', array('controller'=>'produtos','action'=>'ver'), array('pass'=>array('slug')));
        
        Router::connect('/cliente/',array('controller' => 'usuarios', 'action'=>'index'));
        Router::connect('/cliente/:action',array('controller' => 'usuarios', 'action'=>'index'));
        Router::connect('/cliente/:action/*',array('controller' => 'usuarios', 'action'=>'index'));

	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));


	CakePlugin::routes();


	require CAKE . 'Config' . DS . 'routes.php';
