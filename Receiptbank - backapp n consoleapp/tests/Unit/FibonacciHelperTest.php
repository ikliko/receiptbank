<?php

namespace Tests\Unit;

use App\Exceptions\FibonacciInvalidNumberException;
use App\Exceptions\FibonacciMissingNumberException;
use App\Exceptions\FibonacciNegativeNumberException;
use App\Helpers\FibonacciHelper;
use PHPUnit\Framework\TestCase;

class FibonacciHelperTest extends TestCase {
    /**
     * Testing that generateFibonacci function will throw FibonacciInvalidNumberException
     * when passing string
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateFibonacciSequenceInvalidNumberException() {
        $this->expectException(FibonacciInvalidNumberException::class);
        $fibonacciSequence = FibonacciHelper::generateFibonacci('invalidNUmber');
    }

    /**
     * Testing that generateFibonacci function will throw FibonacciMissingNumberException
     * when passing null
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateFibonacciSequenceMissingFibonacciNumberException() {
        $this->expectException(FibonacciMissingNumberException::class);
        $fibonacciSequence = FibonacciHelper::generateFibonacci(null);
    }

    /**
     * Testing that generateFibonacci function will throw FibonacciNegativeNumberException
     * when passing negative number
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateFibonacciSequenceNegativeFibonacciNumberException() {
        $this->expectException(FibonacciNegativeNumberException::class);
        $fibonacciSequence = FibonacciHelper::generateFibonacci(-2);
    }

    /**
     * Testing that generateFibonacci function will throw F
     * when passing zero
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateFibonacciSequenceZeroFibonacciNumber() {
        $this->expectException(FibonacciNegativeNumberException::class);
        $fibonacciSequence = FibonacciHelper::generateFibonacci(0);
    }

    /**
     * Testing that generateFibonacci function will return right values
     * when passing 1
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateFibonacciSequenceNumberOfValue() {
        $fibonacciSequence = FibonacciHelper::generateFibonacci(1);
        $expectedFibonacciSequence = [null, 0, 1];

        $this->assertIsArray($fibonacciSequence, 'Testing is array');

        $this->assertEquals(
            count($expectedFibonacciSequence),
            count($fibonacciSequence),
            'Testing array is the same length as expected'
        );

        $this->assertEquals(
            $expectedFibonacciSequence[0],
            $fibonacciSequence[0],
            'Testing first value of the array is as expected'
        );

        $this->assertEquals(
            $expectedFibonacciSequence[1],
            $fibonacciSequence[1],
            'Testing second value of the array is as expected'
        );

        $this->assertEquals(
            $expectedFibonacciSequence[2],
            $fibonacciSequence[2],
            'Testing third value of the array is as expected'
        );
    }

    /**
     * Testing that generateMultiplicationTable function will throw FibonacciInvalidNumberException
     * when passing string
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateMultiplicationTableInvalidNumberException() {
        $this->expectException(FibonacciInvalidNumberException::class);
        $fibonacciSequence = FibonacciHelper::generateMultiplicationTable('invalidNUmber');
    }

    /**
     * Testing that generateMultiplicationTable function will throw FibonacciMissingNumberException
     * when passing string
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateMultiplicationTableMissingNumberException() {
        $this->expectException(FibonacciMissingNumberException::class);
        $fibonacciSequence = FibonacciHelper::generateMultiplicationTable(null);
    }

    /**
     * Testing that generateMultiplicationTable function will throw FibonacciNegativeNumberException
     * when passing string
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateMultiplicationTableNegativeNumberException() {
        $this->expectException(FibonacciNegativeNumberException::class);
        $fibonacciSequence = FibonacciHelper::generateMultiplicationTable(-2);
    }

    /**
     * Testing that generateMultiplicationTable function will throw FibonacciNegativeNumberException
     * when passing string
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateMultiplicationTableWithZeroValue() {
        $this->expectException(FibonacciNegativeNumberException::class);
        $fibonacciSequence = FibonacciHelper::generateMultiplicationTable(0);
    }

    /**
     * Testing that generateMultiplicationTable function will return valid value
     * when passing string
     *
     * @return void
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public function testGenerateMultiplicationTableWithValidValue() {
        $fibonacciMultiplicationSequence = FibonacciHelper::generateMultiplicationTable(1);
        $expectedFibonacciMultiplicationSequence = [
            [
                null,
                0,
                1
            ],
            [
                0,
                0,
                0
            ],
            [
                1,
                0,
                1
            ]
        ];

        $this->assertEquals(
            count($expectedFibonacciMultiplicationSequence),
            count($fibonacciMultiplicationSequence)
        );

        $this->assertEquals(
            count($expectedFibonacciMultiplicationSequence[0]),
            count($fibonacciMultiplicationSequence[0])
        );

        $this->assertEquals(
            $expectedFibonacciMultiplicationSequence[0][0],
            $fibonacciMultiplicationSequence[0][0]
        );

        $this->assertEquals(
            $expectedFibonacciMultiplicationSequence[0][1],
            $fibonacciMultiplicationSequence[0][1]
        );

        $this->assertEquals(
            $expectedFibonacciMultiplicationSequence[0][2],
            $fibonacciMultiplicationSequence[0][2]
        );

        $this->assertEquals(
            count($expectedFibonacciMultiplicationSequence[1]),
            count($fibonacciMultiplicationSequence[1])
        );

        // ..
    }
}
