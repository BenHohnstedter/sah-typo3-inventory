<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Colortone;
use benh\sahiv\Domain\Repository\ColortoneRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ColortoneController extends ActionController
{
    public function __construct(
        protected ColortoneRepository $colortoneRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $colortones = $this->colortoneRepository->findAll();

        $this->view->assignMultiple([
            'colortones' => $colortones,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Colortone $colortone): ResponseInterface
    {
        $this->colortoneRepository->add($colortone);

        return $this->redirect('list');
    }

    public function editAction(?Colortone $colortone = null): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function updateAction(Colortone $colortone): ResponseInterface
    {
        $this->colortoneRepository->update($colortone);

        return $this->redirect('list');
    }

    public function deleteAction(Colortone $colortone): ResponseInterface
    {
        $this->colortoneRepository->remove($colortone);

        return $this->redirect('list');
    }
}
