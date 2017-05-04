<?php
namespace DigitalPatrioten\Kom\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Kevin Ulrich Moschallski <info@digitalpatrioten.com>
 */
class ThesisTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \DigitalPatrioten\Kom\Domain\Model\Thesis
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DigitalPatrioten\Kom\Domain\Model\Thesis();
    }

    protected function tearDown()
    {
        parent::tearDown();
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
}
