<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Material;
use benh\sahiv\Domain\Repository\MaterialRepository;
use benh\sahiv\Service\ValidationService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class MaterialController extends ActionController
{
    public function __construct(
        protected ValidationService $validationService,
        protected MaterialRepository $materialRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $materials = $this->materialRepository->findAll();

        $this->view->assignMultiple([
            'materials' => $materials,
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

    public function createAction(Material $material): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->materialRepository->add($material);

        return $this->redirect('list');
    }

    public function editAction(?Material $material = null): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->view->assignMultiple([
            'material' => $material,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Material $material): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->materialRepository->update($material);

        return $this->redirect('list');
    }

    public function deleteAction(Material $material): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->materialRepository->remove($material);

        return $this->redirect('list');
    }
}
