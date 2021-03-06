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

        $canidates = [];
        $canidatesRelations = $result->getCandidates();
        foreach ($canidatesRelations as $canidatesRelation) {
            $canidates[] = $canidatesRelation->getUidLocal();
        }

        $calculatedResults = [];

        foreach ($resultOpinions as $resultOpinion) {
            if (count($canidates) > 0) {
                foreach ($canidates as $canidate) {
                    $thesisMatch = FALSE;
                    $candidateOpinions = $canidate->getOpinions();
                    $calculatedResults[$canidate->getUid()]['candidate'] = $canidate;
                    foreach ($candidateOpinions as $candidateOpinion) {
                        if ($resultOpinion->getUidLocal() === $candidateOpinion->getUidLocal()) {
                            $thesisMatch = TRUE;
                            $calculatedResults[$canidate->getUid()]['score'] += $this->calculateOpinion($resultOpinion, $candidateOpinion);
                        }
                    }

                    if ($thesisMatch && $resultOpinion->getOpinion() != 0) {
                        if ($resultOpinion->getEmphasize()) {
                            $calculatedResults[$canidate->getUid()]['maxScore'] += 4;
                        } else {
                            $calculatedResults[$canidate->getUid()]['maxScore'] += 2;
                        }
                    } else {
                        // missing opinion counted like skipped
                        $calculatedResults[$canidate->getUid()]['score'] += 0;
                    }
                }
                $i++;
                foreach ($canidates as $canidate) {
                    if ($i === $resultOpinionsCount) {
                        if ($calculatedResults[$canidate->getUid()]['maxScore'] > 0) {
                            $calculatedResults[$canidate->getUid()]['percentage'] = ($calculatedResults[$canidate->getUid()]['score'] / $calculatedResults[$canidate->getUid()]['maxScore']) * 100;
                        }
                        else {
                            $calculatedResults[$canidate->getUid()]['percentage'] = 0;
                        }
                    }
                }
            }
        }

        usort($calculatedResults, function ($a, $b) {
            if ($a['percentage'] == $b['percentage']) {
                return 0;
            }
            return ($a['percentage'] < $b['percentage']) ? 1 : -1;
        });

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
