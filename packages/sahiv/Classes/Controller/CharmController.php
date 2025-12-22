<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Charm;
use benh\sahiv\Domain\Repository\CharmRepository;
use benh\sahiv\Domain\Repository\ColorcpRepository;
use benh\sahiv\Domain\Repository\ColortoneRepository;
use benh\sahiv\Domain\Repository\MaterialcpRepository;
use benh\sahiv\Service\ImageService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class CharmController extends ActionController
{
    public function __construct(
        protected CharmRepository $charmRepository,
        protected ColorcpRepository $colorcpRepository,
        protected ColortoneRepository $colortonesRepository,
        protected MaterialcpRepository $materialcpRepository,
        protected ImageService $imageService,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $charms = $this->charmRepository->findAll();

        $this->view->assignMultiple([
            'charms' => $charms,
        ]);

        return $this->htmlResponse();
    }

    public function detailAction(?Charm $charm = null): ResponseInterface
    {
        $this->view->assignMultiple([
            'charm' => $charm,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $colors = $this->colorcpRepository->findAll();
        $colortones = $this->colortonesRepository->findAll();
        $materials = $this->materialcpRepository->findAll();

        $this->view->assignMultiple([
            'colors' => $colors,
            'colortones' => $colortones,
            'materials' => $materials,
        ]);
        
        return $this->htmlResponse();
    }

    public function createAction(Charm $charm): ResponseInterface
    {
        $this->charmRepository->add($charm);

        $file = $this->request->getUploadedFiles();
        $this->imageService->attachFileUpload($charm, $file, ImageService::TYPE_CHARM);

        return $this->redirect('list');
    }

    public function editAction(?Charm $charm = null): ResponseInterface
    {
        $colors = $this->colorcpRepository->findAll();
        $colortones = $this->colortonesRepository->findAll();
        $materials = $this->materialcpRepository->findAll();

        $this->view->assignMultiple([
            'charm' => $charm,
            'colors' => $colors,
            'colortones' => $colortones,
            'materials' => $materials,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Charm $charm): ResponseInterface
    {
        $this->charmRepository->update($charm);

        $file = $this->request->getUploadedFiles();
        $this->imageService->removeFileUpload($charm, $file);
        $this->imageService->attachFileUpload($charm, $file, ImageService::TYPE_CHARM);

        return $this->redirect('list');
    }

    public function deleteAction(Charm $charm): ResponseInterface
    {
        $this->charmRepository->remove($charm);

        return $this->redirect('list');
    }
}
