<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Pearl;
use benh\sahiv\Domain\Repository\PearlRepository;
use benh\sahiv\Domain\Repository\ColorcpRepository;
use benh\sahiv\Domain\Repository\ColortoneRepository;
use benh\sahiv\Domain\Repository\MaterialcpRepository;
use benh\sahiv\Domain\Repository\ShapeRepository;
use benh\sahiv\Service\ImageService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class PearlController extends ActionController
{
    public function __construct(
        protected PearlRepository $pearlRepository,
        protected ColorcpRepository $colorcpRepository,
        protected ColortoneRepository $colortonesRepository,
        protected MaterialcpRepository $materialcpRepository,
        protected ShapeRepository $shapeRepository,
        protected ImageService $imageService,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $pearls = $this->pearlRepository->findAll();

        $this->view->assignMultiple([
            'pearls' => $pearls,
        ]);

        return $this->htmlResponse();
    }

    public function detailAction(?Pearl $pearl = null): ResponseInterface
    {
        $this->view->assignMultiple([
            'pearl' => $pearl,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $colors = $this->colorcpRepository->findAll();
        $colortones = $this->colortonesRepository->findAll();
        $materials = $this->materialcpRepository->findAll();
        $shapes = $this->shapeRepository->findAll();

        $this->view->assignMultiple([
            'colors' => $colors,
            'colortones' => $colortones,
            'materials' => $materials,
            'shapes' => $shapes,
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Pearl $pearl): ResponseInterface
    {
        $this->pearlRepository->add($pearl);

        $file = $this->request->getUploadedFiles();
        $this->imageService->attachFileUpload($pearl, $file, ImageService::TYPE_PEARL);

        return $this->redirect('list');
    }

    public function editAction(?Pearl $pearl = null): ResponseInterface
    {
        $colors = $this->colorcpRepository->findAll();
        $colortones = $this->colortonesRepository->findAll();
        $materials = $this->materialcpRepository->findAll();
        $shapes = $this->shapeRepository->findAll();

        $this->view->assignMultiple([
            'pearl' => $pearl,
            'colors' => $colors,
            'colortones' => $colortones,
            'materials' => $materials,
            'shapes' => $shapes,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Pearl $pearl): ResponseInterface
    {
        $this->pearlRepository->update($pearl);

        $file = $this->request->getUploadedFiles();
        $this->imageService->removeFileUpload($pearl, $file);
        $this->imageService->attachFileUpload($pearl, $file, ImageService::TYPE_PEARL);

        return $this->redirect('list');
    }

    public function deleteAction(Pearl $pearl): ResponseInterface
    {
        $this->pearlRepository->remove($pearl);

        return $this->redirect('list');
    }
}
