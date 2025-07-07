<?php

namespace benh\sahiv\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Product extends AbstractEntity
{
    /** @var string */
    protected $title = '';

    /** @var string */
    protected $acronym = '';

    /** @var int */
    protected $isBought = 0;

    /** @var QueryResult */
    protected $productComponents;

    /** @var Type */
    protected $type;

    /** @var ObjectStorage<Color> */
    protected $colors;

    /** @var float */
    protected $size = 0;

    /** @var float */
    protected $materialPrice = 0;

    /** @var float */
    protected $sellingPrice = 0;

    /** @var float */
    protected $workingHours = 0;

    /** @var ObjectStorage<FileReference> */
    protected $images;

    /** @var string */
    protected $craftedAt = '';

    /** @var string */
    protected $notes = '';

    public function __construct()
    {
        $this->colors = new ObjectStorage();
        $this->images = new ObjectStorage();
    }

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

    public function getAcronym(): string
    {
        return $this->acronym;
    }

    /**
     * @param string $acronym acronym
     */
    public function setAcronym($acronym): void
    {
        $this->acronym = $acronym;
    }

    public function getIsBought(): int
    {
        return $this->isBought;
    }

    /**
     * @param int $isBought isBought
     */
    public function setIsBought($isBought): void
    {
        $this->isBought = $isBought;
    }

    public function getProductComponents(): ?QueryResult
    {
        return $this->productComponents;
    }

    /**
     * @param QueryResult $productComponents productComponents
     */
    public function setProductComponents($productComponents): void
    {
        $this->productComponents = $productComponents;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    /**
     * @param Type $type type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getColors(): ?ObjectStorage
    {
        return $this->colors;
    }

    /**
     * @param ObjectStorage<Color> $colors colors
     */
    public function setColors($colors): void
    {
        $this->colors = $colors;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    /**
     * @param float $size size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    public function getMaterialPrice(): float
    {
        return $this->materialPrice;
    }

    /**
     * @param float $materialPrice materialPrice
     */
    public function setMaterialPrice($materialPrice): void
    {
        $this->materialPrice = $materialPrice;
    }

    public function getSellingPrice(): ?float
    {
        return $this->sellingPrice;
    }

    /**
     * @param float $sellingPrice sellingPrice
     */
    public function setSellingPrice($sellingPrice): void
    {
        $this->sellingPrice = $sellingPrice;
    }

    public function getWorkingHours(): float
    {
        return $this->workingHours;
    }

    /**
     * @param float $workingHours workingHours
     */
    public function setWorkingHours($workingHours): void
    {
        $this->workingHours = $workingHours;
    }

    public function getCraftedAt(): string
    {
        return $this->craftedAt;
    }

    /**
     * @param string $craftedAt craftedAt
     */
    public function setCraftedAt($craftedAt): void
    {
        $this->craftedAt = $craftedAt;
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

    public function getImages(): ?ObjectStorage
    {
        return $this->images;
    }

    /**
     * @param ObjectStorage<FileReference> $images images
     */
    public function setImages($images): void
    {
        $this->images = $images;
    }
}
