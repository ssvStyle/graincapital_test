<?php

namespace Core;

use App\Service\Access as AccessController;

/**
 * Class MyApp
 *
 * facade app
 *
 * @package Core
 */
class MyApp
{

    /**
     * @var Router
     */
    protected $router;
    /**
     * @var FrontController
     */
    protected $frontController;

    /**
     * @var AccessController
     */
    protected $accessController;

    /**
     * MyApp constructor.
     *
     */
    public function __construct()
    {
        $this->router = new Router( $_SERVER['REQUEST_URI'] );
        $this->frontController = new FrontController();
        $this->accessController = new AccessController();

    }

    /**
     *
     * run app
     *
     *
     */
    public function run()
    {

        $this->router->response();

        $routeMapParams = $this->router->getRouteMapParams();

        $this->accessController->setRouteMapParams($routeMapParams);

        $this->accessController->permission();

        $this->frontController->setRouteMapParams($routeMapParams);

        $this->frontController->setGetData($this->router->getParams());

        $this->frontController->start();

    }

}