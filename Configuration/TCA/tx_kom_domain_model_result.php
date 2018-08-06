<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result',
        'label' => 'uid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'election_distric,election',
        'iconfile' => 'EXT:kom/Resources/Public/Icons/tx_kom_domain_model_result.gif',
        'hideTable' => 1,
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, election_distric, election, opinions, candidates, step, total_steps, session_id',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, election_distric, election, opinions, candidates, step, total_steps, session_id'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'election_district' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result.election_distric',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_kom_domain_model_electiondistrict',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'election' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result.election',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_kom_domain_model_election',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'opinions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result.opinions',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_kom_result_thesis_mm',
                'foreign_field' => 'uid_foreign',
                'foreign_label' => 'uid_local',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ]
            ],
        ],
        'candidates' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result.candidates',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_kom_result_candidate_mm',
                'foreign_field' => 'uid_foreign',
                'foreign_label' => 'uid_local',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ]
            ],
        ],
        'step' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result.step',
            'config' => [
                'type' => 'input',
                'size' => 3,
                'default' => 0,
            ]
        ],
        'total_steps' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result.total_steps',
            'config' => [
                'type' => 'input',
                'size' => 3,
                'default' => 0,
            ]
        ],
        'session_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_result.session_id',
            'config' => [
                'type' => 'passthrough'
            ],
        ],
    ],
];
