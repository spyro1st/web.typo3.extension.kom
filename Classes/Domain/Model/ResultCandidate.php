<?php
namespace DigitalPatrioten\Kom\Domain\Model;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2018 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

/**
 * ResultOpinion
 */
class ResultCandidate extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * Candidate
     * @var \DigitalPatrioten\Kom\Domain\Model\Candidate
     */
    protected $uidLocal = null;

    /**
     * Result
     * @var \DigitalPatrioten\Kom\Domain\Model\Result
     */
    protected $uidForeign = null;

    public function __construct() {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * @return void
     */
    protected function initStorageObjects() {
    }

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
     * @return \DigitalPatrioten\Kom\Domain\Model\Result
     */
    public function getUidForeign() {
        return $this->uidForeign;
    }

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\Result $uidForeign
     */
    public function setUidForeign(\DigitalPatrioten\Kom\Domain\Model\Result $uidForeign) {
        $this->uidForeign = $uidForeign;
    }

}
