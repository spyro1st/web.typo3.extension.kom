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
 * Election
 */
class Election extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * theses
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis>
     * @cascade remove
     */
    protected $theses = null;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var string
     */
    protected $logos = '';

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
        $this->theses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Adds a Thesis
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\Thesis $thesis
     * @return void
     */
    public function addThesis(\DigitalPatrioten\Kom\Domain\Model\Thesis $thesis)
    {
        $this->theses->attach($thesis);
    }

    /**
     * Removes a Thesis
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\Thesis $thesisToRemove The Thesis to be removed
     * @return void
     */
    public function removeThesis(\DigitalPatrioten\Kom\Domain\Model\Thesis $thesisToRemove)
    {
        $this->theses->detach($thesisToRemove);
    }

    /**
     * Returns the theses
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis> $theses
     */
    public function getTheses()
    {
        return $this->theses;
    }

    /**
     * Sets the theses
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\Thesis> $theses
     * @return void
     */
    public function setTheses(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $theses)
    {
        $this->theses = $theses;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLogos() {
        return $this->logos;
    }

    /**
     * @param string $logos
     */
    public function setLogos($logos) {
        $this->logos = $logos;
    }

}
