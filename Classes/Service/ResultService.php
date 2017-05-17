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

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\Result $result
     *
     * @return array
     */
    public function calculateResult(\DigitalPatrioten\Kom\Domain\Model\Result $result) {
        $resultOpinions = $result->getOpinions();
        $resultOpinionsCount = count($resultOpinions);
        $i = 0;

        $canidates = $this->candidateRepository->findByElectionDistrictAndElection($result->getElectionDistrict(), $result->getElection());

        $calculatedResults = [];

        foreach ($resultOpinions as $resultOpinion) {
            if ($canidates->count() > 0) {
                foreach ($canidates as $canidate) {
                    $thesisMatch = FALSE;
                    $candidateOpinions = $canidate->getOpinions();
                    $calculatedResults[$canidate->getUid()]['candidate'] = $canidate;
                    foreach ($candidateOpinions as $candidateOpinion) {
                        if ($resultOpinion->getUidLocal() === $candidateOpinion->getUidLocal()) {
                            $thesisMatch = TRUE;
                            $calculatedResults[$canidate->getUid()]['score'] += $this->calculateOpinion($resultOpinion, $candidateOpinion);
                            if ($resultOpinion->getEmphasize()) {
                                $calculatedResults[$canidate->getUid()]['maxScore'] += 4;
                            } else {
                                $calculatedResults[$canidate->getUid()]['maxScore'] += 2;
                            }
                        }
                    }
                    if (!$thesisMatch) {
                        // missing opinion counted like skipped
                        $calculatedResults[$canidate->getUid()] += 0;
                    }
                }
                $i++;
                foreach ($canidates as $canidate) {
                    if ($i === $resultOpinionsCount) {
                        $calculatedResults[$canidate->getUid()]['percentage'] = ($calculatedResults[$canidate->getUid()]['score'] / $calculatedResults[$canidate->getUid()]['maxScore']) * 100;
                    }
                }
            }
        }

        return $calculatedResults;
    }

    private function calculateOpinion(
        \DigitalPatrioten\Kom\Domain\Model\ResultOpinion $resultOpinion,
        \DigitalPatrioten\Kom\Domain\Model\CandidateOpinion $candidateOpinion
    ) {
        $resultOpinionValue = intval($resultOpinion->getOpinion());
        $candidateOpinionValue = intval($candidateOpinion->getOpinion());
        $emphasize = $resultOpinion->getEmphasize();
        $score = 0;
        if (($resultOpinionValue == 2) && ($candidateOpinionValue == 2)) {
            $score = 2;
        } elseif (($resultOpinionValue == 2) && ($candidateOpinionValue == 1)) {
            $score = 1;
        } elseif (($resultOpinionValue == 2) && ($candidateOpinionValue == -1)) {
            $score = 0;
        } elseif (($resultOpinionValue == 1) && ($candidateOpinionValue == 2)) {
            $score = 1;
        } elseif (($resultOpinionValue == 1) && ($candidateOpinionValue == 1)) {
            $score = 2;
        } elseif (($resultOpinionValue == 1) && ($candidateOpinionValue == -1)) {
            $score = 1;
        } elseif (($resultOpinionValue == -1) && ($candidateOpinionValue == -1)) {
            $score = 2;
        } elseif (($resultOpinionValue == -1) && ($candidateOpinionValue == 1)) {
            $score = 1;
        } elseif (($resultOpinionValue == -1) && ($candidateOpinionValue == 2)) {
            $score = 0;
        }

        if ($emphasize) {
            $score = $score * 2;
        }

        return $score;
    }
}
