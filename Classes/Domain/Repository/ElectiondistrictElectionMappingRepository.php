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
 * The repository for Theses
 */
class ElectiondistrictElectionMappingRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $election
     * @param \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByElectionAndElectionDistrict(\DigitalPatrioten\Kom\Domain\Model\Election $election, \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict) {
        $query = $this->createQuery();
        $query->matching(
            $query->logicalAnd(
                $query->equals('uidLocal', $electionDistrict),
                $query->equals('uidForeign', $election)
            )
        );

        $result = $query->setLimit(1)->execute();

        if ($result instanceof QueryResultInterface) {
            return $result->getFirst();
        } elseif (is_array($result)) {
            return isset($result[0]) ? $result[0] : null;
        }
    }
}
