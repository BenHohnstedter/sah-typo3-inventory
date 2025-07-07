<?php

namespace benh\sahiv\Service;

use benh\sahiv\Domain\Repository\OrderRepository;
use benh\sahiv\Domain\Repository\ProductComponentRepository;

class DynamicFieldsService
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected ProductComponentRepository $productComponentRepository,
    ) {
    }

    public function setDynamicArticleFields($article): void
    {
        //sets orders to the matching articles
        $article->setOrders($this->orderRepository->findBy(['article' => $article->getUid()]));

        //sets article inStock with order amounts
        $article->setInStock($this->calculateInStock($article, $this->productComponentRepository->findBy(['article' => $article->getUid()])));

        //sets unitPrice for articles
        $article->setUnitPrice($this->calculateUnitPrice($article));
    }

    public function setDynamicProductFields($product): void
    {
        //sets product components to the matching products
        $product->setProductComponents($this->productComponentRepository->findBy(['parent' => $product->getUid()]));

        //sets materialPrice for product
        $product->setMaterialPrice($this->calculateMaterialPrice($product));
    }

    public function calculateInStock($article, $productComponents): int
    {
        $inStock = 0;

        foreach ($article->getOrders() as $order) {
            if ($order->getIsOnlyAdjustment()) {
                if ($order->getAdjustmentType()) {
                    $inStock -= $order->getPiecesPerPack();
                } else {
                    $inStock += $order->getPiecesPerPack();
                }
            } else {
                $inStock += $order->getPackAmount() * $order->getPiecesPerPack();
            }
        }

        foreach ($productComponents as $productComponent) {
            $inStock -= $productComponent->getUsedAmount();
        }

        return $inStock;
    }

    public function calculateUnitPrice($article): float
    {
        $unitPrice = 0;
        $allPackPrices = 0;
        $allPiecesPerPack = 0;
        $i = 0;

        foreach ($article->getOrders() as $order) {
            $allPackPrices += $order->getPackPrice();
            $allPiecesPerPack += $order->getPiecesPerPack();
            $i++;
        }

        if ($i !== 0) {
            $avgPackPrice = $allPackPrices / $i;
            $avgPiecesPerPack = $allPiecesPerPack / $i;
            $unitPrice = number_format((float) $avgPackPrice / $avgPiecesPerPack, 2, '.', '');
            ;
        }

        return $unitPrice;
    }

    public function calculateMaterialPrice($product): float
    {
        $materialPrice = 0;

        foreach ($product->getProductComponents() as $productComponent) {
            $this->setDynamicArticleFields($productComponent->getArticle());

            $materialPrice += $productComponent->getUsedAmount() * $productComponent->getArticle()->getUnitPrice();
        }

        return number_format((float) $materialPrice, 2, '.', '');
    }
}
