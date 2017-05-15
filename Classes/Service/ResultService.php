<?php
namespace DigitalPatrioten\Kom\Service;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/


/**
 * The service for Results
 */
class ResultService extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * candidateRepository
     * @var \DigitalPatrioten\Kom\Domain\Repository\CandidateRepository
     * @inject
     */
    protected $candidateRepository = NULL;

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
     * @param \DigitalPatrioten\Kom\Domain\Model\Result $result
     */
    public function calculateResult(\DigitalPatrioten\Kom\Domain\Model\Result $result) {
        $canidates = $this->candidateRepository->findByElectionDistrictAndElection($result->getElectionDistrict(), $result->getElection());
        $this->debugQuery($canidates);
        $test = '';
    }
}
