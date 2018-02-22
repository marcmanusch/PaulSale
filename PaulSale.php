<?php

/**
 * Marc Manusch
 * PaulGurkes GmbH 23.02.2018
 * FAQ Plugin
 */

namespace PaulSale;

use Doctrine\DBAL\Schema\MySqlSchemaManager;
use Doctrine\ORM\Tools\SchemaTool;
use PaulQuestions\Models\Answer;
use PaulQuestions\Models\Question;
use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Models\Article\Article;
use Shopware\Models\Customer\Customer;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class PaulSale extends Plugin
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('paul_sale.plugin_dir', $this->getPath());
        parent::build($container);
    }
}