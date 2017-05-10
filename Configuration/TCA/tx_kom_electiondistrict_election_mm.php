<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_electiondistrict_election_mm',
        'label' => 'uid_local',
        'label_alt' => 'uid_foreign',
        'label_alt_force' => 1,
        'iconfile' => 'EXT:kom/Resources/Public/Icons/relation.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'uid_local, uid_foreign, theses',
    ],
    'types' => [
        '1' => ['showitem' => 'uid_local, uid_foreign, theses'],
    ],
    'columns' => [
        'uid_local' => [
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_electiondistrict',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_kom_domain_model_electiondistrict',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'uid_foreign' => [
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_election',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_kom_domain_model_election',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'theses' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_election.theses',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_kom_domain_model_thesis',
                'MM' => 'tx_kom_electiondistrictelection_thesis_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => [
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'edit' => [
                        'module' => [
                            'name' => 'wizard_edit',
                        ],
                        'type' => 'popup',
                        'title' => 'Edit', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.edit
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    ],
                    'add' => [
                        'module' => [
                            'name' => 'wizard_add',
                        ],
                        'type' => 'script',
                        'title' => 'Create new', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.add
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
                        'params' => [
                            'table' => 'tx_kom_domain_model_thesis',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ],
                    ],
                ],
            ],
        ],
    ],
];
