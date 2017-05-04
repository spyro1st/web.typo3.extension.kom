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
 * ElectionDistrict
 */
class ElectionDistrict extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * elections
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Election>
     * @cascade remove
     */
    protected $elections = null;

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
        $this->elections = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Adds a Election
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $election
     * @return void
     */
    public function addElection(\DigitalPatrioten\Kom\Domain\Model\Election $election)
    {
        $this->elections->attach($election);
    }

    /**
     * Removes a Election
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $electionToRemove The Election to be removed
     * @return void
     */
    public function removeElection(\DigitalPatrioten\Kom\Domain\Model\Election $electionToRemove)
    {
        $this->elections->detach($electionToRemove);
    }

    /**
     * Returns the elections
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Election> $elections
     */
    public function getElections()
    {
        return $this->elections;
    }

    /**
     * Sets the elections
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Election> $elections
     * @return void
     */
    public function setElections(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $elections)
    {
        $this->elections = $elections;
    }
}
