<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_sahiv_domain_model_article',
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
            'default' => 'ext-sahiv-article',
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
            'label' => $ll . 'tx_sahiv_domain_model_article.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'unique,trim',
            ],
        ],
        'acronym' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_article.acronym',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => false,
                'eval' => 'trim',
            ],
        ],
        'archived' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_article.archived',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'type' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_article.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_sahiv_domain_model_type',
                'foreign_table_where' => 'AND tx_sahiv_domain_model_type.is_type_for = 0',
            ],
        ],
        'colors' => [
            'exclude' => true,
            'label' => $ll . 'tx_sahiv_domain_model_article.colors',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_color',
                'MM' => 'tx_sahiv_articles_colors_mm',
                'maxitems' => 50,
            ],
        ],
        'material' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_article.material',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_sahiv_domain_model_material',
            ],
        ],
        'size' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_article.size',
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
        'notes' => [
            'label' => $ll . 'tx_sahiv_domain_model_article.notes',
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
            'label' => $ll . 'tx_sahiv_domain_model_article.images',
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
            'showitem' => '--div--;General, --palette--;;palette_general,--palette--;;palette_selection, size,--div--;Media, images, --div--;Settings, notes, hidden',
        ],
    ],
    'palettes' => [
        'palette_general' => [
            'showitem' => 'title, acronym',
        ],
        'palette_selection' => [
            'showitem' => 'type, colors, material',
        ],
    ],
];
