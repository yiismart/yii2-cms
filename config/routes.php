<?php

return [
    ['pattern' => '/login', 'route' => '/login/index'],
    ['pattern' => '/logout', 'route' => '/user/logout/index'],
    ['pattern' => '/user/settings', 'route' => '/user/settings/index'],
    ['pattern' => '/user/password', 'route' => '/user/password/index'],

    // User
    ['pattern' => '/user/permission', 'route' => '/user/permission/index'],
    ['pattern' => '/user/permission/update/<name:\w+>', 'route' => '/user/permission/update'],
    ['pattern' => '/user/permission/delete/<name:\w+>', 'route' => '/user/permission/delete'],
    ['pattern' => '/user/role', 'route' => '/user/role/index'],
    ['pattern' => '/user/role/update/<name:\w+>', 'route' => '/user/role/update'],
    ['pattern' => '/user/role/delete/<name:\w+>', 'route' => '/user/role/delete'],
    ['pattern' => '/user/user', 'route' => '/user/user/index'],
    ['pattern' => '/user/user/update/<id:\d+>', 'route' => '/user/user/update'],
    ['pattern' => '/user/user/password/<id:\d+>', 'route' => '/user/user/password'],

    // Page
    ['pattern' => '/page', 'route' => '/page/page/index'],
    ['pattern' => '/page/create', 'route' => '/page/page/create'],
    ['pattern' => '/page/update/<id:\d+>', 'route' => '/page/page/update'],
    ['pattern' => '/page/delete/<id:\d+>', 'route' => '/page/page/delete'],

    // News
    ['pattern' => '/news', 'route' => '/news/news/index'],
    ['pattern' => '/news/create', 'route' => '/news/news/create'],
    ['pattern' => '/news/update/<id:\d+>', 'route' => '/news/news/update'],
    ['pattern' => '/news/delete/<id:\d+>', 'route' => '/news/news/delete'],
];
