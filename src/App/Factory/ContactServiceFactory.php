<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 29-5-2016
 * Time: 09:31
 */

namespace App\Factory;

use App\Service\ContactService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ContactServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new ContactService(
            $container->get(TemplateRendererInterface::class)
        );
    }
}