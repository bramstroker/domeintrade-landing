<?php
use App\Factory\ContactServiceFactory;
use App\InputFilter\ContactInputFilter;
use App\Service\ContactService;
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Helper\UrlHelper;
use Zend\Expressive\Helper\UrlHelperFactory;

return [
    'dependencies' => [
        'invokables' => [
            ServerUrlHelper::class => ServerUrlHelper::class,
            ContactInputFilter::class => ContactInputFilter::class
        ],
        'factories' => [
            Application::class => ApplicationFactory::class,
            UrlHelper::class => UrlHelperFactory::class,
            ContactService::class => ContactServiceFactory::class
        ],
    ],
];
