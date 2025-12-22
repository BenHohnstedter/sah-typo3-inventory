<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Accessory;
use benh\sahiv\Domain\Repository\AccessoryRepository;
use benh\sahiv\Domain\Repository\ColorRepository;
use benh\sahiv\Domain\Repository\MaterialRepository;
use benh\sahiv\Domain\Repository\TypeRepository;
use benh\sahiv\Service\ImageService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class AccessoryController extends ActionController
{
    public function __construct(
        protected AccessoryRepository $accessoryRepository,
        protected ColorRepository $colorRepository,
        protected MaterialRepository $materialRepository,
        protected TypeRepository $typeRepository,
        protected ImageService $imageService,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $accessories = $this->accessoryRepository->findAll();

        $this->view->assignMultiple([
            'accessories' => $accessories,
        ]);

        return $this->htmlResponse();
    }

    public function detailAction(?Accessory $accessory = null): ResponseInterface
    {
        $this->view->assignMultiple([
            'accessory' => $accessory,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $colors = $this->colorRepository->findAll();
        $materials = $this->materialRepository->findAll();
        $types = $this->typeRepository->findAll();

        $this->view->assignMultiple([
            'colors' => $colors,
            'materials' => $materials,
            'types' => $types,
        ]);


        return $this->htmlResponse();
    }

    public function createAction(Accessory $accessory): ResponseInterface
    {
        $this->accessoryRepository->add($accessory);

        $file = $this->request->getUploadedFiles();
        $this->imageService->attachFileUpload($accessory, $file, ImageService::TYPE_ACCESSORIE);

        return $this->redirect('list');
    }

    public function editAction(?Accessory $accessory = null): ResponseInterface
    {
        $colors = $this->colorRepository->findAll();
        $materials = $this->materialRepository->findAll();
        $types = $this->typeRepository->findAll();

        $this->view->assignMultiple([
            'accessory' => $accessory,
            'colors' => $colors,
            'materials' => $materials,
            'types' => $types,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Accessory $accessory): ResponseInterface
    {
        $this->accessoryRepository->update($accessory);

        $file = $this->request->getUploadedFiles();
        $this->imageService->removeFileUpload($accessory, $file);
        $this->imageService->attachFileUpload($accessory, $file, ImageService::TYPE_ACCESSORIE);

        return $this->redirect('list');
    }

    public function deleteAction(Accessory $accessory): ResponseInterface
    {
        $this->accessoryRepository->remove($accessory);

        return $this->redirect('list');
    }
}
