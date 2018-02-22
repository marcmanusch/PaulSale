<?php

namespace PaulQuestions\Subscriber;

use Enlight\Event\SubscriberInterface;
use PaulQuestions\Models\Question;
use Shopware\Components\Model\ModelManager;

class Detail implements SubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'onPostDispatchDetail'
        ];
    }

    public function onPostDispatchDetail(\Enlight_Event_EventArgs $args)
    {
        /** @var \Shopware_Controllers_Frontend_Detail $detailController */
        $detailController = $args->getSubject();
        $view = $detailController->View();

        /** @var ModelManager $entityManager */
        $entityManager = Shopware()->Container()->get('models');

        /** @var \PaulQuestions\Models\Repository $repository */
        $repository = $entityManager->getRepository(Question::class);
        $articleId = $view->getAssign('sArticle')['articleID'];
        $query = $repository->getQuestionQuery($articleId);
        $result = $query->getArrayResult();

        $view->assign('paul_faq', $result);
    }
}