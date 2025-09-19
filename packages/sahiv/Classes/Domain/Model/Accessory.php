<?php

namespace Benh\Sahiv\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Accessory extends AbstractEntity
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

    /** @var ObjectStorage<Color> */
    protected $colors;

    /** @var ?Material */
    protected $material = null;

    /** @var ?Type */
    protected $type = null;

    /** @var bool */
    protected $archived = false;

    /** @var bool */
    protected $deleted = false;

    /** @var bool */
    protected $hidden = false;

    public function __construct()
    {
        $this->images = new ObjectStorage();
        $this->colors = new ObjectStorage();
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

    public function addImage(FileReference $image): void
    {
        $this->images->attach($image);
    }

    public function removeImage(FileReference $image): void
    {
        $this->images->detach($image);
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

    public function getColors(): ObjectStorage
    {
        return $this->colors;
    }

    public function setColors(ObjectStorage $colors): void
    {
        $this->colors = $colors;
    }

    public function addColor(Color $color): void
    {
        $this->colors->attach($color);
    }

    public function removeColor(Color $color): void
    {
        $this->colors->detach($color);
    }

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    public function setMaterial(?Material $material): void
    {
        $this->material = $material;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): void
    {
        $this->type = $type;
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
}
