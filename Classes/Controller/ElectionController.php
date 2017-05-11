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
     * Session storage key used
     * @var string
     */
    protected $sessionDataStorageKey;

    /**
     * The session data container
     * @var array
     */
    protected $sessionData = [];

    /**
     * The actual form data
     * @var array
     */
    protected $formData;

    /**
     * A list of action names that have been passed successfully.
     * @var array
     */
    protected $passedActionMethodNames;

    /**
     * A list of action names that have to be passed before the final action can be executed.
     * @var array
     */
    protected $mandatoryActionMethodNames;

    /**
     * The action methode name of the first action.
     * @var string
     */
    protected $firstActionMethodName;

    /**
     * The action methode name of the first action.
     * @var string
     */
    protected $finalActionMethodName;

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
     * Handles session/argument interaction to ensure correct validation. Furthermore
     * takes care of mandatory actions.
     * @return void
     */
    protected function initializeQuestionnaireAction() {
        $this->loadSessionData();

        if ($this->formData === NULL) {
            $this->formData = [];
        }

        $requestArguments = $this->request->getArguments();

        foreach ($this->arguments->getArgumentNames() as $argumentName) {
            if (array_key_exists($argumentName, $requestArguments)) {
                $this->formData[$argumentName] = $requestArguments[$argumentName];
            } else {
                if (array_key_exists($argumentName, $this->formData)) {
                    $requestArguments[$argumentName] = (String)$this->formData[$argumentName];
                    $_POST['tx_' . strtolower($this->extensionName) .
                    '_' . strtolower($this->request->getPluginName())][$argumentName] =
                        (String)$this->formData[$argumentName];
                }
            }
        }

        $this->request->setArguments($requestArguments);

        $this->storeSessionData();
    }

    /**
     * We use initializeView to determin if a certain action has been reached
     * and all it's validation has been passed successful.
     * @return void
     */
    protected function initializeView() {
        $this->passedActionMethodNames[$this->actionMethodName] = TRUE;
        $this->storeSessionData();
    }

    /**
     * Loads data from session and populates formData and passedActionMethodeNames.
     * @return void
     */
    protected function loadSessionData() {
        $this->sessionData =
            $GLOBALS['TSFE']->fe_user->getKey('ses', $this->sessionDataStorageKey);

        $this->formData = $this->sessionData['formData'];
        $this->passedActionMethodNames = $this->sessionData['passedActionMethodNames'];
    }

    /**
     * Stores data to session. Including formData and passedActionMethodeNames.
     * @return void
     */
    protected function storeSessionData() {
        $this->sessionData['formData'] = $this->formData;
        $this->sessionData['passedActionMethodNames'] = $this->passedActionMethodNames;

        $GLOBALS['TSFE']->fe_user->setKey('ses', $this->sessionDataStorageKey,
            $this->sessionData);

        $GLOBALS['TSFE']->fe_user->storeSessionData();
    }

    protected function clearSessionData() {
        $this->sessionData = array();

        $GLOBALS['TSFE']->fe_user->setKey('ses', $this->sessionDataStorageKey,
            $this->sessionData);

        $GLOBALS['TSFE']->fe_user->storeSessionData();
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
        \DigitalPatrioten\Kom\Domain\Model\Election $election = NULL,
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
