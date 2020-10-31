<?php

namespace App\Models;

use App\Exceptions\FibonacciInvalidNumberException;
use App\Helpers\FibonacciHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FibonacciNumber extends Model {
    public static function storeNumber($number) {
        $fibonacciNumber = null;

        $transaction = DB::transaction(function() use ($number, $fibonacciNumber) {
            $fibonacciNumber = new FibonacciNumber();
            $fibonacciNumber->value = $number;

            $rowIndex = 0;
            $colIndex = 0;
            $multiplicationTable = FibonacciHelper::generateMultiplicationTable($number);

            $fibonacciNumber->save();

            foreach($multiplicationTable as $row) {
                foreach($row as $item) {
                    $fibonacciMultiplicationValue = new FibonacciMultiplicationValue();

                    $fibonacciMultiplicationValue->row = $rowIndex;
                    $fibonacciMultiplicationValue->col = $colIndex;
                    $fibonacciMultiplicationValue->value = $item;

                    $fibonacciMultiplicationValue->fibonacci_number_id = $fibonacciNumber->id;

                    $fibonacciMultiplicationValue->save();

                    $colIndex++;
                }

                $rowIndex++;
            }
        });

        return $fibonacciNumber;
    }

    public function multiplicationTableValues() {
        return $this->hasMany(FibonacciMultiplicationValue::class)
            ->orderBy('row', 'asc')
            ->orderBy('col', 'asc');
    }

    public function getMultiplicationTable() {
        return $this->multiplicationTableValues
            ->groupBy('row')
            ->map(function($row) {
                return $row->pluck('value');
            })
            ->toArray();
    }
}
