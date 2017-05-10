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
class ElectiondistrictElectionMapping extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
     * ElectionDistrict
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ElectionDistrict>
     */
    protected $uidLocal;

    /**
     * Election
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Election>
     */
    protected $uidForeign;

    /**
     * Theses
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis>
     */
    protected $theses;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ElectionDistrict>
     */
    public function getUidLocal() {
        return $this->uidLocal;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ElectionDistrict> $uidLocal
     */
    public function setUidLocal(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $uidLocal) {
        $this->uidLocal = $uidLocal;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Election>
     */
    public function getUidForeign() {
        return $this->uidForeign;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Election> $uidForeign
     */
    public function setUidForeign(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $uidForeign) {
        $this->uidForeign = $uidForeign;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis>
     */
    public function getTheses() {
        return $this->theses;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis> $theses
     */
    public function setTheses(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $theses) {
        $this->theses = $theses;
    }

}
