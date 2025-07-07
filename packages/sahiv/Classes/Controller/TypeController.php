<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Type;
use benh\sahiv\Domain\Repository\TypeRepository;
use benh\sahiv\Service\ValidationService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class TypeController extends ActionController
{
    public function __construct(
        protected ValidationService $validationService,
        protected TypeRepository $typeRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $types = $this->typeRepository->findAll();

        $this->view->assignMultiple([
            'types' => $types,
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

    public function createAction(Type $type): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->typeRepository->add($type);

        return $this->redirect('list');
    }

    public function editAction(?Type $type = null): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->view->assignMultiple([
            'type' => $type,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Type $type): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->typeRepository->update($type);

        return $this->redirect('list');
    }

    public function deleteAction(Type $type): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->typeRepository->remove($type);

        return $this->redirect('list');
    }
}
