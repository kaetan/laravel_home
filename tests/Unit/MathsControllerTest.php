<?php


namespace Tests\Unit;


use App\Exceptions\MathsException;
use App\Http\Controllers\MathsController;
use Tests\TestCase;

class MathsControllerTest extends TestCase
{
    public $subject;

    public function setUp(): void
    {
        parent::setUp();

        $this->subject = new MathsController();
    }

    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->subject);
    }

    public function testMock()
    {
        $mocked = $this->createMock(MathsController::class);
        $mocked->method('validateParams')
            ->willReturn($this->customCallback('potato!'));
        $result = ($mocked->validateParams(['a' => 1]));
        $this->assertEquals('tasty potato!', $result);
    }

    public function customCallback($value)
    {
        return 'tasty ' . $value;
    }


    public function testWrongAction(): void
    {
        $params['a'] = 15;
        $params['b'] = 5;
        $params['action'] = 'divsss';

        $this->expectException(MathsException::class);
        $result = $this->subject->doMath($params);
    }

    /**
     * @group math
     * @throws MathsException
     */
    public function testSum(): void
    {
        $params['a'] = 5;
        $params['b'] = 15;
        $params['action'] = 'sum';

        $result = $this->subject->doMath($params);
        $this->assertEquals(20, $result);
    }

    public function testSum2(): void
    {
        $params['a'] = 6;
        $params['b'] = 15;
        $params['action'] = 'sum';

        $result = $this->subject->doMath($params);
        $this->assertEquals(21, $result);
    }

    /**
     * @group math
     * @throws MathsException
     */
    public function testSub(): void
    {
        $params['a'] = 5;
        $params['b'] = 15;
        $params['action'] = 'sub';

        $result = $this->subject->doMath($params);
        $this->assertEquals(-10, $result);
    }
}
