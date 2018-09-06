<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_result_candidate_mm',
        'label' => 'uid_local',
        'label_alt' => 'uid_foreign',
        'label_alt_force' => 1,
        'iconfile' => 'EXT:kom/Resources/Public/Icons/relation.gif',
        'hideTable' => 1,
    ],
    'interface' => [
        'showRecordFieldList' => 'uid_local, uid_foreign',
    ],
    'types' => [
        '1' => ['showitem' => 'uid_local, uid_foreign'],
    ],
    'columns' => [
        'uid_local' => [
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_candidate',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_kom_domain_model_candidate',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'uid_foreign' => [
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_kom_domain_model_result',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
    ],
];
