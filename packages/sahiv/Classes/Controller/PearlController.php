<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Pearl;
use benh\sahiv\Domain\Repository\PearlRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class PearlController extends ActionController
{
    public function __construct(
        protected PearlRepository $pearlRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $pearls = $this->pearlRepository->findAll();

        $this->view->assignMultiple([
            'pearls' => $pearls,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Pearl $pearl): ResponseInterface
    {
        $this->pearlRepository->add($pearl);

        return $this->redirect('list');
    }

    public function editAction(?Pearl $pearl = null): ResponseInterface
    {
        $this->view->assignMultiple([
            'pearl' => $pearl,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Pearl $pearl): ResponseInterface
    {
        $this->pearlRepository->update($pearl);

        return $this->redirect('list');
    }

    public function deleteAction(Pearl $pearl): ResponseInterface
    {
        $this->pearlRepository->remove($pearl);

        return $this->redirect('list');
    }
}
