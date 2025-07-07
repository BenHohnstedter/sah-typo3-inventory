<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_sahiv_domain_model_product',
        'label' => 'title',
        'descriptionColumn' => 'notes',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'default_sortby' => 'title',
        'versioningWS' => true,
        'rootLevel' => -1,
        'typeicon_classes' => [
            'default' => 'ext-sahiv-product',
        ],
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'searchFields' => 'title,description',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'columns' => [
        'title' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_product.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'unique,trim',
            ],
        ],
        'acronym' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_product.acronym',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => false,
                'eval' => 'trim',
            ],
        ],
        'productcomponents' => [
            'exclude' => true,
            'label' => $ll . 'tx_sahiv_domain_model_product.productcomponents',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_sahiv_domain_model_productcomponent',
                'foreign_field' => 'parent',
                'appearance' => [
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                ],
            ],
        ],
        'is_bought' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_product.is_bought',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'type' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_product.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_sahiv_domain_model_type',
                'foreign_table_where' => 'AND tx_sahiv_domain_model_type.is_type_for = 1',
            ],
        ],
        'colors' => [
            'exclude' => true,
            'label' => $ll . 'tx_sahiv_domain_model_product.colors',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_color',
                'MM' => 'tx_sahiv_products_colors_mm',
                'maxitems' => 50,
            ],
        ],
        'size' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_product.size',
            'config' => [
                'type' => 'number',
                'size' => 30,
                'format' => 'decimal',
                'required' => false,
                'eval' => 'trim',
                'range' => [
                    'lower' => 0,
                    'upper' => 99999,
                ],
            ],
        ],
        'selling_price' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_product.selling_price',
            'config' => [
                'type' => 'number',
                'size' => 30,
                'format' => 'decimal',
                'required' => false,
                'eval' => 'trim',
                'range' => [
                    'lower' => 0,
                    'upper' => 99999,
                ],
            ],
        ],
        'working_hours' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_product.working_hours',
            'config' => [
                'type' => 'number',
                'size' => 30,
                'format' => 'decimal',
                'required' => false,
                'eval' => 'trim',
                'range' => [
                    'lower' => 0,
                    'upper' => 99999,
                ],
            ],
        ],
        'crafted_at' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_product.crafted_at',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'notes' => [
            'label' => $ll . 'tx_sahiv_domain_model_product.notes',
            'config' => [
                'type' => 'text',
                'rows' => 10,
                'cols' => 48,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'images' => [
            'exclude' => true,
            'label' => $ll . 'tx_sahiv_domain_model_product.images',
            'config' => [
                'type' => 'file',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'appearance' => [
                    'createNewRelationLinkTitle' => 'Add media file',
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                ],
                'allowed' => 'common-media-types',
            ],
        ],
    ],
    'types' => [
        0 => [
            'showitem' => '--div--;General, --palette--;;palette_general, type, colors, size, selling_price, working_hours, crafted_at, --div--;Media, images, --div--;Product Components, productcomponents, --div--;Settings, notes, hidden',
        ],
    ],
    'palettes' => [
        'palette_general' => [
            'showitem' => 'title, acronym, is_bought',
        ],
    ],
];
