<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Order;
use benh\sahiv\Domain\Repository\ArticleRepository;
use benh\sahiv\Domain\Repository\OrderRepository;
use benh\sahiv\Service\ValidationService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class OrderController extends ActionController
{
    public function __construct(
        protected ValidationService $validationService,
        protected OrderRepository $orderRepository,
        protected ArticleRepository $articleRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $orders = $this->orderRepository->findAll();

        $this->view->assignMultiple([
            'orders' => $orders,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $articles = $this->articleRepository->findBy(['archived' => 0,]);

        $this->view->assignMultiple([
            'articles' => $articles,
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Order $order): ResponseInterface
    {
        $this->orderRepository->add($order);

        return $this->redirect('list');
    }

    public function editAction(?Order $order = null): ResponseInterface
    {
        $articles = $this->articleRepository->findBy(['archived' => 0,]);

        $this->view->assignMultiple([
            'order' => $order,
            'articles' => $articles,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Order $order): ResponseInterface
    {
        $this->orderRepository->update($order);

        return $this->redirect('list');
    }

    public function deleteAction(Order $order): ResponseInterface
    {
        $this->orderRepository->remove($order);

        return $this->redirect('list');
    }
}
