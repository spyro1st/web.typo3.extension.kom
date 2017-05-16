<?php
namespace DigitalPatrioten\Kom\Domain\Model;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

/**
 * Candidate
 */
class Candidate extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * title
     * @var string
     */
    protected $title = '';

    /**
     * firstName
     * @var string
     */
    protected $firstName = '';

    /**
     * lastName
     * @var string
     */
    protected $lastName = '';

    /**
     * image
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = NULL;

    /**
     * elections
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\CandidateElectionMapping>
     */
    protected $elections = NULL;

    /**
     * opinions
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\CandidateOpinion>
     */
    protected $opinions = NULL;

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
        $this->elections = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->opinions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     * @return string $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Returns the firstName
     * @return string $firstName
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     *
     * @param string $firstName
     *
     * @return void
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    /**
     * Returns the lastName
     * @return string $lastName
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     *
     * @param string $lastName
     *
     * @return void
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFullName() {
        $fullName = ($this->getTitle()) ? $this->getTitle() . ' ' : '';
        $fullName = "$fullName {$this->getFirstName()} {$this->getLastName()}";
        
        return $fullName;
    }

    /**
     * Returns the image
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     *
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
        $this->image = $image;
    }

    /**
     * Adds a Election
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\CandidateElectionMapping $election
     *
     * @return void
     */
    public function addElection(\DigitalPatrioten\Kom\Domain\Model\CandidateElectionMapping $election) {
        $this->elections->attach($election);
    }

    /**
     * Removes a Election
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\CandidateElectionMapping $electionToRemove The Election to be removed
     *
     * @return void
     */
    public function removeElection(\DigitalPatrioten\Kom\Domain\Model\CandidateElectionMapping $electionToRemove) {
        $this->elections->detach($electionToRemove);
    }

    /**
     * Returns the elections
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\CandidateElectionMapping> $elections
     */
    public function getElections() {
        return $this->elections;
    }

    /**
     * Sets the elections
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\CandidateElectionMapping> $elections
     *
     * @return void
     */
    public function setElections(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $elections) {
        $this->elections = $elections;
    }

    /**
     * Adds a Opinion
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\CandidateOpinion $opinion
     *
     * @return void
     */
    public function addOpinion(\DigitalPatrioten\Kom\Domain\Model\CandidateOpinion $opinion) {
        $this->opinions->attach($opinion);
    }

    /**
     * Removes a Opinion
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\CandidateOpinion $opinionToRemove The Opinion to be removed
     *
     * @return void
     */
    public function removeOpinion(\DigitalPatrioten\Kom\Domain\Model\CandidateOpinion $opinionToRemove) {
        $this->opinions->detach($opinionToRemove);
    }

    /**
     * Returns the opinions
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\CandidateOpinion> $opinions
     */
    public function getOpinions() {
        return $this->opinions;
    }

    /**
     * Sets the opinions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\CandidateOpinion> $opinions
     *
     * @return void
     */
    public function setOpinions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $opinions) {
        $this->opinions = $opinions;
    }

}
