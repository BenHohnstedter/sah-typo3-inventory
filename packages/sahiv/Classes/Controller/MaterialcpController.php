<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Materialcp;
use benh\sahiv\Domain\Repository\MaterialcpRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class MaterialcpController extends ActionController
{
    public function __construct(
        protected MaterialcpRepository $materialcpRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $materialscp = $this->materialcpRepository->findAll();

        $this->view->assignMultiple([
            'materialscp' => $materialscp,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Materialcp $materialcp): ResponseInterface
    {
        $this->materialcpRepository->add($materialcp);

        return $this->redirect('list');
    }

    public function editAction(?Materialcp $materialcp = null): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function updateAction(Materialcp $materialcp): ResponseInterface
    {
        $this->materialcpRepository->update($materialcp);

        return $this->redirect('list');
    }

    public function deleteAction(Materialcp $materialcp): ResponseInterface
    {
        $this->materialcpRepository->remove($materialcp);

        return $this->redirect('list');
    }
}
