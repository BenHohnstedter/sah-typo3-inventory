<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';
$model = 'tx_sahiv_domain_model_pearl';

return [
    'ctrl' => [
        'title' => $ll . $model,
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
            'default' => 'ext-sahiv-type',
        ],
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'searchFields' => 'title,description',
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
                'size' => 30,
                'required' => true,
                'eval' => 'unique,trim',
            ],
        ],
        'acronym' => [
            'exclude' => false,
            'label' => $ll . $model . '.acronym',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => false,
                'eval' => 'trim',
            ],
        ],
        'images' => [
            'exclude' => true,
            'label' => $ll . $model . '.images',
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



        'unit_price' => [
            'exclude' => false,
            'label' => $ll . $model . '.unit_price',
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
        'stock' => [
            'exclude' => false,
            'label' => $ll . $model . '.stock',
            'config' => [
                'type' => 'number',
                'size' => 30,
                'required' => false,
                'eval' => 'trim',
                'range' => [
                    'lower' => 0,
                    'upper' => 99999,
                ],
            ],
        ],
        'size' => [
            'exclude' => false,
            'label' => $ll . $model . '.size',
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



        'colorscp' => [
            'exclude' => true,
            'label' => $ll . $model . '.colorscp',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_colorcp',
                'MM' => 'tx_sahiv_pearls_colorscp_mm',
                'maxitems' => 10,
            ],
        ],
        'colortones' => [
            'exclude' => true,
            'label' => $ll . $model . '.colortones',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_colortone',
                'MM' => 'tx_sahiv_pearls_colortones_mm',
                'maxitems' => 10,
            ],
        ],
        'materialscp' => [
            'exclude' => true,
            'label' => $ll . $model . '.materialscp',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_materialcp',
                'MM' => 'tx_sahiv_pearls_materialscp_mm',
                'maxitems' => 10,
            ],
        ],
        'shapes' => [
            'exclude' => true,
            'label' => $ll . $model . '.shapes',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_shape',
                'MM' => 'tx_sahiv_pearls_shapes_mm',
                'maxitems' => 10,
            ],
        ],



        'notes' => [
            'label' => $ll . $model . '.notes',
            'config' => [
                'type' => 'text',
                'rows' => 10,
                'cols' => 48,
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
            'showitem' => '--div--;General, --palette--;;palette_general, --palette--;;palette_numbers, colorscp, colortones, materialscp, shapes, --div--;Settings, notes, --palette--;;palette_settings',
        ],
    ],
    'palettes' => [
        'palette_general' => [
            'showitem' => 'title, acronym, images',
        ],
        'palette_numbers' => [
            'showitem' => 'price_per_unit, stock, size',
        ],
        'palette_settings' => [
            'showitem' => 'archived, deleted, hidden',
        ],
    ],
];
