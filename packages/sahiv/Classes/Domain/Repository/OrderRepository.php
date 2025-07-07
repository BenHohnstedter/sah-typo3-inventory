<?php

declare(strict_types=1);

namespace benh\sahiv\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class OrderRepository extends Repository
{
    protected $defaultOrderings = [
        'bought_at' => QueryInterface::ORDER_DESCENDING,
        'uid' => QueryInterface::ORDER_ASCENDING,
    ];
}
