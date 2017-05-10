<?php
namespace DigitalPatrioten\Kom\Domain\Model;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

/**
 * Thesis
 */
class Thesis extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * title
     * @var string
     */
    protected $title = '';

    /**
     * description
     * @var string
     */
    protected $description = '';

    /**
     * theses
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DigitalPatrioten\Kom\Domain\Model\ThesisMapping>
     */
    protected $thesesmappings = null;

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
        $this->thesesmappings = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }
    
    /**
     * Returns the description
     * @return string $description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription($description) {
        $this->description = $description;
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
