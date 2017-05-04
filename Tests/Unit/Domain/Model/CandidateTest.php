<?php
namespace DigitalPatrioten\Kom\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Kevin Ulrich Moschallski <info@digitalpatrioten.com>
 */
class CandidateTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DigitalPatrioten\Kom\Domain\Model\Candidate
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DigitalPatrioten\Kom\Domain\Model\Candidate();
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
    public function getFirstNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFirstName()
        );

    }

    /**
     * @test
     */
    public function setFirstNameForStringSetsFirstName()
    {
        $this->subject->setFirstName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'firstName',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getLastNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLastName()
        );

    }

    /**
     * @test
     */
    public function setLastNameForStringSetsLastName()
    {
        $this->subject->setLastName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'lastName',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );

    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
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
