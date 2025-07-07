<?php

declare(strict_types=1);

namespace benh\sahiv\Domain\Repository;

use benh\sahiv\Domain\Model\Product;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class ProductRepository extends AbstractRepository
{
    public function findByFilter(Product $product): QueryResultInterface
    {
        $query = $this->createQuery();

        $constraints = [
            $query->like('title', '%' . $product->getTitle() . '%'),
            $query->like('acronym', '%' . $product->getAcronym() . '%'),
            $this->findByType($query, $product),
            $this->findBySize($query, $product),
            $this->findBySellingPrice($query, $product),
            $this->findByColors($query, $product),
        ];

        $filteredConstraints = array_filter($constraints);

        if (!empty($filteredConstraints)) {
            $query->matching($query->logicalAnd(...$filteredConstraints));
        }

        return $query->execute();
    }
}
