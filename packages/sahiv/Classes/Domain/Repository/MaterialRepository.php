<?php

declare(strict_types=1);

namespace benh\sahiv\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class MaterialRepository extends Repository
{

    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING,
    ];
}
