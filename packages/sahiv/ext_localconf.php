<?php

declare(strict_types=1);

use benh\sahiv\Controller\ColorController;
use benh\sahiv\Controller\ArticleController;
use benh\sahiv\Controller\MaterialController;
use benh\sahiv\Controller\OrderController;
use benh\sahiv\Controller\ProductController;
use benh\sahiv\Controller\TypeController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'sahiv',
    // arbitrary, but unique plugin name (not visible in the backend)
    'ColorList',
    // all actions
    [ColorController::class => 'list, new, create, edit, update, delete'],
    // non-cacheable actions
    [ColorController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'MaterialList',
    [MaterialController::class => 'list, new, create, edit, update, delete'],
    [MaterialController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'OrderList',
    [OrderController::class => 'list, new, create, edit, update, delete'],
    [OrderController::class => 'list, new, create, edit, update, delete'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'ProductList',
    [ProductController::class => 'list, new, create, edit, update, delete, detail'],
    [ProductController::class => 'list, new, create, edit, update, delete, detail'],
);

ExtensionUtility::configurePlugin(
    'sahiv',
    'TypeList',
    [TypeController::class => 'list, new, create, edit, update, delete'],
    [TypeController::class => 'list, new, create, edit, update, delete'],
);
