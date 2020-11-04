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
        'route' => '/',
        'controller' => 'home',
        'method' => 'index',
        'access' => 'all'
    ],
    [
        'route' => '/login',
        'controller' => 'authorization',
        'method' => 'login',
        'access' => 'all'
    ],
    [
        'route' => '/register',
        'controller' => 'authorization',
        'method' => 'register',
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
        'method' => 'register',
        'access' => 'all',
        'requestMethod' => 'POST'

    ],
    [
        'route' => '/register',
        'controller' => 'authorization',
        'method' => 'register',
        'access' => 'all'
    ],
]











?>


