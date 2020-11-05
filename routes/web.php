<?php
/**
 * This is a routes file.
 *
 * The route and controller, method can be set in the format

 *
 * route
 *
 * 'web' => [
 *   'route' => '/article/show/{id}',
 *   'requestMethod' => 'POST'  ? 'GET' default
 *   'controller' => 'home',
 *   'method' => 'index',
 *   'access' => 'all'   ? 401 default
 *   ],
 *
 * {id} params
 *
 * or route
 * '/articles/page/{page}/sort/{sort}'
 *
 * {page} .. {sort} params
 *
 *
 * params will be added
 * and available in the controller
 * automatically in the variable $this->data['page']|$this->data['sort']...
 *
 */


return [
    [
        'route' => '/home',
        'controller' => 'home',
        'method' => 'index',
    ],
    [
        'route' => '/',
        'controller' => 'authorization',
        'method' => 'login',
        'access' => 'all'
    ],
    [
        'route' => '/signIn',
        'controller' => 'authorization',
        'method' => 'signIn',
        'access' => 'all',
        'requestMethod' => 'POST'
    ],
    [
        'route' => '/logout',
        'controller' => 'authorization',
        'method' => 'logout',
        'access' => 'all',

    ],
    [
        'route' => '/register',
        'controller' => 'user',
        'method' => 'register',
        'access' => 'all'
    ],
    [
        'route' => '/register/create',
        'controller' => 'user',
        'method' => 'create',
        'access' => 'all',
        'requestMethod' => 'POST'
    ],
    [
        'route' => '/content/create',
        'controller' => 'Content',
        'method' => 'create',
        'requestMethod' => 'POST'
    ],
]











?>



