<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'DigitalPatrioten.Kom',
            'Pi1',
            'Kandidat-O-Mat'
        );

//        if (TYPO3_MODE === 'BE') {
//
//            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
//                'DigitalPatrioten.Kom',
//                'web', // Make module a submodule of 'web'
//                'overview', // Submodule key
//                '', // Position
//                [
//                    'ElectionDistrict' => 'list, show','Election' => 'list, show',
//                ],
//                [
//                    'access' => 'user,group',
//                    'icon'   => 'EXT:' . $extKey . '/Resources/Public/Icons/user_mod_overview.svg',
//                    'labels' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_overview.xlf',
//                ]
//            );
//
//        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Kandidat-O-Mat');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kom_domain_model_electiondistrict', 'EXT:kom/Resources/Private/Language/locallang_csh_tx_kom_domain_model_electiondistrict.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kom_domain_model_electiondistrict');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kom_domain_model_election', 'EXT:kom/Resources/Private/Language/locallang_csh_tx_kom_domain_model_election.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kom_domain_model_election');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kom_domain_model_candidate', 'EXT:kom/Resources/Private/Language/locallang_csh_tx_kom_domain_model_candidate.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kom_domain_model_candidate');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kom_domain_model_thesis', 'EXT:kom/Resources/Private/Language/locallang_csh_tx_kom_domain_model_thesis.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kom_domain_model_thesis');

    },
    $_EXTKEY
);
