<?php
namespace DigitalPatrioten\Kom\Domain\Model;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

/**
 * CandidateElectionMapping
 */
class CandidateElectionMapping extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * Candidate
     * @var \DigitalPatrioten\Kom\Domain\Model\Candidate
     */
    protected $uidLocal = NULL;

    /**
     * ElectiondistrictElectionMapping
     * @var \DigitalPatrioten\Kom\Domain\Model\ElectiondistrictElectionMapping
     */
    protected $uidForeign = NULL;

    /**
     * @return \DigitalPatrioten\Kom\Domain\Model\Candidate
     */
    public function getUidLocal() {
        return $this->uidLocal;
    }

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\Candidate $uidLocal
     */
    public function setUidLocal(\DigitalPatrioten\Kom\Domain\Model\Candidate $uidLocal) {
        $this->uidLocal = $uidLocal;
    }

    /**
     * @return \DigitalPatrioten\Kom\Domain\Model\ElectiondistrictElectionMapping
     */
    public function getUidForeign() {
        return $this->uidForeign;
    }

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\ElectiondistrictElectionMapping $uidForeign
     */
    public function setUidForeign(\DigitalPatrioten\Kom\Domain\Model\ElectiondistrictElectionMapping $uidForeign) {
        $this->uidForeign = $uidForeign;
    }

}
