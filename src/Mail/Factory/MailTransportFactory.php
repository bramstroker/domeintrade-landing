<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 31-5-2016
 * Time: 19:52
 */

namespace Mail\Factory;

use Interop\Container\ContainerInterface;
use Zend\Mail\Transport\TransportInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MailTransportFactory implements FactoryInterface
{
    const TRANSPORT_NAMESPACE = 'Zend\\Mail\\Transport\\';

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');

        $transportConfig = $config['mail']['transport'];
        $type = $transportConfig['type'];

        $transportClass = self::TRANSPORT_NAMESPACE . ucfirst($type);
        if (!class_exists($transportClass)) {
            throw new \RuntimeException(sprintf('Transport class "%s" not found', $transportClass));
        }

        /** @var TransportInterface $transport */
        $transport = new $transportClass();

        if (isset($transportConfig['options'])) {

            $optionsClass = self::TRANSPORT_NAMESPACE . ucfirst($type) . 'Options';
            $options = $transportConfig['options'];

            if (class_exists($optionsClass)) {
                $options = new $optionsClass($options);
            }

            if (method_exists($transport, 'setOptions')) {
                $transport->setOptions($options);
            } else if (method_exists($transport, 'setParameters')) {
                $transport->setParameters($options);
            }
        }

        return $transport;
    }
}