<?php
namespace DigitalPatrioten\Kom\Domain\Repository;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/**
 * The repository for Candidates
 */
class CandidateRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $election
     *
     * @return array|QueryResultInterface
     */
    public function findByElectionDistrictAndElection(
        \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict,
        \DigitalPatrioten\Kom\Domain\Model\Election $election
    ) {
        $query = $this->createQuery();
        $query->matching(
            $query->logicalAnd(
                $query->equals('elections.uidLocal', $electionDistrict),
                $query->equals('elections.uidForeign', $election)
            )
        );

        return $query->execute();
    }
}
