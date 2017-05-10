<?php
namespace DigitalPatrioten\Kom\Controller;

/***
 * This file is part of the "Kandidat-O-Mat" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2017 Kevin Ulrich Moschallski <info@digitalpatrioten.com>, DigitalPatrioten AG
 ***/

/**
 * ElectionController
 */
class ElectionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * Object Manager
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * electionRepository
     * @var \DigitalPatrioten\Kom\Domain\Repository\ElectionRepository
     * @inject
     */
    protected $electionRepository = NULL;

    /**
     * thesisRepository
     * @var \DigitalPatrioten\Kom\Domain\Repository\ElectiondistrictElectionMappingRepository
     * @inject
     */
    protected $electiondistrictElectionMappingRepository = NULL;

    /**
     * action list
     * @return void
     */
    public function listAction() {
        $elections = $this->electionRepository->findAll();
        $this->view->assign('elections', $elections);
    }

    /**
     * action show
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $election
     *
     * @return void
     */
    public function showAction(\DigitalPatrioten\Kom\Domain\Model\Election $election) {
        $this->view->assign('election', $election);
    }

    /**
     * action questionnaire
     *
     * @param \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict
     * @param \DigitalPatrioten\Kom\Domain\Model\Election $election
     * @param \DigitalPatrioten\Kom\Domain\Model\Result $result
     * @param int $step
     *
     * @return void
     */
    public function questionnaireAction(
        \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict $electionDistrict,
        \DigitalPatrioten\Kom\Domain\Model\Election $election = null,
        \DigitalPatrioten\Kom\Domain\Model\Result $result = NULL,
        $step = 0
    ) {
        if (!$election) {
            $election = $this->electionRepository->findFirstActiveByElectionDistrict($electionDistrict);
        }

        if (!$result) {
            /* @var \DigitalPatrioten\Kom\Domain\Model\Result $result */
            $result = $this->objectManager->get('DigitalPatrioten\\Kom\\Domain\\Model\\Result');
            $result->setElection($election);
            $result->setElectionDistrict($electionDistrict);
        }
        
        $thesesMappings = $this->electiondistrictElectionMappingRepository->findByElectionAndElectionDistrict($election, $electionDistrict);

        $this->view->assignMultiple(
            [
                'electionDistrict' => $electionDistrict,
                'election' => $election,
                'thesesMappings' => $thesesMappings,
                'result' => $result,
                'step' => $step
            ]
        );
    }
}
