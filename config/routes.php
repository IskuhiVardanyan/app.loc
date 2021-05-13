<?php
return array(
    // User control routes
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    // Admin control routes:
    'admin'  => 'admin/index',
    'admin/add' => 'admin/add',
    'admin/edit/([0-9]+)' => 'admin/edit/$1',
    'admin/delete/([0-9]+)' => 'admin/delete/$1',
    'admin/description/([0-9]+)' => 'admin/description/$1',

	// Home control route:
    ''      => 'home/index',
    '/cart' => 'home/cart',
    '/more/([0-9]+)' => 'home/more/$1',


	// Page Error control route
	'pageError/notFound' => 'pageError/notFound'
);

//ndghjdgh