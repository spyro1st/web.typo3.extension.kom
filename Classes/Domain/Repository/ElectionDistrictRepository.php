<?php
namespace DigitalPatrioten\Kom\Domain\Repository;

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
 * The repository for ElectionDistricts
 */
class ElectionDistrictRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByActiveElection() {
        $currentDate = new \DateTime();
        $currentDate->setTime(0, 0, 0);
        $query = $this->createQuery();
        $query->matching(
            $query->greaterThanOrEqual('elections.date', $currentDate)
        );
        $query->setOrderings(
            [
                'elections.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
            ]
        );
        return $query->execute();
    }
}
