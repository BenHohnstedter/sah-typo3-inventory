<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Theme;
use benh\sahiv\Domain\Repository\ThemeRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ThemeController extends ActionController
{
    public function __construct(
        protected ThemeRepository $themeRepository,
    ) {
    }

    public function listAction(): ResponseInterface
    {
        $themes = $this->themeRepository->findAll();

        $this->view->assignMultiple([
            'themes' => $themes,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Theme $theme): ResponseInterface
    {
        $this->themeRepository->add($theme);

        return $this->redirect('list');
    }

    public function editAction(?Theme $theme = null): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function updateAction(Theme $theme): ResponseInterface
    {
        $this->themeRepository->update($theme);

        return $this->redirect('list');
    }

    public function deleteAction(Theme $theme): ResponseInterface
    {
        $this->themeRepository->remove($theme);

        return $this->redirect('list');
    }
}
