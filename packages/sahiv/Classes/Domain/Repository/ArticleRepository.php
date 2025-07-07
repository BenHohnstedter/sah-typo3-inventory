<?php

declare(strict_types=1);

namespace benh\sahiv\Domain\Repository;

use benh\sahiv\Domain\Model\Article;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class ArticleRepository extends AbstractRepository
{
    public function findByFilter(Article $article): QueryResultInterface
    {
        $query = $this->createQuery();

        $constraints = [
            $query->equals('archived', $article->getArchived()),
            $query->like('title', '%' . $article->getTitle() . '%'),
            $query->like('acronym', '%' . $article->getAcronym() . '%'),
            $this->findByType($query, $article),
            $this->findByMaterial($query, $article),
            $this->findBySize($query, $article),
            $this->findByColors($query, $article),
        ];

        $filteredConstraints = array_filter($constraints);

        if (!empty($filteredConstraints)) {
            $query->matching($query->logicalAnd(...$filteredConstraints));
        }

        return $query->execute();
    }
}
