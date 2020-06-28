<?php


namespace App\Services\Tests;


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


    public function testWrongAction(): void
    {
        $params['a'] = 15;
        $params['b'] = 5;
        $params['action'] = 'divsss';

        $this->expectException(MathsException::class);
        $result = $this->subject->doMath($params);
    }

    public function testSum(): void
    {
        $params['a'] = 5;
        $params['b'] = 15;
        $params['action'] = 'sum';

        $result = $this->subject->doMath($params);
        $this->assertEquals(20, $result);
    }

    public function testSub(): void
    {
        $params['a'] = 5;
        $params['b'] = 15;
        $params['action'] = 'sub';

        $result = $this->subject->doMath($params);
        $this->assertEquals(-10, $result);
    }
}
