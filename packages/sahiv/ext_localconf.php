<?php

declare(strict_types=1);

use benh\sahiv\Controller\PearlController;
use benh\sahiv\Controller\ColorController;
use benh\sahiv\Controller\ColorcpController;
use benh\sahiv\Controller\ColortoneController;
use benh\sahiv\Controller\MaterialController;
use benh\sahiv\Controller\MaterialcpController;
use benh\sahiv\Controller\ShapeController;
use benh\sahiv\Controller\OrderController;
use benh\sahiv\Controller\ProductController;
use benh\sahiv\Controller\TypeController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'sahiv',
    'PearlPlugin',
    [PearlController::class => 'list, new, create, edit, update, delete, detail'],
    [PearlController::class => 'list, new, create, edit, update, delete, detail'],
);

ExtensionUtility::configurePlugin(
    'sahiv',                                                                // extension name, matching the PHP namespaces (but without the vendor)
    'ColorPlugin',                                                          // arbitrary, but unique plugin name (not visible in the backend)
    [ColorController::class => 'list, new, create, edit, update, delete'],  // all actions
    [ColorController::class => 'list, new, create, edit, update, delete'],  // non-cacheable actions
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'ColorcpPlugin',
    [ColorcpController::class => 'list, new, create, edit, update, delete'],
    [ColorcpController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'ColortonePlugin',
    [ColortoneController::class => 'list, new, create, edit, update, delete'],
    [ColortoneController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'MaterialPlugin',
    [MaterialController::class => 'list, new, create, edit, update, delete'],
    [MaterialController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'MaterialcpPlugin',
    [MaterialcpController::class => 'list, new, create, edit, update, delete'],
    [MaterialcpController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'ShapePlugin',
    [ShapeController::class => 'list, new, create, edit, update, delete'],
    [ShapeController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'OrderPlugin',
    [OrderController::class => 'list, new, create, edit, update, delete'],
    [OrderController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'ProductPlugin',
    [ProductController::class => 'list, new, create, edit, update, delete, detail'],
    [ProductController::class => 'list, new, create, edit, update, delete, detail'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'TypePlugin',
    [TypeController::class => 'list, new, create, edit, update, delete'],
    [TypeController::class => 'list, new, create, edit, update, delete'],
);
