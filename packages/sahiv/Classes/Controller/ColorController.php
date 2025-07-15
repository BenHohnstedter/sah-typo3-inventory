<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Color;
use benh\sahiv\Domain\Repository\ColorRepository;
use benh\sahiv\Service\ValidationService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ColorController extends ActionController
{
    public function __construct(
        protected ValidationService $validationService,
        protected ColorRepository $colorRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $colors = $this->colorRepository->findAll();

        $this->view->assignMultiple([
            'colors' => $colors,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Color $color): ResponseInterface
    {
        $this->colorRepository->add($color);

        return $this->redirect('list');
    }

    public function editAction(?Color $color = null): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function updateAction(Color $color): ResponseInterface
    {
        $this->colorRepository->update($color);

        return $this->redirect('list');
    }

    public function deleteAction(Color $color): ResponseInterface
    {
        $this->colorRepository->remove($color);

        return $this->redirect('list');
    }
}
