<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;


final class CoreRouterTest extends TestCase
{
    public function testIsIssetRoute()
    {
        $router = new tests\unit\Router('/');

        $this->assertTrue($router->response());
    }

    public function testIsNotIssetRoute()
    {
        $router = new tests\unit\Router('/notFound');

        $this->assertFalse($router->response());
    }

    public function testIsNotIssetParamAndIssetRoute()
    {
        $router = new tests\unit\Router('/test');

        $this->assertTrue($router->response());
    }

    public function testIsIssetParamAndIssetRoute()
    {
        $router = new tests\unit\Router('/test/5');

        $this->assertTrue($router->response());
    }

    public function testIsIssetParamVsRouteAndRouteLikeParam()
    {
        $router = new tests\unit\Router('/test/id');

        $this->assertTrue($router->response());
    }

    public function testIsIssetTwoParamAndIssetRoute()
    {
        $router = new tests\unit\Router('/test2/5/8');

        $this->assertTrue($router->response());
    }

    public function testIsIssetOneParamAndIssetRoute()
    {
        $router = new tests\unit\Router('/test2/5');

        $this->assertTrue($router->response());
    }

    public function testIsIssetOneParamAndIssetRouteAndHasKey()
    {
        $router = new tests\unit\Router('/test2/5');
        $router->response();
        $this->assertArrayHasKey('id', $router->getParams());
    }

    public function testIsIssetTwoParamAndIssetRouteAndHasTwoKeys()
    {
        $router = new tests\unit\Router('/test2/5/8');
        $router->response();
        $this->assertArrayHasKey('id', $router->getParams());
        $this->assertArrayHasKey('page', $router->getParams());
    }

    public function testIsNotIssetParamAndIssetRouteVsThreeParams()
    {
        $router = new tests\unit\Router('/test3');
        $this->assertTrue($router->response());

    }

    public function testIsIssetOneParamAndIssetRouteVsThreeParams()
    {
        $router = new tests\unit\Router('/test3/page/4');
        $router->response();
        $this->assertArrayHasKey('page', $router->getParams());
    }

    public function testIsIssetTwoParamAndIssetRouteVsThreeParams()
    {
        $router = new tests\unit\Router('/test3/page/4/field/name');
        $router->response();
        $this->assertArrayHasKey('page', $router->getParams());
        $this->assertArrayHasKey('field', $router->getParams());
    }

    public function testIsIssetThreeParamAndIssetRouteVsThreeParams()
    {
        $router = new tests\unit\Router('/test3/page/6/field/name/sort/asc');
        $router->response();
        $this->assertArrayHasKey('page', $router->getParams());
        $this->assertArrayHasKey('field', $router->getParams());
        $this->assertArrayHasKey('sort', $router->getParams());
    }

    public function testIsIssetTwoParamsNoCenterParamAndIssetRouteVsThreeParams()
    {
        $router = new tests\unit\Router('/test3/page/4/sort/desc');
        $router->response();
        $this->assertArrayHasKey('page', $router->getParams());
        $this->assertArrayHasKey('sort', $router->getParams());

    }

    public function testIsIssetTwoParamsNoCenterParamAndIssetRouteVsThreeParamsAndSameValue()
    {
        $router = new tests\unit\Router('/test3/page/6/field/name/sort/asc');
        $this->assertTrue($router->response());
        $this->assertArrayHasKey('page', $router->getParams());
        $this->assertArrayHasKey('field', $router->getParams());
        $this->assertArrayHasKey('sort', $router->getParams());
        $this->assertContains('6', $router->getParams());
        $this->assertContains('name', $router->getParams());
        $this->assertContains('asc', $router->getParams());

    }

    public function testIsIssetThreeParamAndIssetRouteVsEmptyParams()
    {
        $router = new tests\unit\Router('/test3/page//field/name/sort/asc');
        $this->assertFalse($router->response());
    }

    public function testIsIssetThreeParamAndIssetRouteVsNotPasteParams()
    {
        $router = new tests\unit\Router('/test3/page/field/name/sort/asc');
        $this->assertFalse($router->response());
    }

}