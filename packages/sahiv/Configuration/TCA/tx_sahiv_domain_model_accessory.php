<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';
$model = 'tx_sahiv_domain_model_accessory';

return [
    'ctrl' => [
        'title' => $ll . $model,
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'default_sortby' => 'title',
        'versioningWS' => true,
        'rootLevel' => -1,
        'typeicon_classes' => [
            'default' => 'ext-sahiv-type',
        ],
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'searchFields' => 'title,size',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'columns' => [
        'title' => [
            'exclude' => false,
            'label' => $ll . $model . '.title',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'required' => true,
                'eval' => 'trim',
            ],
        ],
        'images' => [
            'exclude' => true,
            'label' => $ll . $model . '.images',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'Add image',
                ],
            ],
        ],
        'unit_price' => [
            'exclude' => false,
            'label' => $ll . $model . '.unit_price',
            'config' => [
                'type' => 'number',
                'format' => 'decimal',
                'range' => [
                    'lower' => 0,
                    'upper' => 999999,
                ],
            ],
        ],
        'stock' => [
            'exclude' => false,
            'label' => $ll . $model . '.stock',
            'config' => [
                'type' => 'number',
                'range' => [
                    'lower' => 0,
                    'upper' => 999999,
                ],
            ],
        ],
        'size' => [
            'exclude' => false,
            'label' => $ll . $model . '.size',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],



        'colors' => [
            'exclude' => true,
            'label' => $ll . $model . '.colors',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_color',
                'MM' => 'tx_sahiv_accessories_colors_mm',
                'maxitems' => 10,
            ],
        ],
        'material' => [
            'exclude' => true,
            'label' => $ll . $model . '.material',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_sahiv_domain_model_material',
                'maxitems' => 1,
            ],
        ],
        'type' => [
            'exclude' => true,
            'label' => $ll . $model . '.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_sahiv_domain_model_type',
                'maxitems' => 1,
            ],
        ],



        'archived' => [
            'exclude' => true,
            'label' => $ll . $model . '.archived',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'deleted' => [
            'exclude' => true,
            'label' => $ll . $model . '.deleted',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
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
    ],
    'types' => [
        0 => [
            'showitem' => '--div--;General, --palette--;;palette_general, --palette--;;palette_numbers, colors, material, type, --div--;Settings, --palette--;;palette_settings',
        ],
    ],
    'palettes' => [
        'palette_general' => [
            'showitem' => 'title, images',
        ],
        'palette_numbers' => [
            'showitem' => 'unit_price, stock, size',
        ],
        'palette_settings' => [
            'showitem' => 'archived, deleted, hidden',
        ],
    ],
];
