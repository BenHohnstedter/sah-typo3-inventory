<?php

namespace benh\sahiv\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Charm extends AbstractEntity
{
    /** @var string */
    protected $title = '';

    /** @var ObjectStorage<FileReference> */
    protected $images;

    /** @var float */
    protected $unitPrice = 0.0;

    /** @var int */
    protected $stock = 0;

    /** @var string */
    protected $size = '';

    /** @var ObjectStorage<ColorCp> */
    protected $colorscp;

    /** @var ObjectStorage<ColorTone> */
    protected $colortones;

    /** @var ObjectStorage<MaterialCp> */
    protected $materialscp;

    /** @var ObjectStorage<Shape> */
    protected $types;

    /** @var bool */
    protected $selfmade = false;

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
        $this->types = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    public function setImages(ObjectStorage $images): void
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

    public function getSize(): string
    {
        return $this->size;
    }

    public function setSize(string $size): void
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

    public function getTypes(): ObjectStorage
    {
        return $this->types;
    }

    public function setTypes(ObjectStorage $types): void
    {
        $this->types = $types;
    }

    public function isSelfmade(): bool
    {
        return $this->selfmade;
    }

    public function setSelfmade(bool $selfmade): void
    {
        $this->selfmade = $selfmade;
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
