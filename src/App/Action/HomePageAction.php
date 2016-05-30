<?php

namespace App\Action;

use App\Repository\DomainRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

class HomePageAction
{
    private $template;

    /** @var DomainRepository */
    private $domainRepository;

    public function __construct(Template\TemplateRendererInterface $template = null, DomainRepository $domainRepository)
    {
        $this->template = $template;
        $this->domainRepository = $domainRepository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $domain = $request->getUri()->getHost();
        return new HtmlResponse(
            $this->template->render(
                'app::home-page',
                [
                    'domain' => $domain,
                    'domains' => $this->domainRepository->findAll()
                ]
            )
        );
    }
}
