<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Article;
use benh\sahiv\Domain\Repository\ColorRepository;
use benh\sahiv\Domain\Repository\ArticleRepository;
use benh\sahiv\Domain\Repository\MaterialRepository;
use benh\sahiv\Domain\Repository\OrderRepository;
use benh\sahiv\Domain\Repository\ProductComponentRepository;
use benh\sahiv\Domain\Repository\TypeRepository;
use benh\sahiv\Service\DynamicFieldsService;
use benh\sahiv\Service\ImageService;
use benh\sahiv\Service\ValidationService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ArticleController extends ActionController
{
    public function __construct(
        protected ValidationService $validationService,
        protected ArticleRepository $articleRepository,
        protected OrderRepository $orderRepository,
        protected ColorRepository $colorRepository,
        protected TypeRepository $typeRepository,
        protected MaterialRepository $materialRepository,
        protected ProductComponentRepository $productComponentRepository,
        protected DynamicFieldsService $dynamicFieldsService,
        protected ImageService $imageService,
    ) {
    }

    public function listAction(?Article $searchObject = null): ResponseInterface
    {
        if ($searchObject === null) {
            $articles = $this->articleRepository->findBy(['archived' => 0,]);
        } else {
            $articles = $this->articleRepository->findByFilter($searchObject);
        }

        foreach ($articles as $article) {
            $this->dynamicFieldsService->setDynamicArticleFields($article);
        }

        $types = $this->typeRepository->findBy(['is_type_for' => 0]);
        $colors = $this->colorRepository->findAll();
        $materials = $this->materialRepository->findAll();

        $this->view->assignMultiple([
            'articles' => $articles,
            'types' => $types,
            'colors' => $colors,
            'materials' => $materials,
            'searchObject' => $searchObject,
        ]);

        return $this->htmlResponse();
    }

    public function detailAction(?Article $article = null): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->dynamicFieldsService->setDynamicArticleFields($article);

        $this->view->assignMultiple([
            'article' => $article,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $types = $this->typeRepository->findBy(['is_type_for' => 0]);
        $colors = $this->colorRepository->findAll();
        $materials = $this->materialRepository->findAll();

        $this->view->assignMultiple([
            'types' => $types,
            'colors' => $colors,
            'materials' => $materials,
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Article $article): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->articleRepository->add($article);

        $file = $this->request->getUploadedFiles();
        $this->imageService->attachFileUpload($article, $file, ImageService::TYPE_ARTICLE);

        return $this->redirect('list');
    }

    public function editAction(?Article $article = null): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $types = $this->typeRepository->findBy(['is_type_for' => 0]);
        $colors = $this->colorRepository->findAll();
        $materials = $this->materialRepository->findAll();

        $this->view->assignMultiple([
            'article' => $article,
            'types' => $types,
            'colors' => $colors,
            'materials' => $materials,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Article $article): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $this->articleRepository->update($article);

        $file = $this->request->getUploadedFiles();
        $this->imageService->removeFileUpload($article, $file, ImageService::TYPE_ARTICLE);
        $this->imageService->attachFileUpload($article, $file, ImageService::TYPE_ARTICLE);

        return $this->redirect('list');
    }

    public function deleteAction(Article $article): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('https://sah-inventory.benh.dev');
        }

        $article->setArchived(1);
        $this->articleRepository->update($article);

        return $this->redirect('list');
    }
}
