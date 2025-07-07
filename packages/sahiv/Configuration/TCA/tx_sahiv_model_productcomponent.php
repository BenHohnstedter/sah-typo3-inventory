<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_sahiv_domain_model_productcomponent',
        'label' => 'article',
        'descriptionColumn' => 'notes',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'default_sortby' => 'title',
        'versioningWS' => true,
        'rootLevel' => -1,
        'typeicon_classes' => [
            'default' => 'ext-sahiv-product-component',
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
        'parent' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'parent_table' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'article' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_productcomponent.article',
            'config' => [
                'type' => 'select',
                'required' => true,
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_sahiv_domain_model_article',
            ],
        ],
        'used_amount' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_productcomponent.used_amount',
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
        'notes' => [
            'label' => $ll . 'tx_sahiv_domain_model_productcomponent.notes',
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
            'showitem' => '--div--;General, --palette--;;palette_general, --div--;Settings, notes, hidden',
        ],
    ],
    'palettes' => [
        'palette_general' => [
            'showitem' => 'article, used_amount',
        ],
    ],
];
