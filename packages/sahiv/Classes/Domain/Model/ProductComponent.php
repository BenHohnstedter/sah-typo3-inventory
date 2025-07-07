<?php

namespace benh\sahiv\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class ProductComponent extends AbstractEntity
{
    /** @var Product */
    protected $parent = 0;

    /** @var string */
    protected $parentTable = 0;

    /** @var Article */
    protected $article;

    /** @var int */
    protected $usedAmount = 0;

    public function getParent(): ?Product
    {
        return $this->parent;
    }

    /**
     * @param Product $parent parent
     */
    public function setParent($parent): void
    {
        $this->parent = $parent;
    }

    public function getParentTable(): string
    {
        return $this->parentTable;
    }

    /**
     * @param string $parentTable parentTable
     */
    public function setParentTable($parentTable): void
    {
        $this->parentTable = $parentTable;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    /**
     * @param Article $article article
     */
    public function setArticle($article): void
    {
        $this->article = $article;
    }

    public function getUsedAmount(): int
    {
        return $this->usedAmount;
    }

    /**
     * @param int $usedAmount usedAmount
     */
    public function setUsedAmount($usedAmount): void
    {
        $this->usedAmount = $usedAmount;
    }
}
