<?php

namespace App\Helpers;

use App\Exceptions\FibonacciInvalidNumberException;
use App\Exceptions\FibonacciMissingNumberException;
use App\Exceptions\FibonacciNegativeNumberException;

class FibonacciHelper {
    /**
     * @param $number
     * @return array
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public static function generateMultiplicationTable($number) {
        self::validateFibonacciNumber($number);

        $fibonacciSequence = self::generateFibonacci($number);

        $length = count($fibonacciSequence);
        $multiplicationTable = [];

        $multiplicationTable[] = $fibonacciSequence;

        for($r = 1; $r < $length; $r++) {
            $multiplicationTableRow = [$fibonacciSequence[$r]];

            for($c = 1; $c < $length; $c++) {
                $multiplicationTableRow[] = $fibonacciSequence[$r] * $fibonacciSequence[$c];
            }

            $multiplicationTable[] = $multiplicationTableRow;
        }

        return $multiplicationTable;
    }


    /**
     * @param $count
     * @return array
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciMissingNumberException
     * @throws FibonacciNegativeNumberException
     */
    public static function generateFibonacci($count) {
        self::validateFibonacciNumber($count);

        $sequence = [null, 0, 1];

        for($i = 1; $i < $count; $i++) {
            $sequence[] = $sequence[$i] + $sequence[$i + 1];
        }

        return $sequence;
    }

    /**
     * @param $number
     * @throws FibonacciInvalidNumberException
     * @throws FibonacciNegativeNumberException
     * @throws FibonacciMissingNumberException
     */
    private static function validateFibonacciNumber($number) {
        if($number === null) {
            throw new FibonacciMissingNumberException('Missing fibonacci number');
        }

        if(!is_numeric($number)) {
            throw new FibonacciInvalidNumberException("Value '${number}' is not a valid number");
        }

        if($number < 1) {
            throw new FibonacciNegativeNumberException('Invalid fibonacci number');
        }
    }
}
