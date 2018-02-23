<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 23.02.18
 * Time: 13:00
 */

namespace PaulSale\Subscriber;

use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Enlight_Event_EventArgs as EventArgs;



class CalculatePrice implements SubscriberInterface
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
            'Shopware_Modules_Basket_getPriceForUpdateArticle_FilterPrice' => 'onFilterPrice',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onFilterPrice(EventArgs $args)
    {

        $return = $args->getReturn();
        $id = $args->get('id');

        $sql = 'SELECT ordernumber FROM `s_order_basket` WHERE `id` = ?';

        $orderNumber = $this->bootstrap->get('db')->fetchOne($sql, [$id]);






        return $return;
    }
}