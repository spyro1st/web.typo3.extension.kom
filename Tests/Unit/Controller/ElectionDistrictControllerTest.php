<?php
namespace DigitalPatrioten\Kom\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Kevin Ulrich Moschallski <info@digitalpatrioten.com>
 */
class ElectionDistrictControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DigitalPatrioten\Kom\Controller\ElectionDistrictController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DigitalPatrioten\Kom\Controller\ElectionDistrictController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllElectionDistrictsFromRepositoryAndAssignsThemToView()
    {

        $allElectionDistricts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $electionDistrictRepository = $this->getMockBuilder(\DigitalPatrioten\Kom\Domain\Repository\ElectionDistrictRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $electionDistrictRepository->expects(self::once())->method('findAll')->will(self::returnValue($allElectionDistricts));
        $this->inject($this->subject, 'electionDistrictRepository', $electionDistrictRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('electionDistricts', $allElectionDistricts);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenElectionDistrictToView()
    {
        $electionDistrict = new \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('electionDistrict', $electionDistrict);

        $this->subject->showAction($electionDistrict);
    }
}
