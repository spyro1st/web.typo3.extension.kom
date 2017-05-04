<?php
namespace DigitalPatrioten\Kom\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Kevin Ulrich Moschallski <info@digitalpatrioten.com>
 */
class ElectionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DigitalPatrioten\Kom\Domain\Model\Election
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DigitalPatrioten\Kom\Domain\Model\Election();
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
    public function getDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );

    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'date',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getThesesReturnsInitialValueForThesis()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTheses()
        );

    }

    /**
     * @test
     */
    public function setThesesForObjectStorageContainingThesisSetsTheses()
    {
        $thesis = new \DigitalPatrioten\Kom\Domain\Model\Thesis();
        $objectStorageHoldingExactlyOneTheses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTheses->attach($thesis);
        $this->subject->setTheses($objectStorageHoldingExactlyOneTheses);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTheses,
            'theses',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addThesisToObjectStorageHoldingTheses()
    {
        $thesis = new \DigitalPatrioten\Kom\Domain\Model\Thesis();
        $thesesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $thesesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($thesis));
        $this->inject($this->subject, 'theses', $thesesObjectStorageMock);

        $this->subject->addThesis($thesis);
    }

    /**
     * @test
     */
    public function removeThesisFromObjectStorageHoldingTheses()
    {
        $thesis = new \DigitalPatrioten\Kom\Domain\Model\Thesis();
        $thesesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $thesesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($thesis));
        $this->inject($this->subject, 'theses', $thesesObjectStorageMock);

        $this->subject->removeThesis($thesis);

    }
}
