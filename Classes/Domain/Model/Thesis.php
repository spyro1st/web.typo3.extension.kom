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
 * Thesis
 */
class Thesis extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * description
     *
     * @var string
     */
    protected $description = '';

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
}
