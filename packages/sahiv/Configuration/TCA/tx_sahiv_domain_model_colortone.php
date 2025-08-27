<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';
$model = 'tx_sahiv_domain_model_colortone';

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
            'default' => 'ext-sahiv-color',
        ],
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'searchFields' => 'title',
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
            'label' => $ll . $model . '.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'unique,trim',
            ],
        ],
        'charms' => [
            'exclude' => true,
            'label' => $ll . $model . '.charms',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_charm',
                'MM' => 'tx_sahiv_charms_colortones_mm',
                'MM_opposite_field' => 'charms',
                'maxitems' => 10,
            ],
        ],
        'pearls' => [
            'exclude' => true,
            'label' => $ll . $model . '.pearls',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_pearl',
                'MM' => 'tx_sahiv_pearls_colortones_mm',
                'MM_opposite_field' => 'pearls',
                'maxitems' => 10,
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
            'showitem' => '--div--;General, --palette--;;palette_general, charms, pearls, --palette--;;palette_settings',
        ],
    ],
    'palettes' => [
        'palette_general' => [
            'showitem' => 'title',
        ],
        'palette_settings' => [
            'showitem' => 'hidden',
        ],
    ],
];
