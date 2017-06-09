<?php
namespace DigitalPatrioten\Kom\Controller;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

use TYPO3\CMS\Core\Utility\ArrayUtility;

/**
 * ResultController
 */
class ResultController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * resultRepository
     * @var \DigitalPatrioten\Kom\Domain\Repository\ResultRepository
     * @inject
     */
    protected $resultRepository = NULL;

    /**
     * action count
     * @return void
     */
    public function countAction() {
        $count = $this->resultRepository->countAll();
        $this->view->assign('count', $count);
    }
}
