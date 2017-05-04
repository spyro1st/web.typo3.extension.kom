<?php
namespace DigitalPatrioten\Kom\Controller;

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
 * ElectionDistrictController
 */
class ElectionDistrictController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * electionDistrictRepository
     *
     * @var \DigitalPatrioten\Kom\Domain\Repository\ElectionDistrictRepository
     * @inject
     */
    protected $electionDistrictRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $electionDistricts = $this->electionDistrictRepository->findAll();
        $this->view->assign('electionDistricts', $electionDistricts);
    }

    /**
     * action show
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict
     * @return void
     */
    public function showAction(\DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict)
    {
        $this->view->assign('electionDistrict', $electionDistrict);
    }
}
