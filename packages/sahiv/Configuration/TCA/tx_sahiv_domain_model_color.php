<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';
$model = 'tx_sahiv_domain_model_color';

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
        'accessories' => [
            'exclude' => true,
            'label' => $ll . $model . '.accessories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_sahiv_domain_model_accessory',
                'MM' => 'tx_sahiv_accessories_colors_mm',
                'MM_opposite_field' => 'colors',
                'maxitems' => 9999,
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
            'showitem' => '--div--;General, title, accessories, --div--;Settings, hidden',
        ],
    ],
];
