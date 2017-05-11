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
 * ElectionController
 */
class ElectionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * Session storage key used
     * @var string
     */
    protected $sessionDataStorageKey = 'tx_kom_questionnaire_form';

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
     * electionDistrictRepository
     * @var \DigitalPatrioten\Kom\Domain\Repository\ElectionDistrictRepository
     * @inject
     */
    protected $electionDistrictRepository = NULL;

    /**
     * thesisRepository
     * @var \DigitalPatrioten\Kom\Domain\Repository\ThesisRepository
     * @inject
     */
    protected $thesisRepository = NULL;

    /**
     * thesisRepository
     * @var \DigitalPatrioten\Kom\Domain\Repository\ElectiondistrictElectionMappingRepository
     * @inject
     */
    protected $electiondistrictElectionMappingRepository = NULL;

    /**
     * resultRepository
     * @var \DigitalPatrioten\Kom\Domain\Repository\ResultRepository
     * @inject
     */
    protected $resultRepository = NULL;

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
            }
        }

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
        $oldSessionData = $GLOBALS['TSFE']->fe_user->getKey('ses', $this->sessionDataStorageKey);
        if ($oldSessionData['formData'] && $this->formData) {
            ArrayUtility::mergeRecursiveWithOverrule($oldSessionData['formData'], $this->formData);
            $this->sessionData['formData'] = $oldSessionData['formData'];
        } else {
            $this->sessionData['formData'] = $this->formData;
        }
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

        $totalSteps = $thesesMappings->getTheses()->count();

        if ($step === ($totalSteps + 1)) {
            $this->persistResultObject();
        }

        $this->view->assignMultiple(
            [
                'electionDistrict' => $electionDistrict,
                'election' => $election,
                'thesesMappings' => $thesesMappings,
                'result' => $result,
                'step' => $step,
                'totalSteps' => $totalSteps
            ]
        );
    }

    /**
     * @param \DigitalPatrioten\Kom\Domain\Model\Result $result
     *
     * @return void
     */
    public function emphasizeAction(\DigitalPatrioten\Kom\Domain\Model\Result $result) {
        $this->view->assignMultiple(
            [
                'result' => $result
            ]
        );
    }

    /**
     * persists the result object from session
     */
    private function persistResultObject() {
        $resultData = $this->sessionData['formData'];

        /* @var \DigitalPatrioten\Kom\Domain\Model\Result $resultObject */
        $resultObject = $this->objectManager->get('DigitalPatrioten\\Kom\\Domain\\Model\\Result');
        
        $resultObject->setElection($this->electionRepository->findByUid($resultData['election']));
        $resultObject->setElectionDistrict($this->electionDistrictRepository->findByUid($resultData['electionDistrict']));

        foreach ($resultData['result']['opinions'] as $opinion) {
            /* @var \DigitalPatrioten\Kom\Domain\Model\ResultOpinion $opinionObject */
            $opinionObject = $this->objectManager->get('DigitalPatrioten\\Kom\\Domain\\Model\\ResultOpinion');
            $opinionObject->setUidLocal($this->thesisRepository->findByUid($opinion['uidLocal']));
            $opinionObject->setUidForeign($resultObject);
            $opinionObject->setOpinion($opinion['opinion']);
            
            $resultObject->addOpinion($opinionObject);
        }
        
        $this->resultRepository->add($resultObject);

        $persistenceManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager');
        $persistenceManager->persistAll();
        
        $this->clearSessionData();
        
        $this->redirect('emphasize', null, null, ['result' => $resultObject]);
    }
}
