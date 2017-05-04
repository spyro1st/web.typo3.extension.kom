<?php
namespace DigitalPatrioten\Kom\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Kevin Ulrich Moschallski <info@digitalpatrioten.com>
 */
class ElectionDistrictTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DigitalPatrioten\Kom\Domain\Model\ElectionDistrict();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );

    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getElectionsReturnsInitialValueForElection()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getElections()
        );

    }

    /**
     * @test
     */
    public function setElectionsForObjectStorageContainingElectionSetsElections()
    {
        $election = new \DigitalPatrioten\Kom\Domain\Model\Election();
        $objectStorageHoldingExactlyOneElections = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneElections->attach($election);
        $this->subject->setElections($objectStorageHoldingExactlyOneElections);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneElections,
            'elections',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addElectionToObjectStorageHoldingElections()
    {
        $election = new \DigitalPatrioten\Kom\Domain\Model\Election();
        $electionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $electionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($election));
        $this->inject($this->subject, 'elections', $electionsObjectStorageMock);

        $this->subject->addElection($election);
    }

    /**
     * @test
     */
    public function removeElectionFromObjectStorageHoldingElections()
    {
        $election = new \DigitalPatrioten\Kom\Domain\Model\Election();
        $electionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $electionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($election));
        $this->inject($this->subject, 'elections', $electionsObjectStorageMock);

        $this->subject->removeElection($election);

    }
}
