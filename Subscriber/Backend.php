<?php

namespace PaulSale\Subscriber;

use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class Backend implements SubscriberInterface
{

    /** @var  ContainerInterface */
    private $container;

    /**
     * Frontend contructor.
     * @param ContainerInterface $container
     **/
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_ExampleModulePlainHtml' => 'onGetBackendController'
        ];
    }

    public function onGetBackendController()
    {
        return __DIR__ . '/Controllers/Backend/PaulSaleBackendController.php';
    }
}