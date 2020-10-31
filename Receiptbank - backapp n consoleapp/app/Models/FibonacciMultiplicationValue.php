<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FibonacciMultiplicationValue extends Model {
    protected $casts = [
        'value' => 'integer'
    ];
}
