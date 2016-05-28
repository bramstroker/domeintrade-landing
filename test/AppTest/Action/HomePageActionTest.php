<?php

namespace AppTest\Action;

use App\Action\HomePageAction;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Router\RouterInterface;

class HomePageActionTest extends \PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $homePage = new HomePageAction(null);
        $response = $homePage(new ServerRequest(['/']), new Response(), function () {
        });

        $this->assertTrue($response instanceof Response);
    }
}
