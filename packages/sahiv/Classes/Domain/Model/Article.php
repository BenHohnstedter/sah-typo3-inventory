<?php

namespace benh\sahiv\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Article extends AbstractEntity
{
    /** @var string */
    protected $title = '';

    /** @var string */
    protected $acronym = '';

    /** @var int */
    protected $archived = 0;

    /** @var Type */
    protected $type;

    /** @var ObjectStorage<Color> */
    protected $colors;

    /** @var Material */
    protected $material;

    /** @var float */
    protected $size = 0;

    /** @var ObjectStorage<FileReference> */
    protected $images;

    /** @var string */
    protected $notes = '';

    /** @var int */
    protected $inStock = 0;

    /** @var float */
    protected $unitPrice = 0;

    /** @var QueryResult */
    protected $orders;

    public function __construct()
    {
        $this->images = new ObjectStorage();
        $this->colors = new ObjectStorage();
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

    public function getArchived(): int
    {
        return $this->archived;
    }

    /**
     * @param int $archived archived
     */
    public function setArchived($archived): void
    {
        $this->archived = $archived;
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

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    /**
     * @param Material $material material
     */
    public function setMaterial($material): void
    {
        $this->material = $material;
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

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice unitPrice
     */
    public function setUnitPrice($unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getInStock(): string
    {
        return $this->inStock;
    }

    /**
     * @param string $inStock inStock
     */
    public function setInStock($inStock): void
    {
        $this->inStock = $inStock;
    }

    public function getOrders(): ?QueryResult
    {
        return $this->orders;
    }

    /**
     * @param QueryResult $orders orders
     */
    public function setOrders($orders): void
    {
        $this->orders = $orders;
    }
}
