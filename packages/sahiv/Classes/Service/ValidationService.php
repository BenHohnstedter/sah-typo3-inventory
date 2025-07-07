<?php

namespace benh\sahiv\Service;

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class ValidationService
{
    public function __construct(
        private readonly Context $context,
    ) {
    }

    public function validateFrontendUser(): bool
    {
        return $this->context->getPropertyFromAspect(
            'frontend.user',
            'isLoggedIn',
        );
    }
}
