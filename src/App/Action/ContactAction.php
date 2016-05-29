<?php

namespace App\Action;

use App\InputFilter\ContactInputFilter;
use App\Service\ContactService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Template\TemplateRendererInterface;

class ContactAction
{
    /** @var ContactInputFilter */
    protected $inputFilter;

    /** @var ContactService */
    protected $contactService;

    /** @var TemplateRendererInterface */
    protected $renderer;

    public function __construct(
        ContactInputFilter $inputFilter,
        ContactService $contactService,
        TemplateRendererInterface $renderer)
    {
        $this->inputFilter = $inputFilter;
        $this->contactService = $contactService;
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $this->inputFilter->setData($request->getParsedBody());
        if (!$this->inputFilter->isValid()) {
            return new JsonResponse(
                [
                    'success' => false,
                    'messages' => $this->inputFilter->getMessages()
                ],
                400
            );
        }
        
        $this->contactService->sendRequest($this->inputFilter->getValues());
        
        return new JsonResponse(
            [
                'success' => true,
                'message' => 'Bedankt voor uw aanvraag. Wij nemen z.s.m. contact met u op.'
            ]
        );
    }
}
