<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Colorcp;
use benh\sahiv\Domain\Repository\ColorcpRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ColorcpController extends ActionController
{
    public function __construct(
        protected ColorcpRepository $colorcpRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $colorscp = $this->colorcpRepository->findAll();

        $this->view->assignMultiple([
            'colorscp' => $colorscp,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Colorcp $colorcp): ResponseInterface
    {
        $this->colorcpRepository->add($colorcp);

        return $this->redirect('list');
    }

    public function editAction(?Colorcp $colorcp = null): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function updateAction(Colorcp $colorcp): ResponseInterface
    {
        $this->colorcpRepository->update($colorcp);

        return $this->redirect('list');
    }

    public function deleteAction(Colorcp $colorcp): ResponseInterface
    {
        $this->colorcpRepository->remove($colorcp);

        return $this->redirect('list');
    }
}
