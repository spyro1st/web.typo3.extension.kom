<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_candidate_thesis_mm',
        'label' => 'uid_local',
        'label_alt' => 'uid_foreign',
        'label_alt_force' => 1,
        'iconfile' => 'EXT:kom/Resources/Public/Icons/relation.gif',
        'hideTable' => 0,
    ],
    'interface' => [
        'showRecordFieldList' => 'uid_local, uid_foreign, opinion, emphasize, explanation',
    ],
    'types' => [
        '1' => ['showitem' => 'uid_local, uid_foreign, opinion, emphasize, explanation'],
    ],
    'columns' => [
        'uid_local' => [
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_thesis',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_kom_domain_model_thesis',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'uid_foreign' => [
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_candidate',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_kom_domain_model_candidate',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'opinion' => [
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_candidate_thesis_mm.opinion',
            'config' => [
                'type' => 'select',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
                'items' => array(
                    ['Positive', '2'],
                    ['Neutral', '1'],
                    ['Negative', '-1'],
                )
            ],
        ],
        'emphasize' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_candidate_thesis_mm.emphasize',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_candidate_thesis_mm.emphasize.enabled'
                    ]
                ],
            ],
        ],
        'explanation' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_candidate_thesis_mm.explanation',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
    ],
];
