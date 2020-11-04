<?php

namespace Core;

class Router implements \Core\Interfaces\RouterInterface
{
    protected $routeMap;

    protected $requestMethod;

    protected $routeMapParams;
    
    protected $request;

    protected $params = [];

    public function __construct(string $request)
    {

        $patternGetParams = '~([?]\w*[=]\w*).+~';

        $request = preg_replace($patternGetParams, '', $request);

        //$request = preg_replace('~^\/[\w\-\.\+\?\#]*~', '', $request);

        $request = preg_replace('~\/$~', '', $request);

        if ( empty( $request ) ) {

            $request = '/';

        }

        $this->request = $request;
        
        $this->routeMap = include __DIR__ . '../../routes/web.php';

        $this->requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_ENCODED);


    }

    public function getParams() : array
    {
        return $this->params;
    }

    public function getRouteMapParams() : array
    {
        return $this->routeMapParams;
    }

    public function response()
    {
        $loger = new Loger();

        foreach ($this->routeMap as $web) {

            $routeReqMethod = $web['requestMethod'] ?? 'GET';

            if ((bool)preg_match('~\}\?~', $web['route'])) {
                $route = str_replace('/{', '(/(?<', $web['route']);
                $route = str_replace('}', '>(\w*)))', $route);
            } else {
                $route = str_replace('{', '(?<', $web['route']);
                $route = str_replace('}', '>(\w*))', $route);
            }

            $routeCond = ($web['route'] === $this->request ||
                (bool)preg_match('~^' . $route . '$~', $this->request, $params) &&
                $this->requestMethod === $routeReqMethod);

            if ($routeCond) {
                $emptyParamValue = false;
                if (!empty($params)) {
                    foreach ($params as $k => $v) {
                        if (empty($v)){
                            $emptyParamValue = true;
                        }
                        if (!is_numeric($k)) {
                            $this->params[$k] = $v;
                        }
                    }
                }

                if (!$emptyParamValue){
                    $this->routeMapParams = $web;
                    return true;
                }
            }
        }

        $loger->log('info', 'Route not found' , [
            'Request' =>  $this->request,
            'Request Method' => $this->requestMethod,
        ]);


        header("HTTP/1.0 404 Not Found");
        http_response_code(404);

        require_once __DIR__ . '../../templates/404.html';

        exit();
    }
}