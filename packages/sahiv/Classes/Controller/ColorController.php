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
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        return $this->htmlResponse();
    }

    public function createAction(Color $color): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->colorRepository->add($color);

        return $this->redirect('list');
    }

    public function editAction(?Color $color = null): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->view->assignMultiple([
            'color' => $color,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Color $color): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->colorRepository->update($color);

        return $this->redirect('list');
    }

    public function deleteAction(Color $color): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->colorRepository->remove($color);

        return $this->redirect('list');
    }
}
