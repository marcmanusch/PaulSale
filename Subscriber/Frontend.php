<?php

namespace PaulSale\Subscriber;

use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class Frontend implements SubscriberInterface
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
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onFrontendPostDispatch',
            'Shopware_Modules_Basket_getPriceForUpdateArticle_FilterPrice' => 'onFilterPrice'
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onFrontendPostDispatch(\Enlight_Event_EventArgs $args)
    {
        /** @var $controller \Enlight_Controller_Action */
        $controller = $args->getSubject();
        $view = $controller->View();
        $view->addTemplateDir($this->container->getParameter('paul_sale.plugin_dir') . '/Resources/Views');
        $config = $this->container->get('shopware.plugin.config_reader')->getByPluginName('PaulSale');

        // get plugin config
        $paulSaleActive = $config['paulSaleActive'];

        $rabattArray = $this->checkRabatt($args);

        if (!empty($rabattArray)) {
            // assign sale banner to frontend
            $view->assign('paulShowSale', true);
            $view->assign('paulRabattArray', $rabattArray);
            $view->assign('paulSalePercentage', $rabattArray[0]['salePercentage']);
        }


    }

    public function checkRabatt(\Enlight_Event_EventArgs $args)
    {
        /** @var $controller \Enlight_Controller_Action */
        $controller = $args->getSubject();
        $view = $controller->View();

        // Get current category
        $sCategoryCurrent = $view->sCategoryInfo['id'];

        /** @var \Doctrine\DBAL\Connection $connection */
        $connection = $this->container->get('dbal_connection');

        $queryBuilder = $connection->createQueryBuilder()
            ->select('*')
            ->from('paul_sale')
            ->where('saleCategoryId = ?')
            ->setParameter('0', $sCategoryCurrent);

        $stmt = $queryBuilder->execute();

        return $stmt->fetchAll();

    }


    public function onFilterPrice(\Enlight_Event_EventArgs $args)
    {

    }

}