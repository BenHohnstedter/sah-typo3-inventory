<?php

namespace benh\sahiv\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Color extends AbstractEntity
{
    /** @var string */
    protected $title = '';

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
