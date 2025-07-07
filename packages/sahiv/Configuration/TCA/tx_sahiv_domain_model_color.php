<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_sahiv_domain_model_color',
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
            'default' => 'ext-sahiv-color',
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
            'label' => $ll . 'tx_sahiv_domain_model_color.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'unique,trim',
            ],
        ],
        'articles' => [
            'exclude' => true,
            'label' => $ll . 'tx_sahiv_domain_model_color.articles',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_article',
                'MM' => 'tx_sahiv_articles_colors_mm',
                'MM_opposite_field' => 'articles',
                'maxitems' => 50,
            ],
        ],
        'notes' => [
            'label' => $ll . 'tx_sahiv_domain_model_color.notes',
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
            'showitem' => '--div--;General, title, articles, --div--;Settings, notes, hidden',
        ],
    ],
];
