<?php
namespace DigitalPatrioten\Kom\Controller;

/***
 *
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 *
 ***/

/**
 * ElectionController
 */
class ElectionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * electionRepository
     *
     * @var \DigitalPatrioten\Kom\Domain\Repository\ElectionRepository
     * @inject
     */
    protected $electionRepository = null;

    /**
     * thesisRepository
     *
     * @var \DigitalPatrioten\Kom\Domain\Repository\ElectiondistrictElectionMappingRepository
     * @inject
     */
    protected $electiondistrictElectionMappingRepository = null;


    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $elections = $this->electionRepository->findAll();
        $this->view->assign('elections', $elections);
    }

    /**
     * action show
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $election
     * @return void
     */
    public function showAction(\DigitalPatrioten\Kom\Domain\Model\Election $election)
    {
        $this->view->assign('election', $election);
    }

    public function debugQuery(\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $queryResult, $explainOutput = FALSE){
        $GLOBALS['TYPO3_DB']->debugOutput = 2;
        if($explainOutput){
            $GLOBALS['TYPO3_DB']->explainOutput = true;
        }
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = true;
        $queryResult->toArray();
        DebuggerUtility::var_dump($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery);

        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = false;
        $GLOBALS['TYPO3_DB']->explainOutput = false;
        $GLOBALS['TYPO3_DB']->debugOutput = false;
    }

    /**
     * action questionnaire
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict
     * @param int $step
     * @return void
     */
    public function questionnaireAction(\DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict, $step = 0)
    {
        $election = $this->electionRepository->findFirstActiveByElectionDistrict($electionDistrict);
        $thesesMappings = $this->electiondistrictElectionMappingRepository->findByElectionAndElectionDistrict($election, $electionDistrict);

        $this->view->assignMultiple(
            [
                'electionDistrict' => $electionDistrict,
                'election' => $election,
                'thesesMappings' => $thesesMappings,
                'step' => $step
            ]
        );
    }
}
