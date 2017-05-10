<?php
namespace DigitalPatrioten\Kom\Domain\Model;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

/**
 * ThesisMapping
 */
class ThesisMapping extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * __construct
     */
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
        $this->uidLocal = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->uidForeign = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * ElectiondistrictElection Mapping
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ElectiondistrictElectionMapping>
     */
    protected $uidLocal;

    /**
     * Thesis
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis>
     */
    protected $uidForeign;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ElectiondistrictElectionMapping>
     */
    public function getUidLocal() {
        return $this->uidLocal;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ElectiondistrictElectionMapping> $uidLocal
     */
    public function setUidLocal(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $uidLocal) {
        $this->uidLocal = $uidLocal;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis>
     */
    public function getUidForeign() {
        return $this->uidForeign;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis> $uidForeign
     */
    public function setUidForeign(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $uidForeign) {
        $this->uidForeign = $uidForeign;
    }

}
