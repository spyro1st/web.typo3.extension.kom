<?php
namespace DigitalPatrioten\Kom\Domain\Model;

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
 * Candidate
 */
class Result extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * opinions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ResultOpinion>
     */
    protected $opinions = null;

    /**
     * candidates
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ResultCandidate>
     * @cascade remove
     */
    protected $candidates = null;

    /**
     * electionDistrict
     *
     * @var \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict
     */
    protected $electionDistrict = null;

    /**
     * election
     *
     * @var \DigitalPatrioten\Kom\Domain\Model\Election
     */
    protected $election = null;

    /**
     * step
     * 
     * @var int
     */
    protected $step = 0;

    /**
     * totalSteps
     * 
     * @var int
     */
    protected $totalSteps = 0;

    /**
     * sessionId
     *
     * @var string
     */
    protected $sessionId = '';


    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->opinions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->candidates = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Opinion
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\ResultOpinion $opinion
     * @return void
     */
    public function addOpinion(\DigitalPatrioten\Kom\Domain\Model\ResultOpinion $opinion)
    {
        $this->opinions->attach($opinion);
    }

    /**
     * Removes a Opinion
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\ResultOpinion $opinionToRemove The Opinion to be removed
     * @return void
     */
    public function removeOpinion(\DigitalPatrioten\Kom\Domain\Model\ResultOpinion $opinionToRemove)
    {
        $this->opinions->detach($opinionToRemove);
    }

    /**
     * Returns the opinions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ResultOpinion> $opinions
     */
    public function getOpinions()
    {
        return $this->opinions;
    }

    /**
     * Sets the opinions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ResultOpinion> $opinions
     * @return void
     */
    public function setOpinions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $opinions)
    {
        $this->opinions = $opinions;
    }

    /**
     * Adds a Candidate
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\ResultCandidate $candidate
     * @return void
     */
    public function addCandidate(\DigitalPatrioten\Kom\Domain\Model\ResultCandidate $candidate)
    {
        $this->candidates->attach($candidate);
    }

    /**
     * Removes a Candidate
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\ResultCandidate $candidateToRemove The Candidate to be removed
     * @return void
     */
    public function removeCandidate(\DigitalPatrioten\Kom\Domain\Model\ResultCandidate $candidateToRemove)
    {
        $this->candidates->detach($candidateToRemove);
    }

    /**
     * Returns the Candidates
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ResultCandidate> $candidates
     */
    public function getCandidates()
    {
        return $this->candidates;
    }

    /**
     * Sets the Candidates
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ResultCandidate> $candidates
     * @return void
     */
    public function setCandidates(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $candidates)
    {
        $this->candidates = $candidates;
    }

    /**
     * Returns the electionDistrict
     *
     * @return \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict
     */
    public function getElectionDistrict()
    {
        return $this->electionDistrict;
    }

    /**
     * Sets the electionDistrict
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict
     * @return void
     */
    public function setElectionDistrict(\DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict)
    {
        $this->electionDistrict = $electionDistrict;
    }

    /**
     * Returns the election
     *
     * @return \DigitalPatrioten\Kom\Domain\Model\Election $election
     */
    public function getElection()
    {
        return $this->election;
    }

    /**
     * Sets the election
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $election
     * @return void
     */
    public function setElection(\DigitalPatrioten\Kom\Domain\Model\Election $election)
    {
        $this->election = $election;
    }

    /**
     * @return int
     */
    public function getStep() {
        return $this->step;
    }

    /**
     * @param int $step
     */
    public function setStep($step) {
        $this->step = $step;
    }

    /**
     * @return int
     */
    public function getTotalSteps() {
        return $this->totalSteps;
    }

    /**
     * @param int $totalSteps
     */
    public function setTotalSteps($totalSteps) {
        $this->totalSteps = $totalSteps;
    }

    /**
     * @return string
     */
    public function getSessionId() {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     */
    public function setSessionId($sessionId) {
        $this->sessionId = $sessionId;
    }

}
