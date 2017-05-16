<?php
namespace DigitalPatrioten\Kom\Domain\Model;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

/**
 * ResultOpinion
 */
class ResultOpinion extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * ElectionDistrict
     * @var \DigitalPatrioten\Kom\Domain\Model\Thesis
     */
    protected $uidLocal = null;

    /**
     * Election
     * @var \DigitalPatrioten\Kom\Domain\Model\Result
     */
    protected $uidForeign = null;

    /**
     * opinion
     * @var int
     */
    protected $opinion = 0;

    /**
     * emphasize
     * @var bool
     */
    protected $emphasize = false;

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
     * @return \DigitalPatrioten\Kom\Domain\Model\Thesis
     */
    public function getUidLocal() {
        return $this->uidLocal;
    }

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\Thesis $uidLocal
     */
    public function setUidLocal(\DigitalPatrioten\Kom\Domain\Model\Thesis $uidLocal) {
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

    /**
     * Returns the opinion
     * @return int $opinion
     */
    public function getOpinion() {
        return $this->opinion;
    }

    /**
     * Sets the opinion
     *
     * @param int $opinion
     *
     * @return void
     */
    public function setOpinion($opinion) {
        $this->opinion = $opinion;
    }

    /**
     * @return bool
     */
    public function getEmphasize() {
        return $this->emphasize;
    }

    /**
     * @param bool $emphasize
     */
    public function setEmphasize($emphasize) {
        $this->emphasize = $emphasize;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ThesisMapping> $thesesmappings
     */
    public function getThesesmappings() {
        return $this->thesesmappings;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ThesisMapping> $thesesmappings
     */
    public function setThesesmappings(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $thesesmappings) {
        $this->thesesmappings = $thesesmappings;
    }

}
