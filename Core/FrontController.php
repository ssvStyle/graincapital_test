<?php

namespace Core;

use Core\Interfaces\RouterInterface;
use Core\Service\AccessController;

/**
 * Class FrontController
 *
 * @package Core
 *
 */
class FrontController
{
    protected $loger, $routeMapParams, $data;

    public function __construct()
    {
        $this->loger = new Loger();

    }

    public function setRouteMapParams(array $params)
    {
        $this->routeMapParams = $params;
    }



    public function setGetData(array $params)
    {
        $this->data = $params;
    }

    public function start()
    {

        $controllerName = 'App\Controllers\\' . ucfirst($this->routeMapParams['controller']);
        $methodName = $this->routeMapParams['method'];

        $controller = new $controllerName;

        $controller->setData($this->data);

        header('Access-Control-Allow-Origin: *');
        header('Content-type: text/html; charset=utf-8');
        http_response_code(200);

        echo $controller->$methodName();


    }

}