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
        $paulSaleVon = $config['paulSaleVon'];
        $paulSaleBis = $config['paulSaleBis'];
        $paulSalePercent = $config['paulSalePercent'];
        $paulSaleCategoryID = $config['paulSaleCategoryID'];


        //check rules
        $paulShowSale = false;

        // Get category path IDs
        $category = $view->getAssign('sBreadcrumb');
        $ids = [];

        foreach ($category as $cat) {
            $ids[] = $cat['id'];
        }

        if (in_array($paulSaleCategoryID, $ids)) {
            $paulShowSale = true;
        }


        // assign to frontend
        $view->assign('paulShowSale', $paulShowSale);
        $view->assign('paulSaleActive', $paulSaleActive);
        $view->assign('paulSaleVon', $paulSaleVon);
        $view->assign('paulSaleBis', $paulSaleBis);
        $view->assign('paulSalePercent', $paulSalePercent);

    }
}