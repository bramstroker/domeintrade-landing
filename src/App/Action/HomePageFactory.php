<?php

namespace App\Action;

use App\Entity\Domain;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class HomePageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = ($container->has(TemplateRendererInterface::class))
            ? $container->get(TemplateRendererInterface::class)
            : null;

        $em = $container->get('doctrine.entity_manager.orm_default');

        return new HomePageAction($template, $em->getRepository(Domain::class));
    }
}
