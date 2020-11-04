<?php

namespace Core;

use Core\Interfaces\AccessInt;

abstract class AccessController implements AccessInt
{
    protected $loger, $routeMapParams;
    public $accessList;

    public function __construct()
    {
        $this->loger = new Loger();

    }

    public function setRouteMapParams(array $routeMapParams)
    {
        $this->routeMapParams = $routeMapParams;
        $this->routeMapParams['access'] = $routeMapParams['access'] ?? '';
        $this->accessList = $this->routeMapParams['access'];

    }

    abstract public function permission();

    public function denied()
    {

        $this->loger->log('alert', 'Access Denied', [
            'Access' => $this->routeMapParams['access'],
            'Ctrl' => $this->routeMapParams['controller'],
            'Method' => $this->routeMapParams['method'],
            'ip' => $_SERVER['REMOTE_ADDR'],
            'User agent' => $_SERVER['HTTP_USER_AGENT']
        ]);

        header("HTTP/1.0 401 Unauthorized");
        http_response_code(401);

        exit('Access Denied. You don’t have permission to access for this page <br><b>Please <a href="/login">login</a></b>');

    }

}