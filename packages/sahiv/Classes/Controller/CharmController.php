<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Charm;
use benh\sahiv\Domain\Repository\CharmRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class CharmController extends ActionController
{
    public function __construct(
        protected CharmRepository $charmRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $charms = $this->charmRepository->findAll();

        $this->view->assignMultiple([
            'charms' => $charms,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Charm $charm): ResponseInterface
    {
        $this->charmRepository->add($charm);

        return $this->redirect('list');
    }

    public function editAction(?Charm $charm = null): ResponseInterface
    {
        $this->view->assignMultiple([
            'charm' => $charm,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Charm $charm): ResponseInterface
    {
        $this->charmRepository->update($charm);

        return $this->redirect('list');
    }

    public function deleteAction(Charm $charm): ResponseInterface
    {
        $this->charmRepository->remove($charm);

        return $this->redirect('list');
    }
}
