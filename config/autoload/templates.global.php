<?php

use App\Factory\ZendView\LayoutFactory;
use App\Factory\ZendView\RendererFactory;
use App\View\Helper\GoogleAnalyticsFactory;

return [
    'dependencies' => [
        'factories' => [
            'Zend\Expressive\FinalHandler' =>
                Zend\Expressive\Container\TemplatedErrorHandlerFactory::class,

            Zend\Expressive\Template\TemplateRendererInterface::class =>
                RendererFactory::class,

            Zend\View\HelperPluginManager::class =>
                Zend\Expressive\ZendView\HelperPluginManagerFactory::class,

            'layout' => LayoutFactory::class
        ],
    ],

    'templates' => [
        'layout' => 'layout/default',
        'map' => [
            'layout/default'  => 'templates/layout/default.phtml',
            'layout/blank'    => 'templates/layout/blank.phtml',
            'error/error'     => 'templates/error/error.phtml',
            'error/404'       => 'templates/error/404.phtml',
            'mail/contact'    => 'templates/mail/contact.phtml',
            'contact/success' => 'templates/contact/success.phtml',
        ],
        'paths' => [
            'app'    => ['templates/app'],
            'layout' => ['templates/layout'],
            'mail' => ['templates/mail'],
            'error'  => ['templates/error'],
        ],
    ],

    'view_helpers' => [
        'factories' => [
            'analytics' => GoogleAnalyticsFactory::class
        ]
    ],
];
