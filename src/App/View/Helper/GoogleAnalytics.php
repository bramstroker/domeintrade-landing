<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 29-5-2016
 * Time: 15:40
 */

namespace App\View\Helper;


use App\Repository\DomainRepository;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\HeadLink;
use Zend\View\Helper\InlineScript;

class GoogleAnalytics extends AbstractHelper
{
    /** @var DomainRepository */
    protected $domainRepository;

    public function __construct(DomainRepository $domainRepository)
    {
        $this->domainRepository = $domainRepository;
    }

    public function __invoke($domainName)
    {
        $domain = $this->domainRepository->findOneBy($domainName);
        if ($domain === null) {
            return '';
        }

        return sprintf('<script>
		(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');

		ga(\'create\', \'%s\', \'auto\');
		ga(\'send\', \'pageview\');

	    </script>', 'UA-78488345-1');
    }
}