<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Accessory;
use benh\sahiv\Domain\Repository\AccessoryRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class AccessoryController extends ActionController
{
    public function __construct(
        protected AccessoryRepository $accessoryRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $accessorys = $this->accessoryRepository->findAll();

        $this->view->assignMultiple([
            'accessorys' => $accessorys,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Accessory $accessory): ResponseInterface
    {
        $this->accessoryRepository->add($accessory);

        return $this->redirect('list');
    }

    public function editAction(?Accessory $accessory = null): ResponseInterface
    {
        $this->view->assignMultiple([
            'accessory' => $accessory,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Accessory $accessory): ResponseInterface
    {
        $this->accessoryRepository->update($accessory);

        return $this->redirect('list');
    }

    public function deleteAction(Accessory $accessory): ResponseInterface
    {
        $this->accessoryRepository->remove($accessory);

        return $this->redirect('list');
    }
}
