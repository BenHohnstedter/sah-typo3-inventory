<?php

namespace benh\sahiv\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Shape extends AbstractEntity
{
    /** @var string */
    protected $title = '';

    /** @var ObjectStorage<Pearl> */
    protected $pearls;

    /** @var bool */
    protected $hidden = false;

    public function __construct()
    {
        $this->pearls = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return ObjectStorage<Pearl>
     */
    public function getPearls(): ObjectStorage
    {
        return $this->pearls;
    }

    public function setPearls(ObjectStorage $pearls): void
    {
        $this->pearls = $pearls;
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
