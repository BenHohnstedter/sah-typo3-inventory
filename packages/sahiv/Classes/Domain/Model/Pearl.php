<?php

namespace benh\sahiv\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Pearl extends AbstractEntity
{
    /** @var string */
    protected $title = '';

    /** @var string */
    protected $acronym = '';

    /** @var ObjectStorage<FileReference> */
    protected $images;

    /** @var float */
    protected $unitPrice = 0.0;

    /** @var int */
    protected $stock = 0;

    /** @var float */
    protected $size = 0.0;

    /** @var ObjectStorage<Colorcp> */
    protected $colorscp;

    /** @var ObjectStorage<Colortone> */
    protected $colortones;

    /** @var ObjectStorage<Materialcp> */
    protected $materialscp;

    /** @var ObjectStorage<Shape> */
    protected $shapes;

    /** @var bool */
    protected $archived = false;

    /** @var bool */
    protected $deleted = false;

    /** @var bool */
    protected $hidden = false;

    /** @var string */
    protected $notes = '';

    public function __construct()
    {
        $this->images = new ObjectStorage();
        $this->colorscp = new ObjectStorage();
        $this->colortones = new ObjectStorage();
        $this->materialscp = new ObjectStorage();
        $this->shapes = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAcronym(): string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): void
    {
        $this->acronym = $acronym;
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

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getSize(): float
    {
        return $this->size;
    }

    public function setSize(float $size): void
    {
        $this->size = $size;
    }

    public function getColorscp(): ObjectStorage
    {
        return $this->colorscp;
    }

    public function setColorscp(ObjectStorage $colorscp): void
    {
        $this->colorscp = $colorscp;
    }

    public function getColortones(): ObjectStorage
    {
        return $this->colortones;
    }

    public function setColortones(ObjectStorage $colortones): void
    {
        $this->colortones = $colortones;
    }

    public function getMaterialscp(): ObjectStorage
    {
        return $this->materialscp;
    }

    public function setMaterialscp(ObjectStorage $materialscp): void
    {
        $this->materialscp = $materialscp;
    }

    public function getShapes(): ObjectStorage
    {
        return $this->shapes;
    }

    public function setShapes(ObjectStorage $shapes): void
    {
        $this->shapes = $shapes;
    }

    public function isArchived(): bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): void
    {
        $this->archived = $archived;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    public function isHidden(): bool
    {
        return $this->hidden;
    }

    public function setHidden(bool $hidden): void
    {
        $this->hidden = $hidden;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }
}
