<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 29-5-2016
 * Time: 09:10
 */

namespace App\Service;

use Zend\Expressive\Template\TemplateRendererInterface;

class ContactService
{
    /**
     * @var TemplateRendererInterface
     */
    protected $renderer;
    
    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }
    
    public function sendRequest(array $contactData)
    {
        $message = $this->renderer->render('mail/contact', ['contact' => $contactData]);
        mail('bgerritsen@gmail.com', 'Domein order', $message);
    }
}