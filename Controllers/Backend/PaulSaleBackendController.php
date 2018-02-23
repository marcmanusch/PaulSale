<?php

use Shopware\Components\CSRFWhitelistAware;


class Shopware_Controllers_Backend_PaulSaleBackendController extends Enlight_Controller_Action implements CSRFWhitelistAware
{

    /**
     * @var null
     */
    protected $saleRepository = null;

    public function preDispatch()
    {
        $this->get('template')->addTemplateDir(__DIR__ . '/../../Resources/Views/');
    }


    public function postDispatch()
    {
        $csrfToken = $this->container->get('BackendSession')->offsetGet('X-CSRF-Token');
        $this->View()->assign('csrfToken', $csrfToken);
    }


    public function indexAction()
    {
        /** @var \Doctrine\DBAL\Connection $connection */
        $connection = $this->container->get('dbal_connection');
        $builder = $connection->createQueryBuilder();
        $builder->select('*')
            ->from('paul_sale');
        $stmt = $builder->execute();
        $result = $stmt->fetchAll();

        $this->view->assign('paulSaleEnrties', $result);
    }

    public function listAction()
    {
        $filter = [];
        $sort = [];
        $limit = 1000;
        $offset = 0;

        $query = $this->getSaleRepository()->getListQuery();
        $sales = $query->getArrayResult();

        $this->View()->assign(['sales' => $sales]);
    }

    /**
     * @return \Doctrine\ORM\EntityRepository|null
     */
    private function getSaleRepository()
    {
        if ($this->saleRepository === null) {
            $this->saleRepository = $this->getModelManager()->getRepository('PaulSale\Models\Sale');
        }

        return $this->saleRepository;
    }



    /**
     * @throws \Exception
     */
    public function addAction()
    {
        $request = $this->Request();

        if ($request->isPost()) {
            $this->addSale(
                $request->getPost('saleCategoryId'),
                $request->getPost('salePercentage'),
                $request->getPost('validFrom'),
                $request->getPost('validTill')
            );
        }

        $this->redirect([
            'module' => 'backend',
            'controller' => 'PaulQuestionsBackendController',
            'action' => 'index'
        ]);
    }

    /**
     * @param $saleCategoryId
     * @param $salePercentage
     * @param $validFrom
     * @param $validTill
     */
    public function addSale($saleCategoryId, $salePercentage, $validFrom, $validTill)
    {

        try {
            /** @var \Doctrine\DBAL\Connection $connection */
            $connection = $this->container->get('dbal_connection');

            $queryBuilder = $connection->createQueryBuilder()
                ->insert('paul_sale')
                ->setValue('saleCategoryId', '?')
                ->setValue('salePercentage', '?')
                ->setValue('validFrom', '?')
                ->setValue('validTill', '?')
                ->setParameter('0', $saleCategoryId)
                ->setParameter('1', $salePercentage)
                ->setParameter('2', $validFrom)
                ->setParameter('3', $validTill);

            $queryBuilder->execute();

        } catch (Exception $ex) {
            $this->addErrors($ex->getMessage());
        }
    }

    /**
     * Adds an error message to the session
     * @param $message
     * @throws \Exception
     */
    public function addErrors($message)
    {
        $session = $this->container->get('BackendSession');
        $session->offsetSet('paulFaqError', $message);
    }

    /**
     * Whitelists the specified controllers for CSRF check
     * @return array
     */
    public function getWhitelistedCSRFActions()
    {
        return ['index', 'add', 'delete', 'unlock'];
    }

    /**
     * Get the error message from the session
     * @return mixed
     * @throws \Exception
     */
    public function getErrors()
    {
        $session = $this->container->get('BackendSession');
        $error = $session->offsetGet('paulFaqError');
        $session->offsetUnset('paulFaqError');

        return $error;
    }

    /**
     * @return \Doctrine\ORM\EntityRepository|null|\Shopware\Models\Article\Repository
     */
    private function getArticleRepository()
    {
        if ($this->articleRepository === null) {
            $this->articleRepository = $this->getModelManager()->getRepository('Shopware\Models\Article\Article');
        }

        return $this->articleRepository;
    }
}
