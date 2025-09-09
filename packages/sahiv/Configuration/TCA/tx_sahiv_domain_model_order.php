<?php

defined('TYPO3') or die;

$ll = 'LLL:EXT:sahiv/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_sahiv_domain_model_order',
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
            'default' => 'ext-sahiv-order',
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
            'label' => $ll . 'tx_sahiv_domain_model_order.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'unique,trim',
            ],
        ],
        'pack_amount' => [
            'displayCond' => 'FIELD:is_only_adjustment:=:0',
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_order.pack_amount',
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
        'pack_price' => [
            'displayCond' => 'FIELD:is_only_adjustment:=:0',
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_order.pack_price',
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
        'pieces_per_pack' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_order.pieces_per_pack',
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
        'bought_at' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_order.bought_at',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'shop_name' => [
            'displayCond' => 'FIELD:is_only_adjustment:=:0',
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_order.shop_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'shop_link' => [
            'displayCond' => 'FIELD:is_only_adjustment:=:0',
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_order.shop_link',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'is_only_adjustment' => [
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_order.is_only_adjustment',
            'onChange' => 'reload',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'adjustment_type' => [
            'displayCond' => 'FIELD:is_only_adjustment:=:1',
            'exclude' => false,
            'label' => $ll . 'tx_sahiv_domain_model_order.adjustment_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    [
                        'label' => 'add',
                        'value' => 0,
                    ],
                    [
                        'label' => 'substract',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        'notes' => [
            'label' => $ll . 'tx_sahiv_domain_model_order.notes',
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
            'showitem' => '--div--;General, --palette--;;palette_general, --palette--;;palette_pack, bought_at, --palette--;;palette_shop, --palette--;;palette_adjustment, --div--;Settings, notes, hidden',
        ],
    ],
    'palettes' => [
        'palette_general' => [
            'showitem' => 'title, article',
        ],
        'palette_pack' => [
            'showitem' => 'pack_amount, pack_price, pieces_per_pack',
        ],
        'palette_shop' => [
            'showitem' => 'shop_name, shop_link',
        ],
        'palette_adjustment' => [
            'showitem' => 'is_only_adjustment, adjustment_type',
        ],
    ],
];
