<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Shape;
use benh\sahiv\Domain\Repository\ShapeRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ShapeController extends ActionController
{
    public function __construct(
        protected ShapeRepository $shapeRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $shapes = $this->shapeRepository->findAll();

        $this->view->assignMultiple([
            'shapes' => $shapes,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Shape $shape): ResponseInterface
    {
        $this->shapeRepository->add($shape);

        return $this->redirect('list');
    }

    public function editAction(?Shape $shape = null): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function updateAction(Shape $shape): ResponseInterface
    {
        $this->shapeRepository->update($shape);

        return $this->redirect('list');
    }

    public function deleteAction(Shape $shape): ResponseInterface
    {
        $this->shapeRepository->remove($shape);

        return $this->redirect('list');
    }
}
