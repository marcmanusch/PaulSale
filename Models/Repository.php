<?php

namespace PaulSale\Models;

use Shopware\Components\Model\ModelRepository;

class Repository extends ModelRepository
{

    public function getListQuery()
    {
        $builder = $this->getListQueryBuilder();
        return $builder->getQuery();
    }

    public function getListQueryBuilder()
    {
        /** @var $builder \Shopware\Components\Model\QueryBuilder */
        $builder = $this->getEntityManager()->createQueryBuilder()
            ->select('validFrom', 'validTill', 'salePercentage', 'saleCategoryId')
            ->from(Sale::class, 'sale');
        return $builder;
    }

}