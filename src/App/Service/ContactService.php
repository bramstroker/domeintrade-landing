<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 29-5-2016
 * Time: 09:10
 */

namespace App\Service;

use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Mail\Message;
use Zend\Mail\Transport\TransportInterface;

class ContactService
{
    /**
     * @var TemplateRendererInterface
     */
    protected $renderer;

    /** @var TransportInterface */
    protected $mailTransport;

    public function __construct(TemplateRendererInterface $renderer, TransportInterface $mailTransport)
    {
        $this->renderer = $renderer;
        $this->mailTransport = $mailTransport;
    }
    
    public function sendRequest(array $contactData)
    {
        $mailBody = $this->renderer->render(
            'mail::contact',
            [
                'layout' => 'layout::blank',
                'contact' => $contactData
            ]
        );

        $mail = new Message();
        $mail->setBody($mailBody);
        $mail->setFrom('bgerritsen@gmail.com', "Bram Gerritsen");
        $mail->addTo('bgerritsen@gmail.com', 'Domain order');
        $mail->setSubject('Domain order');

        $this->mailTransport->send($mail);
    }
}