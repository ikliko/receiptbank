<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FibonacciNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FibonacciController extends Controller {
    public function getFibonacciSequence(Request $request) {
        Log::info('Request made', [
            'request' => $request
        ]);

        $number = $request->get('n');

        $fibonacciNumber = FibonacciNumber::whereValue($number)->first();

        if(!$fibonacciNumber) {
            $fibonacciNumber = FibonacciNumber::storeNumber($number);
        }

        return response($fibonacciNumber->getMultiplicationTable());
    }
}
