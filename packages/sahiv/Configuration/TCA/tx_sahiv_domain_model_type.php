<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_sahiv_domain_model_type',
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
            'label' => $ll . 'tx_sahiv_domain_model_type.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'unique,trim',
            ],
        ],
        'is_type_for' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_type.adjustment_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'article',
                        'value' => 0,
                    ],
                    [
                        'label' => 'product',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        'notes' => [
            'label' => $ll . 'tx_sahiv_domain_model_type.notes',
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
    ],
    'types' => [
        0 => [
            'showitem' => '--div--;General, --palette--;;palette_general,--div--;Settings, notes, hidden',
        ],
    ],
    'palettes' => [
        'palette_general' => [
            'showitem' => 'title, is_type_for',
        ],
    ],
];
