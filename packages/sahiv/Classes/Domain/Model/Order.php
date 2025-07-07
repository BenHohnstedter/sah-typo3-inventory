<?php

namespace benh\sahiv\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Order extends AbstractEntity
{
    /** @var string */
    protected $title = '';

    /** @var Article */
    protected $article;

    /** @var int */
    protected $packAmount = 0;

    /** @var float */
    protected $packPrice = 0;

    /** @var int */
    protected $piecesPerPack = 0;

    /** @var string */
    protected $boughtAt = '';

    /** @var string */
    protected $shopName = '';

    /** @var string */
    protected $shopLink = '';

    /** @var int */
    protected $isOnlyAdjustment = 0;

    /** @var int */
    protected $adjustmentType = 0;

    /** @var string */
    protected $notes = '';

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
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

    public function getPackAmount(): int
    {
        return $this->packAmount;
    }

    /**
     * @param int $packAmount packAmount
     */
    public function setPackAmount($packAmount): void
    {
        $this->packAmount = $packAmount;
    }

    public function getPackPrice(): float
    {
        return $this->packPrice;
    }

    /**
     * @param float $packPrice packPrice
     */
    public function setPackPrice($packPrice): void
    {
        $this->packPrice = $packPrice;
    }

    public function getPiecesPerPack(): int
    {
        return $this->piecesPerPack;
    }

    /**
     * @param int $piecesPerPack piecesPerPack
     */
    public function setPiecesPerPack($piecesPerPack): void
    {
        $this->piecesPerPack = $piecesPerPack;
    }

    public function getBoughtAt(): string
    {
        return $this->boughtAt;
    }

    /**
     * @param string $boughtAt boughtAt
     */
    public function setBoughtAt($boughtAt): void
    {
        $this->boughtAt = $boughtAt;
    }

    public function getShopName(): string
    {
        return $this->shopName;
    }

    /**
     * @param string $shopName shopName
     */
    public function setShopName($shopName): void
    {
        $this->shopName = $shopName;
    }

    public function getShopLink(): string
    {
        return $this->shopLink;
    }

    /**
     * @param string $shopLink shopLink
     */
    public function setShopLink($shopLink): void
    {
        $this->shopLink = $shopLink;
    }

    public function getIsOnlyAdjustment(): int
    {
        return $this->isOnlyAdjustment;
    }

    /**
     * @param int $isOnlyAdjustment isOnlyAdjustment
     */
    public function setIsOnlyAdjustment($isOnlyAdjustment): void
    {
        $this->isOnlyAdjustment = $isOnlyAdjustment;
    }

    public function getAdjustmentType(): int
    {
        return $this->adjustmentType;
    }

    /**
     * @param int $adjustmentType adjustmentType
     */
    public function setAdjustmentType($adjustmentType): void
    {
        $this->adjustmentType = $adjustmentType;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }
}
