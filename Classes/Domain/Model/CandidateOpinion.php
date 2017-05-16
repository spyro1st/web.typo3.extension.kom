<?php
namespace DigitalPatrioten\Kom\Domain\Model;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

/**
 * CanidateOpinion
 */
class CandidateOpinion extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * ElectionDistrict
     * @var \DigitalPatrioten\Kom\Domain\Model\Thesis
     */
    protected $uidLocal = NULL;

    /**
     * Candidate
     * @var \DigitalPatrioten\Kom\Domain\Model\Candidate
     */
    protected $uidForeign = NULL;

    /**
     * opinion
     * @var int
     */
    protected $opinion = 0;

    /**
     * emphasize
     * @var string
     */
    protected $explanation = '';

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
     * @return \DigitalPatrioten\Kom\Domain\Model\Candidate
     */
    public function getUidForeign() {
        return $this->uidForeign;
    }

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\Candidate $uidForeign
     */
    public function setUidForeign(\DigitalPatrioten\Kom\Domain\Model\Candidate $uidForeign) {
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
     * @param string $explanation
     */
    public function setExplanation($explanation) {
        $this->explanation = $explanation;
    }

}
