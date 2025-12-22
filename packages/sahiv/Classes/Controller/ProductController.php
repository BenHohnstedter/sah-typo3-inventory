<?php

namespace benh\sahiv\Controller;

use benh\sahiv\Domain\Model\Article;
use benh\sahiv\Domain\Model\Product;
use benh\sahiv\Domain\Model\ProductComponent;
use benh\sahiv\Domain\Repository\ColorRepository;
use benh\sahiv\Domain\Repository\ArticleRepository;
use benh\sahiv\Domain\Repository\ProductComponentRepository;
use benh\sahiv\Domain\Repository\ProductRepository;
use benh\sahiv\Domain\Repository\TypeRepository;
use benh\sahiv\Service\DynamicFieldsService;
use benh\sahiv\Service\ImageService;
use benh\sahiv\Service\ValidationService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;


class ProductController extends ActionController
{
    public function __construct(
        protected ValidationService $validationService,
        protected ProductRepository $productRepository,
        protected ProductComponentRepository $productComponentRepository,
        protected TypeRepository $typeRepository,
        protected ColorRepository $colorRepository,
        //protected ArticleRepository $articleRepository,
        protected DynamicFieldsService $dynamicFieldsService,
        protected ImageService $imageService,
        protected PersistenceManager $persistenceManager,
    ) {
    }

    public function listAction(?Product $searchObject = null): ResponseInterface
    {
        if ($searchObject === null) {
            $products = $this->productRepository->findAll();
        } else {
            $products = $this->productRepository->findByFilter($searchObject);
        }

        foreach ($products as $product) {
            $this->dynamicFieldsService->setDynamicProductFields($product);
        }

        $types = $this->typeRepository->findBy(['is_type_for' => 1]);
        $colors = $this->colorRepository->findAll();

        $this->view->assignMultiple([
            'products' => $products,
            'types' => $types,
            'colors' => $colors,
            'searchObject' => $searchObject,
        ]);

        return $this->htmlResponse();
    }

    public function detailAction(?Product $product = null): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('/403');
        }

        $this->dynamicFieldsService->setDynamicProductFields($product);

        $this->view->assignMultiple([
            'product' => $product,
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('/403');
        }

        $types = $this->typeRepository->findBy(['is_type_for' => 1]);
        $colors = $this->colorRepository->findAll();
        //$articles = $this->articleRepository->findBy(['archived' => 0]);

        $this->view->assignMultiple([
            'types' => $types,
            'colors' => $colors,
            //'articles' => $articles,
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Product $product): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('/403');
        }

        $this->productRepository->add($product);
        $this->persistenceManager->persistAll();

        $file = $this->request->getUploadedFiles();
        $this->imageService->attachFileUpload($product, $file, ImageService::TYPE_PRODUCT);

        $arguments = $this->request->getArguments();
        if (isset($arguments['productComponents'])) {
            $productComponents = $this->request->getArgument('productComponents');
            foreach ($productComponents as $productComponent) {
                $this->setProductComponentField($productComponent, $product);
            }
        }

        return $this->redirect('list');
    }

    public function editAction(?Product $product = null): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('/403');
        }

        $types = $this->typeRepository->findBy(['is_type_for' => 1]);
        $colors = $this->colorRepository->findAll();
        //$articles = $this->articleRepository->findBy(['archived' => 0]);

        $this->dynamicFieldsService->setDynamicProductFields($product);

        $this->view->assignMultiple([
            'product' => $product,
            'types' => $types,
            'colors' => $colors,
            //'articles' => $articles,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Product $product): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('/403');
        }

        $this->productRepository->update($product);
        $this->persistenceManager->persistAll();

        $file = $this->request->getUploadedFiles();
        $this->imageService->removeFileUpload($product, $file);
        $this->imageService->attachFileUpload($product, $file, ImageService::TYPE_PRODUCT);

        $arguments = $this->request->getArguments();
        if (isset($arguments['productComponents'])) {
            $this->dynamicFieldsService->setDynamicProductFields($product);

            foreach ($product->getProductComponents() as $oldProductComponent) {
                $this->productComponentRepository->remove($oldProductComponent);
            }

            $productComponents = $this->request->getArgument('productComponents');
            foreach ($productComponents as $productComponent) {
                $this->setProductComponentField($productComponent, $product);
            }
        }

        return $this->redirect('list');
    }

    public function deleteAction(Product $product): ResponseInterface
    {
        if (!$this->validationService->validateFrontendUser()) {
            return $this->redirectToUri('/403');
        }

        $this->productRepository->remove($product);

        $this->dynamicFieldsService->setDynamicProductFields($product);

        foreach ($product->getProductComponents() as $productComponent) {
            $this->productComponentRepository->remove($productComponent);
        }

        return $this->redirect('list');
    }

    public function setProductComponentField($productComponentInput, $product): void
    {
        $inputUsedAmount = $productComponentInput['usedAmount'];
        $inputArticle = $productComponentInput['article'];

        if ($inputUsedAmount <= 0) {
            return;
        }

        $existingProductComponent = $this->productComponentRepository->findOneBy(['parent' => $product->getUid(), 'article' => $inputArticle,]);

        if ($existingProductComponent) {
            //$existingProductComponent->setUsedAmount($existingProductComponent->getUsedAmount() + $inputUsedAmount);

            $this->productComponentRepository->update($existingProductComponent);
        } else {
            $productComponentClass = new ProductComponent();

            $productComponentClass->setArticle($inputArticle);
            $productComponentClass->setUsedAmount($inputUsedAmount);
            $productComponentClass->setParent($product->getUid());

            $this->productComponentRepository->add($productComponentClass);
        }

        $this->persistenceManager->persistAll();
    }
}
