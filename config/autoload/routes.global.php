<?php

use App\Action\ContactAction;
use App\Action\ContactActionFactory;
use App\Action\HomePageAction;
use App\Action\HomePageFactory;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\RouterInterface;

return [
    'dependencies' => [
        'invokables' => [
            RouterInterface::class => FastRouteRouter::class,
        ],
        'factories' => [
            HomePageAction::class => HomePageFactory::class,
            ContactAction::class => ContactActionFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'contact',
            'path' => '/contact',
            'middleware' => ContactAction::class,
            'allowed_methods' => ['POST'],
        ],
    ],
];
