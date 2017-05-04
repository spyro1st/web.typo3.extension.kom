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
 * ElectionController
 */
class ElectionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * electionRepository
     *
     * @var \DigitalPatrioten\Kom\Domain\Repository\ElectionRepository
     * @inject
     */
    protected $electionRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $elections = $this->electionRepository->findAll();
        $this->view->assign('elections', $elections);
    }

    /**
     * action show
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $election
     * @return void
     */
    public function showAction(\DigitalPatrioten\Kom\Domain\Model\Election $election)
    {
        $this->view->assign('election', $election);
    }
}
