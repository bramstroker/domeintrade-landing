<?php

namespace App\Action;

use App\InputFilter\ContactInputFilter;
use App\Service\ContactService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ContactActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = $container->get(ContactInputFilter::class);
        $inputFilter->init();
        return new ContactAction(
            $inputFilter,
            $container->get(ContactService::class),
            $container->get(TemplateRendererInterface::class)
        );
    }
}