<?php

declare(strict_types=1);

namespace benh\sahiv\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface;

class AbstractRepository extends Repository
{
    protected $defaultOrderings = [
        'uid' => QueryInterface::ORDER_DESCENDING,
    ];

    public function findByType($query, object $object): ?ConstraintInterface
    {
        if ($object->getType() != null) {
            return $query->equals('type', $object->getType()->getUid());
        }

        return null;
    }

    public function findByMaterial($query, object $object): ?ConstraintInterface
    {
        if ($object->getMaterial() != null) {
            return $query->equals('material', $object->getMaterial()->getUid());
        }

        return null;
    }

    public function findBySize($query, object $object): ?ConstraintInterface
    {
        if ($object->getSize() != null) {
            return $query->greaterThanOrEqual('size', $object->getSize());
        }

        return null;
    }

    public function findBySellingPrice($query, object $object): ?ConstraintInterface
    {
        if ($object->getSellingPrice() != null) {
            return $query->greaterThanOrEqual('selling_price', $object->getSellingPrice());
        }

        return null;
    }

    public function findByColors($query, object $object): ?ConstraintInterface
    {
        $colors = [];

        foreach ($object->getColors() as $color) {
            $colors[] = $color;
        }

        if (!empty($colors)) {
            return $query->in('colors.uid', $colors);
        }

        return null;
    }
}
