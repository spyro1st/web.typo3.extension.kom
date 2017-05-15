<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'DigitalPatrioten.Kom',
            'Pi1',
            [
                'ElectionDistrict' => 'select',
                'Election' => 'questionnaire, emphasize, result, compare'
            ],
            // non-cacheable actions
            [
                'ElectionDistrict' => '',
                'Election' => 'questionnaire, emphasize, result, compare'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_pi1.svg
                        title = LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_pi1
                        description = LLL:EXT:kom/Resources/Private/Language/locallang_db.xlf:tx_kom_domain_model_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = kom_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );
    },
    $_EXTKEY
);
